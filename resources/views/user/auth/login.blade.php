@extends('layouts.common')

@section('title', 'ログイン | ')
@section('keywords', '')
@section('description', '')

@section('pageCss') 
@endsection

@include('layouts.head')

{{-- @include('layouts.header') --}}


@section('content')
<main>
  <section class="account-page">
    <div class="account-page__row">
      <div class="account-page__col">
        <div class="account-page__col--form account-page__col--form--login">
          <div class="account-page__col--form__box">

            <img src="{{url('dist/images/logo.svg')}}" alt="">

            <div class="account-page__col--form__line-btn">
              <a href="{{$line_signup_url}}">
                <img src="{{url('dist/images/icon/ico_line.svg')}}" alt="">
                <span>LINEでログイン</span>
              </a>
            </div>

            <div class="account-page__col--form__hr">
              <span>または</span>
            </div>

            <form action="" method="post">
              @csrf
              <div class="form-group">

                @if ($errors->any())
                  <div class="alert alert-danger mt-24">
                      @foreach ($errors->all() as $error)
                        {{ $error }}
                      @endforeach
                    </ul>
                  </div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger mt-24">
                    <p>{{session('error')}}</p>
                  </div>
                @endif

    
                <div class="input-text mt-24">
                  <label for="">
                    <span>メールアドレス</span>
                    <input type="email" name="email" placeholder="メールアドレス" required>
                  </label>
                </div>
                <div class="input-text mt-16">
                  <label for="">
                    <span>パスワード</span>
                    <input type="password" name="password" placeholder="パスワード" required>
                  </label>
                </div>


                <div class="form-group__button mt-40">
                  <input type="hidden" name="g_recaptcha_response" id="g_recaptcha_response">
                  <button>
                    <span>ログイン</span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="account-page__col">
        <div class="account-page__col--form__box--image"></div>
      </div>
    </div>
  </section>
</main>
@endsection

@section('pageJs')
@endsection

@include('layouts.footer')
