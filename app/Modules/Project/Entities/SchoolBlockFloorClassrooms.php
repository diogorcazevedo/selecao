<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolBlockFloorClassrooms extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'school_id',
        'block_id',
        'floor_id',
        'name',
        'chairs',
    ];




    public function school()
    {
        return $this->belongsTo(School::class,'school_id','id');

    }
    public function block()
    {
        return $this->belongsTo(SchoolBlocks::class,'block_id','id');

    }

    public function floor()
    {
        return $this->belongsTo(SchoolBlockFloors::class,'floor_id','id');

    }
}
