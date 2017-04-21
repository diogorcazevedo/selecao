<?php


namespace App\Http\Controllers\Authorization;


use App\Entities\Role;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use App\Entities\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RoleUserController extends Controller
{


    /**
     * @var User
     */
    private $user;
    /**
     * @var UsersRepository
     */
    private $usersRepository;
    /**
     * @var Role
     */
    private $role;

    public function __construct(User $user, UsersRepository $usersRepository,Role $role)

    {
        $this->user = $user;
        $this->usersRepository = $usersRepository;
        $this->role = $role;
    }


    public function index(Request $requests)
    {
        $usrs = $this->usersRepository->getUsers($requests);
        $users = $usrs->where('profile','admin')->paginate(15);
        $search = $requests->search;

        return view('authorization.role_user.index', compact('users','search'));
    }

    public function edit($id)
    {

        $user = $this->user->find($id);
        $roles = $this->role->pluck('name','id');

        return view('authorization.role_user.edit', compact('user','roles'));
    }

    public function store(Request $request,$user_id)
    {

        $user = $this->user->find($user_id);
        $role = $this->role->find($request->all()['role_id']);
        $user->addRole($role);
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect()->back();

    }

    public function revoke($user_id,$role_id)
    {

        $user = $this->user->find($user_id);
        $role = $this->role->find($role_id);
        $user->revokeRole($role);
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect()->back();
    }


}
