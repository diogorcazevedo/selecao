<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectAccounts extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [

        'bank_id',
        'project_id',
        'cedente',
        'agencia',
        'carteira',
        'conta',
        'conta_dv',
        'agencia_dv',
        'ios',
        'convenio',
        'descricao_demonstrativo',
        'instrucoes',
        'type'
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function project()
    {
        return $this->hasOne(Project::class);
    }

    public function slips()
    {
        return $this->hasMany(RegisterSlips::class);
    }

}
