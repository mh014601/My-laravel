<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        button{
            width: 100px;
            height: 50px;
            background: #FFD8D8;
            text-align: center;
            line-height: 50px;
            font-weight: bold;
            font-family: "微软雅黑";
            cursor: pointer;
            border: 0;
        }

    </style>
</head>
<body>
<script src="http://www.phpmaster.cn/static/js/jquery.min.js"></script>

<button id="sendSms">发送短信</button>
<script>
    var t = null;
    $('#sendSms').click(function () {
        t = setInterval(daojishi,1000)
    })
    var time = 5;
    function daojishi(){
        if(time>1){
            time--;
            // 不让点
            $('#sendSms').attr('disabled','disabled').css('cursor','not-allowed')
            $('#sendSms').text(time)

        }else{
            // 关掉计时器
            clearInterval(t)
            $('#sendSms').removeAttr('disabled').css('cursor','pointer')
            time = 5;
            $('#sendSms').text('重新发送')
        }

    }
</script>
</body>
</html>