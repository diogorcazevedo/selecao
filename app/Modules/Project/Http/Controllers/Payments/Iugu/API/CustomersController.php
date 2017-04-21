<?php

namespace App\Modules\Project\Http\Controllers\Payments\Iugu\API;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Project\Repositories\IuguCustomersRepository;
use App\Modules\Project\Repositories\ProjectRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\URL;
use Iugu;
use Iugu_Customer;


class CustomersController extends Controller
{


    /**
     * @var ProjectRepository
     */
    private $projectRepository;
    /**
     * @var IuguCustomersRepository
     */
    private $iuguCustomersRepository;
    /**
     * @var UsersRepository
     */
    private $usersRepository;


    public function __construct(ProjectRepository $projectRepository,
                                IuguCustomersRepository $iuguCustomersRepository,
                                UsersRepository $usersRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->iuguCustomersRepository = $iuguCustomersRepository;
        $this->usersRepository = $usersRepository;
    }




    public function createAPI($project_id)
    {

        $project = $this->projectRepository->find($project_id);
        Iugu::setApiKey($project->iuguProject->live);

        $data = $this->projectRepository->getUsersByProject($project_id)->where('users.iugu', '0')->get();
        $users = $data->unique('name');


        foreach($users as $user){
            $usr =$this->usersRepository->find($user->id);
            $customers = $this->iuguCustomersRepository->apiGetCustomersByEmail($user->email );

            if(count($customers->results()) == 0){


                $customer  = $this->iuguCustomersRepository->apiStore($usr->id);
                $this->iuguCustomersRepository->bdStore($usr,$project,$customer);

            }

            $usr->iugu = 5;
            $usr->save();
        }



        echo '$project_id';
        echo '$project_id';
        return redirect()->back();


    }

    public function delete($project_id)
    {

        $project = $this->projectRepository->find($project_id);
        Iugu::setApiKey($project->iuguProject->live);

        $customers = Iugu_Customer::search(array('limit'=>"1000"))->results();

        foreach($customers as $customer){


            $this->iuguCustomersRepository->apiRemove($customer['id']);

        }




    }

}
