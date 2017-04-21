<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;


class JobBonus extends Model
{

    protected $table = 'job_bonus';
    protected $fillable = [
        'job_id',
        'name',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);

    }

}
