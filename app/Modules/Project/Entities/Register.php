<?php

namespace App\Modules\Project\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Register extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'user_id',
        'job_id',
        'user_handicapped',
        'user_quota',
        'user_needs',
        'user_needs_description',
        'nosso_numero',
        'active',
        'local',
        'pay_method',
        'check_needs',
        'desc_need',
        'invoice',
    ];
    public function benefits()
    {
        return $this->hasMany(Benefits::class);

    }
    public function job()
    {
        return $this->belongsTo(Job::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function slips()
    {
        return $this->hasMany(RegisterSlips::class);

    }

}
