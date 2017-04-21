<?php


namespace App\Modules\Project\Http\Controllers\Homologation;

use App\Http\Controllers\Controller;
use App\Modules\Project\Repositories\JobRepository;
use App\Modules\Project\Repositories\ProjectRepository;
use App\Modules\Project\Repositories\RegisterRepository;
use App\Repositories\UsersRepository;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;


class GenerateController extends Controller
{


    /**
     * @var UsersRepository
     */
    private $usersRepository;
    /**
     * @var ProjectRepository
     */
    private $projectRepository;
    /**
     * @var RegisterRepository
     */
    private $registerRepository;
    /**
     * @var JobRepository
     */
    private $jobRepository;

    public function __construct(UsersRepository $usersRepository,
                                ProjectRepository $projectRepository,
                                RegisterRepository $registerRepository,
                                JobRepository $jobRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->projectRepository = $projectRepository;
        $this->registerRepository = $registerRepository;
        $this->jobRepository = $jobRepository;
    }



    public function index($project_id)
    {
        $project = $this->projectRepository->find($project_id);

        return view('project::homologation.index',compact('project'));


    }
    public function job($job_id)
    {
        $users = $this->registerRepository->getRegistersByJob($job_id)->paginate();

        return view('project::homologation.job',compact('users'));


    }

    public function name(Request $request)
    {
        $users  = $this->registerRepository->getRegisterByUserName($request->search)->paginate();
        $search = $request->search;

        return view('project::homologation.name',compact('users','search'));


    }
    public function pdf($job_id)
    {

        $users = $this->registerRepository->getRegistersByJob($job_id)->get();
        $job = $this->jobRepository->find($job_id);
        $pdf = PDF::loadView('project::homologation.pdf', compact('users','job'));
        return $pdf->download($job->name.'.pdf');


    }



}
