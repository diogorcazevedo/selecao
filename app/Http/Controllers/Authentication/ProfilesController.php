<?php

namespace App\Http\Controllers\Authentication;

use App\Entities\User;
use App\Http\Controllers\Controller;
use App\Repositories\UsersRepository;


class ProfilesController extends Controller
{

    /**
     * @var User
     */
    private $user;
    /**
     * @var UsersRepository
     */
    private $usersRepository;

    public function __construct(User $user,UsersRepository $usersRepository)
    {

        $this->user = $user;
        $this->usersRepository = $usersRepository;
    }

    public function getUserByProfile($profile){

       $users=  $this->usersRepository->getUserByProfile($profile)->paginate();
       return view('authentication.profiles.getUserByProfile',compact('users'));

    }

    public function changeProfile($user,$profile){


        $this->usersRepository->changeProfile($user,$profile);

        return redirect()->back();

    }

}
