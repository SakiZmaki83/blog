<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
 
    protected $fillable = [
    	'title', 'body', 'is_published'
    ];

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function tags()
    {
      return $this->belongsToMany('App\Tag');
    }
     
    public static function getPublishedPosts() {
      return Post::where('is_published', true);
    }


    

}
