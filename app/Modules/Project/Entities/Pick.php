<?php

namespace App\Modules\Project\Entities;


use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pick extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'job_id',
        'user_id'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);

    }
    public function user()
    {
        return $this->belongsTo(User::class);

    }

}
