@extends('layouts.common')

@section('title', '404 Page Not Found | ')
@section('keywords', '')
@section('description', '')

@section('pageCss') 
@endsection

@include('layouts.head')

@include('layouts.header')


@section('content')
<main>
  <section class="account-page">
    <div class="inner">
      <div class="account-page__row">
        <div class="full">
          <img src="{{url('dist/images/logo.svg')}}" alt="">
          <h2><span>404 Page Not Found</span></h2>
          <p>
            ページが見つかりませんでした。<br>
            アクセスしているURLが正しいかご確認くださいませ。<br>
            <br>
            <a href="{{url('/')}}">トップページへ戻る</a>
          </p>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@section('pageJs')

@endsection

@include('layouts.footer')

