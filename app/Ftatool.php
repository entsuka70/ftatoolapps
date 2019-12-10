<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Ftatool extends Model
{
    // 自動でidが割り振られる為
    // $guardedを用いて、idを「値を用意しておかない項目」に指定
    protected $guarded = array('id');

    protected $fillable = [
      'name', 'email', 'password', 'confirm', 'language', 'errorFirst', 'errorDetail',
    ];

    // protected $table = 'ftatools';

    // protected $primaryKey = "id";

    public function posts()
    {
      return $this->hasMany('App\Post');
    }

}
