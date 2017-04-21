<?php

namespace App\Modules\Project\Http\Controllers\Payments\Boletos;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Project\Repositories\RegisterPaymentRepository;
use App\Modules\Project\Repositories\RegisterRepository;
use App\Modules\Project\Repositories\ProjectDocumentsRepository;
use App\Modules\Project\Repositories\RegisterSlipsRepository;
use Cnab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class RetornoBoletoController extends Controller
{


    /**
     * @var ProjectDocumentsRepository
     */
    private $projectDocumentsRepository;
    /**
     * @var RegisterSlipsRepository
     */
    private $registerSlipsRepository;
    /**
     * @var RegisterRepository
     */
    private $registerRepository;
    /**
     * @var RegisterPaymentRepository
     */
    private $registerPaymentRepository;

    public function __construct(ProjectDocumentsRepository $projectDocumentsRepository,
                                RegisterSlipsRepository $registerSlipsRepository,
                                RegisterRepository $registerRepository,
                                RegisterPaymentRepository $registerPaymentRepository)
    {
        $this->projectDocumentsRepository = $projectDocumentsRepository;
        $this->registerSlipsRepository = $registerSlipsRepository;
        $this->registerRepository = $registerRepository;
        $this->registerPaymentRepository = $registerPaymentRepository;
    }


    public function process(Request $request, $project_id)
    {

        $document = $this->projectDocumentsRepository->store($request, $project_id);
        $cnabFactory = new Cnab\Factory();
        $arquivo = $cnabFactory->createRetorno(public_path('uploads/documents/project/'.$project_id.'/'.$document->id.'.'.$document->extension));
        $detalhes = $arquivo->listDetalhes();
        foreach ($detalhes as $detalhe) {
            if ($detalhe->getValorRecebido() > 0) {

                $numero = intval($detalhe->getNossoNumero());
                $slip = $this->registerSlipsRepository->findByField('nosso_numero',"$numero")->first();

                if(count($slip) >0){


                    $register = $this->registerRepository->find($slip->register_id);
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

                   $this->registerPaymentRepository->create($dt);

                    Session::flash('success', 'Operação realizada com sucesso');

                }

            }
        }
            return redirect()->back();
    }

}

