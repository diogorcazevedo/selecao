<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FileImages extends Model
{
    use SoftDeletes;

   // protected $table = 'file_images';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'publish',
        'width',
        'height'
    ];


    public function users()
    {
        return $this->hasMany(UserImages::class);
    }

    public function companies()
    {
        return $this->hasMany(CompanyImages::class);
    }

}
