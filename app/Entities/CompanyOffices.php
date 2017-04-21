<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyOffices extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'company_id',
        'name',
        'holder',
        'phone',
        'email',
        'description'
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);

    }

}
