<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostsController extends Controller
{
   public function __construct()
   {

       $this->middleware('auth',
           [
           'only' => ['create','create']
           ]
       );

   }

   public function index()
   {

       $posts = Post::with('user')->paginate(10);

       

//        foreach ($posts as $post){
//
//        dd($post->user->email);exit;
//
//        }


//        dd(auth()->user());

       return view('posts.index', compact('posts'));

   }

   public function show($id)
   {

       $post = Post::with('comments')->find($id);

       return view('posts.show', compact(['post']));

   }

   public function create()
   {

       return view('posts.create');

   }

   public function store(Request $request)
   {

       $this->validate(request(),[
          'title' => 'required',
          'body' => 'required|min:15'

       ]);

           $post = new Post();
           $post->title = request()->get('title');
           $post->body = request()->get('body');
           $post->user_id =  auth()->user()->id ;
           $post->is_published = request()->get('is_published');

           $post->save();


//        Post::create(request()->all());

       return redirect()->route('posts.index');

   }
}