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
                <p> by <i><a href="{{route('users', ['users_id'=>$post->user_id])}}"><{{$post->user->name}} </a></i></p>

                <small>
                
                    @foreach($post->tags as $tag)

                        <a href="{{ route('posts-tags', ['tag'=> $tag]) }}"> {{ $tag->name }} </a>

                    @endforeach
                
                </small>
                <p>{{$post->body}}</p>
            </li>
            @endforeach
        </ul>
@endsection
