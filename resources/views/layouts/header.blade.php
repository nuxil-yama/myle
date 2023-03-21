@section('header')
{{-- logout form --}}
{{-- <form id="logout-form" action="{{url('mypage/logout')}}" method="POST" style="display: none;">
  @csrf
</form> --}}
{{-- <a href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
</a> --}}
{{-- logout form --}}

<div class="whole-overlay"></div>
<header class="header {{Route::currentRouteName()}}">
  <div class="header__inner">
    <div class="header__brand">
      <a href="{{url('/')}}">
        <img src="{{url('dist/images/logo.svg')}}" alt="">
      </a>
    </div>
    <div class="header__toggle">
      <a href="javascript:void(0);">
        <span></span>
        <span></span>
        <span></span>
      </a>
    </div>
  </div>
</header>
@endsection
