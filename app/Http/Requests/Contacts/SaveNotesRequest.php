<?php

namespace App\Http\Requests\Contacts;


use App\Entities\OrderNotes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class SaveNotesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'description'=> 'required'
        ];

    }


    public function persist($document_id)
    {

        $data = $this->all();
        $data['document_id'] = $document_id;
        $orderNotes = OrderNotes::create($data);

        return $orderNotes;


    }
}
