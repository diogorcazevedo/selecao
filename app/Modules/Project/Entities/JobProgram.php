<?php

namespace App\Modules\Project\Entities;

use App\Modules\Academy\Entities\Program;
use App\Modules\Academy\Entities\ProgramItems;
use Illuminate\Database\Eloquent\Model;


class JobProgram extends Model
{


    protected $fillable = [
        'job_id',
        'name',
        'program_id',
        'qtd',
        'type',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);

    }

    public function program()
    {
        return $this->belongsTo(Program::class);

    }
    public function programItems()
    {
        return $this->belongsToMany(ProgramItems::class,'job_items_program');
    }
    public function addProgramItems(ProgramItems $items)
    {
        return $this->programItems()->save($items);
    }
    public function revokeProgramItems(ProgramItems $items)
    {
        return $this->programItems()->detach($items);
    }


}
