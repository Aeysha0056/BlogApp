@extends('layouts.master')

@section('content')
    
<div class="row">
    <div class="col-md-12">
    <img src="{{ asset($blog->image) }}" alt="" class="card-img-top">
    <br><br>
    <h3>{{ $blog->title }}</h3>
    <hr>
    <p class="lead">{{ $blog->content }}</p>

    <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-outline-info">Edit</a>
    <a href="/blogs" class="btn btn-outline-secondary">Back</a>
    <!--<a href="/blogs/" class="btn btn-outline-danger">Delete</a>-->
    </div>
    <hr>  
</div>

<!-- Delete Form -->
<form method="POST" action="/blogs/{{ $blog->id }}">
    @method('DELETE')
    @csrf

   <div class="field">

     <div class="control">
         <button type="submit" class="btn btn-outline-danger">Delete</button>
     </div>
    </div> 
</form>
<br>
<!-- Display Comments -->
    <p>Comments: </p>
    @if($blog->comments->count())
        <div class="comments">
            <ul class="list-group">
                @foreach ($blog->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{ $comment->created_at->diffForHumans()}}
                        </strong>
                        {{ $comment->comment }}

                        <p>{{ $comment->owner_id }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <br>
    @endif

<!-- Add a Comment -->

<div class="card">
    <div class="card-block">
        <form method="POST" action="/blogs/{{$blog->id}}/comments" >
            @csrf
            <div class="form-group">
                <textarea  name="comment" placeholder="Your comment here.." class="form-control" ></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary">Add Comment</button>
            </div>
        </form>
    </div>
    @include('errors')
</div>



@endsection