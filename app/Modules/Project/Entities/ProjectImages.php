<?php

namespace App\Modules\Project\Entities;

use App\Entities\FileImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProjectImages extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'project_id',
        'file_images_id',
        'extension',
        'publish',
        'name',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);

    }
    public function image()
    {
        return $this->belongsTo(FileImages::class,'file_images_id','id');

    }

}
