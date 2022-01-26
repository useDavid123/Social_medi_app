<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Log;
use App\Post;
use App\Notify;
use App\Mail\Verify;
class LogController extends Controller
{
    //
   public function store()
   {

       $email=request("email");
       $username=request("username");
   	$logs = new Log();

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    return back()->withErrors(["invalid Email"]);
}

    	$logs->fullname=request("fullname");

       $user=Log::where('username','LIKE',"%".$username."%")->get();

    if($user !== null){

        return back()->withErrors(["Username has already been used "]);
    }

    	$logs->username=request("username");
    	$logs->password=request("password");
    	$logs->email=request("email");

    	$logs->media_id= 60;
       $logs->save();

    	return back();
    	// dd(Request('fullname'));

   }
   public function pair(Log $logs  ){


       // $logs= Log::get();
       // $logs=Log::find($username, $password);

  $username=request("username");
  $password=request("password");


  $user = Log::LogIn( $username, $password  );
  if ($user->count() == 1 )
  {

     request()->session()->put( "user_id", $user->get( 0 )->id );
//     request()->session()->put("username", $username);




      return  redirect()->route("welcome");
//      return view("clean.indexs", compact( "posts", "media"));
//        dd($logs);
  }
  else{
      return back()->withErrors(["invalid login credencials"]);
  }
   }
   public function notify($id){
       $logs=Log::find($id);
       return view("clean.notify" , compact("logs"));
   }
public function good (){

$media=Media::latest()->get();
      $posts=Post::latest()->get();
    $log=request()->session()->get("user_id");
    $logs=Log::find($log);

    return view("clean.indexs", compact( "posts" , "media" ,"logs" ));
       }

       public function destroy(){

       request()->session()->flush();
         return  redirect()->route("login");


       }
    public function liveSearch(Request $request)
    {
        $search = $request->id;

        if (is_null($search))
        {
            return view('clean.search');
        }
        else
        {
            $log=Log::where('username','LIKE',"%".$search."%")->orWhere("fullname" , 'LIKE', "%".$search."%")->get();


            return view('clean.search' , compact("log" ));
        }
    }
       public function clear($id){
       $log=Notify::where(["log_id"=> $id])->get();

foreach($log as $logs){

           $logs->read_type= 1;
           $logs->save();
       }

       return back();
       }
       public function message(Request $request){
       $logs= Log::find($request->log_id);
    $message=request("message");
//    dd($message);
                  $noti= new Notify();
       $noti->log_id=$request->log_id;
       $noti->post_id=0;
       $noti->parti_id=request()->session()->get("user_id");
       $noti->message=request("message");
       $noti->type="message";


       $noti->save();
       return back();



       }
       public function password(){
       return view("clean.password");
       }
       public function confirm(Log $log){
           $fullname=request("fullname");
           $email=request("email");
           $user = Log::pass( $fullname, $email  );
           if($user->count() == 1 ){
               $logg= Log::latest()->where(["email"=>$email])->where(["fullname"=>$fullname])->get();
//
               foreach ($logg as $log)
//
                   \Mail::to($log)->send(new Verify($log));
//
               return view("login")->withErrors(["Check Your Mail"]);
           }
           else{
               return back()->withErrors(["invalid login credencials"]);
           }
       }
       public function reset($id){
       $log=Log::find($id);
       return view("clean.reset" , compact("log"));
       }
       public function changepassword($id){
       $log=Log::find($id);

         $log->password =request("password");
//         dd($log->password);
         $log->save();
           return view("login")->withErrors(["password changed"]);



       }
       public function followedposts(){
           $log=request()->session()->get("user_id");
           $logs=Log::find($log);
           $media=Media::latest()->get();
$post=Post::latest()->get();

//           $posts= Post::latest()->where(["log_id"=>$log->id])->get();

           return view("clean.followedposts",  compact("media" ,  "logs"));
       }
       public  function profile(){
           $media=new Media();
           $file=request()->file("picture");
           $path=$file-> store("pic");
           $medias =$file->getMimeType() ;
           $media->media_path=$path;
           $media->media_type=$medias;
           $media->save();

           $id=request()->session()->get("user_id");
           $logs= Log::find($id);
           $logs->media_id=$media->id;

           $logs->save();


           return back();



       }
     public function follow($id){
         $logs=Log::find($id);
         $log=request()->session()->get("user_id");
         $logss=Log::find($log);

         $notifi= new Notify();

         $notifi->log_id=$id;
         $notifi->parti_id=request()->session()->get("user_id");
         $notifi->type= "follow";
         $notifi->post_id=0;
         $notifi->message=0;
         $notifi->save();
         $logs->followers()->attach($logss);

         return back();
//         return view("clean.logs", compact("logs", "posts"));
     }
    public function unfollow ($id){
        $logs=Log::find($id);
        $log=request()->session()->get("user_id");
        $logss=Log::find($log);
        $logs->followers()->detach($logss);
        $posts= Post::latest()->where(["log_id"=>$id])->get();
        return back();
//        return view("clean.logs", compact("logs", "posts"));
    }
    public function  welcome(){


        $log=request()->session()->get("user_id");
        $logs=Log::find($log);
        $logg=Notify::latest()->where(["log_id"=> $logs->id])->get();
        $posts= Post::latest()->where(["log_id"=>request()->session()->get("user_id")])->get();

        return view("clean.users", compact("logs","posts" , "logg" ));
    }
    public function followers(){

        $log=request()->session()->get("user_id");
        $logs=Log::find($log);
       return view("clean.followers" , compact("logs"));
    }
    public function followi(){
        $log=request()->session()->get("user_id");
        $logs=Log::find($log);
        return view("clean.followi" , compact("logs"));
    }

   	


}
 