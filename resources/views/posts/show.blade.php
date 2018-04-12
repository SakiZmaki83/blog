

    @extends('layouts.master')

    @section('title')
        {{$post->title}}
    @endsection

    @section('content')

    <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            <p class="blog-post-meta">{{$post->created_at}}</p>

            <p>
            {{$post->body}}
            </p>


            @if(count($post->comments))
            <hr/>
            <h4>Comments</h4>

            <form method="POST" action="{{route('comments-post', ['post_id=> $post->id']) }}">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="text">Molimo unesite komentar: </label>
			<input id="text" type="text" name="text" class="form-control">
			@include('partials.error-message', ['fieldTitle' => 'text'])
		</div>


		<div class="form-group">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>

	</form>
            <ul class="list-unstyled">
                @foreach($post->comments as $comment)

                    <li>
                        <p>{{ $comment->text }}</p>
                    </li>
                @endforeach

            </ul>
            </div>

    </div>
    @endif

    @endsection
