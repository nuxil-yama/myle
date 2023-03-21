@extends('layouts.common')

@section('title', '仮登録完了 | ')
@section('keywords', '')
@section('description', '')

@section('pageCss') 
@endsection

@include('layouts.head')

@include('layouts.220801.header')


@section('content')
<main>
  <section class="account-page">
    <div class="inner">
      {{-- <h1>Welcome to MARSCREW.</h1> --}}
      <div class="account-page__row pb-100">
        <div class="full sp-mt-20">
          <h2><span>仮登録完了</span></h2>
          <p>
            ありがとうございます。<br>
            仮登録をしました。お送りしたメールを確認して本登録をお願いいたします。<br>
            <br>
            ※Gmail等の場合、迷惑メールに届いていることがあるため、もし届いていない場合は迷惑メールフォルダもご確認ください。
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

