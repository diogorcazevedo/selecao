<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CompanyVideos extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'company_id',
        'file_videos_id',
        'extension',
        'publish',
        'name',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);

    }

    public function video()
    {
        return $this->belongsTo(FileVideos::class,'file_videos_id','id');

    }

}
