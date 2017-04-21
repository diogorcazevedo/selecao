<?php

namespace App\Modules\Academy\Entities;

use App\Entities\FileDocuments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ItemDocuments extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'item_id',
        'file_documents_id',
        'extension',
        'publish',
        'name',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);

    }
    public function document()
    {
        return $this->belongsTo(FileDocuments::class,'file_documents_id','id');

    }

}
