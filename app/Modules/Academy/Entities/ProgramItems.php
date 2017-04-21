<?php

namespace App\Modules\Academy\Entities;

use App\Modules\Project\Entities\JobProgram;
use Illuminate\Database\Eloquent\Model;


class ProgramItems extends Model
{


    protected $fillable = [
        'program_id',
        'name',
        'description'
    ];

    public function jobProgram()
    {
        return $this->belongsToMany(JobProgram::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);

    }

    public function sub_items()
    {
        return $this->hasMany(ProgramSubItems::class,'item_id','id');

    }
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

}
