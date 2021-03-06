<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SponsorDocuments extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'sponsor_id',
        'file_documents_id',
        'extension',
        'publish',
        'name',
    ];

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);

    }

    public function document()
    {
        return $this->belongsTo(FileDocuments::class,'file_documents_id','id');

    }

}
