<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProjectOffices extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'project_id',
        'name',
        'holder',
        'phone',
        'email',
        'description'
    ];


    public function project()
    {
        return $this->belongsTo(Project::class);

    }


}
