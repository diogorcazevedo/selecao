<?php


namespace App\Http\Controllers\Authorization;


use App\Entities\Permission;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authorization\PermissionsRequest;

class PermissionsController extends Controller
{



    /**
     * @var Permission
     */
    private $permission;

    public function __construct(Permission $permission)

    {


        $this->permission = $permission;
    }


    public function index()
    {
        $permissions = $this->permission->paginate();


        return view('authorization.permissions.index', compact('permissions'));
    }

    public function create()
    {
        $url = URL::previous();
        return view('authorization.permissions.create', compact('url'));
    }

    public function store(PermissionsRequest $request)
    {
        $request->persist();
        return redirect()->away($request->input("url"));
    }


    public function edit($id)
    {
        $url = URL::previous();
        $permission = $this->permission->find($id);
        return view('authorization.permissions.edit', compact('permission','url'));

    }

    public function destroy($id)
    {

        $this->permission->find($id)->delete();
        Session::flash('success', 'Excluido com sucesso');
        return redirect()->back();

    }

}
