<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;
use App\Log;
 use App\Notify;



class PostsController extends Controller
{

    //
    public function indexs()
    {

        $posts= Post::latest()->get();

        return view("clean.indexs", compact("posts","logs"));
    }
    public function create()
    {
$create=1;
        return view("clean.create" ,compact("post" , "create"));
    }
    public function store( Request $request)
    {

if($request->picture !== null){
    $media=new Media();
  $file=request()->file("picture");

        $medias =$file->getMimeType() ;


        $path = $file->store("pic");

        $media->media_path=$path;
   $media->media_type=$medias;
   $media->save();
   $med=$media->getKey();
}
        else {
            $med=0;
    }
        if($request->picture2 != null){
            $media=new Media();
            $file=request()->file("picture2");

            $medias =$file->getMimeType() ;


            $path = $file->store("pic");

            $media->media_path=$path;
            $media->media_type=$medias;
            $media->save();
            $med2=$media->getKey();
        }
        else {
            $med2=0;
        }





        $posts = new Post();
        $posts->media_id = $med;
        $posts->media_id2=$med2;
           if($request->title != null){
               $posts->title=request("title");}
           else{
               $posts->title=0;
           }
           if($request->body != null){
               $posts->body=request("body");}
           else{
               $posts->body=null;
           }
        $posts->log_id =request()->session()->get("user_id");
$posts->category=$request->category;

        $posts->save();



        return redirect()->route("welcome");
    }
    public function editpost(Request $request){


       if($request->picture !== null){
            $media=new Media();
            $file=request()->file("picture");

            $medias =$file->getMimeType() ;


            $path = $file->store("pic");

            $media->media_path=$path;
            $media->media_type=$medias;
            $media->save();
            $med=$media->getKey();
        }
        else {
            $med=0;
        }
        if($request->picture2 != null){
            $media=new Media();
            $file=request()->file("picture2");

            $medias =$file->getMimeType() ;


            $path = $file->store("pic");

            $media->media_path=$path;
            $media->media_type=$medias;
            $media->save();
            $med2=$media->getKey();
        }
        else {
            $med2=0;
        }





        $posti =Post::find($request->post_id);

        $posti->media_id = $med;
        $posti->media_id2=$med2;
        if($request->title !== null){
            $posti->title=request("title");}
        else{
            $posti->title=0;
        }
        if($request->body !== null){
            $posti->body=request("body");}
        else{
            $posti->body=0;
        }
        $posti->log_id =request()->session()->get("user_id");

        $posti->save();

        return redirect()->route("welcome");
    }


    public function shows($id )
    {

//$comments=Comment::find($id);
        $post=Post::find($id);

        $achieves=Comment::selectRaw(COUNT($comments=["id"]))->where(["post_id"=> $post->id])  ->get();
        //    	dd("posts->title");

        return view("clean.shows", compact("post", "achieves"));
//    	dd($achieves);
    }
    public function stores (Post $post)
    {
        // $post->comments(request("body"));
        // return back;
        Comment::create([
            "body"=>request("body"),
            "post_id"=>$post->id]);
        // $post->save();
        return back();
        // dd(request()->all());



    }
    public function associate($id){
        $logs=Log::find($id);

        if($id == request()->session()->get("user_id") ){
            return back();
        }
//
        $posts= Post::latest()->where(["log_id"=>$id])->get();
        return view("clean.logs", compact("logs","posts"));
    }
    public function follower($id){
        $logs=Log::find($id);

        return view("clean.followers" , compact("logs"));
    }
    public function followi($id){
        $logs=Log::find($id);

        return view("clean.followi" , compact("logs"));}

   public function like($id){

       $post=Post::find($id);
       $log=request()->session()->get("user_id");
       $logss=Log::find($log);
       $post->like()->attach($logss);
       $notify= Post::selectRaw("log_id")->where(["id"=>$id])->get();

        $noti=Log::find($notify);
//        dd($noti->id);
        foreach ($noti as $notis)

//       dd($noti);

      $notifi= new Notify();


      $notifi->log_id=$notis->id;
      $notifi->parti_id=request()->session()->get("user_id");

      $notifi->type= "like";
       $notifi->message=0;

       $notifi->post_id=$id;

      $notifi->save();
//       dd($notifi);


//       $posts= Post::latest()->where(["log_id"=>$id])->get();
       return back();
}
public function userlikes($id){
        $post=Post::find($id);
//    $posts= Post::latest()->where(["log_id"=>$id])->get();
        return view("clean.userlikes" , compact("post"));
}
public function delete($id){
        $post=Post::find($id);
    $posts=Notify::where(["post_id" => $id])->get();
    foreach ($posts as $p){
        $p->delete();
    }

        $post->delete();
        return back();

}
public function edit($id){
        $post=Post::find($id);
        $create=2;
        return view("clean.create" , compact("post" ,"create"));
}
}


