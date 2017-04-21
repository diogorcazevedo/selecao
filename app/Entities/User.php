<?php

namespace App\Entities;

use App\Modules\Project\Entities\Project;
use App\Modules\Project\Entities\Register;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;


    protected $table = 'users';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'cel',
        'password',
        'cpf',
        'profile',
        'identity',
        'dispatcher', //(orgao emissor)
        'guardian', //responsável (pais)
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function client()
    {
        return $this->hasOne(UserComplement::class);

    }
    public function complement()
    {
        return $this->hasOne(UserComplement::class);

    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function addRole(Role $role)
    {
        return $this->roles()->save($role);
    }

    public function revokeRole(Role $role)
    {
        return $this->roles()->detach($role);
    }
    public function projects()
    {
        return $this->hasMany(Project::class);

    }

    public function sponsor()
    {
        return $this->hasOne(Sponsor::class);

    }
    public function isAdmin()
    {
        return $this->hasRole('ADMIN');
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }
        if (is_array($role)) {
            foreach ($role as $r) {
                if ($this->roles->contains('name', $r)) {
                    return true;
                }
            }
            return false;
        }
        return $role->intersect($this->roles)->count();
    }

    ///


    public function registers()
    {
        return $this->hasMany(Register::class);

    }

}
