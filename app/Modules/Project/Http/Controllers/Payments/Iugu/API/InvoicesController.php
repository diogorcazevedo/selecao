<?php

namespace App\Modules\Project\Http\Controllers\Payments\Iugu\API;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Project\Repositories\IuguCustomersRepository;
use App\Modules\Project\Repositories\IuguInvoicesRepository;
use App\Modules\Project\Repositories\ProjectRepository;
use App\Modules\Project\Repositories\RegisterRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Iugu;
use Iugu_Invoice;


class InvoicesController extends Controller
{


    /**
     * @var ProjectRepository
     */
    private $projectRepository;
    /**
     * @var IuguInvoicesRepository
     */
    private $iuguInvoicesRepository;
    /**
     * @var RegisterRepository
     */
    private $registerRepository;
    /**
     * @var IuguCustomersRepository
     */
    private $iuguCustomersRepository;
    /**
     * @var UsersRepository
     */
    private $usersRepository;

    public function __construct(ProjectRepository $projectRepository,
                                IuguInvoicesRepository $iuguInvoicesRepository,
                                RegisterRepository $registerRepository,
                                IuguCustomersRepository $iuguCustomersRepository,
                                UsersRepository $usersRepository)
    {


        $this->projectRepository = $projectRepository;
        $this->iuguInvoicesRepository = $iuguInvoicesRepository;
        $this->registerRepository = $registerRepository;
        $this->iuguCustomersRepository = $iuguCustomersRepository;
        $this->usersRepository = $usersRepository;
    }




    public function index($project_id,$parameter = null)
    {
        $project = $this->projectRepository->find($project_id);
        Iugu::setApiKey($project->iuguProject->live);
        $invoices = $this->iuguInvoicesRepository->apiGetAll($parameter);
        $url = URL::previous();

        return view('project::payments.iugu.api.invoices.index', compact('invoices','project','url'));


    }



    public function getById($project_id,$invoice_id)
    {
        Iugu::setApiKey($project_id->iuguProject->live);
       $this->iuguInvoicesRepository->apiGetById($invoice_id);
        $url = URL::previous();

        return view('project::payments.iugu.api.invoices.index', compact('invoices','project','url'));


    }

    public function cancel($project_id,$invoice_id)
    {

        $project = $this->projectRepository->find($project_id);
        Iugu::setApiKey($project->iuguProject->live);
        $this->iuguInvoicesRepository->apiCancel($invoice_id);

        Session::flash('success', 'Cancelado com sucesso');
        return redirect()->back();

    }

    public function remove($project_id,$invoice_id)
    {
        $project = $this->projectRepository->find($project_id);
        Iugu::setApiKey($project->iuguProject->live);
        $this->iuguInvoicesRepository->apiRemove($invoice_id);

        Session::put('success', 'Removido com sucesso');
        return redirect()->back();


    }

    public function cancelByStatus($project_id,$parameter)
    {
        $project = $this->projectRepository->find($project_id);
        Iugu::setApiKey($project->iuguProject->live);

        $invoices = Iugu_Invoice::search(array("status_filter"=>array($parameter),'limit'=>1000))->results();


        foreach($invoices as $invoice){
            $this->iuguInvoicesRepository->apiCancel($invoice->id);
        }

        Session::put('success', 'Cancelado com sucesso');
        return redirect()->back();

    }


    public function clearAllCancel($project_id)
    {
        $project = $this->projectRepository->find($project_id);
        Iugu::setApiKey($project->iuguProject->live);

        $invoices = Iugu_Invoice::search(array("status_filter"=>array("canceled")))->results();

        foreach($invoices as $invoice){
            $this->iuguInvoicesRepository->apiRemove($invoice->id);
        }

        Session::flash('success', 'Cancelado com sucesso');
        return redirect()->back();

    }

    public function paymentReloadStatus($project_id,$parameter)
    {

        $project = $this->projectRepository->find($project_id);
        Iugu::setApiKey($project->iuguProject->live);

        $invoices = $this->iuguInvoicesRepository->apiGetAll($parameter);

        //$count = 1;
        foreach($invoices as $invoice){
          $this->iuguInvoicesRepository->apiPaymentReloadStatus($invoice->id);

            //echo $count++.' - '.$invoice->email.'<br/>';
        }

        Session::flash('success', 'Operação realizada com sucesso');
        return redirect()->back();
    }




    public function apiCreateInvoicesByJob($project_id,$job_id)
    {
        $project = $this->projectRepository->find($project_id);
        Iugu::setApiKey($project->iuguProject->live);


        $registers = $this->registerRepository->findByField('job_id',$job_id)->where('active',0)->where('invoice','0')->take(350);


        foreach($registers as $register){
            $user = $this->usersRepository->find($register->user->id);
            $customers = $this->iuguCustomersRepository->apiGetCustomersByEmail($user->email);

            if(count($customers->results()) == 0){
                $customer = $this->iuguCustomersRepository->apiStore($user->id);
                $this->iuguCustomersRepository->bdStore($user,$project,$customer);
            }else{
                $customer = $customers->results()['0'];
            }

            $dtCustomer = $this->iuguCustomersRepository->findByIdCustomer($customer->id);

            if(is_null($dtCustomer)){

               $dtCustomer = $this->iuguCustomersRepository->bdStore($user,$project,$customer);


            }

           // dd($dtCustomer);

            $this->iuguInvoicesRepository->apiStoreInvoice($dtCustomer,$register);

            //dd($invoice);
         //   Session::flash('success', 'Criada com sucesso');
        //    return redirect()->back();


        }

    }



}
