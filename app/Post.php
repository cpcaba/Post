<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{   use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable= ['name','desc','text','category_id'];

   public function comments()
    {
        return $this->hasMany('App\Comment');
    }

   public function category()
    {
      return $this->belongsTo('App\Category');
    }
    public function tags()
     {
       return $this->belongsToMany('App\Tag','posts_tags','post_id','tag_id');
     }
   public function user()
    {
      return $this->belongsTo('App\User');
    }
}
