<?php

namespace App\Repositories;

use App\Entities\Order;
use App\Entities\User;



class OrdersRepository
{


    /**
     * @var User
     */
    private $user;
    /**
     * @var Order
     */
    private $order;

    public function __construct(User $user,Order $order)
    {
        
        $this->user = $user;
        $this->order = $order;
    }


    public function find($order)
    {
        return $this->order->find($order);
    }

    public function lastOrder($user_id)
    {
        return $this->order->where('user_id',$user_id)->latest()->first();
    }
    public function getByStatus($status)
    {
        return $this->order->where('status',$status)->get();
    }
    public function all()
    {
        return $this->order->all();
    }
    public function create($user_id)
    {
        $order = new Order();
        $order->user_id = $user_id;
        $order->profile = 'client';
        $order->save();

        return $order;
    }

    public function changeStatus($order,$status)
    {
        $order = $this->order->find($order);
        $order->status = $status;
        $order->save();

        return $order;
    }

    public function destroy($order)
    {

        return $this->order->destroy($order);
    }
}
