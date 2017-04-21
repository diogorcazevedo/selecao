<?php

namespace App\Modules\Academy\Http\Requests;


use App\Modules\Academy\Entities\QuestionChoices;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class QuestionChoicesRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'question_id'                 =>'required',
            'status'                      =>'required',
            'description'                 =>'required',
            'id'                          =>'required',

        ];
    }



    public function persist()
    {
        $data = $this->all();
        $question = QuestionChoices::create($data);
        Session::flash('success', 'criado com sucesso');
        return $question;
    }

    public function update()
    {

        $data = $this->all();
        $question = QuestionChoices::find($data['id'])->update($data);
        Session::flash('success', 'alterado com sucesso');
        return $question;


    }
}
