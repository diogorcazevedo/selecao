<?php

namespace App\Modules\Academy\Entities;

use App\Entities\FileImages;
use Illuminate\Database\Eloquent\Model;


class ItemImages extends Model
{


    protected $fillable = [
        'item_id',
        'file_images_id',
        'extension',
        'publish',
        'name',
        'position',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);

    }
    public function image()
    {
        return $this->belongsTo(FileImages::class,'file_images_id','id');

    }

}
