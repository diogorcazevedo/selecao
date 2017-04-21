<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OrderNotes extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'order_id',
        'name',
        'description',
        'status',
        'agent',
        'document_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);

    }
    public function docs()
    {
        return $this->hasMany(OrderDocuments::class,'id','document_id');
    }

}
