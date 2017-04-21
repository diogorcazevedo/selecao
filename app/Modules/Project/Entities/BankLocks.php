<?php

namespace App\Modules\Project\Entities;

use App\Entities\Lock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BankLocks extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'bank_id',
        'lock_id',
        'name',
        'url',
        'password',
        'login',
        'description'
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);

    }

    public function lock()
    {
        return $this->belongsTo(Lock::class);

    }

}
