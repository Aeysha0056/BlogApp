@extends('layouts.master')
@section('content')

    <div class="row justify-content-center">
            @foreach ($blogs as $blog) 

        <div class="col-md-10">
            <br><br>
            <div class="card">
                <div class="card-header">
                    <a style = "color: Dodgerblue" href="/blogs/{{ $blog->id }}">
                        <h5 style = "font-weight-bold; color: Dodgerblue">{{ $blog->title }}</h5> </a>
                </div>
                
                <div class="card-body">
                    <a href="/blogs/{{$blog->id}}">
                    <img src="{{ asset($blog->image) }}" alt="" width="300" height="400" class="card-img-top" >
                    </a>
                     <br><br><br>
                     <p class="card-text">{{ $blog->content }}</p>
                    <p style = "color:grey"class="blog-post-meta"><i class="fas fa-calendar-alt"></i>
                        Posted {{ $blog->created_at->toFormattedDateString()}}
                        by <a class="font-italic" href="#">{{ $blog->user->name }} </a>
                    </p>
                    <a href="/blogs/{{$blog->id}}" class="btn btn-outline-primary">View Post</a>
                   
                </div>
                 <div class="card-footer">
                 <a href="#" class="card-link">{{views($blog)->count()}} <i class="far fa-eye"></i></a>
                 <a href="#" class="card-link">{{$blog->comments->count()}} <i class="far fa-comment"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    <div class="pagination justify-content-center">{{ $blogs->onEachSide(1)->links() }}</div>
@endsection