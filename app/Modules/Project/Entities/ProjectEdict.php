<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProjectEdict extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'project_id',
        'description',
        'tipo',
        'modelo',
        'status',
    ];


    public function project()
    {
        return $this->hasOne(Project::class,'id','project_id');
    }

}
