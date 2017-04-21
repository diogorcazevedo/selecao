<?php

namespace App\Modules\Academy\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Modules\Academy\Http\Requests\ProgramItemsRequest;
use App\Modules\Academy\Repositories\ProgramItemsRepository;
use App\Modules\Academy\Repositories\ProgramRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;


class ProgramItemsController extends Controller
{


    /**
     * @var ProgramRepository
     */
    private $programRepository;
    /**
     * @var ProgramItemsRepository
     */
    private $programItemsRepository;

    public function __construct(ProgramRepository $programRepository,ProgramItemsRepository $programItemsRepository)
    {

        $this->programRepository = $programRepository;
        $this->programItemsRepository = $programItemsRepository;
    }


    public function index($id)
    {
        $url = URL::previous();
        $program = $this->programRepository->find($id);
        return view('academy::program_items.index', compact('program','url'));
    }

    public function store(ProgramItemsRequest $request)
    {
        $request->persist();
        return redirect()->back();
    }


    public function edit($id)
    {

        $url = URL::previous();
        $item = $this->programItemsRepository->find($id);

        return view('academy::program_items.edit', compact('item','url'));
    }

    public function update(ProgramItemsRequest $request, $id)
    {
        $request->update();
        return redirect()->away($request->input("url"));
    }

    public function destroy($id)
    {

        $this->programItemsRepository->delete($id);
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect()->back();
    }


}
