<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
