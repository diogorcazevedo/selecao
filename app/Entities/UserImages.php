<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserImages extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'file_images_id',
        'extension',
        'publish',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function image()
    {
        return $this->belongsTo(FileImages::class,'file_images_id','id');

    }

}
