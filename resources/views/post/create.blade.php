@extends('layouts.app')
@section('content')
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name = "title" class="form-control" id="title" value="{{ old('title') }}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <input type="text" name = "content" class="form-control" id="content" value="{{ old('content') }}">
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name = "image" class="form-control" id="image" value="{{ old('image') }}">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <label for="category" class="form-label">Category</label>
        <select class="form-select mb-3" id="category" name ="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}" selected="{{old('category_id')}}">{{$category->title}}</option>
            @endforeach
        </select>
        <select class="form-select" multiple aria-label="multiple select example" name ="tags[]">
            @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
