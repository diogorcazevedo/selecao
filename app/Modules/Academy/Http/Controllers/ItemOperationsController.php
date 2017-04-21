<?php

namespace App\Modules\Academy\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;


use App\Modules\Academy\Repositories\ItemRepository;
use App\Modules\Academy\Repositories\ProgramRepository;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;


class ItemOperationsController extends Controller
{


    /**
     * @var ProgramRepository
     */
    private $programRepository;
    /**
     * @var ItemRepository
     */
    private $itemRepository;

    public function __construct(ProgramRepository $programRepository,
                                ItemRepository $itemRepository)
    {


        $this->programRepository = $programRepository;
        $this->itemRepository = $itemRepository;
    }


    public function index()
    {
        $programs = $this->programRepository->all();
        return view('academy::item_operations.index', compact('programs'));
    }


    public function search(Request $requests)
    {
        $items = $this->itemRepository->search($requests)->get()->unique();
        $search = $requests->search;
        return view('academy::item_operations.list', compact('items','search'));
    }


    public function all($program_id)
    {

        $items = $this->itemRepository->findByField('program_id',$program_id)->get();
        $search = NULL;
        return view('academy::item_operations.list', compact('items','search'));

    }


    public function status($status,$program_id)
    {

        $items = $this->itemRepository->findByStatus($status,$program_id)->get();
        $search = NULL;
        return view('academy::item_operations.list', compact('items','search'));

    }

/*
    public function preview($item_id)
    {


        $item = $this->itemRepository->find($item_id);
        return view('academy::item_operations.preview', compact('item'));


    }
*/

    public function pdf($item_id)
    {
        $item = $this->itemRepository->find($item_id);
        $pdf = PDF::loadView('academy::item_operations.pdf', compact('item'));
        return $pdf->download('invoice.pdf');


    }

}
