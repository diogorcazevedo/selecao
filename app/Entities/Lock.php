<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lock extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'publish',
    ];


    public function user_locks()
    {
        return $this->hasMany(UserLocks::class);
    }

    public function company_locks()
    {
        return $this->hasMany(CompanyLocks::class);
    }

}
