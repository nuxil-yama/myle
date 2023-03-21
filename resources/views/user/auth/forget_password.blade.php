@extends('layouts.common')

@section('title', 'パスワード再発行 | ')
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
      <div class="account-page__row">
        <div class="full sp-mt-20">
          <h2><span>Forgot Password?</span></h2>
          <p>
            メールアドレスを入力すると、パスワードをリセットするためのリンクが送信されます。
          </p>

          <form action="" method="post">
            @csrf


            @error('error')
              <div class="alert alert-danger">
                <p>{{$message}}</p>
              </div>
            @enderror

            <div class="form-group mt-32 sp-mt-24">
              <div class="input-text">
                <input type="email" name="email" placeholder="Mail Address" required>
              </div>

              <div class="form-group__button mt-40 sp-mt-32">
                <button>
                  <span>Send Password Reset Link</span>
                </button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </section>
</main>
@endsection

@section('pageJs')

@endsection

@include('layouts.footer')

