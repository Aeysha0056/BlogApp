<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;
use App\Events\CommentReceived;

class CommentsController extends Controller
{
    //
    public function store ($id) {

        $blog = Blog::find($id);
        $this->validate(request(), ['comment'=> 'required|min:2']);
        
        /*$this->comment =*/ //$blog->addComment(request('comment'));
        $comment = Comment::create([
            'comment' => request('comment'),
            'blog_id' => $blog->id,
            'owner_id' => auth()->id()
        ]);
        event(new CommentReceived($comment, $blog));
        return back();
    }

}
