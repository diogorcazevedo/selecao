<?php

namespace App\Modules\Academy\Repositories;


use App\Modules\Academy\Entities\Program;



class ProgramRepository
{


    /**
     * @var Program
     */
    private $program;

    public function __construct(Program $program)
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
    public function pluck($name,$id)
    {

        return $this->program->pluck($name,$id);

    }
}
