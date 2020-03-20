<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="stylesheet" href="{{asset('AmazeUI-2.4.2/assets/css/amazeui.css')}}" />
    <link href="{{asset('css/dlstyle.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('AmazeUI-2.4.2/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('AmazeUI-2.4.2/jquery-1.11.0.js')}}"></script>
    <script src="{{asset('layui/layui/layui.js')}}"></script>

</head>

<body>

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            登录
        </button>

        <a class="btn btn-link" href="{{ route('password.request') }}">
            忘记密码?
        </a>
        <a class="btn btn-link" href="{{route('socialite_login_form','qq')}}"><i class="fa fa-qq"></i> qq登录</a>
    </div>
</div>
————————————————

</body>

</html>

</script>