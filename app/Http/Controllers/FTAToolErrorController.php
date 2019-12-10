<?php
namespace App\Http\Controllers;

use App\Ftatool;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\FTAToolRequest;
use App\User;
use Session; //セッション利用の宣言

class FTAToolErrorController extends Controller
{
// ホーム画面の設定
  public function index(Request $request)
  {
    // セッションを用いる場合
    $ses_lang = $request->session()->get('ses_lang');
    $ses_lists = $request->session()->get('ses_lists');
    $items = Ftatool::all();
    $user = User::find(auth()->id());

    //セッション切れの場合、トップページにリダイレクト
    if(Session::has('ses_lang')){
      return view('FTATool.errorPage', compact('ses_lang', 'ses_lists', 'items', 'user'));
    }else{
      return redirect('/');
    }

  }

  public function store(FTAToolRequest $request)
  {
    $FTATool = new Ftatool;
    $items = $request->all();
    unset($items['_token']);
    $FTATool->fill($items)->save();
    return redirect('errorpage');
  }

  public function update(FTAToolRequest $request)
  {
    $FTATool = Ftatool::find($request->id);
    $items = $request->all();
    unset($items['_token']);
    $FTATool->fill($items)->save();
    return redirect('errorpage');
  }

  public function remove(Request $request)
  {
    Ftatool::find($request->id)->delete();
    return redirect('errorpage');
  }

  public function show(Request $request)
  {
    $items = Ftatool::all();
    $errDetail_id = $request->id;
    $request->session()->put('ses_detailId', $errDetail_id);
    $errDetail = $request->errorDetail;
    $request->session()->put('ses_detail', $errDetail);
    return redirect('post')->with(compact('items', 'errDetail_id', 'errDetail'));
  }

}

?>
