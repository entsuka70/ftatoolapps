@extends('layouts.flame')

@section('title', 'FTATOOL')

@section('content')
  <main class="main_image">
    <img class="top-image" src="{{ secure_asset('assets/img/topimage.jpg') }}" alt="FTATOOL">
    <div class="top-messageh jq-trigger">
      <h2 class="top-h2 jq-fade text-default">FTATOOL</h2>
      <h3 class="top-h3 jq-fade blue-grey-text mt-5">~エラーを探そう~</h3>
    </div>
  </main>
  <section class="language container my-5">
    <h4 class="language-list midashi my-4"><span><i class="far fa-check-circle"></i></span>プログラミング言語</h4>
    <p>調べたい言語とエラーの種類をチェックしてエラー対処方を探してください。</p>
    <form class="" action="ftatool" method="post">
      @csrf
      <div class="row">
        <div class="language-radio col-md-3 col-sm-6">
          <div class="language-radiobox my-4">
            <label class="btn-square-pop language-label px-2 py-4 selected">
              <input class="language-input" type="radio" name="language" value="PHP" checked="checked">
              <span class="language-span">PHP</span>
            </label>
          </div>
        </div>
        <div class="language-radio col-md-3 col-sm-6">
          <div class="language-radiobox my-4">
            <label class="btn-square-pop language-label px-2 py-4">
              <input class="language-input" type="radio" name="language" value="HTML">
              <span class="language-span">HTML</span>
            </label>
          </div>
        </div>
        <div class="language-radio col-md-3 col-sm-6">
          <div class="language-radiobox my-4">
            <label class="btn-square-pop language-label px-2 py-4">
              <input class="language-input" type="radio" name="language" value="CSS">
              <span class="language-span">CSS</span>
            </label>
          </div>
        </div>
        <div class="language-radio col-md-3 col-sm-6">
          <div class="language-radiobox my-4">
            <label class="btn-square-pop language-label px-2 py-4">
              <input class="language-input" type="radio" name="language" value="Javascript">
              <span class="language-span">Javascript</span>
            </label>
          </div>
        </div>
      </div>
      <h4 class="language-list midashi my-4"><span><i class="far fa-check-circle"></i></span>エラー要因を絞り込む</h4>
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
        <button type="submit" name="button" class="btn btn-outline-default waves-effect search-error">検索する</button>
      </div>
    </form>
  </section>
@endsection
