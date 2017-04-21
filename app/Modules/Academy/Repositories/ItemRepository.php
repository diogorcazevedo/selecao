<?php

namespace App\Modules\Academy\Repositories;

use App\Modules\Academy\Entities\Item;

class ItemRepository
{
    /**
     * @var Item
     */
    private $item;

    public function __construct(Item $item)
    {

        $this->item = $item;
    }



    public function find($register_id)
    {

        return $this->item->find($register_id);

    }
    public function findByField($field,$value)
    {

        return $this->item->where("$field",$value);

    }

    public function findByStatus($status,$program_id)
    {

        return $this->item->where("status",$status)->where("program_id",$program_id);

    }

    public function all()
    {

        return $this->item->all();

    }
    public function paginate($qtd = '15')
    {

        return $this->item->paginate($qtd);

    }

    public function delete($id){

        $this->item->find($id)->delete();
    }

    public function addProgramItem($programItems,$item)
    {

        $item->addProgramItem($programItems);

    }
    public function revokeProgramItem($programItems,$item)
    {

        $item->revokeProgramItem($programItems);

    }

    public function search($requests){


        $search = $requests->input('search');

        if (empty($search)) {

            $items = $this->item;

        }else{
            $items = $this->item->join('users', 'items.user_id', '=', 'users.id')
                                ->join('questions', 'items.id', '=', 'questions.item_id')
                                ->join('programs', 'items.program_id', '=', 'programs.id')
                                ->leftJoin('item_program_items', 'items.id', '=', 'item_program_items.item_id')
                                ->leftJoin('program_items', 'item_program_items.program_items_id', '=', 'program_items.id')
                                ->select('users.name as name','items.id as id','items.*')
                                ->where(function ($query) use ($search) {
                                    $query->orWhere('users.name', 'LIKE', '%' . $search . '%')
                                          ->orWhere('users.email', 'LIKE', '%' . $search . '%')
                                          ->orWhere('items.description', 'LIKE', '%' . $search . '%')
                                          ->orWhere('questions.description', 'LIKE', '%' . $search . '%')
                                          ->orWhere('programs.name', 'LIKE', '%' . $search . '%')
                                          ->orWhere('program_items.name', 'LIKE', '%' . $search . '%');
                                });

        }

        return  $items;
    }

}
