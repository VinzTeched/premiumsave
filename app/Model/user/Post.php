<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tags(){
		return $this->belongsToMany('App\Model\user\tag', 'post_tags')->withTimestamps();
		
	}

    public function categories(){
		return $this->belongsToMany('App\Model\user\category', 'category_posts')->withTimestamps();
		
	}

    public function courses(){
		return $this->belongsToMany('App\Model\user\course', 'course_posts')->withTimestamps();	
	}

    public function departments(){
		return $this->belongsToMany('App\Model\user\department', 'department_posts')->withTimestamps();	
	}
	
	public function getRoutekeyName(){
		return 'slug';
	}
}
