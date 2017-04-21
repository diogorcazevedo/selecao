<?php

namespace App\Modules\Project\Http\Controllers\Payments\Iugu;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Project\Repositories\ProjectRepository;


class HomeController extends Controller
{


    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {


        $this->projectRepository = $projectRepository;
    }


    public function index($project_id)
    {
        $project = $this->projectRepository->find($project_id);
       return view('project::payments.iugu.home.index',compact('project'));

    }

}
