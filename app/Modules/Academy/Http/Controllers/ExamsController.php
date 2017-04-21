<?php


namespace App\Modules\Academy\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Academy\Entities\Item;
use App\Modules\Academy\Entities\Program;
use App\Modules\Project\Entities\Job;
use Barryvdh\DomPDF\Facade as PDF;


class ExamsController extends Controller
{




    public function __construct()

    {



    }

    public function index()
    {
        return view('academy::exams.index');
    }

    public function byJob(Job $job)
    {
        return view('academy::exams.by_job',compact('job'));

    }
    public function create(Job $job,Program $program)
    {

        $count=0;

        foreach($job->items as $item){

            $count = $count + count($item->questions);
        }


        return view('academy::exams.create',compact('job','program','count'));

    }

    public function add(Job $job,Item $item)
    {
        $item->addJob($job);
        return redirect()->back();

    }

    public function revoke(Job $job,Item $item)
    {
        $item->revokeJob($job);
        return redirect()->back();

    }

    public function preview(Job $job)
    {


        return view('academy::exams.preview', compact('job'));


    }

    public function pdf(Job $job)
    {

        $pdf = PDF::loadView('academy::exams.pdf', compact('job'));
        return $pdf->download('exam.pdf');


    }


}
