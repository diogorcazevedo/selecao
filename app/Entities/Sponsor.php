<?php

namespace App\Entities;

use App\Modules\Project\Entities\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Sponsor extends Model
{
    use SoftDeletes;


    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'name',
        'alias',
        'cnpj',
        'zipcode',
        'address',
        'neighborhood',
        'complement',
        'city',
        'state',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function documents()
    {
        return $this->hasMany(SponsorDocuments::class);

    }
    public function images()
    {
        return $this->hasMany(SponsorImages::class);

    }
    public function videos()
    {
        return $this->hasMany(SponsorVideos::class);

    }

    public function offices()
    {
        return $this->hasMany(SponsorOffices::class);

    }

    public function projects()
    {
        return $this->hasMany(Project::class);

    }

}
