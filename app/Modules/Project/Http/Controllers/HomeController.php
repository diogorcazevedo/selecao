<?php


namespace App\Modules\Project\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Project\Entities\Project;
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


    public function index(Project $project)
    {
        return view('project::home.index.index',compact('project'));
    }

    public function admin()
    {

        return view('project::home.admin.index');
    }

    public function client()
    {

        return view('project::home.client.index');
    }
}
