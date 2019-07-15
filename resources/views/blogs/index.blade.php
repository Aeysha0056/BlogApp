@extends('layouts.master')
@section('content')
    <!--<h1> Hello this is index.blade.php</h1>-->

    <div class="row">
            @foreach ($blogs as $blog) 

        <div class="col-md-6">
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    <a href="/blogs/{{ $blog->id }}"> {{ $blog->title }}</a>
                </div>
                
                <div class="card-body">
                    <a href="/blogs/{{$blog->id}}">
                    <img src="{{ asset($blog->image) }}" alt="" class="card-img-top" >
                    </a>
                     <br>
                     <br>
                     <br>
                    <p class="blog-post-meta">
                        posted 
                        {{ $blog->created_at->toFormattedDateString()}}
                        {{ $blog->created_at->diffForHumans()}}
                    </p>
                    <a href="/blogs/{{$blog->id}}" class="btn btn-outline-primary">View Post</a>
                   
                </div>
                 <div class="card-footer">
                        <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                    </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    <div class="pagination justify-content-center">{{ $blogs->onEachSide(1)->links() }}</div>
@endsection