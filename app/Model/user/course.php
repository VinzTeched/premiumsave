<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    public function posts(){
		return $this->belongsToMany('App\Model\user\post', 'course_posts')->where('posted_by', 1)->orderBy('created_at', 'DESC')->paginate(50);		
	}
	
	public function getRouteKeyName(){
		return 'slug';		
	}
}
