<?php

namespace App\Modules\Project\Repositories;

use App\Entities\User;
use App\Modules\Project\Entities\Register;
use Illuminate\Support\Facades\Session;


class RegisterReportsRepository
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
                ->where('registers.user_needs',1)
                ->orderBy('registers.local', 'asc')
                ->orderBy('users.name', 'asc')
                ->select('users.name as user',
                         'users.cel',
                         'users.email',
                         'users.id as user_id',
                            'jobs.id as job_id',
                            'jobs.name as job',
                                'registers.local',
                                'registers.active',
                                'registers.id as id',
                                'registers.user_needs',
                                'registers.desc_need',
                                'registers.user_needs_description');

            return $registers;

        }
}
