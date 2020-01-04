@extends('layouts.flame')

@section('title', 'FTATOOL')

@section('content')

<div class="container my-4">
    @if ($errors->has('errorDetail'))
      <label class="alert alert-danger">{{ $errors->first('errorDetail') }}</label>
      @endif
  <h2 class="search_language mb-4">検索言語『{{ $ses_lang }}』</h2>
  <div>
    @if(app('env') == 'local')
      <img class="error-image" src="{{ asset('assets/img/errorpage.png') }}" alt="errorpage">
    @endif
    @if(app('env') == 'production')
      <img class="error-image" src="{{ secure_asset('assets/img/errorpage.png') }}" alt="errorpage">
    @endif
  </div>
  @foreach($ses_lists as $ses_list)
    <div class="list_error p-3 my-2">
      <h3 class="list_in_error mb-4"><span><i class="far fa-check-circle"></i></span>エラー{{ $ses_list }}</h3>
      <ul>
        @foreach($items as $item)
          @if($ses_list == $item->errorFirst)
            <!-- エラーコメント追加 -->
            <li class="mb-3">
              <form class="readAdd" action="errorpage/post/{{$item->id}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $item->id }}">
                <input type="hidden" name="errorDetail" value="{{ $item->errorDetail }}">
                <button class="errorlink" type="submit">
                  <span><i class="fas fa-info-circle"></i></i></span>{{ $item->errorDetail }}
                  @if( $item->posts->count())
                    <span class="badge default-color">
                      <i class="far fa-comment-dots white-text"></i>
                      {{ $item->posts->count() }}件
                    </span>
                  @endif
                </button>
              </form>
            </li>
            <!-- Gateによるアクセス制限および表示・非表示機能 -->
            @can('admin-only')
              <!-- エラー内容再編集 -->
              <li>
                <form class="updateAdd" action="errorpage/update/{{$item->id}}" method="post">
                  @csrf
                    <div class="box_textareas">
                      <span class="box_title"></span>
                      <textarea class="textareas" type="text" name="errorDetail" placeholder="エラー内容の再編集ができます" rowa="1" col="100"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">再編集</button>
                </form>
              <!-- エラー内容削除 -->
                <form class="deleteAdd" action="errorpage/delete/{{$item->id}}" method="post">
                  @csrf
                  <button class="btn btn-danger" type="submit">削除</button>
                </form>
              </li>
            @endcan
          @endif
        @endforeach
        <!-- Gateによるアクセス制限および表示・非表示機能 -->
        @can('admin-only')
          <!-- エラー内容追加 -->
          <form class="errorAdd" action="errorpage" method="post">
            @csrf
            <input type="hidden" name="language" value="{{ $ses_lang }}">
            <input type="hidden" name="errorFirst" value="{{ $ses_list }}">
            <textarea class="textareas" row=5 col=100 type="text" name="errorDetail" placeholder="エラー追加内容を入力してください">{{ old('errorDetail') }}</textarea>
            <button class="btn btn-default white-text" type="submit">エラー内容追加</button>
          </form>
        @endcan
      </ul>
    </div>
  @endforeach
</div>

@endsection
