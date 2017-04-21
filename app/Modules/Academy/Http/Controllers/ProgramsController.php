<?php

namespace App\Modules\Academy\Http\Controllers;


use App\Http\Controllers\Controller;


use App\Http\Requests;
use App\Modules\Academy\Http\Requests\ProgramsRequest;
use App\Modules\Academy\Repositories\ProgramRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;



class ProgramsController extends Controller
{


    /**
     * @var ProgramRepository
     */
    private $programRepository;

    public function __construct(ProgramRepository $programRepository)

    {
        $this->programRepository = $programRepository;
    }



    public function index()
    {
        $programs= $this->programRepository->paginate();
        return view('academy::programs.index', compact('programs'));

    }

    public function create()
    {
        $url = URL::previous();
        return view('academy::programs.create',compact('url'));
    }

    public function store(ProgramsRequest $request)
    {
        $request->persist();
        return redirect()->away($request->input("url"));

    }

    public function edit($id)
    {
        $url = URL::previous();
        $program = $this->programRepository->find($id);
        return view('academy::programs.edit', compact('program','url'));


    }


    public function update(ProgramsRequest $request, $id)
    {

        $request->update();
        return redirect()->away($request->input("url"));
    }

    public function destroy($id)
    {

        $this->programRepository->find($id)->delete();
        Session::flash('success', 'Operação realizada com sucesso');

        return redirect()->back();

    }


}
