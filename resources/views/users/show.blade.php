@extends('layouts.master')

@section('title')
    User
@endsection

@section('content')
<h2>{{ $user->name }}</h2>
<div class="pull-left">
<a href="/posts">Back to posts</a>
        <ul>
            @foreach($user->posts as $post)
            <h2 class="blog-post-title">
            <li>
                <a href="{{route('single-post', ['id' => $post->id])}}"> {{$post->title}} </a>
                <p> by <i><a href="#"><{{$post->user->name}} </a></i></p>
                <p>{{$post->body}}</p>
            </li>
            @endforeach
        </ul>
@endsection
