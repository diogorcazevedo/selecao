<?php

namespace App\Modules\Academy\Http\Requests;



use App\Modules\Academy\Entities\Question;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class QuestionsRequest extends FormRequest
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
            'user_id'                     =>'required',
            'program_id'                  =>'required',

        ];
    }

    public function messages()
    {

        return   [
            //required
            'name.required'             => 'O campo NOME é obrigatório',
            'description.required'             => 'O campo description é obrigatório',

        ];
    }


    public function persist()
    {
        $data = $this->all();
        $question = Question::create($data);
        Session::flash('success', 'criado com sucesso');
        return $question;
    }

    public function update()
    {

        $data = $this->all();
        $question = Question::find($data['id'])->update($data);
        Session::flash('success', 'alterado com sucesso');
        return $question;


    }
}
