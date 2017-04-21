<?php


namespace App\Modules\Academy\Entities;

use App\Modules\Project\Entities\JobProgram;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Program extends Model
{
    use SoftDeletes;


    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'description'
    ];

    public function items()
    {
        return $this->hasMany(ProgramItems::class);

    }
    public function itens()
    {
        return $this->hasMany(Item::class);

    }

    public function jobProgram()
    {
        return $this->hasOne(JobProgram::class);

    }
}
