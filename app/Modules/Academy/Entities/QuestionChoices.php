<?php

namespace App\Modules\Academy\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class QuestionChoices extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'question_id',
        'description',
        'status'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);

    }

}
