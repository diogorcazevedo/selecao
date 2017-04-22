<?php

namespace App\Modules\Project\Http\Requests\School;


use App\Modules\Project\Entities\School;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class SchoolRequest extends FormRequest
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
            'name'    => 'required|max:255',
            'email'   => 'required|max:255',
        ];

    }


    public function persist()
    {
        $data = $this->all();
        $data['name'] = mb_strtoupper($data['name']);
        School::updateOrCreate(['name' => $data['name']],$data);
        Session::flash('success', 'Operação realizada com sucesso');

    }
    public function update()
    {
        $data = $this->all();
        $data['name'] = mb_strtoupper($data['name']);
        School::updateOrCreate(['id' => $data['id']],$data);
        Session::flash('success', 'Operação realizada com sucesso');

    }
}
