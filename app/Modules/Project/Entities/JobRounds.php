<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;

class JobRounds extends Model
{


    protected $fillable = [
        'job_id',
        'name',
        'test_date', // dia de prova
        'test_time', // horário de início de prova
        'test_duration', // duracao de prova
        'turno', // duracao de prova
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);

    }
}
