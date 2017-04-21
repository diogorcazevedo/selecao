<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Requests\Authentication\Sessions\AuthenticateRequest;
use App\Http\Controllers\Controller;


class SessionsController extends Controller
{


    public function create(){


        return view('authentication.sessions.create');

    }

    public function authenticate(AuthenticateRequest $request)
    {
        return $request->persist();
    }
}
