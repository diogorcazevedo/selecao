<?php

namespace App\Modules\Project\Entities;

use App\Entities\FileDocuments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProjectDocuments extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'project_id',
        'file_documents_id',
        'extension',
        'publish',
        'name',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);

    }
    public function document()
    {
        return $this->belongsTo(FileDocuments::class,'file_documents_id','id');

    }

}
