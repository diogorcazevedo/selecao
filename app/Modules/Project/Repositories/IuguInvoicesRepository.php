<?php

namespace App\Modules\Project\Repositories;


use App\Modules\Project\Entities\IuguInvoices;
use App\Repositories\UsersRepository;
use Iugu_Invoice;


class IuguInvoicesRepository
{



    /**
     * @var IuguInvoices
     */
    private $iuguInvoices;
    /**
     * @var RegisterRepository
     */
    private $registerRepository;
    /**
     * @var UsersRepository
     */
    private $usersRepository;
    /**
     * @var IuguCustomersRepository
     */
    private $iuguCustomersRepository;

    public function __construct(IuguInvoices $iuguInvoices,
                                RegisterRepository $registerRepository,
                                UsersRepository $usersRepository,
                                IuguCustomersRepository $iuguCustomersRepository)
    {

        $this->iuguInvoices = $iuguInvoices;
        $this->registerRepository = $registerRepository;
        $this->usersRepository = $usersRepository;
        $this->iuguCustomersRepository = $iuguCustomersRepository;
    }

    public function apiGetInvoicesByEmailCustomers(){


    }


    public function apiGetAll($parameter)
    {

        if(is_null($parameter)){
            $invoices = Iugu_Invoice::search(array('limit'=>1000))->results();
        }else{
            $invoices = Iugu_Invoice::search(array("status_filter"=>array("$parameter"),'limit'=>1000))->results();
        }

        return $invoices;
    }

    public function apiGetById($id)
    {
        return Iugu_Invoice::fetch($id);

    }


    public function apiCancel($id)
    {
        $invoice = Iugu_Invoice::fetch($id);
        $invoice->cancel();
        $invoice->save();

        $iugu_invoice = $this->iuguInvoices->where('invoice_id',$id)->first();

        $register = $this->registerRepository->find($iugu_invoice->register->id);
        $register->invoice = 2;
        $register->save();

        $user = $this->usersRepository->find($iugu_invoice->user->id);
        $user->iugu = 2;
        $user->save();

        //soft delete na tabela iugu_invoice
        $iugu_invoice->destroy($iugu_invoice->id);


        return $invoice;
    }



    public function apiRemove($id)
    {

        $invoice = Iugu_Invoice::fetch($id);
        $invoice->delete();
        $invoice->save();

        return $invoice;
    }

    public function apiPaymentReloadStatus($invoice)
    {

        $iugu_invoice = $this->iuguInvoices->where('invoice_id',$invoice)->first();
        $iugu_invoice->status = 1;
        $iugu_invoice->save();

        $register = $this->registerRepository->find($iugu_invoice->register->id);
        $register->active = 1;
        $register->pay_method = 3;
        $register->save();


    }

    public function apiStoreInvoice($customer,$register){


        $tax = str_replace(".","",$register->job->tax);


        $invoice =  Iugu_Invoice::create(array(
                        "email"         => $customer->user->email,
                        "customer_id"   => $customer->customer_id,
                        "due_date"      => date("d/m/Y"),
                        "items"         => array(
                            array(
                                "description" => $register->job->name,
                                "quantity" => "1",
                                "price_cents" =>$tax
                            )
                        )
                    ));

        $data['user_id']            = $customer->user->id;
        $data['project_id']         = $customer->project->id;
        $data['job_id']             = $register->job_id;
        $data['register_id']        = $register->id;
        $data['id_iugu_customers']  = $customer->id;
        $data['invoice_id']         = $invoice['id'];
        $data['url']                = $invoice['secure_url'];
        $data['secure_id']          = $invoice['secure_id'];
        $data['status']             = '0';
        $data['vencimento']         = date("Y-m-d");
        $data['token']              = $customer->customer_id;


        $this->iuguInvoices->create($data);

        $register->invoice ='10';
        $register->save();

        return $invoice;


    }



    public function create($charge,$customer,$register){

        $customer = $this->iuguCustomersRepository->findByIdCustomer($customer);


        $data['user_id']            = $register->user->id;
        $data['project_id']         = $register->job->project_id;
        $data['job_id']             = $register->job_id;
        $data['register_id']        = $register->id;
        $data['id_iugu_customers']  = $customer->id;
        $data['invoice_id']         = $charge['invoice_id'];
        $data['url']                = $charge['url'];
        $data['secure_id']          = '00000000-e368-4d3f-982d-95b7283ff4ee-0bfc';
        $data['status']             = '1';
        $data['vencimento']         = date("Y-m-d");
        $data['token']              = $customer->customer_id;


        $invoice = $this->iuguInvoices->create($data);


        return $invoice;


    }



    public function apiGetInvoicesByEmail($email)
    {

        return Iugu_Invoice::search(array('query'=>"$email"));


    }


}
