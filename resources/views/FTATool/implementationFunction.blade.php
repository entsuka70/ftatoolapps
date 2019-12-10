@extends('layouts.flame')

@section('title', 'FTATOOL')

@section('content')

<div class="container">
  <h2 class="mb-3">実装機能一覧</h2>
  <ul>
    <li>ユーザー処理(新規登録・退会・ログイン・ログアウト・ユーザー情報更新)</li>
    <li>画像アップロード機能(AWS S3)</li>
    <li>タグ検索機能</li>
    <li>投稿機能(CRUD)</li>
    <li>コメント機能(CRUD)</li>
    <li>ユーザー別機能制限(ゲスト・ユーザー・管理者)</li>
    <li>いいね機能</li>
    <li>リレーション機能</li>
    <li>ページネーション機能</li>
    <li>ソート機能</li>
  </ul>
    <div class="row">
      <div class="col-4">
        <h3>作成者に関して</h3>
        <ul>
          <li>
            <a href="https://twitter.com/entsuka" target="_blank"><span><i class="fab fa-twitter"></i></span>Twitter</a>
          </li>
          <li>
            <a href="https://github.com/entsuka70" target="_blank"><span><i class="fab fa-github-square"></i></span>Github</a>
          </li>
        </ul>
      </div>
      <div class="col-4">
        <h3>その他ポートフォリオ</h3>
          <ul>
            <li>
              <a href="https://entsukablog.com" target="_blank">entsukablogにまとめてあります</a>
            </li>
          </ul>
      </div>

    </div>

</div>

@endsection
