<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SponsorVideos extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'sponsor_id',
        'file_videos_id',
        'extension',
        'publish',
        'name',
    ];

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);

    }
    public function video()
    {
        return $this->belongsTo(FileVideos::class,'file_videos_id','id');

    }

}
