@extends('layouts.common')

@section('title', '')
@section('keywords', '')
@section('description', '')

@section('pageCss') 
<link href="{{url('static/assets/css/page/tokushoho.min.css')}}" rel="stylesheet">
<style>
  h1 {
    text-align: center;
  }
</style>
@endsection

@include('layouts.head')

@include('layouts.header')


@section('content')
<main>
  <div class="sec-tokushoho">
    <div class="base">
      <h1 class="ttl-page center">
      特定商取引法に基づく表記
      </h1>
      <div class="inner">
          <div class="bx">
              <h2 class="ttl">販売事業者名</h2>
              <p class="txt">株式会社DILLACT</p>
          </div>
          <div class="bx">
              <h2 class="ttl">販売責任者</h2>
              <p class="txt">伊藤剛</p>
          </div>
          <div class="bx">
              <h2 class="ttl">所在地</h2>
              <p class="txt">東京都中央区銀座1丁目14‑5 銀座ウィングビル 7F</p>
          </div>
          <div class="bx">
              <h2 class="ttl">電話番号</h2>
              <p class="txt">
                  <a href="tel:03‑3528‑6450">03‑3528‑6450</a>
              </p>
          </div>
          <div class="bx">
              <h2 class="ttl">メールアドレス</h2>
              <p class="txt">
                  <a href="mailto:info@dillact.com">info@dillact.com</a>
              </p>
          </div>
          <div class="bx">
              <h2 class="ttl">サイト名</h2>
              <p class="txt">MYLE</p>
          </div>
          <div class="bx">
              <h2 class="ttl">ホームページ URL</h2>
              <p class="txt">
                  <a href="https://myle.work/" target="_blank">https://myle.work/</a>
              </p>
          </div>
          <div class="bx">
              <h2 class="ttl">販売価格</h2>
              <p class="txt">¥5,000/月</p>
          </div>
          <div class="bx">
              <h2 class="ttl">注文方法</h2>
              <p class="txt">インターネット</p>
          </div>
          <div class="bx">
              <h2 class="ttl">お支払いについて</h2>
              <p class="txt">クレジットカード</p>
          </div>
      </div>
    </div>
  </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{url('static/assets')}}/js/modernizr.js"></script>
<script src="{{url('static/assets')}}/js/common.min.js"></script>

<script>
    var ua = navigator.userAgent
    var sp = (ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0)
    if (sp) new ViewportExtra(375)
</script>
@endsection

@section('pageJs')
@endsection

{{-- @include('layouts.footer') --}}

