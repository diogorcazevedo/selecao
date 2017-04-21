<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserLocks extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'lock_id',
        'name',
        'url',
        'password',
        'login',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function lock()
    {
        return $this->belongsTo(Lock::class);

    }

}
