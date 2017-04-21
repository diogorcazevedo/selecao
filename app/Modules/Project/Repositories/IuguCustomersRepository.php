<?php

namespace App\Modules\Project\Repositories;

use App\Entities\User;
use App\Modules\Project\Entities\IuguCustomers;
use Iugu_Customer;


class IuguCustomersRepository
{


    /**
     * @var User
     */
    private $user;
    /**
     * @var IuguCustomers
     */
    private $iuguCustomers;

    public function __construct(User $user,IuguCustomers $iuguCustomers)
    {


        $this->user = $user;
        $this->iuguCustomers = $iuguCustomers;
    }

    public function apiStore($user_id){

        $user = $this->user->find($user_id);
        $cargos = array();

        foreach($user->registers as $u){
            $cargos[] = $u->job->name;
        }
        $notes = implode(";", $cargos);

        if(validarCPF($user->cpf)==false){
            $cpf = cpf_randon(1);
        }else{
            $cpf = $user->cpf;
        }




        $customer =  Iugu_Customer::create(array(
            "email" => $user->email,
            "name" => $user->name,
            "notes" => $notes,
            "cpf_cnpj" => $cpf,
            "zip_code" => $user->client->zipcode,
            "number" => $user->id,
            "street" => $user->client->address,
            "city" => $user->client->city,
            "state" => $user->client->state,
            //"custom_variables" => ['name'=>'user_id'],
        ));



        if($customer->id == ''){

            $cust =  Iugu_Customer::create(array(
                "email" => $user->email,
                "name" => $user->name,
                "notes" => $notes,
                "cpf_cnpj" => $cpf,
                "zip_code" => '20091020',
                "number" => $user->id,
                "street" => $user->client->address,
                "city" => $user->client->city,
                "state" => $user->client->state,
                //"custom_variables" => ['name'=>'user_id'],
            ));

            return $cust;

        }else{

            return $customer;

        }
    }

    public function apiGetCustomersByEmail($email)
    {

        return Iugu_Customer::search(array('query'=>"$email"));


    }



    public function bdStore($user,$project,$customer){

        $data['user_id']       = $user->id;
        $data['customer_id']   = $customer->id;
        $data['email']         = $user->email;
        $data['project_id']    = $project->id;

       $dtCustomer =  $this->iuguCustomers->updateOrCreate(['user_id' => $user->id,'project_id'=>$project->id], $data);
       return $dtCustomer;
    }




    public function findByIdCustomer($id_customer)
    {
        return $this->iuguCustomers->where("customer_id",$id_customer)->first();
    }


    public function apiRemove($id)
    {
        $customer = Iugu_Customer::fetch($id);
        $customer->delete();
        $customer->save();
        return $customer;
    }
}
