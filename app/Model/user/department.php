<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    public function posts(){
		return $this->belongsToMany('App\Model\user\post', 'department_posts')->where('posted_by', 2)->orderBy('created_at', 'DESC')->paginate(50);		
	}
	
	public function getRouteKeyName(){
		return 'slug';		
	}
}
