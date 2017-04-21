<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FileVideos extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

   // protected $table = 'file_videos';
    protected $fillable = [
        'name',
        'description',
        'publish',
    ];


    public function users()
    {
        return $this->hasMany(UserVideos::class);
    }

    public function companies()
    {
        return $this->hasMany(CompanyVideos::class);
    }
    public function sponsors()
    {
        return $this->hasMany(SponsorVideos::class);
    }
}
