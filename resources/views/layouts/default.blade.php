<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','weibo app')-y1wanghui@163.com</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/sheet.css">
{{--    <link rel="stylesheet" href="{{ mix('css/app.css') }}">--}}
</head>
<body>
    @include('layouts._header')

    <div class="container">
        <div class="offset-md-1 col-md-10">
            @include('shared._messages')
            @yield('content')
            @include('layouts._footer')
        </div>
    </div>
</body>
</html>
