<?php

namespace App\Model\admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class admin extends Authenticatable
{
    use Notifiable;
	
	public function roles()
	{
		return $this->belongsToMany('App\Model\admin\role', 'admin_roles', 'admin_id', 'role_id');
	}
	
	public function getNameAttribute($value)
	{
		return ucfirst($value);
	}
	
	    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
