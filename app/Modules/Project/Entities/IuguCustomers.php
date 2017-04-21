<?php

namespace App\Modules\Project\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class IuguCustomers extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'iugu_customers';

    protected $fillable = [
        'user_id',
        'project_id',
        'customer_id',
        'email',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function project()
    {
        return $this->hasOne(Project::class,'id','project_id');
    }
}
