<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class IuguProjects extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'iugu_projects';

    protected $fillable = [
        'project_id',
        'id_api',
        'test',
        'live',
        'status',
    ];

    public function project()
    {
        return $this->hasOne(Project::class);
    }

}
