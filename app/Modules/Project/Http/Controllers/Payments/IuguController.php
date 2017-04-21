<?php

namespace App\Modules\Project\Http\Controllers\Payments;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Project\Repositories\IuguCustomersRepository;
use App\Modules\Project\Repositories\IuguInvoicesRepository;
use App\Modules\Project\Repositories\ProjectRepository;
use App\Modules\Project\Repositories\RegisterRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Iugu;
use Iugu_Charge;


class IuguController extends Controller
{


    /**
     * @var RegisterRepository
     */
    private $registerRepository;
    /**
     * @var IuguCustomersRepository
     */
    private $iuguCustomersRepository;
    /**
     * @var IuguInvoicesRepository
     */
    private $iuguInvoicesRepository;
    /**
     * @var UsersRepository
     */
    private $usersRepository;
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    public function __construct(RegisterRepository $registerRepository,
                                IuguCustomersRepository $iuguCustomersRepository,
                                IuguInvoicesRepository $iuguInvoicesRepository,
                                UsersRepository $usersRepository,
                                ProjectRepository $projectRepository)
    {


        $this->registerRepository = $registerRepository;
        $this->iuguCustomersRepository = $iuguCustomersRepository;
        $this->iuguInvoicesRepository = $iuguInvoicesRepository;
        $this->usersRepository = $usersRepository;
        $this->projectRepository = $projectRepository;
    }


    public function checkout($register_id)
    {
        $register = $this->registerRepository->find($register_id);
        $user = $this->usersRepository->find($register->user->id);
        $project = $this->projectRepository->find($register->job->project->id);
        Iugu::setApiKey($project->iuguProject->live);

        $customers = $this->iuguCustomersRepository->apiGetCustomersByEmail($register->user->email);

        if(count($customers->results()) == 0) {
            $customer = $this->iuguCustomersRepository->apiStore($register->user->id);
            $this->iuguCustomersRepository->bdStore($user,$project, $customer);


        }else{

            $customer = $customers->results()['0'];
            $this->iuguCustomersRepository->bdStore($user,$project, $customer);


        }

        return view('project::payments._functions.iugu.checkout',compact('register','customer'));

    }


    public function charge(Request $request)
    {


        $register = $this->registerRepository->find($request->input('register_id'));
        Iugu::setApiKey($register->job->project->iuguProject->live);


        if($request->input('parcelas') == 0) {
            $parcelas = 1;
        }else{
            $parcelas = $request->input('parcelas');
        }

        $charge = Iugu_Charge::create(Array(
            "token"         => $request->input('token'),
            "email"         => $register->user->email,
            "customer_id"   => $request->input('customer_id'),
            "months"        => "$parcelas",
            "items"         => Array(
                Array(
                    "description" => $register->job->name,
                    "quantity" => "1",
                    "price_cents" => str_replace('.', '', $register->job->tax),
                )
            )
        ));


        if($charge['success'] == true ){


            $this->iuguInvoicesRepository->create($charge,$request->input('customer_id'),$register);

            $register->active=1;
            $register->pay_method=3;
            $register->invoice=22;
            $register->save();

            return redirect()->route('return.pay.success');


        }elseif($charge['success'] == false ){

            Session::flash('success', 'Transação não autorizada, favor verificar junto ao operador de cartão de crédito');
            return redirect()->back();

        }

    }

}
