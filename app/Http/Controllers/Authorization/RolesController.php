<?php


namespace App\Http\Controllers\Authorization;


use App\Entities\Role;
use App\Http\Requests\User\EditRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\PasswordRequest;
use App\Http\Requests\Authorization\RolesRequest;

class RolesController extends Controller
{


    /**
     * @var Role
     */
    private $role;

    public function __construct(Role $role)

    {

        $this->role = $role;
    }


    public function index()
    {
        $roles = $this->role->paginate();


        return view('authorization.roles.index', compact('roles'));
    }

    public function create()
    {
        $url = URL::previous();
        return view('authorization.roles.create', compact('url'));
    }

    public function store(RolesRequest $request)
    {
        $request->persist();
        return redirect()->away($request->input("url"));
    }


    public function edit($id)
    {
        $url = URL::previous();
        $role = $this->role->find($id);
        return view('authorization.roles.edit', compact('role','url'));

    }

    public function destroy($id)
    {

        $this->role->find($id)->delete();
        Session::flash('success', 'Excluido com sucesso');
        return redirect()->back();

    }


}
