<?php

namespace App;


class Post extends Model
{
    //
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addcomment($body)
    {
        // $this->comments()->create(compact("body"));
        Comment::create(["body" => $body, "Post_id" => $this->id, "log_id" => request()->session()->get("user_id")]);
    }

    public function scopecount($body)
    {
        $achieves = Comment::selectRaw(COUNT($body))->where(["post_id" => $this->id])->get();
        return $achieves;
    }

    //
    Public function log()
    {
        return $this->belongsTo(Log::class ,"log_id" , "id");
    }

    public function media()
    {
        return $this->hasOne(Media::class, "id", "media_id"  );
    }
    public function medi()
    {
        return $this->hasOne(Media::class, "id", "media_id2"  );
    }
    public function like()
    {
        return $this->belongsToMany( Log::class, "like",
            "post_id", "log_id",
            "id", "id",
            Post::class);
    }


}