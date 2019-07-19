<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $guarded = [];

    public function user ()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function comments ()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($comment) {

        //$this->comments()->create(compact($comment));
        Comment::create([
            'comment' => $comment,
            'blog_id' => $this->id,
            'owner_id' => auth()->id()
        ]);
    }
}
