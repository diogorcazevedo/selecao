<?php

namespace App\Modules\Project\Repositories;

use App\Entities\User;
use App\Modules\Project\Entities\Job;
use App\Modules\Project\Entities\Register;
use Illuminate\Support\Facades\Session;


class JobRepository
{


    /**
     * @var Job
     */
    private $job;

    public function __construct(Job $job)
    {

        $this->job = $job;
    }

    public function find($id)
    {

        return $this->job->find($id);

    }

}
