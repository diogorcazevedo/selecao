<?php

namespace App\Http\Controllers\Contacts;

use App\Entities\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests;


use App\Http\Requests\Contacts\SaveNotesRequest;
use App\Repositories\OrderDocumentsRepository;
use App\Repositories\OrdersRepository;
use Illuminate\Support\Facades\Session;


// CONTROLLER  CLIENTES

class ClientController extends Controller
{


    /**
     * @var OrdersRepository
     */
    private $ordersRepository;
    /**
     * @var Order
     */
    private $order;
    /**
     * @var OrderDocumentsRepository
     */
    private $orderDocumentsRepository;

    public function __construct(OrdersRepository $ordersRepository,
                                Order $order,
                                OrderDocumentsRepository $orderDocumentsRepository)

    {

        $this->ordersRepository = $ordersRepository;
        $this->order = $order;
        $this->orderDocumentsRepository = $orderDocumentsRepository;
    }



    public function index($user_id)
    {

        $order = $this->ordersRepository->lastOrder($user_id);

        if(empty($order)){

            $order = $this->ordersRepository->create($user_id);
        }
        return redirect(route('clients.send.dialog',['order'=>$order->id]));

    }

    public function dialog(Order $order)
    {

      return view('contacts.client.dialog', compact('order'));

    }

    public function store(SaveNotesRequest $request, $order)
    {

        $order = $this->ordersRepository->changeStatus($order,'0');

        $data = $request->all();

        if($request->hasFile('image')) {
            $document= $this->orderDocumentsRepository->store($request, $order->id);
            $data['document_id']=$document->id;
            $request->persist($data['document_id']);

        }else{

            $request->persist(null);
        }


        return redirect()->back();

    }

    public function close($id)
    {
        $order = $this->orderRepository->find($id);
        $order->close = 'id: '.auth()->user()->id.' :: nome: '.auth()->user()->name;
        $order->save();
        $this->orderRepository->delete($id);
        Session::put('success', 'Operação realizada com sucesso');
        return redirect()->back();


    }

}
