<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.sidebar', function($view){
			
			//$view->with('tags', \App\Model\user\tag::belongsToMany('App\Model\user\post', 'course_posts')->where('posted_by', 1)->orderBy('created_at', 'DESC')->paginate(50));
			
		});
    }
}
