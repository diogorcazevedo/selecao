<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;


class ProjectCity extends Model
{

    protected $fillable = [
        'project_id',
        'name'
    ];


    public function project()
    {
        return $this->belongsTo(Project::class);

    }

}
