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

Route::get('/', function(){return view("login");})->name("login");

Route::post("/posts",  "logcontroller@store");
Route::get("/password", "logcontroller@password");
Route::post("/password/confirm", "logcontroller@confirm");
Route::get("/passwordReset/{id}","logcontroller@reset");
Route::post("/passwordReset/confirm/{id}","logcontroller@changepassword");

Route::get("/posts/logout" , "logcontroller@destroy");
Route::get("/posts/signIn",function(){return view("welcome");} )->name("home");
Route::post("/posts/signIn/pair" , "logcontroller@pair");
Route::get("/posts/welcome" , "logcontroller@welcome")->name("welcome");
Route::get('livesearch','logcontroller@liveSearch')->name("livesearch");
Route::post("/posts/profile" , "logcontroller@profile");
Route::get("/posts/notification/{id}","logcontroller@notify" );
Route::get("/posts/clear/{id}","logcontroller@clear" );
Route::get("/posts/followers","logcontroller@followers");
Route::get("/posts/followi","logcontroller@followi");
Route::get("/posts/message","logcontroller@message")->name("message");
Route::get("/posts/signIn/pairs", "logcontroller@good")->name("index");
Route::get("/posts/signIn/posts", "logcontroller@followedposts");
Route::get("/posts/follow/{id}" , "logcontroller@follow");
Route::get("/posts/unfollow/{id}",   "logcontroller@unfollow");
Route::get("/posts/delete/{id}"  ,  "postscontroller@delete")->name("delete");
Route::get("/posts/like/{id}", "postscontroller@like");
Route::get("/posts/edit/{id}",  "postscontroller@edit");
Route::get("/posts/followi/{id}" ,"postscontroller@followi" );
Route::get("/posts/followers/{id}" ,"postscontroller@follower" );

Route::get("/posts/userlikes/{id}"  ,   "postscontroller@userlikes");
Route::get("/posts/signIn/pair/get/create", "postscontroller@create");
Route::get("/posts/signIn/pairs/{id}",  "postscontroller@associate");

 Route::post("/posts/signIn/pair/get/create/post",  "postscontroller@store");
Route::post("/posts/signIn/pair/get/create/editpost",  "postscontroller@editpost");
Route::get("/posts/signIn/pair/get/create/post/{post}", "postscontroller@shows");
Route::get("/posts/comment/reply", "commentscontroller@reply")->name('comment_reply');
 Route::get("/posts/signIn/pair/get" , "Commentscontroller@stores")->name('post_comment');

// controller=postscontroller
// model =post
// migration= create-post-table
// Route::get("/posts/signIn/pair/get" ,  function(){     return view("clean.layout");});
// Route::get('/', "postscontroller@indexs");
// Route::get("/users"  , "Userscontroller@welcome");
// Route::get("/users/{users}" , "Userscontroller@show");
   




//
// Route::post('/login', 'Auth\LoginController@login')->name('login');
// Route::get('/home', 'HomeController@index')->name('home');
//
// Route::get('/login-form', 'Auth\LoginController@showLoginForm')->name('login_form');