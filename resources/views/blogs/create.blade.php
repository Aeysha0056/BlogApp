@extends('layouts.master')
@section('content')
    

<form method="POST" action="/blogs" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control {{$errors->has('title')? 'is-invalid': '' }}"  value="{{ old('title') }}">
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea type="text" name="content" rows="10" class="form-control {{$errors->has('content')? 'is-invalid': '' }}"  >{{ old('content') }}</textarea>
    </div>
    <div class="form-group">
			<label>Tags:</label>
			<br/>
			<input data-role="tagsinput" type="text" name="tags" class="form-control {{$errors->has('tags')? 'is-invalid': '' }}"  value="{{ old('tags') }}">
		</div>	
    <div class="form group">
        <label>Image</label>
        <input type="file" name="images" class="form-control">
    </div>
    <br>
    <div class="form-group">    
        <button type="submit" class="btn btn-outline-primary">Add Blog Post</button>
    </div>
    @include('errors')
</form>
@endsection