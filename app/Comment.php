<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    //protected $guarded = [];
    protected $fillable = ['owner_id', 'blog_id', 'comment'];
    
    public function blog ()
    {
        return $this->belongsTo(Blog::class,'blog_id');
    }

    public function user ()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
