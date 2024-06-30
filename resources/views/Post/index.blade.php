@extends('layouts.main')
@section('content')
    <div class="h4"><a class="btn btn-primary mb-3" href="{{route('post.create')}}">Create</a></div>
    @foreach($posts as $post)
        <div class="h5"><a class="link-dark" href="{{route('post.show',$post->id)}}">{{$post->id}} . {{$post->title}}</a></div>
    @endforeach
    <div>
        {{$posts->withQueryString()->links()}}
    </div>
@endsection
