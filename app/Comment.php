<?php

namespace App;



class Comment extends Model
{
    //
    Public function post()
    {
    	return $this->belongsTo(Post::class);
    }
    Public function log()
    {
        return $this->belongsTo(Log::class);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public function relation()
    {
        return $this->hasMany(Comment::class, "relation_id");
    }
}

