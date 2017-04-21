<?php

namespace App\Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RegisterPayments extends Model
{

    protected $table = 'register_payments';

    use SoftDeletes;

    protected $fillable = [
        'register_id',
        'slip_id',
        'getDataOcorrencia',
        'getDataCredito',
        'getNossoNumero',
        'getNumeroDocumento',
        'getValorRecebido',
        'getValorTitulo'
    ];

    public function register()
    {
        return $this->belongsTo(Register::class,'register_id','id');

    }
    public function slip()
    {
        return $this->belongsTo(RegisterSlips::class,'slip_id','id');

    }
}
