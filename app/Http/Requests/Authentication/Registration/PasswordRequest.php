<?php

namespace App\Http\Requests\Authentication\Registration;

use App\Entities\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class PasswordRequest extends FormRequest
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
            'password'  => 'required|min:6|confirmed',
            'user_id'   => 'required',
        ];

    }


    public function persist()
    {
        $data = $this->all();
        $data['password'] = bcrypt($data['password']);
        User::find($data['user_id'])->update($data);
        Session::flash('success', 'alterado com sucesso');


    }
}
