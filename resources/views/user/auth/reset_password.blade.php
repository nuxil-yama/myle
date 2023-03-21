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
          <h2><span>Reset Password</span></h2>
          <p>
            新しいパスワードを入力してください
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
                <input type="password" name="password" placeholder="Password" required>
              </div>

              <div class="input-text mt-48 sp-mt-22">
                <input type="password" name="re_password" placeholder="Re Password" required>
              </div>

              <div class="form-group__button mt-40 sp-mt-32">
                <button>
                  <span>Reset Password</span>
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

