<?php

namespace App\Modules\Project\Http\Requests\School;


use App\Modules\Project\Entities\School;
use App\Modules\Project\Entities\SchoolBlockFloorClassrooms;
use App\Modules\Project\Entities\SchoolBlockFloors;
use App\Modules\Project\Entities\SchoolBlocks;
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
            //'block'    => 'required|max:255',
           // 'school_id'   => 'required',
        ];

    }



    public function blocks()
    {
        $data = $this->all();
        $data['name'] = strip_tags(mb_strtoupper($data['name']));
        SchoolBlocks::updateOrCreate(['id' => $data['id']],$data);
        Session::flash('success', 'Operação realizada com sucesso');

    }
    public function floors()
    {
        $data = $this->all();
        $data['name'] = strip_tags(mb_strtoupper($data['name']));
        SchoolBlockFloors::updateOrCreate(['id' => $data['id']],$data);
        Session::flash('success', 'Operação realizada com sucesso');

    }

    public function classrooms()
    {
        $data = $this->all();
        $data['name'] = strip_tags(mb_strtoupper($data['name']));
        $data['chairs'] = strip_tags($data['chairs']);
        $class = SchoolBlockFloorClassrooms::updateOrCreate(['id' => $data['id']],$data);

        $block = SchoolBlocks::find($class->block_id);
        $collection= SchoolBlockFloorClassrooms::where('block_id',$block->id);
        $block->description  = $collection->sum('chairs');
        $block->save();
        Session::flash('success', 'Operação realizada com sucesso');

    }

}
