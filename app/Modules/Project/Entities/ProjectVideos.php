<?php

namespace App\Modules\Project\Entities;

use App\Entities\FileVideos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProjectVideos extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'project_id',
        'file_videos_id',
        'extension',
        'publish',
        'name',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);

    }

    public function video()
    {
        return $this->belongsTo(FileVideos::class,'file_videos_id','id');

    }

}
