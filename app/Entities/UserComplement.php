<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserComplement extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'clients';

    protected $fillable = [
        'user_id',
        'birthdate',
        'phone',
        'gender',
        'maritalstatus',
        'mother',
        'father',
        'nationality',
        'naturality',
        'children',
        'zipcode',
        'address',
        'neighborhood',
        'complement',
        'city',
        'state',

    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
