<?php

namespace App\Modules\Academy\Entities;

use App\Entities\User;
use App\Modules\Project\Entities\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'program_id',
        'name',
        'description',
        'status',
        'edict',
        'payment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function program()
    {
        return $this->belongsTo(Program::class);

    }
    public function questions()
    {
        return $this->hasMany(Question::class);

    }
    public function images()
    {
        return $this->hasMany(ItemImages::class);

    }
    public function documents()
    {
        return $this->hasMany(ItemDocuments::class);

    }

    public function programItems()
    {
        return $this->belongsToMany(ProgramItems::class);
    }

    public function addProgramItem(ProgramItems $programItems)
    {
        return $this->programItems()->save($programItems);
    }

    public function revokeProgramItem(ProgramItems $programItems)
    {
        return $this->programItems()->detach($programItems);
    }

    public function job()
    {
        return $this->belongsToMany(Job::class);
    }

    public function addJob(Job $job)
    {
        return $this->job()->save($job);
    }

    public function revokeJob(Job $job)
    {
        return $this->job()->detach($job);
    }

}
