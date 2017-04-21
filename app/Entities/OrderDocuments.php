<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OrderDocuments extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'order_id',
        'file_documents_id',
        'extension',
        'name',
        'agent',
    ];

    public function document()
    {
        return $this->belongsTo(FileDocuments::class);

    }
    public function order()
    {
        return $this->belongsTo(Order::class);

    }

}
