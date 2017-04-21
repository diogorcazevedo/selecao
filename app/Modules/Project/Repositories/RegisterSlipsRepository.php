<?php

namespace App\Modules\Project\Repositories;


use App\Modules\Project\Entities\RegisterSlips;

class RegisterSlipsRepository
{


    /**
     * @var RegisterSlips
     */
    private $registerSlips;

    public function __construct(RegisterSlips $registerSlips )
    {


        $this->registerSlips = $registerSlips;
    }


    public function find($register_slip_id)
    {
        return $this->registerSlips->find($register_slip_id);
    }

    public function getByStatus($status)
    {
        return $this->registerSlips->where('status',$status)->get();
    }
    public function findByField($field,$value)
    {
        return $this->registerSlips->where("$field",$value)->get();
    }

    public function all()
    {
        return $this->registerSlips->all();
    }

    public function destroy($order)
    {

        return $this->registerSlips->destroy($order);
    }
}
