@extends('layouts.common')

@section('title', '情報入力 STEP2 | ')
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
          <div style="width:50%;"></div>
        </div>
        <div>
          <p>2/4</p>
        </div>
      </div>


      <form action="" method="post" class="step__form">
        @csrf
        <h2>
          <span>◆SNS情報をご入力ください</span>
          <small>※あとから編集可能です</small>
        </h2>

        <div class="input-text mt-24">
          <label for="">
            <span>YouTube</span>
            <input type="text" name="youtube" placeholder="URL（IDではございません）" value="{{$user_meta['youtube']}}">
          </label>
        </div>

        <div class="input-text mt-21">
          <label for="">
            <span>Instagram</span>
            <input type="text" name="instagram" placeholder="URL（IDではございません）" value="{{$user_meta['instagram']}}">
          </label>
        </div>

        <div class="input-text mt-21">
          <label for="">
            <span>Twitter</span>
            <input type="text" name="twitter" placeholder="URL（IDではございません）" value="{{$user_meta['twitter']}}">
          </label>
        </div>

        <div class="input-text mt-21">
          <label for="">
            <span>TikTok</span>
            <input type="text" name="tiktok" placeholder="URL（IDではございません）" value="{{$user_meta['tiktok']}}">
          </label>
        </div>

        <div class="input-text mt-21">
          <label for="">
            <span>Facebook</span>
            <input type="text" name="facebook" placeholder="URL（IDではございません）" value="{{$user_meta['facebook']}}">
          </label>
        </div>

        <div class="input-text mt-21">
          <label for="">
            <span>LINE</span>
            <input type="text" name="line" placeholder="URL（IDではございません）" value="{{$user_meta['line']}}">
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
