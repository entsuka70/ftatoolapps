<?php

namespace App\Http\Controllers;

use App\Ftatool;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\FTAPostRequest;
use App\Http\Requests\FTAPostUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session; //セッション利用の宣言


class FTAToolPostController extends Controller
{
  public function index(Request $request)
  {
    $errorDetail_id = $request->session()->get('ses_detailId'); //セッションを用いてIDの取得
    $errorDetail = $request->session()->get('ses_detail'); //セッションを用いてエラー内容の取得
    $posts = Post::where('ftatool_id', '=', $errorDetail_id)->orderBy('likes_count', 'DESC')->simplePaginate(10); //「ftatool_id」と「$errorDetail_id」が一緒の投稿だけを$postsとして取得

    $user = User::find(Auth()->id()); //「flame.blade.phpのユーザー」と「post.blade.phpで誰が投稿したか判断するため定義」に利用
    $item = Post::where('ftatool_id', '=', $errorDetail_id)->first(); //「ftatool_id」と「$errorDetail_id」が一緒の投稿を限定し、$like(いいね)定義に利用。(PostモデルのhasManuを用いる為にwhereで限定)
    $like_posts = Post::get()->toArray();


    if(Auth::check()){  //ログイン済みアカウントの場合
      if(Session::has('ses_detailId')){
        if( $item == "" ){ //投稿が無い場合、表示する定義
          return view('FTATool.post', compact('errorDetail_id', 'errorDetail', 'posts', 'item', 'like_posts','user'));
        }else{ //ユーザー投稿がある場合、表示する定義
          $like = $item->likes()->where('user_id', Auth::user()->id)->first(); //ある投稿に対していいねを押しているかいないかを判断
          return view('FTATool.post', compact('errorDetail_id', 'errorDetail', 'posts', 'item', 'like', 'like_posts', 'user'));
        }
      }else{ //セッションが外れた場合
        return redirect('/');
      }
    }else{ //未ログイン(ゲスト)の場合
      return view('FTATool.post', compact('errorDetail_id', 'errorDetail', 'posts', 'item', 'like_posts','user'));
    }

  }

  public function store(FTAPostRequest $request)
  {
    $Post = new Post;
    $forms = $request->all();
    unset($forms['_token']);
    $Post->fill($forms)->save();
    return redirect('post');
  }

  public function update(FTAPostUpdateRequest $request)
  {
    $errorDetail_id = $request->session()->get('ses_detailId'); //セッションを用いてIDの取得

    $PostUpdate = Post::where('ftatool_id', '=', $errorDetail_id)->first();
    $contents = $request->all();
    unset($contents['_token']);
    $PostUpdate->fill($contents)->save();

    return redirect('post');
  }

  public function remove(Request $request)
  {
    $errorDetail_id = $request->session()->get('ses_detailId'); //セッションを用いてIDの取得
    Post::where('ftatool_id', '=', $errorDetail_id)->first()->delete();
    return redirect('post');
  }

}
