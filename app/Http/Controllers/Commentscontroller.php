<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;
use App\Notify;
//use http\Env\Request;

class Commentscontroller extends Controller
{
    //
    public function stores (Request $request)
    {

        $post=Post::find($request->post_id);

    	// $post->comments(request("body"));
    	// return back;
    	Comment::create([
    		"body"=>$request->body,

    		"post_id"=>$post->id,
            "log_id"=>request()->session()->get("user_id")]);
    		// $post->save();
//        $arr = array('msg' => 'Successfully submit form using ajax', 'status' => true);

//return Response()->json($arr);
        return back();
        // dd(request()->all());

// return redirect("/posts/{post}/comments");

    }
    public  function reply(Request $request)
{

    Comment::create([
        "body"=>$request->body,
"relation_id"=>$request->relation_id,
        "post_id"=>$request->post_id,
        "parent_id"=>$request->parent_id,
        "log_id"=>request()->session()->get("user_id")]);

    $noti= new Notify();
    $noti->log_id=$request->log_id;
    $noti->post_id=$request->post_id;
    $noti->parti_id=request()->session()->get("user_id");

    $noti->type="reply";
    $noti->message=0;
    $noti->save();

    return back();
}

}
