<?php

namespace App\Http\Requests\Authentication\Sessions;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class AuthenticateRequest extends FormRequest
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
            'email'     => 'required|email',
            'password'  => 'required',
        ];
    }


    public function persist()
    {

        $data = $this->all();

        if (auth()->attempt(['email' => $data['email'], 'password' => $data['password']], $data['remember'])) {
            return redirect()->intended();
        } else{
            Session::flash('error', 'Informações não encontradas');
            return redirect()->route('authentication.sessions.create');
        }


    }
}
