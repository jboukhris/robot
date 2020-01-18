<?php


Route::get('/', 'FrontController@index')->name('home');

Route::get('/category/{id}/{slug?}', 'FrontController@showRobotsByCat');

Route::get('/tags/{id}', 'FrontController@showRobotsByTag');

Route::get('robot/{id}' , 'FrontController@showRobot');

Route::get('/robot/user/{id}', 'FrontController@showRobotsByUser');


// --- AUTH ----------
Route::any('login/', 'LoginController@showLogin');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function()
{
	Route::get('profile', 'Admin\DashboardController@profile');
	Route::resource('robot', 'Admin\RobotController');
});


