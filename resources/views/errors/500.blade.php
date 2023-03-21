@extends('layouts.common')

@section('title', 'サーバーエラー | ')
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
      <h1>Oops...!</h1>
      <div class="account-page__row">
        <div class="full">
          <h2><span>サーバーエラーが発生しました。</span></h2>
          <p>
            予期せぬエラーが発生しました。<br>
            急ぎ原因を究明しますので、しばらくお待ちいただけますでしょうか。<br>
            <br>
            お急ぎのご用件の方は、お電話ないしLINEにてご相談ください。
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

