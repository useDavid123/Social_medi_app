<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user;

class userscontroller extends Controller
{
    //
    public function welcome()
    {
// Route::get('/users', function () {
	// $users=DB::table("users")->get();
	// return $users;
     $users=user::all();
    return view('welcome',compact("users"));

    }
    public function show(user $users)
    {


// Route::get('/users/{users}', function ($id) {
	// $users=DB::table("users")->find($id);
	// $users=user::find($id);
	// return $users;
     
    return view('show ',compact("users"));
    }
}

