<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'profile',
        'status',
        'title',
        'moment',
        'close',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function documents()
    {
        return $this->hasMany(OrderDocuments::class);

    }

    public function notes()
    {
        return $this->hasMany(OrderNotes::class);

    }

}
