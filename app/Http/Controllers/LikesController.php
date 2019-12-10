<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Like;
use App\Post;
use App\User;

class LikesController extends Controller
{
  // public function store(Request $request, $postId)
  public function store(Request $request, $postId)
  {
    // Likeモデル作成
    $like = new Like;
    $like->user_id = Auth::user()->id;

    $post = new Post;  // Postモデルから$post_idインスタンス作成
    $like->post_id = intval($request->input('post_id'));  //$like->post_idへ代入。post_idはinput[hidden]として、ビューから直接持ってくる様にした。
    $like->save();

    // dd($like);
    // return $like;

    return redirect()
        ->action('FTAToolPostController@index', $post->id);
  }

  // public function destroy($postId, $likeId)
  // public function destroy(Request $request, $postId, $user)
  public function destroy(Request $request)
  {
    // $post = Post::where("ftatool_id", "=", $errorDetail_id)->first(); //$postを使用できる様に、Postモデル内で用いているidに変換
    // $post->likeBy(Auth::user())->delete();

    // return redirect()
    //     ->action('FTAToolPostController@index', $post->id);


    ///しまむさん参考
    $like = Like::find($request->id);
    // dd($like);
    // return $like;
    $like->delete();
    return redirect('post');

  }

}
