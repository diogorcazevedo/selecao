<?php

namespace App\Http\Requests\Authorization;

use App\Entities\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class RolesRequest extends FormRequest
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

        $form = $_POST['edit'] ;

        switch ($form){
            case '0':
                return [
                    'name'          => 'required|max:255',
                    'description'   => 'required|max:255',
                ];
                break;
            case '1':
                return [
                    'role_id'       => 'required|max:255',
                    'name'          => 'required|max:255',
                    'description'   => 'required|max:255',
                ];
                break;
        }



    }


    public function persist()
    {

        $data = $this->all();
        $data['name'] = mb_strtoupper($data['name']);
        Role::updateOrCreate(['name' => $data['name']],$data);
        Session::flash('success', 'Operação realizada com sucesso');


    }
}
