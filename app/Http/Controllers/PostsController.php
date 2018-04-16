<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' =>['create', 'store']]
     );
    }

    public function index()
    {
        $posts = Post::paginate(10);
        
      //  $posts = Post::getPublishedPosts();

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        
        $post = Post::with('comments')->find($id);
        $brojKomentara = $post->comments->count();
    
       

      // dd($post->comments);

        return view('posts.show', compact(['post']));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
      //  dd(request()->all());
      //  dd(request()->get('title'));
      /*  $post = new Post();
        $post->title = request()->get('title');
        $post->body = request()->get('body');
        $post->is_published = request()->get('is_published');

        $post->save();


        return redirect()->route('all-posts');

*/
        $this->validate(request(),
    [
            'title' => 'required',
            'body' => 'required|min:15'

   ]);

        $post = new Post();
        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->user()->id;
        $post->is_published = request('is_published');
        $post->save();


       // Post::create(request()->all());
        return redirect()->route('all-posts');
    }
}
