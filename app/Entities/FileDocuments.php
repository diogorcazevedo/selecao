<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FileDocuments extends Model
{
    use SoftDeletes;

    // protected $table = 'file_images';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'publish',
    ];


    public function users()
    {
        return $this->hasMany(UserDocuments::class);
    }

    public function companies()
    {
        return $this->hasMany(CompanyDocuments::class);
    }

}
