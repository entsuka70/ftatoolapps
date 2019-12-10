<?php
namespace App\Http\Controllers;

use App\Ftatool;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\FTAToolErrorFirstRequest;
use App\User;

class FTAToolController extends Controller
{
// ホーム画面の設定
  public function index(Request $request)
  {
    $user = User::find(auth()->id());
    return view('FTATool.index', compact('user'));
  }

  public function post(FTAToolErrorFirstRequest $request)
  {
    // セッションを用いる場合
    $lang = $request->language;
    $request->session()->put('ses_lang', $lang);
    $lists = $request->errorFirst;
    $request->session()->put('ses_lists', $lists);
    $items = Ftatool::all();
    return redirect('errorpage')->with(compact('lang', 'lists', 'items'));

  }
}

?>
