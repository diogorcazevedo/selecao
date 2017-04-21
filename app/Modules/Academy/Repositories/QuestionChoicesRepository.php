<?php

namespace App\Modules\Academy\Repositories;



use App\Modules\Academy\Entities\QuestionChoices;

class QuestionChoicesRepository
{


    /**
     * @var QuestionChoices
     */
    private $questionChoices;

    public function __construct(QuestionChoices $questionChoices)
    {


        $this->questionChoices = $questionChoices;
    }

    public function create($data)
    {

        return  $this->questionChoices->create($data);
    }
    public function delete($id){

        $this->questionChoices->find($id)->delete();
    }



}
