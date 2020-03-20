<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>找回密码</title>

    <link href="{{asset('AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/stepstyle.css')}}" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{asset('js/jquery-1.7.2.min.js')}}"></script>
    <script src="{{asset('AmazeUI-2.4.2/assets/js/amazeui.js')}}"></script>
    <script src="{{asset('layui/layui/layui.js')}}"></script>

</head>

<body>
<!--头 -->
<header>
    <article>
        <div class="mt-logo">
            <!--顶部导航条 -->
            <div class="am-container header">
                <ul class="message-l">
                    <div class="topMessage">
                        <div class="menu-hd">
                            <a href="{{url('/')}}" target="_top" class="h">返回</a>
                            <a href="{{url('Home/Index/register')}}" target="_top">免费注册</a>
                        </div>
                    </div>
                </ul>
                <ul class="message-r">
                    <div class="topMessage home">
                        <div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
                    </div>
                    <div class="topMessage my-shangcheng">
                        <div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
                    </div>
                    <div class="topMessage mini-cart">
                        <div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
                    </div>
                    <div class="topMessage favorite">
                        <div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
                    </div></ul>
            </div>

            <!--悬浮搜索框-->

            <div class="nav white">
                <div class="logoBig">
                    <li><img src="{{asset('images/logobig.png')}}" /></li>
                </div>

                <div class="search-bar pr">
                    <a name="index_none_header_sysc" href="#"></a>
                    <form>
                        <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
                        <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
                    </form>
                </div>
            </div>

            <div class="clear"></div>
        </div>
        </div>
    </article>
</header>
<div class="nav-table">
    <div class="long-title"><span class="all-goods">全部分类</span></div>
    <div class="nav-cont">
        <ul>
            <li class="index"><a href="#">首页</a></li>
            <li class="qc"><a href="#">闪购</a></li>
            <li class="qc"><a href="#">限时抢</a></li>
            <li class="qc"><a href="#">团购</a></li>
            <li class="qc last"><a href="#">大包装</a></li>
        </ul>
        <div class="nav-extra">
            <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
            <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
        </div>
    </div>
</div>
<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">

            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">找回密码</strong> / <small>Set&nbsp;Pay&nbsp;Password</small></div>
            </div>
            <hr/>
            <!--进度条-->
            <div class="m-progress">
                <div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">设置支付密码</p>
                            </span>
                    <span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
                    <span class="u-progress-placeholder"></span>
                </div>
                <div class="u-progress-bar total-steps-2">
                    <div class="u-progress-bar-inner"></div>
                </div>
            </div>
            <form class="am-form am-form-horizontal">
                <div class="am-form-group bind">
                    <label for="user-phone" class="am-form-label">手机验证</label>

                    <div class="am-form-content">
                        <input type="tel" name="phone" id="phone" placeholder="请输入手机号">
                    </div>
                </div>
                <div class="am-form-group code">
                    <label for="user-code" class="am-form-label">验证码</label>
                    <div class="am-form-content">
                        <input type="tel" name="phoneCode" id="code" placeholder="短信验证码">
                    </div>
                    <a class="btn" href="javascript:void(0);" name="sendMobileCode();" id="sendMobileCode">
                        <div class="am-btn am-btn-danger">发送验证码</div>
                    </a>
                </div>
                <div class="am-form-group">
                    <label for="user-password" class="am-form-label">设置密码</label>
                    <div class="am-form-content">
                        <input type="tel" id="password1" placeholder="6位数字">
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-confirm-password" class="am-form-label">确认密码</label>
                    <div class="am-form-content">
                        <input type="tel" id="conPassword" placeholder="请再次输入上面的密码">
                    </div>
                </div>
                <div class="info-btn">
                    <span class="am-btn am-btn-danger" id="baoCun" >保存修改</span>
                </div>

            </form>
            <form class="am-form am-form-horizontal">
                <div class="am-form-group bind">
                    <label for="user-phone" class="am-form-label">邮箱验证</label>
                    <div class="am-form-content">
                        <input type="tel" name="email" id="email" placeholder="请输入邮箱号">
                    </div>
                </div>
                <div class="am-form-group code">
                    <label for="user-code" class="am-form-label">验证码</label>
                    <div class="am-form-content">
                        <input type="tel" id="emailCode" placeholder="邮箱验证码">
                    </div>
                    <a class="btn" href="javascript:void(0);" name="sendEmailCode" id="sendEmailCode">
                        <div class="am-btn am-btn-danger">发送验证码</div>
                    </a>
                </div>
                <div class="am-form-group">
                    <label for="user-password" class="am-form-label">设置密码</label>
                    <div class="am-form-content">
                        <input type="password" id="password" placeholder="6位数字">
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-confirm-password" class="am-form-label">确认密码</label>
                    <div class="am-form-content">
                        <input type="password" id="repassword" placeholder="请再次输入上面的密码">
                    </div>
                </div>
                <div class="info-btn">
{{--                    <div class="am-btn am-btn-danger">保存修改</div>--}}
                    <span class="am-btn am-btn-danger" id="xiugai" >保存修改</span>
                </div>

            </form>

        </div>
        <!--底部-->
        <div class="footer">
            <div class="footer-hd">
                <p>
                    <a href="#">恒望科技</a>
                    <b>|</b>
                    <a href="#">商城首页</a>
                    <b>|</b>
                    <a href="#">支付宝</a>
                    <b>|</b>
                    <a href="#">物流</a>
                </p>
            </div>
            <div class="footer-bd">
                <p>
                    <a href="#">关于恒望</a>
                    <a href="#">合作伙伴</a>
                    <a href="#">联系我们</a>
                    <a href="#">网站地图</a>
                    <em>© 2015-2025 Hengwang.com 版权所有</em>
                </p>
            </div>
        </div>
    </div>
    <aside class="menu">
        <ul>
            <li class="person active">
                <a href="index.html"><i class="am-icon-user"></i>个人中心</a>
            </li>
            <li class="person">
                <p><i class="am-icon-newspaper-o"></i>个人资料</p>
                <ul>
                    <li> <a href="{{url('Home/Infor/information')}}">个人信息</a></li>
                    <li> <a href="{{url('Home/Infor/safety')}}">安全设置</a></li>
                    <li> <a href="{{url('Person/address')}}?uid={{session()->get('uid')}}">地址管理</a></li>
                    <li> <a href="cardlist.html">快捷支付</a></li>
                </ul>
            </li>
            <li class="person">
                <p><i class="am-icon-balance-scale"></i>我的交易</p>
                <ul>
                    <li><a href="{{url('Person/order')}}">订单管理</a></li>
                    <li> <a href="change.html">退款售后</a></li>
                    <li> <a href="comment.html">评价商品</a></li>
                </ul>
            </li>
            <li class="person">
                <p><i class="am-icon-dollar"></i>我的资产</p>
                <ul>
                    <li> <a href="points.html">我的积分</a></li>
                    <li> <a href="coupon.html">优惠券 </a></li>
                    <li> <a href="bonus.html">红包</a></li>
                    <li> <a href="walletlist.html">账户余额</a></li>
                    <li> <a href="bill.html">账单明细</a></li>
                </ul>
            </li>

            <li class="person">
                <p><i class="am-icon-tags"></i>我的收藏</p>
                <ul>
                    <li> <a href="{{url('Goods/collection')}}">收藏</a></li>
                    <li> <a href="{{url('Goods/goodsfoot')}}">足迹</a></li>
                </ul>
            </li>

            <li class="person">
                <p><i class="am-icon-qq"></i>在线客服</p>
                <ul>
                    <li> <a href="consultation.html">商品咨询</a></li>
                    <li> <a href="suggest.html">意见反馈</a></li>

                    <li> <a href="news.html">我的消息</a></li>
                </ul>
            </li>
        </ul>

    </aside>

</div>
<script>
    $('#email').blur(function () {
        var email = $('#email').val();
        var email_reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/;
        if (!email_reg.test(email)) {
            layui.use('layer', function () {
                var layer = layui.layer;
                layer.msg('邮箱格式不正确!');
            })
        }
    })
    //发送邮件
    $('#sendEmailCode').click(function () {
        var email = $('#email').val();
        var _token = "{{csrf_token()}}"
        var email_reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/;
        if(!email_reg.test(email)){
            alert("邮箱格式不正确")
            return false;
        }else{
            $.get("{{url('Mail/sendText')}}",{email:email,_token:_token},function (data) {
                if(data.status==1){
                    alert('发送失败...');
                }else{
                    alert('发送成功！')
                }
            },'json')
        }
    });
    //失去焦点验证邮箱验证码
    $("#emailCode").blur(function () {
        var verify = $('#emailCode').val();
        var email = $('#email').val();
        if(verify!=""){
            var _token = "{{csrf_token()}}";
            $.post("{{url('Mail/checkEmail')}}",{_token:_token,verify:verify,email:email},function(data){
                alert(data["mess1"])

            },'json')

        }else{
            layui.use('layer', function() {
                var layer = layui.layer;
                layer.msg('验证码不能为空');
            })
        }
    })
    //验证密码格式
    $('#password').blur(function () {
        var password = $('#password').val();
        var password_reg = /^\d{6}$/;
        if(!password_reg.test(password)){
            layui.use('layer', function() {
                var layer = layui.layer;
                layer.msg('请输入6位数字!');
            })
        }
    })
    //确认密码
    $('#repassword').blur(function () {
        var repassword = $(this).val();
        var password = $('#password').val();
        if(repassword != password){
            layui.use('layer', function() {
                var layer = layui.layer;
                layer.msg('确认密码和设置密码不一致!');
            })
        }
    });
    //保存修改
    $('#xiugai').click(function () {
        var password = $('#password').val();
        var _token = "{{csrf_token()}}";
        var email = $('#email').val();
        $.get("{{url('Home/Index/returnpassAction')}}",{password:password,_token:_token,email:email},function(data) {
            if(data.status==2){
                layui.use('layer', function() {
                    var layer = layui.layer;
                    layer.msg('此邮箱用户不存在!');
                })

            }else if(data.status==0){
                layui.use('layer', function() {
                    var layer = layui.layer;
                    layer.msg('密码成功找回!');
                    location.href="{{url('Home/Index/login')}}";
                })
            }else{
                layui.use('layer', function() {
                    var layer = layui.layer;
                    layer.msg('密码找回失败!');
                })
            }
        },'json')
    })
</script>
//手机号找回
<script>
//验证手机格式及是否已注册
$('#phone').blur(function () {
    var reg = /^[1][3,4,5,7,8,9][0-9]{9}$/;
    var phone = $('#phone').val();
    var _token = "{{csrf_token()}}";
    if(!reg.test(phone)){
        layui.use('layer', function() {
            var layer = layui.layer;
            layer.msg('请输入正确的手机号');
        })
    }else{
        $.post("{{url('Home/Index/checkphone')}}",{_token:_token,phone:phone},function(data){
            alert(data['messphone'])

        },'json')

    }
})
//点击发送验证码
$('#sendMobileCode').click(function () {
    var phone = $('#phone').val();
    var _token = "{{csrf_token()}}";
    $.get("{{url('Home/Index/reg')}}",{phone:phone,_token:_token},function (data) {
        layui.use('layer', function() {
            var layer = layui.layer;
            layer.msg(data['mess']);

        });
    },'json')
})
//失去焦点时验证验证码的正确性
$("#code").blur(function () {
    var verify = $('#code').val();
    var phone2 = $('#phone').val();
    if(verify!=""){
        var _token = "{{csrf_token()}}";
        $.post("{{url('Home/Index/checkVerify')}}",{_token:_token,verify:verify,phone2:phone2},function(data){
            alert(data["mess1"])


        },'json')

    }else{
        layui.use('layer', function() {
            var layer = layui.layer;
            layer.msg('验证码不能为空');
        })
    }
})
//验证密码格式
$('#password1').blur(function () {
    var password1 = $('#password1').val();
    var password1_reg = /^\d{6}$/;
    if(!password1_reg.test(password1)){
        layui.use('layer', function() {
            var layer = layui.layer;
            layer.msg('请输入6位数字!');
        })
    }
})
//判定连两次密码一致
$('#conPassword').blur(function(){
    var pass = $('#password1').val();
    var passrep = $('#conPassword').val();
    if(pass != passrep) {
        layui.use('layer', function() {
            var layer = layui.layer;
            layer.msg('确认密码和设置密码不一致!');
        })
    }

})
//保存修改
$('#baoCun').click(function () {
    var password1 = $('#password1').val();
    var _token = "{{csrf_token()}}";
    var phone = $('#phone').val();
    $.get("{{url('Home/Index/phoneAction')}}",{password1:password1,_token:_token,phone:phone},function(data) {

        if(data.status==1){
            layui.use('layer', function() {
                var layer = layui.layer;
                layer.msg('密码成功找回!');
                location.href="{{url('Home/Index/login')}}";
            })
        }else{
            layui.use('layer', function() {
                var layer = layui.layer;
                layer.msg('密码找回失败!');
            })
        }
    },'json')
})

</script>
</body>

</html>