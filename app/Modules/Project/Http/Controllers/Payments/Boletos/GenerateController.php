<?php

namespace App\Modules\Project\Http\Controllers\Payments\Boletos;


use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Modules\Project\Repositories\JobRepository;
use App\Modules\Project\Repositories\RegisterRepository;
use App\Modules\Project\Repositories\SlipsRepository;
use App\Repositories\CompanyRepository;
use Carbon\Carbon;
use Cnab;
use Eduardokum\LaravelBoleto\Boleto\Banco\Bb;
use Eduardokum\LaravelBoleto\Pessoa;
use Eduardokum\LaravelBoleto\Boleto\Render\Pdf;



class GenerateController extends Controller
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
    /**
     * @var CompanyRepository
     */
    private $companyRepository;

    public function __construct(RegisterRepository $registerRepository,
                                JobRepository $jobRepository,
                                SlipsRepository $slipsRepository,
                                CompanyRepository $companyRepository)
    {


        $this->registerRepository = $registerRepository;
        $this->jobRepository = $jobRepository;
        $this->slipsRepository = $slipsRepository;
        $this->companyRepository = $companyRepository;
    }




    public function bb($id)
    {

        $slip = $this->slipsRepository->find($id);
        $slip->send = 0;
        $slip->save();
        $data = birthdate($slip->date);

        $company = $this->companyRepository->find(1); /// HARD CODE


        $beneficiario = new Pessoa([
            'nome'      =>  $company->name,
            'endereco'  =>  $company->address . " - " .
                            $company->neighborhood . " - " .
                            $company->complement,
            'cep'       =>  $company->cep,
            'uf'        =>  $company->state,
            'cidade'    =>  $company->city,
            'documento' =>  $company->cnpj,
        ]);


        $pagador = new Pessoa([
            'nome'          =>  $slip->register->user->name,
            'endereco'      =>  $slip->register->user->client->address . " - " .
                                $slip->register->user->client->neighborhood . " - " .
                                $slip->register->user->client->complement,
            'cep'           =>  $slip->register->user->client->cep,
            'uf'            =>  $slip->register->user->client->state,
            'cidade'        =>  $slip->register->user->client->city,
            'documento'     =>  $slip->register->user->cpf,
        ]);

        $boletoArray = [
            'logo'                      => public_path('img/logos/logo.png'),        // Logo da empresa
            'dataVencimento'            => new Carbon("$data"),
            'valor'                     => $slip->register->job->tax,
            'numero'                    => $slip->nosso_numero,
            'numeroDocumento'           => $slip->number,
            'pagador'                   => $pagador,                                     // Objeto PessoaContract
            'beneficiario'              => $beneficiario,                                // Objeto PessoaContract
            'agencia'                   => $slip->account->agencia,                      // BB, Bradesco, CEF, HSBC, Itáu
            'agenciaDv'                 => $slip->account->agencia_dv,                   // se possuir
            'conta'                     => $slip->account->conta,                        // BB, Bradesco, CEF, HSBC, Itáu, Santander
            'contaDv'                   => $slip->account->conta_dv,                     // Bradesco, HSBC, Itáu
            'carteira'                  => $slip->account->carteira,                     // BB, Bradesco, CEF, HSBC, Itáu, Santander
            'convenio'                  => $slip->account->convenio,                     // BB
            'variacaoCarteira'          => "017",                               // BB
            'descricaoDemonstrativo'    => [$slip->account->descricao_demonstrativo,
                                            'Cargo: ' . $slip->register->job->name],  // máximo de 5
                                            'instrucoes' => ['Pagável em qualquer banco até o vencimento.',
                                            'Após vencimento, atualizar no site bb.com.br',
                                            $slip->account->instrucoes,],               // máximo de 5
            'aceite'                    => 1,
            'especieDoc'                => 'DM',
        ];


        $boleto = new Bb($boletoArray);
        //$boleto = new Bradesco($boletoArray);
        $pdf = new Pdf();

        $pdf->addBoleto($boleto);

        $pdf->gerarBoleto();

    }


    public function webCommerceBB($id)
    {

        $slip = $this->slipsRepository->find($id);
        $company = $this->companyRepository->find(1); /// HARD CODE
        $cpf = validarCPF($slip->register->user->cpf);
        if($cpf == TRUE){
            $slip->reftran = $slip->account->convenio.str_pad($slip->nosso_numero, 10, "0", STR_PAD_LEFT);
            $slip->send = 1;
            $slip->save();
            return view('project::payments._functions.boleto.generate', compact('slip','company'));
        }else{

            return redirect()->route('project.boletos.generate.bb', ['id' => $slip->id]);

        }

    }

}

