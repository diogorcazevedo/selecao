<?php

namespace App\Modules\Academy\Entities;

use Illuminate\Database\Eloquent\Model;


class ProgramSubItems extends Model
{


    protected $fillable = [
        'item_id',
        'name',
        'description'
    ];

    public function item()
    {
        return $this->belongsTo(ProgramItems::class);

    }

}
