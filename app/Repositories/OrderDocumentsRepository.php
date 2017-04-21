<?php

namespace App\Repositories;

use App\Entities\OrderDocuments;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class OrderDocumentsRepository
{


    /**
     * @var OrderDocuments
     */
    private $orderDocuments;

    public function __construct(OrderDocuments $orderDocuments)
    {


        $this->orderDocuments = $orderDocuments;
    }


    public function store($request,$order){



        $file = $request->file('image');
        $name = $request->input('name');
        $extension = $file->getClientOriginalExtension();

        if(empty($name)){
            $name = $file->getClientOriginalName();
        }


        $document = $this->orderDocuments->create([
            'order_id'            => $order,
            'agent'               => $request->input('agent'),
            'extension'           => $extension,
            'file_documents_id'   => '4',
            'name'                => $name
        ]);



        Storage::disk('documents')->put('orders/'.$document->order_id.'/'.$document->id.'.'.$document->extension, File::get($file));

        return $document;


    }

}
