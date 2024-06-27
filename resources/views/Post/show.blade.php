@extends('layouts.main')
@section('content')
    <div class="h5">{{$post->id}} . {{$post->title}}  |  Category:{{$post->category->title}}</div>
    <div class="h6">{{$post->content}}</div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <div ><a class="btn btn-primary" href="{{route('post.edit', $post->id)}}">Edit</a></div>
        <div>
            <form action="{{route('post.destroy', $post->id)}}" method = "post">
                @csrf
                @method('delete')
                <input type="submit" value = "Delete" class="btn btn-primary">
            </form>
        </div>
        <div ><a class="btn btn-primary" href="{{route('post.index')}}">Back</a></div>
    </div>

@endsection
