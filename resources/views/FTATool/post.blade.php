@extends('layouts.flame')

@section('title', 'FTATOOL')

@section('content')

<div class="container my-4">
  <h2 class="search_contents mb-4">エラー内容</h2>
  <h3 class="list_in_error mb-4"><span><i class="fas fa-info-circle"></i></i></span>{{ $errorDetail }}</h3>
    @if($errors->has('body'))
      <h4 class="alert alert-danger">{{ $errors->first('body')}}</h4>
    @endif
    @if($errors->has('ftatool_id'))
      <h4 class="alert alert-danger">{{ $errors->first('ftatool_id') }}</p>
    @endif
  <form class="" action="post/store/{$post->id}" method="post">
    @csrf
    @if(Auth::check())
      <div class="row">
        <div class="col-12">
          <input type="hidden" name="ftatool_id" value="{{ $errorDetail_id }}">
          <input type="hidden" name="user_id" value="{{ $user->id }}">
          <div class="box_textareas">
            <span class="box_title"></span>
            <textarea class="textareas" name="body" placeholder="400文字以内で入力ください" rows="5" cols="100">{{ old('body') }}</textarea>
          </div>
        </div>
        <div class="col-6">
          <button type="submit" class="btn btn-primary px-4 py-3 d-block">投稿</button>
        </div>
        <div class="col-6">
          <a href="errorpage" class="btn btn-default white px-4 py-3">戻る</a>
        </div>
        @endif
      </div>
  </form>
  <div class="container">
    <ul>
      @foreach($posts as $post)
        <li class="mb-3">
          {{ $post->body }}:
          @if($post->updated_at)
            {{$post->updated_at->format('Y/n/j')}}
          @else
            {{$post->created_at->format('Y/n/j')}}
          @endif
        <div class="row">
          <div class="d-block-inline ml-3 px-1">
            <i class="far fa-thumbs-up"></i>いいね{{ $post->likes_count }}
          </div>
          <div class="d-block-inline px-1">
            @if(Auth::check())
              @if($post->likeBy(Auth::user())->count() > 0)
              <!-- いいねの追加 -->
                <form class="like_button" action="like/{{ $post->likeBy(Auth::user())->firstOrFail()->id }}" method="post">
                  @csrf
                  <input type="hidden" name="post_id" value="{{ $post->id }}">
                  <button class="like_button_sub" type="submit">
                    <i class="fas fa-minus-circle"></i>
                  </button>
                </form>
              @else
              <!-- いいねの削除 -->
                <form class="like_button" action="post/{{ $post->id }}/likes" method="post">
                  @csrf
                  <input type="hidden" name="post_id" value="{{ $post->id }}">
                  <button class="like_button_sub" type="submit">
                    <i class="fas fa-plus-circle"></i>
                  </button>
                </form>
              @endif
            @endif
          </div>
          <div class="d-block-inline px-1">
            @if($post->user->profile_fileName)
              <img src="{{ secure_asset($post->user->profile_fileName) }}" width="40px" height="40px" alt="プロフィール画像">
            @else
              <img src="{{ secure_asset('assets/img/profile_default.png') }}" alt="profile" width="40px" hieght="40px">
            @endif
              {{$post->user->name}} さん
          </div>
        </div>
          <!-- 投稿内容の更新ボタン -->
          @if(Auth::check())
            @if($user->role == 'admin-only')
              <!-- 【モーダル表示】 -->
              <div class="container">
                <div class="row">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#testModal" data-whatever="{{ $post->id }}">更新</button>
                </div>
              </div>
              <!-- 【モーダル】ボタンクリック後に表示される画面の内容 -->
              <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">投稿内容更新画面</h4></h4>
                    </div>
                    <!-- 投稿内容の更新 -->
                    <form class="" action="post/update/{{ $post->id }}" method="post">
                      @csrf
                      <div class="modal-body">
                        <input id="recipient-name" type="hidden" name="id">
                        <textarea name="body" rows="5" cols="50">{{ old('body') }}</textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                        <button type="submit" class="btn btn-primary">更新</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- 投稿内容の削除 -->
              <form class="" action="post/delete/{{ $post->id }}" method="post">
                @csrf
                <button class="btn btn-danger" type="submit" name="button">削除</button>
              </form>
            @endif
            @if($user->id == $post->user_id && $user->role == 'login-user')
              <!-- 【モーダル表示】 -->
              <div class="container">
                <div class="row">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#testModal" data-whatever="{{ $post->id }}">更新</button>
                </div>
              </div>
              <!-- 【モーダル】ボタンクリック後に表示される画面の内容 -->
              <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">投稿内容更新画面</h4></h4>
                    </div>
                    <!-- 投稿内容の更新 -->
                    <form class="" action="post/update/{{ $post->id }}" method="post">
                      @csrf
                      <div class="modal-body">
                        <!-- <input id="recipient-name" type="hidden" name="id" value=""> -->
                        <textarea name="body" rows="5" cols="50">{{ old('body') }}</textarea>
                      </div>
                      <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                        <button type="submit" class="btn btn-primary">更新</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- 投稿内容の削除 -->
              <form class="" action="post/delete/{{ $post->id }}" method="post">
                @csrf
                <button class="btn btn-danger" type="submit" name="button">削除</button>
              </form>
            @endif
          @endif
        </li>
      @endforeach
      {{ $posts->links() }}
    </ul>
  </div>
</div>

@endsection
