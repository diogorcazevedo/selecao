<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyDocuments extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'company_id',
        'file_documents_id',
        'extension',
        'publish',
        'name',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);

    }
    public function document()
    {
        return $this->belongsTo(FileDocuments::class,'file_documents_id','id');

    }

}
