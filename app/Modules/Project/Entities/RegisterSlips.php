<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RegisterSlips extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'register_id',
        'accounts_id',
        'date',
        'number',
        'nosso_numero',
        'reftran',
        'paid',
        'send',
    ];

    public function register()
    {
        return $this->belongsTo(Register::class,'register_id','id');

    }
    public function account()
    {
        return $this->belongsTo(ProjectAccounts::class,'accounts_id','id');

    }

}
