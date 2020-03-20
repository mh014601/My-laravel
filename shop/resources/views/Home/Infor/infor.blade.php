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
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
                </div>
                <hr/>

                <!--头像 -->
                <form class="am-form am-form-horizontal" action="{{url('Home/Infor/saveEditAction')}}" id="form1" method="post">
                <div class="user-infoPic">

                    <div class="filePic">

                        <input type="file" onchange="showPic()" style="display:none" id="pic"  class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
                        <img class="am-circle am-img-thumbnail"  id="img"  src='{{asset("$rows->user_pic")}}' alt="" />

                    </div>
                    <div>
                        <li class="dangq_hongx"><a href="javascript:void(0)" id="bth">上传头像</a></li>
                    </div>
                    <script>
                        $('#bth').click(function () {
                            var fd = new FormData();
                            fd.append("pic",pic);
                            $.ajax({
                                type: 'POST',
                                url: "{{url('Home/Infor/uploadPic')}}",
                                data: fd,
                                processData: false,   // jQuery不要去处理发送的数据
                                contentType: false,   // jQuery不要去设置Content-Type请求头
                                success: function(res){
                                    alert('上传成功')
                                }
                            });
                        })
                    </script>

                    <p class="am-form-help">头像</p>

                    <div class="info-m">
                        @if(Session::get('user'))
                        <div><b>用户名：<i>{{Session::get('user')}}</i></b></div>
                            @else
                            <a href="{{url('Home/Index/login')}}">点我登录修改料</a>
                        @endif
                        <div class="vip">
                            <span></span><a href="#">会员专享</a>

                        </div>

                    </div>
                </div>


                <!--个人信息 -->
                <div class="info-main">

                        {{csrf_field()}}
                        <div class="am-form-group">
                            <label for="user-name2" class="am-form-label" name="">昵称</label>
                            <div class="am-form-content">
                                <input type="text" id="username" value="{{$row->username}}" name="username" placeholder="用户名">
                                <small>昵称长度不能超过40个汉字</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">姓名</label>
                            <div class="am-form-content">
                                <input type="text" id="name" value="{{$row->name}}" name="name" placeholder="name">

                            </div>
                        </div>
{{--                        <div class="layui-form-item">--}}
{{--                            <label class="layui-form-label">单选框</label>--}}
{{--                            <div class="layui-input-block">--}}
{{--                                <input type="radio" name="sex" value="0" title="男">--}}
{{--                                <input type="radio" name="sex" value="1" title="女" checked>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="am-form-group">
                            <label class="am-form-label">性别</label>
                            <div class="am-form-content sex">
{{--                                <label class="am-radio-inline">--}}
{{--                                    <input type="radio" name="sex" id="male" value="male" data-am-ucheck> 男--}}
{{--                                </label>--}}
{{--                                <label class="am-radio-inline">--}}
{{--                                    <input type="radio" name="sex" id="female" value="female" data-am-ucheck> 女--}}
{{--                                </label>--}}
{{--                                <label class="am-radio-inline">--}}
{{--                                    <input type="radio" name="sex" id="secret" value="secret" data-am-ucheck> 保密--}}
{{--                                </label>--}}
                                <div class="layui-input-block">
                                    @if($row->sex==0)
                                        <input type="radio" name="sex" value="0" title="男" checked>男
                                        <input type="radio" name="sex" value="1" title="女">女
                                        <input type="radio" name="sex" value="2" title="保密" >保密
                                    @elseif($row->sex==1)
                                        <input type="radio" name="sex" value="0" title="男" >男
                                        <input type="radio" name="sex" value="1" title="女" checked>女
                                        <input type="radio" name="sex" value="2" title="保密" >保密
                                    @else
                                        <input type="radio" name="sex" value="0" title="男" >男
                                        <input type="radio" name="sex" value="1" title="女">女
                                        <input type="radio" name="sex" value="2" title="保密" checked>保密
                                        @endif
                                </div>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-birth" class="am-form-label">生日</label>
                            <div class="am-form-content birth">
                                <div class="birth-select">
                                    <input type="text" value="{{$row->birthday}}" class="layui-input" id="test1" name="test1" placeholder="y-m-d">
                                </div>
                            </div>
                        </div>


                    @if($status !=2)
                        <div class="am-form-group">
                            <label for="user-phone" class="am-form-label">电话</label>
                            <div class="am-form-content">
                                <input id="phone" name="phone" value="{{$row->phone}}" placeholder="telephonenumber" type="tel">

                            </div>
                        </div>
                    @else
                        <div class="am-form-group">
                            <label for="user-email" class="am-form-label">电子邮件</label>
                            <div class="am-form-content">

                                <input id="email" name="email" value="{{$row->email}}" placeholder="Email" type="email">

                            </div>
                        </div>
                    @endif
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
                    <li> <a href="#">个人信息</a></li>
                    <li> <a href="{{url('Home/Infor/safety')}}">修改密码</a></li>
                    <li> <a href="address.html">地址管理</a></li>
                    <li> <a href="cardlist.html">快捷支付</a></li>
                </ul>
            </li>
            <li class="person">
                <p><i class="am-icon-balance-scale"></i>我的交易</p>
                <ul>
                    <li><a href="order.html">订单管理</a></li>
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
                    <li> <a href="collection.html">收藏</a></li>
                    <li> <a href="foot.html">足迹</a></li>
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
    var pic = '';
    // document.getElementById('img').onclick = function () {
    //
    // }
    $("#img").click(function () {
        $("#pic").click();
    });
    function showPic(){
        pic = document.getElementsByTagName('input')[2].files[0];
        var pic_source = window.URL.createObjectURL(pic); // 把图片资源对象,读取成浏览器可以显示的 资源 二进制
        // 把图片资源 动态追加到 img src 属性
        document.getElementById('img').src = pic_source;
        {{--var _token = "{{csrf_token()}}";--}}
        {{--$.get("{{url('Home/Infor/up_pic')}}",{_token:_token},function (data) {--}}
        {{--    if(data.status){--}}

        {{--    }--}}
        {{--},'json')--}}
    }

</script>
<script>
    $('#email').blur(function () {
        email = $(this).val();
        var reg_email = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/;
        if(!reg_email.test(email)){
            alert('邮箱格式不正确！');
        }
    });

    $('#phone').blur(function () {
        phone = $(this).val();
        var reg_phone = /^[1][3,4,5,7,8,9][0-9]{9}$/;
        if(!reg_phone.test(phone)){
            alert('手机格式不正确！');
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
            elem: '#test1' //指定元素

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