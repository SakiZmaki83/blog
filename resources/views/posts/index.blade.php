@extends('layouts.master')

@section('title')
    Posts
@endsection

@section('content')
        <ul>
            @foreach($posts as $post)
            <h2 class="blog-post-title">
            <li>
                <a href="{{route('single-post', ['id' => $post->id])}}"> {{$post->title}} </a>
                <p> by <i><a href="#"><{{$post->user->name}} </a></i></p>
                <p>{{$post->body}}</p>
            </li>
            @endforeach
        </ul>
@endsection
