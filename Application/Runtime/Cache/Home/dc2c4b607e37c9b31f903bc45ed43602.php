<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no, email=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="full-screen" content="yes">
    <meta name="browsermode" content="application">
    <meta name="screen-orientation" content="portrait">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>
        
    y_b blog

    </title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/y_b/Public/home/css/base.css" rel="stylesheet">
    

</head>

<body class="cbp-spmenu-push">
    <header class="navbar navbar-fixed-top navbar-custom" id="navbar">
        <nav class="dropdown navbar-menu">
            
    <!-- 菜单示例 -->
    <a id="menu" href="<?php echo U('User/adminIndex');?>" class="dropdown-toggle" data-toggle="tab" aria-haspopup="true" aria-expanded="true"><span class="glyphicon glyphicon-user"></span></a>

        </nav>
        <div class="navbar-header" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="cursor:pointer">
            <h5 class="brand">
    y_b
</h5>
            <a class="navbar-brand" onclick="javascript:history.go(-1);">
                <span id="return" class="glyphicon glyphicon-menu-left"></span>
                登陆
            </a>
        </div>
        <div class="clear"></div>
        
    </header>
    <div class="container" id="container">
        
    <br>
    <div class="col-sm-12">
        <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1"></span>
            <input type="text" class="form-control usern" name="loginname" placeholder="请输入账号" aria-describedby="basic-addon1" require>
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
            <input type="password" class="form-control passw" name="password" placeholder="请输入密码" require>
        </div>
            <div class="alert alert-danger" style="font-size:16px" role="alert" hidden="hidden"></div>
    </div>
    <div class="col-sm-6 col-xs-6">
        <br>
        <a type="submit" id="sub" class="btn btn-info" style="width:100%">登陆</a>
    </div>

    </div>
    <footer>
        

    </footer>
    <header id="navss" class="navbar-fixed-bottom">
        <img id="navs" src="/y_b/Public/home/img/home.png" onclick="location='/y_b/index.php/Index/index'">
    </header>
</body>
<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $('#sub').click(function() {
        $.ajax({
            type: 'POST',
            url: "<?php echo U('Index/login');?>",
            data: {
                loginname: $('.usern').val(),
                password: $('.passw').val(),
            },
            cache: false,
            async: true,
            // dataType: 'JSON',
            success: function(data) {
                if (data == 0) {
                    $('.alert').text('登陆成功,即将跳转');
                    $('.alert').show();
                    setTimeout("location.href = '<?php echo U('User/adminIndex');?>'", 1000);
                } else if (data == 1) {
                    $('.alert').text('密码错误');
                    $('.alert').show();
                } else {
                    $('.alert').text('不存在此账号');
                    $('.alert').show();
                }
            },
            error: function() {
                alert("网络不好");
            }
        });
    });
    </script>


</html>