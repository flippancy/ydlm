<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>移动联盟后台登陆</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/ydlm/Public/admin/css/templatemo_main.css">
</head>

<body>
    <div id="main-wrapper">
        <div class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <div class="logo">
                    <h1>移动联盟 - 后台登陆</h1>
                </div>
            </div>
        </div>
        <div class="template-page-wrapper">
            <div class="col-sm-offset-3 col-sm-6" style="margin-top:11%;">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="username" class="col-sm-2 control-label">用户</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control username" placeholder="Username" name="username" require>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="password" class="col-sm-2 control-label">密码</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control password" placeholder="Password" name="password" require>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="alert alert-info" style="font-size:16px" role="alert"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-sm-offset-2 col-sm-2">
                            <a class="btn btn-info" style="width:100%" href="/ydlm/index.php">返回</a>
                        </div>
                        <div class="col-sm-6">
    <!--                         <div class="checkbox">
                                <label>
                                    <input type="checkbox">记住
                                </label>
                            </div> -->
                        </div>
                        <div class="col-sm-2">
                            <a type="submit" id="sub" class="btn btn-info" style="width:100%">登陆</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $('#sub').click(function() {
        $.ajax({
            type: 'POST',
            url: "<?php echo U('Index/login');?>",
            data: {
                username: $('.username').val(),
                password: $('.password').val(),
            },
            cache: false,
            async: true,
            success: function(data) {
                if (data == 0) {
                    $('.alert').text('登陆成功,即将跳转');
                    $('.alert').show();
                    setTimeout("location.href = '<?php echo U('Admin/index');?>'", 1000);
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
</body>

</html>