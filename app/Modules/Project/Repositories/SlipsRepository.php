<?php

namespace App\Modules\Project\Repositories;

use App\Entities\User;
use App\Modules\Project\Entities\Register;
use App\Modules\Project\Entities\RegisterSlips;
use Illuminate\Support\Facades\Session;


class SlipsRepository
{


    /**
     * @var RegisterSlips
     */
    private $slips;

    public function __construct(RegisterSlips $slips)
    {

        $this->slips = $slips;
    }


    public function find($slip_id)
    {

        return $this->slips->find($slip_id);

    }


    public function create($data)
    {

        return $this->slips->create($data);

    }



}
