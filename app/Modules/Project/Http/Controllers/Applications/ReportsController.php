<?php


namespace App\Modules\Project\Http\Controllers\Applications;

use App\Http\Controllers\Controller;
use App\Modules\Project\Repositories\JobRepository;
use App\Modules\Project\Repositories\ProjectRepository;
use App\Modules\Project\Repositories\RegisterReportsRepository;
use App\Repositories\UsersRepository;
use Barryvdh\DomPDF\Facade as PDF;


class ReportsController extends Controller
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
     * @var JobRepository
     */
    private $jobRepository;
    /**
     * @var RegisterReportsRepository
     */
    private $registerReportsRepository;

    public function __construct(UsersRepository $usersRepository,
                                ProjectRepository $projectRepository,
                                RegisterReportsRepository $registerReportsRepository,
                                JobRepository $jobRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->projectRepository = $projectRepository;
        $this->jobRepository = $jobRepository;
        $this->registerReportsRepository = $registerReportsRepository;
    }



    public function index($project_id)
    {
        $project = $this->projectRepository->find($project_id);

        return view('project::applications.reports.index',compact('project'));


    }
    public function job($job_id)
    {
        $users = $this->registerReportsRepository->getRegistersByJobOrderByLocal($job_id)->paginate();
        $job = $this->jobRepository->find($job_id);
        return view('project::applications.reports.job',compact('users','job'));


    }

    public function pdf($job_id)
    {

        $users = $this->registerReportsRepository->getRegistersByJobOrderByLocal($job_id)->get();
        $job = $this->jobRepository->find($job_id);
        $pdf = PDF::loadView('project::applications.reports.pdf', compact('users','job'));
        return $pdf->download($job->name.'.pdf');


    }



    public function needsjob($job_id)
    {
        $users = $this->registerReportsRepository->getRegistersByJobOrderByLocalNeeds($job_id)->paginate();
        $job = $this->jobRepository->find($job_id);
        return view('project::applications.reports.needs_job',compact('users','job'));


    }

    public function needspdf($job_id)
    {

        $users = $this->registerReportsRepository->getRegistersByJobOrderByLocalNeeds($job_id)->get();
        $job = $this->jobRepository->find($job_id);
        $pdf = PDF::loadView('project::applications.reports.needs_pdf', compact('users','job'));
        return $pdf->download($job->name.'.pdf');


    }


}
