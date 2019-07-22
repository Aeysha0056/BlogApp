<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Blog extends Model implements ViewableContract
{
    //
    use Viewable;
    protected $guarded = [];

    public function user ()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function comments ()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags ()
    {
        return $this->belongsToMany(Tag::class);
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
