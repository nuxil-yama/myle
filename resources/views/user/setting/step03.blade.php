@extends('layouts.common')

@section('title', '情報入力 STEP3 | ')
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
          <div style="width:75%;"></div>
        </div>
        <div>
          <p>3/4</p>
        </div>
      </div>


      <form action="" method="post" class="step__form" enctype="multipart/form-data">
        @csrf
        <h2>
          <span>◆職種を選択ください</span>
          <small>※あとから編集可能です</small>
        </h2>

        <div class="input-select mt-24">  
          <select name="job" id="job">
            <option value="">選択してください</option>
            <option value="製造業" @if($user_meta['job'] == '製造業') selected @endif>製造業</option>
            <option value="建築業" @if($user_meta['job'] == '建築業') selected @endif>建築業</option>
            <option value="設備業" @if($user_meta['job'] == '設備業') selected @endif>設備業</option>
            <option value="運輸業" @if($user_meta['job'] == '運輸業') selected @endif>運輸業</option>
            <option value="流通業" @if($user_meta['job'] == '流通業') selected @endif>流通業</option>
            <option value="農林水産業" @if($user_meta['job'] == '農林水産業') selected @endif>農林水産業</option>
            <option value="印刷・出版業" @if($user_meta['job'] == '印刷・出版業') selected @endif>印刷・出版業</option>
            <option value="金融業・保険業" @if($user_meta['job'] == '金融業・保険業') selected @endif>金融業・保険業</option>
            <option value="不動産業" @if($user_meta['job'] == '不動産業') selected @endif>不動産業</option>
            <option value="IT・情報通信業" @if($user_meta['job'] == 'IT・情報通信業') selected @endif>IT・情報通信業</option>
            <option value="サービス業" @if($user_meta['job'] == 'サービス業') selected @endif>サービス業</option>
            <option value="教育・研究機関" @if($user_meta['job'] == '教育・研究機関') selected @endif>教育・研究機関</option>
            <option value="病院・医療機関" @if($user_meta['job'] == '病院・医療機関') selected @endif>病院・医療機関</option>
            <option value="官公庁・自治体" @if($user_meta['job'] == '官公庁・自治体') selected @endif>官公庁・自治体</option>
            <option value="法人団体" @if($user_meta['job'] == '法人団体') selected @endif>法人団体</option>
            <option value="その他の業種" @if($user_meta['job'] == 'その他の業種') selected @endif>その他の業種</option>
          </select>
        </div>


        <div class="input-file mt-26">
          <p>
            <span>◆プロフィール写真をアップロード</span>
            <small>※あとから編集可能です</small>
          </p>
          <label for="photo">
            <input type="file" name="photo" id="photo">
            <span>
              <span>アップロード</span>
              <div style="background-image:url({{$user_meta['profile']}});"></div>
            </span>
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
