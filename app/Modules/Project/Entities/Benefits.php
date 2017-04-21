<?php

namespace App\Modules\Project\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Benefits extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [

        'user_id',
        'register_id',
        'nome',
        'nis',
        'datadenascimento',
        'sexo',
        'num_identid_rg',
        'dt_identid_rg',
        'sg_em_identid_rg',
        'cpf',
        'nomedamae',
        'status',
        'justificativa',
        'recurso',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function register()
    {
        return $this->hasOne(Register::class,'id','register_id');
    }
}
