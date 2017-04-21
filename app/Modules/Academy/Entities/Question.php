<?php

namespace App\Modules\Academy\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Question extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'program_id',
        'item_id',
        'name',
        'description',
        'status',
        'level',
        'justify'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function program()
    {
        return $this->belongsTo(Program::class);

    }
    public function item()
    {
        return $this->belongsTo(Item::class);

    }
    public function choices()
    {
        return $this->hasMany(QuestionChoices::class);

    }
    public function images()
    {
        return $this->hasMany(QuestionImages::class);

    }

    public function programItems()
    {
        return $this->belongsToMany(ProgramItems::class);
    }

    public function addProgramItem(ProgramItems $role)
    {
        return $this->programItems()->save($role);
    }

    public function revokeProgramItem(ProgramItems $role)
    {
        return $this->programItems()->detach($role);
    }

}
