@extends('layouts.common')

@section('title', '会員登録 | ')
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
                <span>LINEで新規登録</span>
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

                <div class="note-term">
                  <p class="txt">ご登録の前には以下の規約・ガイドラインをお読みください</p>
                  <ul>
                    <li><a href="{{url('/terms-of-service')}}">利用規約</a></li>
                    <li><a href="{{url('/privacy')}}">個人情報の取扱について</a></li>
                  </ul>
                </div>

                <div class="form-group__button mt-40">
                  <input type="hidden" name="g_recaptcha_response" id="g_recaptcha_response">
                  <button>
                    <span>新規登録</span>
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
<script src="https://www.google.com/recaptcha/api.js?render=6Lc1wuYkAAAAAMJjBsqjt1zZpJlVIXK2QO7T4ib-"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('6Lc1wuYkAAAAAMJjBsqjt1zZpJlVIXK2QO7T4ib-', {action: 'homepage'}).then(function(token) {
        var recaptchaResponse = document.getElementById('g_recaptcha_response');
        recaptchaResponse.value = token;
    });
});
</script>
@endsection

@section('pageJs')
@endsection

@include('layouts.footer')
