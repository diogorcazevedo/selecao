<?php

namespace App\Modules\Project\Entities;

use App\Entities\Company;
use App\Entities\Sponsor;
use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'sponsor_id',
        'company_id',
        'number',
        'description',
        'status',
        'telefone',
        'slug'
    ];

    public function user()
    {
        return $this->hasOne(User::class ,'id','user_id');

    }
    public function iuguCustomers()
    {
        return $this->hasOne(IuguCustomers::class);

    }
    public function iuguProject()
    {
        return $this->hasOne(IuguProjects::class);

    }
    public function sponsor()
    {
        return $this->hasOne(Sponsor::class ,'id','sponsor_id');

    }

    public function company()
    {
        return $this->hasOne(Company::class ,'id','company_id');

    }
    public function account()
    {
        return $this->hasOne(ProjectAccounts::class);

    }
    public function edict()
    {
        return $this->hasOne(ProjectEdict::class);

    }

    public function documents()
    {
        return $this->hasMany(ProjectDocuments::class);

    }
    public function images()
    {
        return $this->hasMany(ProjectImages::class);

    }
    public function videos()
    {
        return $this->hasMany(ProjectVideos::class);

    }
    public function offices()
    {
        return $this->hasMany(ProjectOffices::class);

    }
    public function cities()
    {
        return $this->hasMany(ProjectCity::class);

    }
    public function clippings()
    {
        return $this->hasMany(ProjectClippings::class);

    }
    public function supplies()
    {
        return $this->hasMany(ProjectSupplies::class);

    }
    public function schedules()
    {
        return $this->hasMany(ProjectSchedules::class);

    }

    public function jobs()
    {
        return $this->hasMany(Job::class);

    }

    public function getRouteKeyName()
    {

        return 'slug';
    }
}
