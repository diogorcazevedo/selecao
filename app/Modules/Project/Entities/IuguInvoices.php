<?php

namespace App\Modules\Project\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class IuguInvoices extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'project_id',
        'job_id',
        'register_id',
        'id_iugu_customers',
        'invoice_id',
        'secure_id',
        'url',
        'status',
        'vencimento',
        'token',
    ];

    public function project()
    {
        return $this->hasOne(Project::class,'id','project_id');
    }
    public function register()
    {
        return $this->hasOne(Register::class,'id','register_id');
    }
    public function job()
    {
        return $this->hasOne(Job::class,'id','job_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function customer()
    {
        return $this->hasOne(IuguCustomers::class,'id','id_iugu_customers');
    }

}
