<?php

namespace App\Modules\Project\Entities;
use App\Entities\FileDocuments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BankDocuments extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'bank_id',
        'file_documents_id',
        'extension',
        'publish',
        'name',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);

    }
    public function document()
    {
        return $this->belongsTo(FileDocuments::class,'file_documents_id','id');

    }

}
