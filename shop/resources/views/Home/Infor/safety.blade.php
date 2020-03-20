<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>安全设置</title>

    <link href="{{asset('AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('AmazeUI-2.4.2/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('AmazeUI-2.4.2/assets/js/amazeui.min.js')}}"></script>

    <link href="{{asset('css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('layui/layui/layui.js')}}"></script>
</head>

<body>
<!--头 -->
<header>
    <article>
        <div class="mt-logo">
            <!--顶部导航条 -->
            <div class="hmtop">
                <!--顶部导航条 -->
                <div class="am-container header">
                    <ul class="message-l">
                        <div class="topMessage">
                            @if(!Session::get('user')&&!Session::get('id')&&!Session::get('ud'))
                                <div>
                                    <a href="{{url('Home/login')}}" target="_top" class="h">登录</a>
                                    <a href="{{url('Home/register')}}" target="_top">免费注册</a>
                                </div>
                            @endif
                            @if(Session::get('user'))
                                <div class="menu-hd">
                                    {{--                    @if(Session::get('user'))--}}

                                    欢迎你:{{Session::get('user')}}

                                    <a href="{{url('Home/Index/loginOut')}}" target="_top" class="h">退出</a>
                                    {{--                    @else--}}
                                    {{--                    <a href="{{url('Home/Index/login')}}" target="_top" class="h">登录</a>--}}

                                    {{--                    <a href="{{url('Home/Index/register')}}" target="_top">免费注册</a>--}}
                                    {{--                        @endif--}}

                                </div>
                            @endif
                            @if(Session::get('id'))
                                <div>
                                    {{--                    @if(Session::get('id'))--}}

                                    欢迎你:{{"$rows1->username"}}
                                    <a href="{{url('Home/loginOut')}}" target="_top" class="h">退出</a>

                                    {{--                    @endif--}}
                                </div>
                            @endif
                            @if(Session::get('ud'))
                                <div>
                                    欢迎你:{{"$row->nickname"}}
                                    <a href="{{url('Home/loginOut')}}" target="_top" class="h">退出</a>

                                    {{--                    @endif--}}
                                </div>
                            @endif

                        </div>
                    </ul>
                    <ul class="message-r">
                        <div class="topMessage home">
                            <div class="menu-hd"><a href="{{url('/')}}" target="_top" class="h">商城首页</a></div>
                        </div>
                        <div class="topMessage my-shangcheng">
                            <input type="hidden" value="{{session()->get('uid')??''}}">
                            <div class="menu-hd MyShangcheng"><a href="{{url('Home/Infor/information')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
                        </div>
                        <div class="topMessage mini-cart">
                            <div class="menu-hd"><a id="mc-menu-hd" href="{{url('Goods/shopcart')}}??''" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h"></strong></a></div>
                        </div>
                        <div class="topMessage favorite">
                            <div class="menu-hd"><a href="{{url('Goods/collection')}}" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
                        </div>
                    </ul>
                </div>





            {{--@include('public.header',['title'=>'首页'])--}}
            <!--悬浮搜索框-->



                <!--悬浮搜索框-->

                <div class="nav white">
                    <div class="logoBig">
                        <li><a href="{{url('/')}}"><img src="{{asset('images/logobig.png')}}" /></a></li>
                    </div>

                    <div class="search-bar pr">
                        <a name="index_none_header_sysc" href="#"></a>
                        <form action="{{url('Goods/seach')}}" method="post">
                            {{csrf_field()}}
                            <input id="searchInput" name="keywords" type="text" placeholder="搜索" autocomplete="off">
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
            <li class="index"><a href="{{url('/')}}">首页</a></li>
            <li class="qc"><a href="{{url('/')}}">闪购</a></li>
            <li class="qc"><a href="{{url('/')}}">限时抢</a></li>
            <li class="qc"><a href="{{url('/')}}">团购</a></li>
            <li class="qc last"><a href="{{url('/')}}">大包装</a></li>
        </ul>
        <a href="{{url('Home/Infor/information')}}"> <div class="nav-extra">
                <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
                <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
            </div></a>
    </div>
</div>
<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">

            <!--标题 -->
            <div class="user-safety">
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户安全</strong> / <small>Set&nbsp;up&nbsp;Safety</small></div>
                </div>
                <hr/>

                <!--头像 -->
                <div class="user-infoPic">

                    <div class="filePic">
                        <img class="am-circle am-img-thumbnail" src="{{asset($rew)}}" alt="" />
                    </div>

                    <p class="am-form-help">头像</p>

                    <div class="info-m">
                        @if(Session::get('user'))
                            <div><b>用户名：<i>{{(Session::get('user'))}}</i></b></div>
                        @endif
                        <div class="safeText">
                            <a href="safety.html">账户安全:<em style="margin-left:20px ;">60</em>分</a>
                            <div class="progressBar"><span style="left: -95px;" class="progress"></span></div>
                        </div>
                    </div>
                </div>

                <b class="line"></b>
                <div class="center">
                    <div class="col-main">
                        <div class="main-wrap">

                            <div class="am-cf am-padding">
                                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改密码</strong> / <small>Password</small></div>
                            </div>
                            <hr/>
                            <!--进度条-->
                            <div class="m-progress">
                                <div class="m-progress-list">
                                    {{--							<span class="step-1 step">--}}
                                    {{--                                <em class="u-progress-stage-bg"></em>--}}
                                    {{--                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>--}}
                                    {{--                                <p class="stage-name">重置密码</p>--}}
                                    {{--                            </span>--}}
                                    {{--                                    <span class="step-2 step">--}}
                                    {{--                                <em class="u-progress-stage-bg"></em>--}}
                                    {{--                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>--}}
                                    {{--                                <p class="stage-name">完成</p>--}}
                                    {{--                            </span>--}}
                                    <span class="u-progress-placeholder"></span>
                                </div>
                                <div class="u-progress-bar total-steps-2">
                                    <div class="u-progress-bar-inner"></div>
                                </div>
                            </div>
                            {{--                            <form class="am-form am-form-horizontal" action="{{url('Home/Infor/safetyAction')}}">--}}
                            <div class="am-form-group">
                                <label for="user-old-password" class="am-form-label">原密码</label>
                                <div class="am-form-content">
                                    <input type="password" id="password" name="password" placeholder="请输入原登录密码">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-new-password" class="am-form-label" >新密码</label>
                                <div class="am-form-content">
                                    <input type="password"  name="password1" id="password1" placeholder="请输入新密码">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-confirm-password"   class="am-form-label">确认密码</label>
                                <div class="am-form-content">
                                    <input type="password" name="password2" id="password2"  placeholder="请再次输入上面的密码">
                                </div>
                            </div>
                            <div class="info-btn">
                                <input type="submit" name="submit" id="submit" value="保存修改" >
                            </div>

                            {{--                            </form>--}}

                        </div>



                    </div>
                </div>
                <script>

                    $('#password').blur(function (){
                        password = $(this).val();
                        var _token = "{{csrf_token()}}"
                        $.get('{{url("Home/Infor/ajax_checkPassword")}}',{password:password,_token:_token},function (data) {
                            if(data.status==1){

                                layui.use('layer', function() {
                                    var layer = layui.layer;
                                    layer.msg('您输入的密码不正确!');
                                })
                            }else{
                                // alert('密码正确!')
                            }

                        },'json');
                    })
                    $('#password1').blur(function () {
                        password1 = $(this).val();
                        var reg_password1 = /^[a-z+A-Z+0-9+]{3,15}$/;
                        if(!reg_password1.test(password1)){

                            layui.use('layer', function() {
                                var layer = layui.layer;
                                layer.msg('对不起！密码格式不正确！');
                            })
                        }
                    });
                    $('#password2').blur(function () {
                        password2 = $(this).val();
                        if(password2 !==password1){

                            layui.use('layer', function() {
                                var layer = layui.layer;
                                layer.msg('确认密码新密码不一致!');
                            })
                        }
                    })
                    $('#submit').click(function () {

                        password1 = $('#password1').val();

                        var _token = "{{csrf_token()}}";
                        console.log(1)
                        $.get('{{url("Home/Infor/safetyAction")}}',{password1:password1,_token:_token},function (data) {
                            if(data.status== 1){

                                alert('密码修改成功!')
                                return window.location.href="{{url('Home/Index/login')}}";
                            }else{
                                alert('密码修改失败!')
                            }
                        },'json')
                    })
                </script>


            </div>
        </div>
        <div class="footer ">
            <div class="footer-hd ">
                <p>
                    <a href="{{url('/')}} ">传奇科技</a>
                    <b>|</b>
                    <a href="{{url('/')}} ">商城首页</a>
                    <b>|</b>
                    <a href="https://www.alipay.com/">支付宝</a>
                    <b>|</b>
                    <a href="{{url('/')}} ">物流</a>
                </p>
            </div>
            <div class="footer-bd ">
                <p>
                    <a href="{{url('/')}} ">关于传奇</a>
                    <a href="{{url('/')}} ">合作伙伴</a>
                    <a href="{{url('/')}} ">联系我们</a>
                    <a href="{{url('/')}} ">网站地图</a>
                    <em>© 2019-2029 chuanqi.com 仅供测试,不进行任何商业用途或盈利</em>
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
</body>

</html>