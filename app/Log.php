<?php

namespace App;

use Illuminate\Database\Eloquent\Model ;
use Illuminate\Notifications\Notification;

class Log extends Model
{
    //
    public  function scopelogIn($query, $username, $password )
    {
    	$result = $query->where("username","=", $username)->where("password","=" ,$password)->get();
    	return $result;  }
    	// dd($result);
public function scopepass($query ,$fullname , $email){
        $result=$query->where("fullname","=",$fullname)->where("email","=",$email)->get();
        return $result;
}
    public function post()
    {
        return $this->hasMany(Post::class , "log_id" , "id");
    }
    public function comment()
    {
        // $this->comments()->create(compact("body"));
        return $this->hasMany(Comment::class);

    }
    public function media(){
        return $this->hasMany(Media::class);
    }


    public function followers()
    {
        return $this->belongsToMany( Log::class, "followers",
            "log_id", "follower_id",
            "id", "id",
            Log::class);
    }
    public function followi()
    {
        return $this->belongsToMany( Log::class, "followers",
            "follower_id", "log_id",
            "id", "id",
            Log::class);
    }

    public function medias(){
        return $this->hasOne(Media::class, "id", "media_id");
    }

    public function notify()
    {
        return $this->hasMany( Notify::class  ,  "log_id" , "id");
    }




}

