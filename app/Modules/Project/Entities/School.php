<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'responsavel',
        'name',
        'email',
        'cel',
        'phone',
        'zipcode',
        'address',
        'neighborhood',
        'complement',
        'city',
        'state'
    ];
}
