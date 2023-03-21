@extends('layouts.common')

@section('title', 'マイページ | ')
@section('keywords', '')
@section('description', '')

@section('pageCss') 
@endsection

@include('layouts.head')

@include('layouts.header')


@section('content')
<main>
  <section class="mypage">
    <div class="mypage__menu">
      @if (session('success'))
        <div class="alert alert-success mt-24">
          <p>{{session('success')}}</p>
        </div>
      @endif

      <div class="mypage__menu--header">
        <span>管理画面TOP</span>
        <img src="{{url('dist/images/icon/ico_menu.svg')}}" alt="">
      </div>
      <div class="mypage__menu--body">
        <ul>
          <li>
            <a href="{{url('mypage/setting/step01')}}">
              <span>登録情報を編集する</span>
            </a>
          </li>
          <li>
            <a href="{{url('mypage/setting/template')}}">
              <span>職種・テンプレートを変更する</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <h2>◆あなたのページのURL</h2>
    <div class="mypage__url">
      <a href="{{url(Auth::guard('web')->user()->url)}}" target="_blank">
        <strong>{{url(Auth::guard('web')->user()->url)}}</strong>
        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="15.905" height="15.906" viewBox="0 0 15.905 15.906">
          <g id="リンクのフリーアイコン5" transform="translate(-0.005 0.002)">
            <path id="パス_22" data-name="パス 22" d="M197.671,3.192a3.955,3.955,0,0,0-2.389-2.9,3.943,3.943,0,0,0-4.275.867l-3.062,3.063a.592.592,0,0,0-.045.048.088.088,0,0,1,.016,0,4.71,4.71,0,0,1,2.676.243l.014.005,1.88-1.88a1.859,1.859,0,0,1,3.034.614,1.862,1.862,0,0,1,.1,1.055,1.838,1.838,0,0,1-.51.957L192.046,8.32a1.837,1.837,0,0,1-.613.409,1.88,1.88,0,0,1-1.056.1,1.858,1.858,0,0,1-1.308-1l-.027-.006a1.081,1.081,0,0,0-.972.3l-.06.061a1.2,1.2,0,0,0-.066,1.61,3.945,3.945,0,0,0,5.579,0l3.063-3.063a3.943,3.943,0,0,0,1.083-3.542Z" transform="translate(-181.832)" fill="#404141"/>
            <path id="パス_23" data-name="パス 23" d="M7.158,165.809l-.015-.006-1.88,1.88a1.856,1.856,0,0,1-3.135-1.669,1.834,1.834,0,0,1,.51-.957L5.7,161.993a1.835,1.835,0,0,1,.613-.407,1.859,1.859,0,0,1,2.364.9l.027.007a1.109,1.109,0,0,0,.614-.064,1.092,1.092,0,0,0,.358-.242l.06-.06a1.2,1.2,0,0,0,.066-1.61,3.945,3.945,0,0,0-5.58,0l-3.062,3.064a3.894,3.894,0,0,0-.866,1.306,3.945,3.945,0,0,0,6.446,4.273L9.8,166.1c.016-.014.031-.031.045-.045l-.016,0A4.717,4.717,0,0,1,7.158,165.809Z" transform="translate(0 -154.412)" fill="#404141"/>
          </g>
        </svg> --}}
      </a>
    </div>
  </section>
</main>


@endsection

@section('pageJs')
@endsection

@include('layouts.footer')

