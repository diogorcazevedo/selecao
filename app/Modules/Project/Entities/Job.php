<?php

namespace App\Modules\Project\Entities;

use App\Modules\Academy\Entities\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Job extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'project_id',
        'education_level', //escolaridade
        'license', // pre-requisitos
        'name', //cargo
        'age', // idade minima
        'tax', // valor da taxa
        'free_tax', //isencao
        'description', //breve descriicao
        'vacancies',// total de vagas
        'reserve', // cadastro reerva
        'quota', //cotas
        'quota_vacancies', // vagas destinadas a cota
        'handicapped', // deficientes
        'handicapped_vacancies', // vagas destinadas a deficientes

    ];

    public function pick()
    {
        return $this->hasMany(Pick::class);

    }
    public function project()
    {
        return $this->belongsTo(Project::class);

    }
    public function registers()
    {
        return $this->hasMany(Register::class);

    }

    public function tiebreakers()
    {

        return $this->hasMany(JobTiebreakers::class);

    }
    public function programs()
    {

        return $this->hasMany(JobProgram::class);

    }
    public function rounds(){


        return $this->hasMany(JobRounds::class);

    }
    public function bonus(){


        return $this->hasMany(JobBonus::class);

    }
    public function requirements(){


        return $this->hasMany(JobRequirements::class);

    }
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
