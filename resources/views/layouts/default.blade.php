<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','weibo app')-y1wanghui@163.com</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/sheet.css">

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
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.js"></script>

</body>
</html>
