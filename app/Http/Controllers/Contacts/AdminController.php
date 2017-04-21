<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Mail\ContactReturns;
use App\Repositories\OrderDocumentsRepository;
use App\Repositories\OrdersRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\Contacts\SaveNotesRequest;


// CONTROLLER  ADMINISTRADORES

class AdminController extends Controller
{


    /**
     * @var OrdersRepository
     */
    private $ordersRepository;
    /**
     * @var UsersRepository
     */
    private $usersRepository;
    /**
     * @var OrderDocumentsRepository
     */
    private $orderDocumentsRepository;

    public function __construct(OrdersRepository $ordersRepository,
                                UsersRepository $usersRepository,
                                OrderDocumentsRepository $orderDocumentsRepository)

    {


        $this->ordersRepository = $ordersRepository;
        $this->usersRepository = $usersRepository;
        $this->orderDocumentsRepository = $orderDocumentsRepository;
    }



    public function index($status)
    {
        $orders= $this->ordersRepository->getByStatus($status);
        return view('contacts.admin.index', compact('orders'));
    }

    public function dialog($order)
    {
        $url = URL::previous();
        $order = $this->ordersRepository->find($order);
        $user = $this->usersRepository->find($order->user->id);
        $user->client->birthdate =  birthdate($user->client->birthdate);


        return view('contacts.admin.dialog', compact('order','user','url'));
    }

    public function store(SaveNotesRequest $request,$order_id)
    {

        $order = $this->ordersRepository->changeStatus($order_id,'1');
        $user = $this->usersRepository->find($order->user->id);


        $data = $request->all();

        if($request->hasFile('image')) {
            $document= $this->orderDocumentsRepository->store($request, $order->id);
            $data['document_id']=$document->id;
            $orderNotes = $request->persist($data['document_id']);
        }else{
            $orderNotes = $request->persist(null);
        }

        \Mail::to($user)->send(new ContactReturns($orderNotes,$user));
        return redirect()->back();

    }

    public function close($order)
    {
        $order = $this->ordersRepository->find($order);
        $order->close = 'id: '.auth()->user()->id.' :: nome: '.auth()->user()->name;
        $order->save();
        $this->ordersRepository->destroy($order->id);
        return redirect()->back();

    }

}
