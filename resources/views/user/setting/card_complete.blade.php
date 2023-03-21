@extends('layouts.common')

@section('title', '手続き完了 | ')
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
        <strong>全ての手続きが完了しました。</strong>
        {{-- <span>支払い情報を追加して、あなただけのサイトを公開しましょう！</span> --}}
      </p>

      <blockquote>
        <p>
          マイページへアクセスし、あなたのページを確認しましょう。マイページでは下記の操作が可能です。
        </p>
        <ul>
          <li>登録した情報の変更</li>
          <li>デザインテンプレートの切り替え</li>
        </ul>
      </blockquote>

      <div class="form-group__button mt-30">
        <a href="{{url('mypage')}}">
          <span>マイページへ</span>
        </a>
      </div>


    </section>  
  </main>
</div>
@endsection

@section('pageJs')
@endsection

@include('layouts.footer')
