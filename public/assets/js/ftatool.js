// jQueryファイルの作成
// publicフォルダ内のjsフォルダ内に作成
// radioボタンにcheckedが入った際に動作を付与
// 動作をするクラスは{{ $item->status }}から取得

$(function(){
  $('[name="language"]:radio').change(function(){
    if($('[value="PHP"]').prop('checked')){
      $('.html-error').hide(1000);
      $('.php-error').show(1000);
      $('.css-error').hide(1000);
      $('.javascript-error').hide(1000);
    } else if($('[value="HTML"]').prop('checked')){
      $('.php-error').hide(1000);
      $('.html-error').show(1000);
      $('.css-error').hide(1000);
      $('.javascript-error').hide(1000);
    } else if($('[value="CSS"]').prop('checked')){
      $('.php-error').hide(1000);
      $('.html-error').hide(1000);
      $('.css-error').show(1000);
      $('.javascript-error').hide(1000);
    } else if($('[value="Javascript"]').prop('checked')){
      $('.php-error').hide(1000);
      $('.html-error').hide(1000);
      $('.css-error').hide(1000);
      $('.javascript-error').show(1000);
    }
  });
});
