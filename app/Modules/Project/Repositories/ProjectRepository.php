<?php

namespace App\Modules\Project\Repositories;


use App\Modules\Project\Entities\Project;
use App\Modules\Project\Entities\ProjectCity;
use App\Modules\Project\Entities\Register;
use Illuminate\Support\Facades\DB;


class ProjectRepository
{


    /**
     * @var Project
     */
    private $project;
    /**
     * @var ProjectCity
     */
    private $projectCity;

    public function __construct(Project $project,ProjectCity $projectCity)
    {

        $this->project = $project;
        $this->projectCity = $projectCity;
    }


    public function getProjectCities($job)
    {

        return $this->projectCity->where('project_id',$job->project_id);


    }

    public function all()
    {
        return $this->project->all();

    }

    public function find($project_id)
    {
        return $this->project->find($project_id);

    }

    public function getPaymentsByProject($project_id){


          $benefits = $this->project->join('jobs', 'jobs.project_id', '=', 'projects.id')
                                    ->join('registers', 'registers.job_id', '=', 'jobs.id')
                                    ->join('register_payments', 'register_payments.register_id', '=', 'registers.id')
                                    ->select('registers.id as registers_id','jobs.id as job_id','register_payments.*')
                                    ->where('projects.id',$project_id);

          return $benefits;

    }


    public function getRegisterByLocal($project_id)
    {

         $dates = $this->project->join('jobs', 'jobs.project_id', '=', 'projects.id')
                                ->join('registers', 'registers.job_id', '=', 'jobs.id')
                                ->where('projects.id',$project_id)
                                ->select(DB::raw("COUNT(*) as count_row,local"))
                                // ->orderBy("created_at")
                                ->groupBy(DB::raw("registers.local"))
                                ->where("active",1)
                                ->get();

        return $dates;
    }

    public function getRegisterByJob($project_id)
    {

         $dates = $this->project->join('jobs', 'jobs.project_id', '=', 'projects.id')
                                ->join('registers', 'registers.job_id', '=', 'jobs.id')
                                ->where('projects.id',$project_id)
                                ->select(DB::raw("COUNT(*) as count_row,jobs.name"))
                                // ->orderBy("created_at")
                                ->groupBy(DB::raw("jobs.name"))
                                ->where("active",1)
                                ->get();

        return $dates;
    }

    public function getUsersByProject($project_id){


        $registers = Register::leftJoin('users', 'users.id', '=', 'registers.user_id')
                                ->join('jobs', 'jobs.id', '=', 'registers.job_id')
                                ->join('projects', 'projects.id', '=', 'jobs.project_id')
                                ->where('projects.id', $project_id)
                                ->select('users.*');

        return $registers;

    }

}
