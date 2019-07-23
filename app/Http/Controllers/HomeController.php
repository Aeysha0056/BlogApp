<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$blogs = Blog::latest()->paginate(6);
        $blogs = Blog::latest()->where('owner_id', auth()->id())->paginate(5);
        return view('home', compact('blogs'));
    }
}
