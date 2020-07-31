<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function posts(){
		return $this->belongsToMany('App\Model\user\post', 'category_posts')->orderBy('created_at', 'DESC')->paginate(20);		
	}
	
	public function getRouteKeyName(){
		return 'name';
		
	}
}
