<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\FTARegistRequest;
use App\User;


class FTAToolRegistController extends Controller
{
// ホーム画面の設定
  public function index(Request $request)
  {
    return view('FTATool.userRegist');
  }

  public function create(FTARegistRequest $request)
  {
    // 入力フォームデータをDBへ保存
    // Userインスタンスの作成
    $user = new User([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'confirm' => $request->confirm
    ]);
    // データを保存
    $user->save();
    // ftatoolへリダイレクト
    return redirect('/');
  }
}

?>
