<?php

namespace App\Http\Controllers;



use App\Modules\Project\Entities\Project;

class HomeController extends Controller
{

    /**
     * @var Project
     */
    private $project;

    public function __construct(Project $project)
    {
        //$this->middleware('auth');
        $this->project = $project;
    }


    public function index()
    {
        $projects = $this->project->all();
        return view('home.index.index',compact('projects'));
    }

    public function services()
    {
        return view('home.services.index');
    }
    public function institucional()
    {
        return view('home.institucional.index');
    }

    public function paySuccess($id=null)
    {

        return view('home.pay.success');

    }
}
