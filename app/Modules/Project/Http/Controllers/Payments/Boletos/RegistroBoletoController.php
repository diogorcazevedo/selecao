<?php

namespace App\Modules\Project\Http\Controllers\Payments\Boletos;


use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Modules\Project\Repositories\JobRepository;
use App\Modules\Project\Repositories\RegisterRepository;
use App\Modules\Project\Repositories\SlipsRepository;
use DateTime;
use Cnab;
use Illuminate\Support\Facades\Session;



class RegistroBoletoController extends Controller
{


    /**
     * @var RegisterRepository
     */
    private $registerRepository;
    /**
     * @var JobRepository
     */
    private $jobRepository;
    /**
     * @var SlipsRepository
     */
    private $slipsRepository;

    public function __construct(RegisterRepository $registerRepository,
                                JobRepository $jobRepository,
                                SlipsRepository $slipsRepository)
    {


        $this->registerRepository = $registerRepository;
        $this->jobRepository = $jobRepository;
        $this->slipsRepository = $slipsRepository;
    }



    public function send($account_id)
    {

        $account = $this->projectAccountsRepository->find($account_id);
        $company = $this->companyRepository->find(1); /// HARD CODE
        $slips = $this->repository->findWhere(['send' => 0, 'accounts_id' => $account_id]);
        $first = $this->repository->findWhere(['send' => 0, 'accounts_id' => $account_id])->first();
        $last = $this->repository->findWhere(['send' => 0, 'accounts_id' => $account_id])->last();
        $dt = date("Y-m-d");
        $ven = date('Y-m-d', strtotime("+2 days", strtotime($dt)));

        $codigo_banco = Cnab\Banco::BANCO_DO_BRASIL;
        $arquivo = new Cnab\Remessa\Cnab240\Arquivo($codigo_banco);
        $arquivo->configure(array(
            'data_geracao' => new DateTime(),
            'data_gravacao' => new DateTime(),
            'nome_fantasia' => 'INSTITUTO DE SELECAO E TECNOLO', // seu nome de empresa
            'razao_social' => 'INSTITUTO DE SELECAO E TECNOLO',  // sua razão social
            'cnpj' => $company->cnpj, // seu cnpj completo
            'banco' => $codigo_banco, //código do banco
            'logradouro' => $company->address,
            'numero' => $company->complement,
            'bairro' => $company->neighborhood,
            'cidade' => $company->city,
            'uf' => $company->state,
            'cep' => $company->cep,


            'conta' => $account->conta,
            'conta_dv' => $account->conta_dv,
            'operacao' => '012',
            'agencia' => $account->agencia,
            'agencia_dv' => $account->agencia_dv,
            'codigo_convenio' => $account->convenio,
            'codigo_carteira' => $account->carteira, // número da carteira
            'variacao_carteira' => '019',
            'numero_sequencial_arquivo' => 1,
        ));

        foreach ($slips as $slip) {


            $arquivo->insertDetalhe(array(
                'codigo_ocorrencia' => 1, // 1 = Entrada de título, futuramente poderemos ter uma constante
                'nosso_numero' => $slip->nosso_numero,
                'numero_documento' => '888888888888899',
                'carteira' => $slip->account->carteira,
                'codigo_carteira' => \Cnab\CodigoCarteira::COBRANCA_SIMPLES,
                'especie' => \Cnab\Especie::BB_DUPLICATA_MERCANTIL,
                'registrado' => false,
                'valor' => $slip->register->job->tax, // Valor do boleto
                'instrucao1' => 2, // 1 = Protestar com (Prazo) dias, 2 = Devolver após (Prazo) dias, futuramente poderemos ter uma constante
                'instrucao2' => 0, // preenchido com zeros
                'sacado_nome' => $slip->register->user->name, // O Sacado é o cliente, preste atenção nos campos abaixo
                'sacado_tipo' => 'cpf', //campo fixo, escreva 'cpf' (sim as letras cpf) se for pessoa fisica, cnpj se for pessoa juridica
                'sacado_cpf' => $slip->register->user->cpf,
                'sacado_logradouro' => $slip->register->user->client->address,
                'sacado_bairro' => $slip->register->user->client->neighborhood,
                'sacado_cep' => $slip->register->user->client->zipcode, // sem hífem
                'sacado_cidade' => $slip->register->user->client->city,
                'sacado_uf' => $slip->register->user->client->state,
                'data_vencimento' => new DateTime($ven),
                'data_cadastro' => new DateTime(),
                'aceite' => 'N',            // "S" ou "N"
                'juros_de_um_dia' => 0, // Valor do juros de 1 dia'
                'data_desconto' => '000000',
                'valor_desconto' => 0, // Valor do desconto
                'prazo' => 0, // prazo de dias para o cliente pagar após o vencimento
                'taxa_de_permanencia' => '0', //00 = Acata Comissão por Dia (recomendável), 51 Acata Condições de Cadastramento na CAIXA
                'mensagem' =>  $slip->register->job->name,
                'data_multa' => '000000', // data da multa
                'valor_multa' => 0, // valor da multa
            ));

            $slip->send = 1;
            $slip->save();
        }

        $arquivo->save(public_path('remessa/'.$account->convenio.'/'.$first->id.'_'.$last->id.'.txt'));
        Session::put('success', 'Operação realizada com sucesso');
        return redirect()->back();

    }

    public function turn(DocumentsRequest $request, $project_id)
    {

        $document = $this->projectDocumentsRepository->store($request, $project_id, 1);
        $cnabFactory = new Cnab\Factory();
        $arquivo = $cnabFactory->createRetorno(public_path('uploads/documents/project/'.$project_id.'/ret/'.$document->id.'.'.$document->extension));
        $detalhes = $arquivo->listDetalhes();
        foreach ($detalhes as $detalhe) {
            if ($detalhe->getValorRecebido() > 0) {

                $numero = intval($detalhe->getNossoNumero());
                $slip = $this->repository->findByField('nosso_numero',"$numero")->first();

                if(count($slip) >0){


                    $register = $this->registersRepository->find($slip->register_id);
                    $register->active = 1;
                    $register->pay_method = 1;
                    $register->save();


                    $dt = array(
                        'slip_id'               => $slip->id,
                        'register_id'           => $slip->register_id,
                        'getDataOcorrencia'     => $detalhe->getDataOcorrencia(),
                        'getDataCredito'        => $detalhe->getDataCredito(),
                        'getNossoNumero'        => $numero,
                        'getNumeroDocumento'    => $detalhe->getNumeroDocumento(),
                        'getValorRecebido'      => $detalhe->getValorRecebido(),
                        'getValorTitulo'        => $detalhe->getValorTitulo(),
                    );

                   $this->registerPaymentsRepository->create($dt);

                    Session::put('success', 'Operação realizada com sucesso');

                }

            }
        }
            return redirect()->back();
    }

}

