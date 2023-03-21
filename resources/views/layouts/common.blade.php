<html lang="ja">
<head>
@yield('head')

</head>
<body class="{{ Route::currentRouteName() }}">
  @yield('header')
  @yield('content')
  @yield('footer')
</body>
</html>
