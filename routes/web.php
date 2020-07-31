<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index')->name('index');
Route::get('/about', 'MainController@about')->name('about');
Route::get('/testimonials', 'MainController@testimonial')->name('testimonial');
Route::get('/legal/privacy', 'MainController@privacy')->name('privacy');



Route::get('user/profile/update/{userid}', ['uses' => 'User\UserUpdateController@index', 'middleware' => 'AuthResource'])->name('update.index');

Route::group(['namespace' => 'User'], function(){

	Route::get('/dashboard', 'DashboardController@index')->name('home');

	Route::resource('user/update-account', 'UpdateAccountController');

	Route::resource('user/deposit', 'DepositController');

	Route::resource('user/deposit-confirm', 'ConfirmController');
	
	Route::resource('user/withdrawal', 'WithdrawalController');

	Route::resource('user/testimony', 'TestimonialController');

	Route::resource('user/commitment', 'RecommitController');

	Route::resource('user/recommitment', 'MakeRecommitController');

	Route::resource('user/bonuses', 'ReferralCommitController');

	Route::get('user/referrals', 'MyReferralController@index')->name('myreferral');
	
	Route::get('/register/referral/{referral}', 'ReferralController@referral')->name('referral');

	Route::any('user/suspend/{id}', 'SuspendController@suspend')->name('suspend');

	Route::any('/referral/bonus/{id}', 'ReferralController@referralbonus')->name('referralbonus');

	Route::any('user/profile/updatebank/{id}', 'ProfileUpdateController@updateBank')->name('updateBank');
	Route::post('user/profile/updateprofile', 'ProfileUpdateController@updateProfile')->name('updateProfile');
	Route::any('user/profile/updatePassword/{id}', 'ProfileUpdateController@updatePassword')->name('updatePassword');


	/*****************************************/

	Route::get('/projects', 'HomeController@index')->name('project');
	
	Route::any('/search', 'SearchController@index')->name('search');
	
	Route::any('/contact', 'ContactController@index')->name('contact');	
	
	Route::resource('project/buy', 'BuyController');	

	Route::post('/contact/submit', 'ContactController@submit')->name('contact-form-submit');

});

Route::group(['namespace' => 'Admin'], function(){
	Route::resource('admin/role', 'RoleController');
	Route::resource('admin/permission', 'PermissionController');
	Route::resource('admin/user', 'UserController');		
	Route::resource('admin/purchase', 'PurchaseController');
	Route::resource('admin/messages', 'CourseController');
	Route::resource('admin/registered/members', 'RegisterUserController');
	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin-login', 'Auth\LoginController@login');
	Route::post('admin-logout', 'Auth\LoginController@logout')->name('admin-logout');
});


Auth::routes();

	/***************************************/


	Route::resource('user/account', 'Auth\AccountController');



	//********************************//

Route::get('/admin/home', 'Admin\AdminController@index')->name('admin.home');
Route::get('/admin', 'Admin\AdminController@index')->name('admin.home');

	Route::resource('admin/confirm-deposit', 'Admin\ConfirmController');
	Route::resource('admin/confirm-withdrawal', 'Admin\ConfirmWithdrawalController');
