<?php

namespace App\Modules\Academy\Repositories;


use App\Modules\Academy\Entities\Question;

class QuestionRepository
{


    /**
     * @var Question
     */
    private $question;

    public function __construct(Question $question)
    {


        $this->question = $question;
    }



    public function find($register_id)
    {

        return $this->question->find($register_id);

    }
    public function findByField($field,$value)
    {

        return $this->question->where("$field",$value);

    }

    public function findByStatus($status,$program_id)
    {

        return $this->question->where("status",$status)->where("program_id",$program_id);

    }

    public function all()
    {

        return $this->question->all();

    }
    public function paginate($qtd = '15')
    {

        return $this->question->paginate($qtd);

    }

    public function create($data)
    {

        return $this->question->create($data);
    }


    public function delete($id){

        $this->question->find($id)->delete();
    }

}
