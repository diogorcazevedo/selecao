<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProjectSchedules extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'project_id',
        'name',
        'marco',
        'open',
        'close',
    ];


    public function project()
    {
        return $this->belongsTo(Project::class);

    }

}
