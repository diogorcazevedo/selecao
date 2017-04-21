<?php

namespace App\Modules\Project\Repositories;

use App\Entities\User;
use App\Modules\Project\Entities\Register;
use Illuminate\Support\Facades\Session;


class RegisterRepository
{

    /**
     * @var User
     */
    private $user;
    /**
     * @var Register
     */
    private $register;

    public function __construct(User $user, Register $register)
    {
        $this->user = $user;
        $this->register = $register;
    }


    public function getRegisterByUserAndJob($cpf)
    {

        return $this->user->where('cpf',$cpf);

    }
    public function getRegisterByUserName($name)
    {

        return $this->user->where('name', 'LIKE', '%' . $name . '%');

    }

    public function find($register_id)
    {

        return $this->register->find($register_id);

    }
    public function findByField($field,$value)
    {

        return $this->register->where("$field",$value)->get();

    }



    public function redirectToLogin()
    {
        if(!auth()->check()){
            Session::flash('success', 'Você já possui cadastro, Favor entrar com login e senha');
            return redirect('/login');
        }

    }

    public function getRegisterByProject($project_id){


        return  $this->register->join('jobs', 'jobs.id', '=', 'registers.job_id')
                               ->where('jobs.project_id',$project_id)
                               ->get();


    }

    public function getRegistersProjectInscricaoAbertaByUsers($user){



        $registers = $this->register->join('users', 'users.id', '=', 'registers.user_id')
                                    ->join('jobs', 'jobs.id', '=', 'registers.job_id')
                                    ->join('projects', 'projects.id', '=', 'jobs.project_id')
                                    ->where('projects.status','2')
                                    ->where('registers.user_id',$user)
                                    ->select('users.name as user','users.id as user_id','jobs.id as job_id','jobs.name as job','registers.active','registers.active','registers.id as id');

        return $registers;


    }


    /*
     *
    FUNCçÕES
    *
     *
    */
    public function getRegistersByJob($job){

                    $registers = $this->register->join('users', 'users.id', '=', 'registers.user_id')
                        ->join('jobs', 'jobs.id', '=', 'registers.job_id')
                        ->join('projects', 'projects.id', '=', 'jobs.project_id')
                        ->where('registers.active','1')
                        ->where('registers.job_id',$job)
                        ->orderBy('users.name', 'asc')
                        ->select('users.name as user','users.id as user_id','jobs.id as job_id','jobs.name as job','registers.local','registers.active','registers.id as id');

                    return $registers;

    }

        public function getRegistersByJobOrderByLocal($job){

            $registers = $this->register->join('users', 'users.id', '=', 'registers.user_id')
                ->join('jobs', 'jobs.id', '=', 'registers.job_id')
                ->join('projects', 'projects.id', '=', 'jobs.project_id')
                ->where('registers.active','1')
                ->where('registers.job_id',$job)
                ->orderBy('registers.local', 'asc')
                ->orderBy('users.name', 'asc')
                ->select('users.name as user','users.id as user_id','jobs.id as job_id','jobs.name as job','registers.local','registers.active','registers.id as id');

            return $registers;

        }

        public function getRegistersByJobOrderByLocalNeeds($job){

            $registers = $this->register->join('users', 'users.id', '=', 'registers.user_id')
                ->join('jobs', 'jobs.id', '=', 'registers.job_id')
                ->join('projects', 'projects.id', '=', 'jobs.project_id')
                ->where('registers.active','1')
                ->where('registers.job_id',$job)
                ->where('registers.check_needs',1)
                ->orderBy('registers.local', 'asc')
                ->orderBy('users.name', 'asc')
                ->select('users.name as user','users.id as user_id','jobs.id as job_id','jobs.name as job','registers.local','registers.active','registers.id as id','registers.check_needs','registers.desc_need');

            return $registers;

        }
}
