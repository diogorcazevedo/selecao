<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SponsorOffices extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'sponsor_id',
        'name',
        'holder',
        'phone',
        'email',
        'description'
    ];


    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);

    }

}
