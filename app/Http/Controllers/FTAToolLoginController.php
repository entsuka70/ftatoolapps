<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\FTALoginRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class FTAToolLoginController extends Controller
{
// ホーム画面の設定
  public function index(Request $request)
  {
    return view('FTATool.userLogin');
  }

  public function postAuth(FTALoginRequest $request)
  {
    $user = Auth::user();
    $email = $request->input('email');
    $password = $request->input('password');
    if (Auth::attempt(['email' => $email, 'password' => $password]))
    {
      $msg = 'ログインに成功しました';
      return redirect('ftatool-user')->with(compact('msg'));
    }else {
      $msg = 'ログインに失敗しました';
      return redirect('ftatool-user')->with(compact('msg'));
    }
  }
}

?>
