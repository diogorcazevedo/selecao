<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CompanyLocks extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'company_id',
        'lock_id',
        'name',
        'http',
        'password',
        'login',
        'description'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);

    }

    public function lock()
    {
        return $this->belongsTo(Lock::class);

    }

}
