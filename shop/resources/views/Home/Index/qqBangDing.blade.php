<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>个人资料</title>

    <link href="{{asset('AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('AmazeUI-2.4.2/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('AmazeUI-2.4.2/assets/js/amazeui.js')}}"></script>
    <script src="{{asset('layui/layui/layui.js')}}"></script>

    <link href="{{asset('layui/layui/css/layui.css')}}" rel="stylesheet" type="text/css">

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
                            {{--                            <a href="#" target="_top" class="h">亲，请登录</a>--}}
                            <a href="{{url('Home/Index/register')}}" target="_top">免费注册</a>
                            <a href="{{url('/')}}" target="_top">修改完成</a>
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
                </ul>
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

            <div class="user-info">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">请完善绑定信息</strong> / <small>Personal&nbsp;information</small></div>
                </div>
                <hr/>
                <!--头像 -->
                <form class="am-form am-form-horizontal" action="{{url('Home/Index/qqAction')}}" id="form1" method="get">
                    <!--个人信息 -->
                    <div class="info-main">
                        {{csrf_field()}}
{{--                        <div class="am-form-group">--}}
{{--                            <label for="user-name2" class="am-form-label" name="">昵称</label>--}}
{{--                            <div class="am-form-content">--}}
{{--                                <input type="text" id="username" value="" name="username" placeholder="用户名">--}}
{{--                                <small>昵称长度不能超过40个汉字</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">姓名</label>
                            <div class="am-form-content">
                                <input type="text" id="name" value="" name="name" placeholder="真实姓名">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-form-label">性别</label>
                            <div class="am-form-content sex">
                                <div class="layui-input-block">
                                    <input type="text" id="sex" value="" name="sex" placeholder="0:男;1:女;2:保密;">
                                </div>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-birth" class="am-form-label">出生日期</label>
                            <div class="am-form-content birth">
                                <div class="birth-select">
                                    <input type="text" value="" class="layui-input" id="birthday" name="birthday" placeholder="y-m-d">
                                </div>
                            </div>
                        </div>
                        <div class="am-form-group">
                                <label for="user-phone" class="am-form-label">手机</label>
                                <div class="am-form-content">
                                    <input id="phone" name="phone" value="" placeholder="11位有效数字" type="tel">

                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-email" class="am-form-label">邮箱</label>
                                <div class="am-form-content">

                                    <input id="email" name="email" value="" placeholder="Email" type="email">

                                </div>
                            </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">设置密码</label>
                            <div class="am-form-content">
                                <input type="text" id="password" value="" name="password" placeholder="6位数字!">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">确认密码</label>
                            <div class="am-form-content">
                                <input type="text" id="repass" value="" name="repass" placeholder="请输入确认密码!">
                            </div>
                        </div>
                        <div class="info-btn">
                            <input type="submit" name="submit" id="submit" value="提交资料" class="am-btn am-btn-primary am-btn-sm am-fl">
                        </div>

                    </div>
                </form>
            </div>

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
    //判定密码不为空
    $('#password').blur(function () {
        var pass = $('#password').val();
        if(pass == ""){
            layui.use('layer', function() {
                var layer = layui.layer;
                layer.msg('密码不能为空');
            })
        }
    })
    //判断密码格式
    $('#password').blur(function () {
        password = $(this).val();
        var reg_password = /^[a-z+A-Z+0-9+]{3,15}$/;
        if(!reg_password.test(password)){
            layui.use('layer', function() {
                var layer = layui.layer;
                layer.msg('请输入6位有效数字!');
            })
        }
    });
    //判定连两次密码一致
    $('#repass').blur(function(){
        var pass = $('#password').val();
        var passrep = $('#repass').val();
        if(pass != passrep) {
            layui.use('layer', function() {
                var layer = layui.layer;
                layer.msg('两输入密码不一致');
            })
        }
        check3 = 1
    })

    $('#email').blur(function () {
        email = $(this).val();
        var reg_email = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/;
        if(!reg_email.test(email)){
            layui.use('layer', function() {
                var layer = layui.layer;
                layer.msg('邮箱格式不正确!');
            })
        }
    });

    $('#phone').blur(function () {
        phone = $(this).val();
        var reg_phone = /^[1][3,4,5,7,8,9][0-9]{9}$/;
        if(!reg_phone.test(phone)){
            layui.use('layer', function() {
                var layer = layui.layer;
                layer.msg('手机格式不正确！');
            })
        }
    });

    var b = new Date();
    var c = b.getFullYear();
    var d = b.getMonth()+1;
    var e = b.getDate();
    var mm = c+"-"+d+"-"+e;

    var time = ""
    layui.use('laydate', function(){
        var laydate = layui.laydate;
        //执行一个laydate实例
        laydate.render({
            elem: '#birthday' //指定元素

            ,min: '1900-1-1'
            ,max: mm
            ,done:function (value,data,endDate) {
                time = value;
            }
        });
    });
    $('#salf').click(function () {
        alert(time)
    })

    //图片上传


</script>

</body>

</html>