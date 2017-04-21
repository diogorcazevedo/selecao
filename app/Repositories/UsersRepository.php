<?php

namespace App\Repositories;


use App\Entities\User;
use Illuminate\Support\Facades\Session;


class UsersRepository
{

    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function find($user)
    {
        return $this->user->find($user);
    }
    public function findByField($field,$value)
    {
        return $this->user->where("$field",$value)->get();
    }
    public function getUserByProfile($profile)
    {
        return $this->user->where('profile',$profile);
    }

    public function getUserByCPF($cpf)
    {

        return $this->user->where('cpf',$cpf);

    }

    public function changeProfile($user,$profile)
    {
        $usr = $this->user->find($user);
        $usr->profile = $profile;
        $usr->save();
        Session::flash('success', 'alterado com sucesso');

    }


    public function getUsers($requests){



        $search = $requests->input('search');

        if (empty($search)) {

            $users = $this->user;

        }else{
            $users = $this->user->where(function ($query) use ($search) {
                                $query->orWhere('name', 'LIKE', '%' . $search . '%')
                                      ->orWhere('email', 'LIKE', '%' . $search . '%')
                                      ->orWhere('profile', 'LIKE', '%' . $search . '%')
                                      ->orWhere('cpf', 'LIKE', '%' . $search . '%');
                                });

        }
        return $users;
    }


}
