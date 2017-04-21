<?php

namespace App\Http\Requests\Authentication\Registration;


use App\Entities\User;
use App\Entities\UserComplement;
use App\Mail\RegisterMarkDown;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class StoreRequest extends FormRequest
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
            'name'                  => 'required|max:255',
            'email'                 => 'required|email|max:255|unique:users',
            'profile'               => 'required',
            'cpf'                   => 'required|unique:users|size:14',
            'cel'                   => 'required',
            'password'              => 'required|min:6|confirmed',
            'identity'              => 'required|regex:/^[0-9\-!,\'\"\/@\.:\(\)]+$/',
            'dispatcher'            => 'required|max:20|regex:/^[\pL\s\-]+$/u',



            'complement.birthdate'             =>'required|date_format:"d-m-Y"',
            'complement.phone'                 =>'required',
            'complement.maritalstatus'         =>'required|max:30',
            'complement.mother'                =>'required|max:120|regex:/^[\pL\s\-]+$/u',
            'complement.father'                =>'max:120|regex:/^[\pL\s\-]+$/u',
            'complement.nationality'           =>'required|max:40',
            'complement.naturality'            =>'required|max:40',
            'complement.zipcode'               =>'required|size:8',
            'complement.address'               =>'required|max:255',
            'complement.complement'            =>'required|max:100',
            'complement.neighborhood'          =>'required|max:50',
            'complement.city'                  =>'required|max:50',
            'complement.state'                 =>'required|size:2',
            'complement.children'              =>'required|max:3',
            'complement.gender'                =>'required|max:4',
        ];

    }
    public function messages()
    {
        return messages();
    }

    public function persist()
    {

        $data = $this->all();

        //criando user
        $password =  $data['password'];
        $data['password'] = bcrypt($data['password']);
        $data['name'] = mb_strtoupper($data['name']);
        $user = User::updateOrCreate(['cpf' => $data['cpf'], 'email' => $data['email']], $data);

        //criando complement
        $data['complement']['user_id'] = $user->id;
        $data['complement']['birthdate'] = birthdate($data['complement']['birthdate']);
        $data['complement']['mother'] = mb_strtoupper($data['complement']['mother']);
        $data['complement']['father'] = mb_strtoupper($data['complement']['father']);
        UserComplement::updateOrCreate(['user_id' => $user->id], $data['complement']);

        //autenticando
        auth()->login($user);
        Session::flash('success', 'cadastrado com sucesso');

        \Mail::to($user)->send(new RegisterMarkDown($user,$password));

        return $user;


    }
}
