@extends('layouts.common')

@section('title', '情報入力 STEP4 | ')
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
          <div style="width:100%;"></div>
        </div>
        <div>
          <p>4/4</p>
        </div>
      </div>


      <form action="" method="post" class="step__form" enctype="multipart/form-data">
        @csrf
        <h2>
          <span>◆ページのURLを入力</span>
          {{-- <small>※あとから編集可能です</small> --}}
        </h2>

        <div class="input-inline-text mt-18">
          <label for="">
            <span>http://myle.com/</span>
            <input type="text" name="url" placeholder="taro_yamada" required value="{{Auth::guard('web')->user()->url}}">
          </label>
        </div>

        
        <h2>
          <span>◆各種テキストを入力</span>
          <small>※あとから編集可能です</small>
        </h2>

        <div class="input-text mt-24">
          <label for="">
            <span>キャッチコピー</span>
            <input type="text" name="catch_copy" placeholder="“クライアントファースト”" value="{{$user_meta['catch_copy']}}">
          </label>
        </div>
        <div class="input-text mt-24">
          <label for="">
            <span>サブキャッチコピー</span>
            <textarea type="text" name="sub_catch_copy" placeholder="ゴールは「出逢えて良かった」と思っていただくこと。寄り添ったコミュニケーションで、あなたのご不安を解決します。">{{$user_meta['sub_catch_copy']}}</textarea>
          </label>
        </div>

        <div class="input-text mt-24">
          <label for="">
            <span>お客様へのメッセージタイトル</span>
            <input type="text" name="message_title" placeholder="" value="{{$user_meta['message_title']}}">
          </label>
        </div>

        <div class="input-text mt-24">
          <label for="">
            <span>お客様へのメッセージ本文</span>
            <textarea type="text" name="message_body" placeholder="">{{$user_meta['message_body']}}</textarea>
          </label>
        </div>



        @if (Auth::guard('web')->user()->first_setting_flag)
        <div class="form-group__button mt-30">
          <button>
            <span>変更を完了する</span>
          </button>
        </div>
        @else
        <div class="form-group__button mt-30">
          <button>
            <span>サンプルページを見る</span>
          </button>
        </div>
        @endif
  

      </form>
    </section>  
  </main>
</div>
@endsection

@section('pageJs')
<script src="{{url('dist/js/load-image.all.min.js')}}"></script>
<script type="text/javascript">
  $('input[name="photo"]').on('change', function() {
    const file = $(this).prop('files')[0];
    var blobUrl = window.URL.createObjectURL(file);
    console.log(blobUrl);
    $('.input-file label span div').css('background-image', 'url('+blobUrl+')');
  });
</script>
@endsection

@include('layouts.footer')
