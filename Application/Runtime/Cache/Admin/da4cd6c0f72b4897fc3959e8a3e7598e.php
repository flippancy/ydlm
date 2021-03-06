<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>移动联盟后台登陆</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width">
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
            <form class="form-horizontal templatemo-signin-form" role="form" action="<?php echo U('Index/login');?>" method="POST">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="username" class="col-sm-2 control-label">用户</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="password" class="col-sm-2 control-label">密码</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-sm-offset-2 col-sm-8">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">记住
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" value="登陆" class="btn btn-default" style="float:right">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>