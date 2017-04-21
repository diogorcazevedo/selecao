<?php

namespace App\Modules\Project\Repositories;


use App\Modules\Project\Entities\Project;


class BenefitsRepository
{


    /**
     * @var Project
     */
    private $project;

    public function __construct(Project $project)
    {


        $this->project = $project;
    }


    public function getBenefitsByProject($project_id){


       $benefits =$this->project->join('jobs', 'jobs.project_id', '=', 'projects.id')
                                ->join('registers', 'registers.job_id', '=', 'jobs.id')
                                ->join('benefits', 'benefits.register_id', '=', 'registers.id')
                                ->select('registers.id as registers_id','jobs.id as job_id','benefits.*')
                                ->where('projects.id',$project_id);

        return $benefits;

    }

    public function all()
    {
        return $this->project->all();

    }

    public function find($project_id)
    {
        return $this->project->find($project_id);

    }

}
