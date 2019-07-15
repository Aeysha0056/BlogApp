<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;

class CommentsController extends Controller
{
    //
    public function store ($id) {

        $blog = Blog::find($id);
        $this->validate(request(), ['comment'=> 'required|min:2']);
        
        $blog->addComment(request('comment'));

        return back();
    }

}
