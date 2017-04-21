<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BankOffices extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'bank_id',
        'name',
        'holder',
        'phone',
        'email',
        'description'
    ];


    public function bank()
    {
        return $this->belongsTo(Bank::class);

    }
}
