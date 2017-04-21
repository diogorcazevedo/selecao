<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Requests\Authentication\Registration\StoreRequest;
use App\Http\Controllers\Controller;
use App\Modules\Project\Entities\Job;
use Illuminate\Support\Facades\URL;

class RegistrationsController extends Controller
{



    public function __construct()
    {

    }

    public function create($profile, Job $job){

        $url = URL::previous();
        return view('authentication.registrations.create',compact('job','url','profile'));

    }

    public function store(StoreRequest $request,Job $job){

        $user = $request->persist();

        return redirect()->route('project.registers.create', ['job' => $job->id, 'user' => $user->id]);
    }

}
