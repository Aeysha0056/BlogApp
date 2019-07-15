<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Storage;

class BlogsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index () {

        $blogs = Blog::latest()->paginate(5);
        //$blogs = Blog::where('owner_id', auth()->id())->paginate(5);
        //$blogs = auth()->user()->blogs;

        return view('blogs.index', compact('blogs'));
    }

    public function create () {

        return view('blogs.create');
    }

    public function store (Request $request) {
        
        $attributes = $this->validateBlog() /*request()->validate([
            'title' => ['required','min:3'],
            'content' => ['required','min:3']
        ])*/;

        $url = Storage::url(Storage::putFile('public', $request->file('images') ));
        $attributes['image'] = $url;
        $attributes['owner_id'] = auth()->id();

        Blog::create($attributes);

        return redirect('/blogs');

    }

    public function show ($id) {

        $blog = Blog::find($id);
        //abort_if($blog->owner_id !== auth()->id(), 403);
        
        return view('blogs.show',compact('blog'));

    }

    public function edit ($id) {

        $blog = Blog::find($id);
        abort_if($blog->owner_id !== auth()->id(), 403);

        return view('blogs.edit',compact('blog'));

    }

    public function update (Request $request, $id) {

        $blog = Blog::find($id);
        abort_if($blog->owner_id !== auth()->id(), 403);

        //$attributes = request(['title', 'content']);

        $url = Storage::url(Storage::putFile('public', $request->file('images') ));
        $attributes['image'] = $url;

        $blog->update($this->validateBlog());

        return redirect()->route('blog_path', compact('blog'));
    }

    public function destroy($id) {

        $blog = Blog::find($id);
        abort_if($blog->owner_id !== auth()->id(), 403);

        $blog->delete();

        return redirect('/blogs');
    }

    public function validateBlog () {

        return request()->validate([
            'title' => ['required','min:3'],
            'content' => ['required','min:3']
        ]);
    }
    
}
