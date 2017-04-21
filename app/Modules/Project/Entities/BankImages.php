<?php

namespace App\Modules\Project\Entities;

use App\Entities\FileImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BankImages extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'bank_id',
        'file_images_id',
        'extension',
        'publish',
        'name',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);

    }
    public function image()
    {
        return $this->belongsTo(FileImages::class,'file_images_id','id');

    }

}
