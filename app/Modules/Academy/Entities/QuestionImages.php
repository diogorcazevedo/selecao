<?php

namespace App\Modules\Academy\Entities;

use App\Entities\FileImages;
use Illuminate\Database\Eloquent\Model;


class QuestionImages extends Model
{


    protected $fillable = [
        'question_id',
        'file_images_id',
        'extension',
        'publish',
        'name',
        'position',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);

    }
    public function image()
    {
        return $this->belongsTo(FileImages::class,'file_images_id','id');

    }


}
