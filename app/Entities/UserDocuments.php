<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserDocuments extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'file_documents_id',
        'extension',
        'publish',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function document()
    {
        return $this->belongsTo(FileDocuments::class,'file_documents_id','id');

    }

}
