<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserVideos extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'file_videos_id',
        'extension',
        'publish',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function video()
    {
        return $this->belongsTo(FileVideos::class,'file_videos_id','id');

    }

}
