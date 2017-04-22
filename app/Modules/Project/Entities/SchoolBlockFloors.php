<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolBlockFloors extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'school_id',
        'block_id',
        'name',
        'classrooms',
    ];


    public function floorclasses()
    {
        return $this->hasMany(SchoolBlockFloorClassrooms::class,'floor_id','id');

    }

    public function school()
    {
        return $this->belongsTo(School::class,'school_id','id');

    }
    public function block()
    {
        return $this->hasMany(SchoolBlocks::class,'block_id','id');

    }

}
