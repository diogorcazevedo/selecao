<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolBlocks extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $fillable = [

        'school_id',
        'name',
        'floors',
        'description',
    ];


    public function blockfloors()
    {
        return $this->hasMany(SchoolBlockFloors::class,'block_id','id');

    }
    public function classrooms()
    {
        return $this->hasMany(SchoolBlockFloorClassrooms::class,'block_id','id');

    }

    public function school()
    {
        return $this->belongsTo(School::class,'school_id','id');

    }
}
