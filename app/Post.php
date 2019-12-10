<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{

  protected $guarded = array('id');

  protected $fillable = [
    'ftatool_id', 'body', 'likes_count', 'user_id',
  ];

  protected $table = 'posts';

  public function ftatools()
  {
    return $this->belongsTo('App\Ftatool');
  }

  public function likes()
  {
    return $this->hasMany('App\Like');
  }

  public function likeBy($user)
  {
    return Like::where('user_id', $user->id)->where('post_id', $this->id);
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }


}
