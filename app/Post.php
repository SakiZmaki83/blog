<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  //  public static function getPublished(){
    //    return self::where('is_published', true)->get();
    protected $fillable = [
    	'title', 'body', 'is_published'

    ];

    public static function getPublishedPosts()
    {
    	return self::where('is_published', true)->get();
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    
}
