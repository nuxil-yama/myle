@extends('layouts.common')

@section('title', 'ページが完成しました！ | ')
@section('keywords', '')
@section('description', '')

@section('pageCss') 
@endsection

@include('layouts.head')

@include('layouts.header')


@section('content')
<div id="whole">
  <main>
    <section class="step">
      <p>
        <strong>ページが完成しました！</strong>
        <span>支払い情報を追加して、あなたのサイトを公開しましょう！</span>
      </p>


      <div class="step__preview">
        <iframe src="https://myle.nuxil.jp/shuji_yamagami" frameborder="0"></iframe>
      </div>

      <div class="form-group__button mt-30">
        <a href="{{$checkoutSession->url}}" target="_blank">
          <span>支払い情報に進む</span>
        </a>
      </div>


    </section>  
  </main>
</div>
@endsection

@section('pageJs')
@endsection

@include('layouts.footer')
