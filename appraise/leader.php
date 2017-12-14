<?php
 require_once "./include.php";
checkLogined();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title></title>

    <!-- Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"  rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .navbar-header img{
            height: 30px;
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="wrap">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-nav" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#">某某医院考核系统</a>

            </div>
            <div class="collapse navbar-collapse" id="top-nav">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">考核评价<span class="sr-only">(current)</span></a></li>
                    <li><a href="#">统计分析</a></li>
                    <li><a href="#">相关文件</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" class="noDecorate hidden-sm hidden-xs">欢迎您，<?php echo $_SESSION['name'];?> </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">修改密码</a></li>
                            <li><a href="./admin/doAdminAction.php?act=logout">退出</a></li>
                        </ul>
                    </li>
                    <li class="hidden-sm hidden-xs"><a href="#" id="time" class="noDecorate"></a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->

    </nav>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    window.onload= function () {
        var t = null;
        time();
        function time()
        {
            clearTimeout(t);//清除定时器
            var dt = new Date();
            var y=dt.getYear()+1900;
            var mm=dt.getMonth()+1;
            var d=dt.getDate();
            var weekday=["星期日","星期一","星期二","星期三","星期四","星期五","星期六"];
            var day=dt.getDay();
            var h=dt.getHours();
            var m=dt.getMinutes();
            var s=dt.getSeconds();
            if(h<10){h="0"+h;}
            if(m<10){m="0"+m;}
            if(s<10){s="0"+s;}
            document.getElementById("time").innerHTML = y+"年"+mm+"月"+d+"日"+weekday[day]+"&nbsp;&nbsp;&nbsp;&nbsp;"+h+":"+m+":"+s+"";
            t = setTimeout(time,1000); //设定定时器，循环执行
        }
    }
</script>
</body>
</html>