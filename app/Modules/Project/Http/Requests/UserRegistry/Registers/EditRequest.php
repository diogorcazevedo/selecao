<?php


namespace App\Modules\Project\Http\Requests\UserRegistry\Registers;


use App\Modules\Project\Entities\Register;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class EditRequest extends FormRequest
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
             'user_id'                   =>'required',
            //'user_handicapped'          =>'required',
            //'user_quota'                =>'required',
            // 'user_needs'                =>'required',
            'local'                     =>'required',
            'job_id'                    =>'required',

        ];

    }


    public function persist($register)
    {

        $data = $this->all();
        $register = Register::find($register)->update($data);
        Session::flash('success', 'Operação realizada com sucesso');

        return $register;


    }
}
