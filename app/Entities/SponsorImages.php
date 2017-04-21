<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SponsorImages extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'sponsor_id',
        'file_images_id',
        'extension',
        'publish',
        'name',
    ];

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);

    }
    public function image()
    {
        return $this->belongsTo(FileImages::class,'file_images_id','id');

    }

}
