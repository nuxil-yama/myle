@extends('layouts.common')

@section('title', 'メールアドレス登録 | ')
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
                    <span>メールアドレスを入力してください</span>
                    <input type="email" name="email" placeholder="メールアドレス" required>
                  </label>
                </div>


                <div class="form-group__button mt-40">
                  <input type="hidden" name="g_recaptcha_response" id="g_recaptcha_response">
                  <button>
                    <span>次に進む</span>
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
