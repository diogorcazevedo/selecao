<?php

namespace App\Modules\Project\Http\Requests\School;


use App\Modules\Project\Entities\School;
use App\Modules\Project\Entities\SchoolBlockFloorClassrooms;
use App\Modules\Project\Entities\SchoolBlockFloors;
use App\Modules\Project\Entities\SchoolBlocks;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class ConfigRequest extends FormRequest
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
            'block'    => 'required|max:255',
            'school_id'   => 'required',
        ];

    }


    public function persist()
    {
        $data = $this->all();


        $block['school_id'] = $data['school_id'];
        $block['name']      = mb_strtoupper($data['block']);
        $block['floors']    = $data['floors'];
        $block['description']    = $data['floors'] * $data['classrooms'] * $data['chairs'];
        $newblock = SchoolBlocks::Create($block);

        $f = 1;
        while ($f <= $data['floors']) {

            $floor['school_id']  = $data['school_id'];
            $floor['block_id']   = $newblock['id'];
            $floor['name']       = $f;
            $floor['classrooms'] = $data['classrooms'];
            $newfloor= SchoolBlockFloors::Create($floor);
            $f++;


            $c = 1;

            while ($c <= $data['classrooms']) {
                $classrooms['school_id']  = $data['school_id'];
                $classrooms['block_id']   = $newblock['id'];
                $classrooms['floor_id']   = $newfloor['id'];
                $classrooms['name']       = $c;
                $classrooms['chairs']     = $data['chairs'];
                SchoolBlockFloorClassrooms::Create($classrooms);
                $c++;
            }

        }

        Session::flash('success', 'Operação realizada com sucesso');
    }


}
