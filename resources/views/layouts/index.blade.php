<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="icon" sizes="32x32" href="{{asset('images/favicon.jpg')}}" type="image/jpg">
    @yield('head')
</head>
<body>
<div id="app">
    @include('include.header.index')
    @yield('content')
    @include('include.footer.index')
</div>
@include('include/footer-cdn')
@yield('footer')
</body>
</html>
