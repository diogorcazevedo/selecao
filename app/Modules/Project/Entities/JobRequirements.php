<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;


class JobRequirements extends Model
{

    protected $table = 'job_requirements';

    protected $fillable = [
        'job_id',
        'name',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);

    }

}
