<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  public function posts()
   {
     return $this->belongsToMany('App\Post','posts_tags','post_id','tag_id');
   }
}
