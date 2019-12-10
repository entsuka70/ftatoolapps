<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\FTAProfileImageRequest;
use App\Http\Requests\FTAProfileNameChangeRequest;
use App\Http\Requests\FTAProfileEmailChangeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;

class FTAToolProfileController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(Request $request)
  {
    $user = User::find(auth()->id());
    return view('FTATool.profile', compact('user'));
  }

  public function store(FTAProfileImageRequest $request)
  {
    if($request->file('profile_fileName')->isValid([]))
    {
      $user = User::find(auth()->id());
      $filename = $user->profile_fileName = $request->file('profile_fileName');
      $path = Storage::disk('s3')->putFile('/', $filename, 'public');
      $user->profile_fileName = Storage::disk('s3')->url($path);
      $user->save();
      return redirect('profile')->with('success', '保存しました');
    }else{
      return redirect()
        ->back()
        ->withInput()
        ->withErrors(['profile_fileName' => '画像がアップロードされていないか不正なデータです']);
    }
  }

  public function updateName(FTAProfileNameChangeRequest $request)
  {
    $user = User::find(auth()->id());
    $infos = $request->all();
    unset($infos['_token']);
    $user->fill($infos)->save();
    return redirect('profile');
  }

  public function updateEmail(FTAProfileEmailChangeRequest $request)
  {
    $user = User::find(auth()->id());
    $infos = $request->all();
    unset($infos['_token']);
    $user->fill($infos)->save();
    return redirect('profile');
  }

  public function remove(Request $request)
  {
    User::find(auth()->id())->delete();
    return redirect('/');
  }

}
