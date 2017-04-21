<?php

namespace App\Modules\Project\Http\Controllers\Payments;


use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Modules\Project\Repositories\JobRepository;
use App\Modules\Project\Repositories\RegisterRepository;
use App\Modules\Project\Repositories\SlipsRepository;
use Cnab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class SlipsController extends Controller
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




    public function store($register, $job, $type)
    {

        $job = $this->jobRepository->find($job);
        $dt = date("Y-m-d");
        $data = [
            'date'          => date('Y-m-d', strtotime("+2 days", strtotime($dt))),
            'nosso_numero'  => nossonumero($register),
            'number'        => slipnumbers($register),
            'register_id'   => $register,
            'accounts_id'   => $job->project->account->id
        ];


        $slip = $this->slipsRepository->create($data);

        return $this->typeRedirect($type, $slip);


    }


    public function storeDate(Request $request)
    {

            $this->validate($request, [
                'register_id' => 'required',
                'accounts_id' => 'required',
                'type'        => 'required'
            ]);


            $data = $request->all();
            $data['date'] = birthdate($data['date']);
            $data['nosso_numero'] = nossonumero($data['register_id']);
            $data['number'] = slipnumbers($data['register_id']);

            $slip = $this->slipsRepository->create($data);


            return $this->typeRedirect($data['type'], $slip);


    }

    /**
     * @param $type
     * @param $slip
     * @return \Illuminate\Http\RedirectResponse
     */
    private function typeRedirect($type, $slip)
    {
        if ($type == 0) {

            return redirect()->route('project.boletos.generate.bb', ['id' => $slip->id]);

        } elseif ($type == 1) {

            return redirect()->route('project.boletos.generate.webCommerceBB', ['id' => $slip->id]);

        } elseif ($type == 2) {

            $dt = [ 'name' => mb_strtoupper($slip->register->user->name),
                    'email' => $slip->register->user->email,
                    'description' => "Estamos enviando link para emissão de segunda via do boleto, com nova data de vencimento, para facilitar o pagamento da taxa de inscrição do Concurso CREFITO-15. <br/>BOA PROVA!" .
                    "<br/> <br/>" .
                    '<a href="' . 'http://institutodeselecao.org.br/project/boletos/generate/bb/' . $slip->id . '">Click para emitir segunda via</a>',
            ];

            $this->emailService->sendEmailContact($dt);
            Session::put('success', 'Operação realizada com sucesso');
            return redirect()->back();
        }
    }


}

