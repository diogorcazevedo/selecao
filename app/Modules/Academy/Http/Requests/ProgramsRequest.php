<?php

namespace App\Modules\Academy\Http\Requests;


use App\Modules\Academy\Entities\Program;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class ProgramsRequest extends FormRequest
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
            'name'          => 'required',
            'description'   => 'required',
        ];

    }


    public function persist()
    {

        $data = $this->all();
        $program = Program::create($data);
        Session::flash('success', 'criado com sucesso');
        return $program;


    }

    public function update()
    {

        $data = $this->all();
        $program = Program::find($data['id'])->update($data);
        Session::flash('success', 'criado com sucesso');
        return $program;


    }
}
