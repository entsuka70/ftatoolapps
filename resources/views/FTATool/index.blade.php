@extends('layouts.flame')

@section('title', 'FTATOOL')

@section('content')
  <div class="introduction py-5 my-5 default-color text-center">
    <h2><span class="toptitle">FTATOOL</span>利用ガイド</h2>
  </div>
  <div class="guide container my-5">
    <h3 class="midashi mb-4"><span class="toptitle">FTATOOL</span>とは</h3>
    <p><span class="toptitle">FTATOOL</span>とは、駆け出しエンジニアの為のエラー解決サイトです。</p>
    <p>現役エンジニアの皆さんは、エラーに出くわすと、上手にググり対処されていると思います。</p>
    <p>しかし、駆けだしエンジニアの方は、ググり方のコツがわからず、中々苦労されていると思います。</p>
    <p>時には解決できず、志半ばで挫折されてしまう方もいらっしゃるのではないでしょうか。</p>
    <p>それでは、勿体無いです。何か力になれる事はないかと思い、こちらのサービスを立ち上げました。</p>
  </div>
  <div class="howto container my-5">
    <h3 class="midashi mb-4"><span class="toptitle">FTATOOL</span>でできること</h3>
    <p><span class="toptitle">FTATOOL</span>は、FTA(Fault Tree Analysis)の概念を用いたサービスとなっています。</p>
    <p>その為、従来のエラー解決サイトでできなかった、エラーに対して俯瞰的に対処方法を自分自身で絞りむことができます。</p>
    <p>また、エラーでつまずいた対策を投稿することで、シェアすることができます！</p>
    <p>エラーに遭遇しましたら、こちらのサービスを用いて、要因を一つずつ潰していき、エラー対処していきましょう。</p>
    <p>繰り返すうちに、エラーに対して恐怖心はなくなるはずです。</p>
    <p>ぜひ、こちらのサービスを利用してプログラミングを楽しみましょう！</p>
  </div>
  <div class="language container my-5">
    <h3 class="midashi mb-4">エラーを探そう</h3>
    <p>調べたい言語とエラーの種類をチェックしてエラー対処方を探してください。</p>
    <h4 class="language-list my-4">プログラミング言語</h4>
    <form class="" action="ftatool" method="post">
      @csrf
      <div class="row">
        <div class="language-radio col-md-3 col-sm-6">
          <div class="language-radiobox my-4">
            <label class="btn btn-default language-label px-2 py-4">
              <input class="language-input" type="radio" name="language" value="PHP" checked="checked"><span class="language-span">PHP</span>
            </label>
          </div>
        </div>
        <div class="language-radio col-md-3 col-sm-6">
          <div class="language-radiobox my-4">
            <label class="btn btn-default language-label px-2 py-4">
              <input class="language-input" type="radio" name="language" value="HTML"><span class="language-span">HTML</span>
            </label>
          </div>
        </div>
        <div class="language-radio col-md-3 col-sm-6">
          <div class="language-radiobox my-4">
            <label class="btn btn-default language-label px-2 py-4">
              <input class="language-input" type="radio" name="language" value="CSS"><span class="language-span">CSS</span>
            </label>
          </div>
        </div>
        <div class="language-radio col-md-3 col-sm-6">
          <div class="language-radiobox my-4">
            <label class="btn btn-default language-label px-2 py-4">
              <input class="language-input" type="radio" name="language" value="Javascript"><span class="language-span">Javascript</span>
            </label>
          </div>
        </div>
      </div>
      <h4 class="language-list my-4">エラー要因を絞り込む</h4>
      <div class="language-error">
        <ul class="php-error">
          <li>
            <label class="error-list">
              <input type="checkbox" name="errorFirst[]" value="E_PARSE">E_PARSE
            </label>
          </li>
          <li>
            <label class="error-list">
              <input type="checkbox" name="errorFirst[]" value="E_ERROR">E_ERROR
            </label>
          </li>
          <li>
            <label class="error-list">
              <input type="checkbox" name="errorFirst[]" value="E_WARNING">E_WARNING
            </label>
          </li>
          <li>
            <label class="error-list">
              <input type="checkbox" name="errorFirst[]" value="E_NOTICE">E_NOTICE
            </label>
          </li>
        </ul>
        <ul class="html-error">
          <li>
            <label class="error-list">
              Coming soon
            </label>
          </li>
        </ul>
        <ul class="css-error">
          <li>
            <label class="error-list">
              Coming soon
            </label>
          </li>
        </ul>
        <ul class="javascript-error">
          <li>
            <label class="error-list">
              Coming soon
            </label>
          </li>
        </ul>
      </div>
      @if($errors->has('errorFirst'))
        <h4 class="alert alert-danger">{{ $errors->first('errorFirst') }}</h4>
      @endif
      <div class="search-button">
        <button type="submit" name="button" class="btn btn-info search-error">検索する</button>
      </div>
    </form>
  </div>
@endsection
