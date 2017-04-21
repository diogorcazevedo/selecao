<?php


namespace App\Modules\Project\Http\Controllers\Applications;

use App\Http\Controllers\Controller;
use App\Modules\Project\Http\Requests\SchoolRequest;
use App\Modules\Project\Entities\School;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;


class SchoolsController extends Controller
{

    /**
     * @var School
     */
    private $school;

    public function __construct(School $school)
    {

        $this->school = $school;
    }


    public function index()
    {
        $schools = $this->school->paginate();


        return view('project::applications.schools.index', compact('schools'));
    }

    public function create()
    {
        $url = URL::previous();
        return view('project::applications.schools.create', compact('url'));
    }

    public function store(SchoolRequest $request)
    {
        $request->persist();
        return redirect()->away($request->input("url"));
    }


    public function edit($id)
    {
        $url = URL::previous();
        $school = $this->school->find($id);
        return view('project::applications.schools.edit', compact('school','url'));

    }
    public function update(SchoolRequest $request)
    {
        $request->update();
        return redirect()->away($request->input("url"));
    }

    public function destroy($id)
    {

        $this->school->find($id)->delete();
        Session::flash('success', 'Excluido com sucesso');
        return redirect()->back();

    }

}
