<?php

namespace App\Modules\Academy\Repositories;


use App\Modules\Academy\Entities\Program;
use App\Modules\Academy\Entities\ProgramItems;


class ProgramItemsRepository
{


    /**
     * @var Program
     */
    private $program;

    public function __construct(ProgramItems $program)
    {

        $this->program = $program;
    }



    public function find($register_id)
    {

        return $this->program->find($register_id);

    }
    public function findByField($field,$value)
    {

        return $this->program->where("$field",$value)->get();

    }

    public function all()
    {

        return $this->program->all();

    }
    public function paginate($qtd = '15')
    {

        return $this->program->paginate($qtd);

    }

}
