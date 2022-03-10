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

Route::get('/', ['uses' =>'HomeController@index', 'as' => 'home']);
Route::get('/team', ['uses' =>'HomeController@allTeams', 'as' => 'teammember']);

Route::get('/blog', ['uses' =>'HomeController@allblogs', 'as' => 'blog']);
Route::get('/blogdetail/{id}', ['uses' =>'HomeController@blogdetail', 'as' => 'blogdetail']);
Route::get('/training', ['uses' =>'HomeController@training', 'as' => 'training']);

Route::get('/careerstater', ['uses' =>'HomeController@allcareerstaters', 'as' => 'careerstater']);
Route::get('/careerstaterdetail/{id}', ['uses' =>'HomeController@careerstaterdetail', 'as' => 'careerstaterdetail']);






// Admin Route

Route::get('/admin', ['uses' =>'AdminController@index', 'as' => 'admin']);


// BLOG ROUTE
Route::get('/admin/blogpost', ['uses' =>'AdminController@blogpost', 'as' => 'blogpost']);
Route::get('/admin/blogedit/{id}', ['uses' =>'AdminController@blogedit', 'as' => 'blogedit']);
Route::get('/admin/blogview', ['uses' =>'AdminController@blogview', 'as' => 'blogview']);


// CSS5 ROUTE
Route::get('/admin/css5post', ['uses' =>'AdminController@css5post', 'as' => 'css5post']);
Route::get('/admin/css5edit/{id}', ['uses' =>'AdminController@css5edit', 'as' => 'css5edit']);
Route::get('/admin/css5view', ['uses' =>'AdminController@css5view', 'as' => 'css5view']);


// EVENT ROUTE
Route::get('/admin/createevent', ['uses' =>'AdminController@createevent', 'as' => 'createevent']);
Route::get('/admin/eventedit/{id}', ['uses' =>'AdminController@eventedit', 'as' => 'eventedit']);
Route::get('/admin/viewevent', ['uses' =>'AdminController@viewevent', 'as' => 'viewevent']);


// TEAM ROUTE
Route::get('/admin/createteam', ['uses' =>'AdminController@createteam', 'as' => 'createteam']);
Route::get('/admin/allteam', ['uses' =>'AdminController@allteam', 'as' => 'allteam']);
Route::get('/admin/team/{id}', ['uses' =>'AdminController@team', 'as' => 'team']);


// SUBSCRIBER ROUTE
Route::get('/admin/subscriber', ['uses' =>'AdminController@subscriber', 'as' => 'subscriber']);
Route::get('/admin/messagesubscriber', ['uses' =>'AdminController@messagesubscriber', 'as' => 'messagesubscriber']);


Route::get('/admin/lockscreen', ['uses' =>'AdminController@lockscreen', 'as' => 'lockscreen']);
Route::get('/admin/login', ['uses' =>'AdminController@login', 'as' => 'login']);



Route::post('/admin/login', ['uses' =>'AdminController@adminlogin', 'as' => 'adminlogin']);

Route::post('/admin/logout', ['uses' =>'AdminController@adminlogout', 'as' => 'adminlogout']);

Route::post('/admin/passwordchange', ['uses' =>'AdminController@adminpasswordchange', 'as' => 'passwordchange']);

Route::post('/admin/blogpost', ['uses' =>'BlogController@adminblogpost', 'as' => 'blogpost']);
Route::post('/admin/blogedit', ['uses' =>'BlogController@adminblogedit', 'as' => 'blogedit']);

Route::post('/admin/blogcomment', ['uses' =>'BlogController@bloggingComment', 'as' => 'blogcomment']);

Route::post('/admin/likeblog', ['uses' =>'BlogController@likeBlog', 'as' => 'likeblog']);

Route::post('/admin/css5post', ['uses' =>'CareerstarterController@admincss5post', 'as' => 'css5post']);
Route::post('/admin/css5edit', ['uses' =>'CareerstarterController@admincss5edit', 'as' => 'css5edit']);

Route::post('/admin/css5comment', ['uses' =>'CareerstarterController@css5Comment', 'as' => 'css5comment']);

Route::post('/admin/likecss5', ['uses' =>'CareerstarterController@likeCss5', 'as' => 'likecss5']);


// Delete Posts
Route::post('/admin/deleteposts', ['uses' =>'DeleteController@deleteposts', 'as' => 'deleteposts']);



Route::post('/admin/eventpost', ['uses' =>'EventsController@admineventpost', 'as' => 'eventpost']);
Route::post('/admin/eventedit', ['uses' =>'EventsController@admineventedit', 'as' => 'eventedit']);

Route::post('/admin/teampost', ['uses' =>'TeamController@adminteampost', 'as' => 'teampost']);
Route::post('/admin/deleteteam', ['uses' =>'TeamController@admindeleteteam', 'as' => 'deleteteam']);
Route::post('/admin/updateteam', ['uses' =>'TeamController@adminupdateteam', 'as' => 'updateteam']);



Route::post('/subscribe', ['uses' =>'SubscriberController@subscribe', 'as' => 'subscribe']);
Route::post('/unsubscribe', ['uses' =>'SubscriberController@unsubscribe', 'as' => 'unsubscribe']);
Route::post('/sendsubscribtion', ['uses' =>'SubscriberController@sendsubscribtion', 'as' => 'sendsubscribtion']);


Route::post('/contactus', ['uses' =>'ContactusController@contactus', 'as' => 'contactus']);

Route::post('/sharelink', ['uses' =>'AdminController@shareLink', 'as' => 'sharelink']);
