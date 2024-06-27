@extends('layouts.main')
@section('content')
    <form action="{{route('post.update', $post->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name = "title" class="form-control" id="title" value="{{$post->title}}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <input type="text" name = "content" class="form-control" id="content" value="{{$post->content}}">
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name = "image" class="form-control" id="image" value="{{$post->image}}" >
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <label for="category" class="form-label">Category</label>
        <select class="form-select mb-3" id="category" name ="category_id">
            @foreach($categories as $category)
                <option
                    {{$category->id === $post->category_id ? 'selected' : ''}}
                    value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
        <select class="form-select" multiple aria-label="multiple select example" name ="tags[]">
            @foreach($tags as $tag)
                <option
                    @foreach($post->tags as $postTag)
                        {{$tag->id === $postTag->id ? 'selected' : ''}}
                    @endforeach
                    value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
