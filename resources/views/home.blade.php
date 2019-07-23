@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
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
                            by <a href="#">{{ $blog->user->name }} </a>
                        </p>
                        <a href="/blogs/{{$blog->id}}" class="btn btn-outline-primary">View Post</a>
                       
                    </div>
                     <div class="card-footer">
                     <a href="#" class="card-link"><i class="fa fa-gittip"></i> {{views($blog)->unique()->count()}} Views</a>
                            <a href="#" class="card-link"><i class="fa fa-comment"></i>{{$blog->comments->count()}} Comments</a>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <div class="pagination justify-content-center">{{ $blogs->onEachSide(1)->links() }}</div>
</div>
@endsection
