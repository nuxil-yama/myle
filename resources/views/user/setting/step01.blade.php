@extends('layouts.common')

@section('title', '情報入力 STEP1 | ')
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
      @if (Auth::guard('web')->user()->first_setting_flag)
      <p>基本情報を変更してください。</p>  
      @else
      <p>基本情報を入力して、今すぐページを作成してみましょう！</p>  
      @endif

      <div class="step__progress">
        <div>
          <div></div>
          <div style="width:25%;"></div>
        </div>
        <div>
          <p>1/4</p>
        </div>
      </div>


      <form action="" method="post" class="step__form">
        @csrf
        <h2>
          <span>◆名刺情報をご入力ください</span>
          <small>※あとから編集可能です</small>
        </h2>

        <div class="input-text mt-24">
          <label for="">
            <span>お名前</span>
            <input type="text" name="name" placeholder="山田　太郎" value="{{$user_meta['name']}}">
          </label>
        </div>

        <div class="input-text mt-21">
          <label for="">
            <span>お名前（ふりがな）</span>
            <input type="text" name="name_kana" placeholder="やまだ たろう" value="{{$user_meta['name_kana']}}">
          </label>
        </div>

        <div class="input-text mt-21">
          <label for="">
            <span>お名前（ローマ字）</span>
            <input type="text" name="name_en" placeholder="YAMADA TARO" value="{{$user_meta['name_en']}}">
          </label>
        </div>

        <div class="input-text mt-21">
          <label for="">
            <span>役職・肩書き</span>
            <input type="text" name="department" placeholder="マネージャー" value="{{$user_meta['department']}}">
          </label>
        </div>

        <div class="input-text mt-21">
          <label for="">
            <span>会社名</span>
            <input type="text" name="company" placeholder="株式会社MYLE" value="{{$user_meta['company']}}">
          </label>
        </div>

        <div class="input-text mt-21">
          <label for="">
            <span>住所</span>
            <input type="text" name="address" placeholder="東京都渋谷区XXX" value="{{$user_meta['address']}}">
          </label>
        </div>

        <div class="input-text mt-21">
          <label for="">
            <span>電話番号</span>
            <input type="tel" name="tel" placeholder="000-0000-0000" value="{{$user_meta['tel']}}">
          </label>
        </div>


        <div class="form-group__button mt-30">
          <button>
            <span>次へ進む</span>
          </button>
        </div>

      </form>
    </section>  
  </main>
</div>
@endsection

@section('pageJs')
@endsection

@include('layouts.footer')
