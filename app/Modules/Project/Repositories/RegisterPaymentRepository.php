<?php

namespace App\Modules\Project\Repositories;


use App\Modules\Project\Entities\RegisterPayments;
use Illuminate\Support\Facades\Session;


class RegisterPaymentRepository
{


    /**
     * @var RegisterPayments
     */
    private $registerPayments;

    public function __construct(RegisterPayments $registerPayments)
    {

        $this->registerPayments = $registerPayments;
    }



    public function create($data)
    {

        return $this->registerPayments->create($data);

    }



}
