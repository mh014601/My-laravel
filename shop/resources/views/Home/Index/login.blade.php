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

<div class="login-boxtitle">
    <a href="home.html"><img alt="logo" src="{{asset('images/logobig.png')}}" /></a>
</div>

<div class="login-banner">
    <div class="login-main">
        <div class="login-banner-bg"><span></span><img src="{{asset('images/big.jpg')}}" /></div>
        <div class="login-box">

            <h3 class="title">登录商城</h3>

            <div class="clear"></div>

            <div class="login-form">
                <form action="{{url('Home/Index/loginAction')}}" method="post" id="form1">
                    <input type="hidden" value="{{$returnUrl}}" name="returnUrl">
                    {{csrf_field()}}

                    <div class="user-name">
                        <label for="user"><i class="am-icon-user"></i></label>
                        <input type="text" name="user" id="user" placeholder="邮箱/手机/用户名">
                    </div>
                    <div class="user-pass">
                        <label for="password"><i class="am-icon-lock"></i></label>
                        <input type="password" name="upass" id="password" placeholder="请输入密码">
                    </div>
                </form>
            </div>

            <div class="login-links">
                <label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
                <a href="{{url('Home/Index/returnpass')}}" class="am-fr">忘记密码</a>
                <a href="{{url('Home/Index/register')}}" class="zcnext am-fr am-btn-default">注册</a>
                <br />
            </div>
            <div class="am-cf">
                <input type="submit" name="" id="login" value="登 录" class="am-btn am-btn-primary am-btn-sm">
            </div>
            <div class="partner">
                <h3>合作账号</h3>
                <div class="am-btn-group">
                    <li><a href="https://graph.qq.com/oauth2.0/authorize?
response_type=code&client_id=101511175&redirect_uri={{$url}}&state=test"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
                    <li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
                    <li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer ">
    <div class="footer-hd ">
        <p>
            <a href="# ">恒望科技</a>
            <b>|</b>
            <a href="# ">商城首页</a>
            <b>|</b>
            <a href="# ">支付宝</a>
            <b>|</b>
            <a href="# ">物流</a>
        </p>
    </div>
    <div class="footer-bd ">
        <p>
            <a href="# ">关于恒望</a>
            <a href="# ">合作伙伴</a>
            <a href="# ">联系我们</a>
            <a href="# ">网站地图</a>
            <em>© 2015-2025 Hengwang.com 版权所有</em>
        </p>
    </div>
</div>
{{--<script>--}}
{{--    $('#uname').blur(function (){--}}
{{--        uname = $(this).val();--}}
{{--        var reg_uname = /^[a-zA-Z]\w{3,15}$/;--}}
{{--        if(!reg_uname.test(uname)){--}}
{{--            alert('用户名不正确');--}}
{{--        }--}}
{{--    });--}}
{{--    $('#pass').blur(function (){--}}
{{--        pass = $(this).val();--}}
{{--        var reg_pass = /^[a-z+A-Z+0-9+]{3,15}$/;--}}
{{--        if(!reg_pass.test(pass)){--}}
{{--            alert('对不起，密码格式错误');--}}
{{--        }--}}
{{--    });--}}
{{--    $('#reg').click(function (){--}}
{{--        $.get('{{url("/Login_Register/reg/regAjax")}}',{uname:uname,pass:pass},function(data){--}}
{{--            if(data.code==0){--}}
{{--                window.location.href="{{url('/index')}}";--}}
{{--            }else{--}}
{{--                alert('账户或密码不正确');--}}
{{--            }--}}
{{--        })--}}
{{--    })--}}
{{--</script>--}}

</body>

</html>

<script>
    $('#user').blur(function(){
        var user = $('#user').val();
        if (user == ""){
            // alert('用户名不能为空')
            layui.use('layer', function(){
                var layer = layui.layer;
                layer.msg('用户名不能为空');
            });
        }
    })
    $('#password').blur(function(){
        var pass = $('#password').val();
        if (pass == ""){
            // alert('密码不能为空')
            layui.use('layer', function() {
                var layer = layui.layer;
                layer.msg('密码不能为空');
            });
        }

    })

    $('#login').click(function () {
        var user1 = $('#user').val();
        var pass1 = $('#password').val();

        var sss = null;
        if(user1 != "" && pass1 != ""){
            // 判断是否是邮箱
            var reg1 =/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/
            //判断是否是11位有效的电话号
            var reg2 =/^[1][3,4,5,7,8,9][0-9]{9}$/
            if(reg1.test(user1)){
                sss = "email"
            }else if (reg2.test(user1)){
                sss = "phone"
            }else{
                sss = "username"
            }
            $('#user').after("<input type='hidden' name='hidd' value="+sss+">");
            //点击提交form表单
            $('#form1').submit();
        }else{
            // alert("用户名或密码不能为空")
            layui.use('layer', function() {
                var layer = layui.layer;
                layer.msg('用户名和密码为必填!');
            });

        }
    })




</script>