<?php


namespace App\Modules\Project\Http\Requests\UserRegistry\Registers;

use App\Entities\User;
use App\Entities\UserComplement;

use App\Mail\RegisterMarkDown;
use App\Modules\Project\Entities\Register;
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
            // 'user_id'                   =>'required',
            //'user_handicapped'          =>'required',
            //'user_quota'                =>'required',
            // 'user_needs'                =>'required',
            'local'                     =>'required',
            'job_id'                    =>'required',

        ];

    }

    public function messages()
    {
        return messages();
    }


    public function persist()
    {

        $data = $this->all();

        //$data =  $this->except(['_token','url']);
        $register = Register::updateOrCreate(['user_id' => $data['user_id'], 'job_id' => $data['job_id']], $data);
        Session::flash('success', 'Operação realizada com sucesso');

        return $register;


    }
}
