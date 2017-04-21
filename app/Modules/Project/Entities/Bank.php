<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Bank extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'phone',
        'cel',
        'manager',
        'zipcode',
        'address',
        'neighborhood',
        'complement',
        'city',
        'state',
    ];

    public function documents()
    {
        return $this->hasMany(BankDocuments::class);

    }
    public function images()
    {
        return $this->hasMany(BankImages::class);

    }
    public function offices()
    {
        return $this->hasMany(BankOffices::class);

    }
    public function locks()
    {
        return $this->hasMany(BankLocks::class);

    }

}
