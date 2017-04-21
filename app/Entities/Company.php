<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Company extends Model
{
    use SoftDeletes;


    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'cnpj',
        'phone',
        'cel',
        'nationality',
        'naturality',
        'zipcode',
        'address',
        'neighborhood',
        'complement',
        'city',
        'state',
    ];


    public function documents()
    {
        return $this->hasMany(CompanyDocuments::class);

    }
    public function images()
    {
        return $this->hasMany(CompanyImages::class);

    }
    public function videos()
    {
        return $this->hasMany(CompanyVideos::class);

    }
    public function locks()
    {
        return $this->hasMany(CompanyLocks::class);

    }

    public function offices()
    {
        return $this->hasMany(CompanyOffices::class);

    }

}
