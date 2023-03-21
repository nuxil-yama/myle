@extends('layouts.common')

@section('title', 'テンプレート選択 | ')
@section('keywords', '')
@section('description', '')

@section('pageCss') 
<link href="{{url('dist/template/01/css/')}}/slick-theme.css" rel="stylesheet">
<link href="{{url('dist/template/01/css/')}}/slick.css" rel="stylesheet">
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
        <span>職種・テンプレートを変更する</span>
        <img src="{{url('dist/images/icon/ico_menu.svg')}}" alt="">
      </div>

    </div>
  </section>

  <form action="" method="post" class="step__form" enctype="multipart/form-data">
    @csrf
    <section class="step mt-40 max">
      <h2><span>職種・テンプレート</span></h2>
      <div class="input-select mt-12">  
        <select name="template" id="template">
          <option value="1">テンプレート1（職種名）</option>
          <option value="2">テンプレート2（職種名）</option>
          <option value="3">テンプレート3（職種名）</option>
        </select>
      </div>
    </section>

    <section class="template-slider">
      <div class="template-slider__inner">
        <div class="slider">
          <div class="box">
            <img src="{{url('dist/images/template/template01.jpg')}}" alt="">
          </div>
          <div class="box">
            <img src="{{url('dist/images/template/template02.jpg')}}" alt="">
          </div>
          <div class="box">
            <img src="{{url('dist/images/template/template03.jpg')}}" alt="">
          </div>
        </div>
      </div>
    </section>

    <div class="step mt-24">
      <div class="form-group__button mt-30">
        <button><span>次へ進む</span></button>
      </div>
    </div>

  </form>

</main>


@endsection

@section('pageJs')
<script src="{{url('dist/template/01')}}/js/slick.js"></script>
<script src="{{url('dist/template/01')}}/js/common.js"></script>
<script>
  $(".slider")
    .slick({
        infinite: true,
        dots: false,
        arrows: true,
        slidesToShow: 1,
        fade: false,
        centerPadding: '0',
        autoplay: false,
        centerMode: false,
        prevArrow: '<div class="btn btn-prev"></div>',
        nextArrow: '<div class="btn btn-next"></div>',
        responsive: [{
            breakpoint: 767,
            settings: {}
        }]
    })
</script>

@endsection

@include('layouts.footer')

