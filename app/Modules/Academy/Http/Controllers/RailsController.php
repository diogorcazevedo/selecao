<?php

namespace App\Modules\Academy\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Academy\Repositories\ItemRepository;
use App\Modules\Academy\Repositories\ProgramRepository;
use App\Modules\Academy\Repositories\QuestionRepository;
use App\Repositories\UsersRepository;


class RailsController extends Controller
{


    /**
     * @var UsersRepository
     */
    private $usersRepository;
    /**
     * @var ProgramRepository
     */
    private $programRepository;
    /**
     * @var ItemRepository
     */
    private $itemRepository;
    /**
     * @var QuestionRepository
     */
    private $questionRepository;

    public function __construct(UsersRepository $usersRepository,
                                ProgramRepository $programRepository,
                                ItemRepository $itemRepository,
                                QuestionRepository $questionRepository)  {


        $this->usersRepository = $usersRepository;
        $this->programRepository = $programRepository;
        $this->itemRepository = $itemRepository;
        $this->questionRepository = $questionRepository;
    }


    public function index($program_id,$user_id = null)
    {
        if($user_id == null){
            $user_id =  auth()->user()->id;
        }

        $user = $this->usersRepository->find($user_id);
        $program = $this->programRepository->find($program_id);
        $programs = $this->programRepository->all();

        return view('academy::rails.index',compact('user','program','programs'));


    }
    public function items($item_id)
    {
        $programs = $this->programRepository->all();
        $item = $this->itemRepository->find($item_id);

        if($item->edict != 0){

           return redirect()->route('rails.index',['program_id'=>$item->program_id,
                                                           'user_id'=>$item->user_id,
                                                           'item_id'=>$item->id]);
        }

        return view('academy::rails.items',compact('item','programs'));

    }

}
