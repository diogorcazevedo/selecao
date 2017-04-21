<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;


class JobTiebreakers extends Model
{

    protected $table = 'job_tiebreakers';

    protected $fillable = [
        'job_id',
        'name',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);

    }

}
