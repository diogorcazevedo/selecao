<?php


namespace App\Http\Controllers\Authorization;


use App\Entities\Permission;
use App\Entities\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PermissionRoleController extends Controller
{


    /**
     * @var Role
     */
    private $role;
    /**
     * @var Permission
     */
    private $permission;

    public function __construct(Role $role, Permission $permission)

    {

        $this->role = $role;
        $this->permission = $permission;
    }


    public function index()
    {
        $roles = $this->role->paginate(15);

        return view('authorization.permission_role.index', compact('roles'));
    }

    public function edit($id)
    {

        $role = $this->role->find($id);
        $permissions = $this->permission->pluck('name','id');

        return view('authorization.permission_role.edit', compact('role','permissions'));
    }

    public function store(Request $request,$user_id)
    {

        $role = $this->role->find($user_id);
        $permission = $this->permission->find($request->all()['permission_id']);
        $role->addPermission($permission);
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect()->back();

    }

    public function revoke($user_id,$permission_id)
    {
        $role = $this->role->find($user_id);
        $permission = $this->permission->find($permission_id);
        $role->revokePermission($permission);
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect()->back();
    }


}
