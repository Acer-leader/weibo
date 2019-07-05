<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册确认链接</title>
</head>
<body>
    <h1>感谢您在 Weibo App 网站进行注册</h1>
    <p>
        请点击下方链接完成注册
        <a href="{{ route('confirm_email',$user->activation_token) }}"></a>
                 {{ route('confirm_email',$user->activation_token) }}
    </p>
    <p>
        如果不是你本人操作请忽略此邮件。
    </p>
</body>
</html>