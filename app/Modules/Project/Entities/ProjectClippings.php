<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;


class ProjectClippings extends Model
{


    protected $fillable = [
        'project_id',
        'name',
        'status',
        'publish'
    ];


    public function project()
    {
        return $this->belongsTo(Project::class);

    }
}
