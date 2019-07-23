@extends('layouts.master')

@section('content')
    
<div class="row">
    <div class="col-md-12">
    <img src="{{ asset($blog->image) }}" alt="" class="card-img-top">
    <br><br>
    <h3>{{ $blog->title }}</h3>
    <br>
    @if (count($blog->tags))
    <strong>Tags: </strong>
        <ul>
            @foreach ($blog->tags as $tag)
               <li>
                   <a href="#">
                       {{ $tag->tagname }}
                   </a>
               </li>
                
            @endforeach
        </ul>    
    @endif
    <hr>
    <p class="lead">{{ $blog->content }}</p>
    </div>
    <hr>  
</div>
<div class="row">
    <div class="col-md-1">
        @if ($blog->owner_id === auth()->id())
            <!-- Edit Post -->
            <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-outline-info">Edit</a> 
            </div> 
            <!-- Delete Form -->
            <div class="col-md-1">
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
            </div>  
        @endif
</div>

<!-- Display Comments -->
    <strong>Comments: </strong>
    <p>{{$blog->comments->count()}} comments</p>
    @if($blog->comments->count())
        <div class="comments">
            <ul class="list-group">
                @foreach ($blog->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{ $comment->created_at->diffForHumans()}}
                            by {{ $comment->user->name }}
                        </strong>
                        <br>
                        {{ $comment->comment }}

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