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
    <a id="menu" href="<?php echo U('User/logout');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-off"></span></a>
    <!-- <a id="menu" href="<?php echo U('User/adminArticleAdd');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-plus"></span></a> -->
    <a id="menu" href="<?php echo U('User/adminArticle');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-comment"></span></a>
    <a id="menu" href="<?php echo U('User/adminIndex');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-user"></span></a>

        </nav>
        <div class="navbar-header" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="cursor:pointer">
            <h5 class="brand">
    y_b
</h5>
            <a class="navbar-brand" onclick="javascript:history.go(-1);">
                <span id="return" class="glyphicon glyphicon-menu-left"></span>
                添加
            </a>
        </div>
        <div class="clear"></div>
        
    </header>
    <div class="container" id="container">
        
    <br>
    <form action="<?php echo U('User/adminArticleAdd');?>" class="form-horizontal" method="post">
        <div class="input-group">
            <input type="text" class="form-control" name="title" placeholder="输入标题">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">提交</button>
            </span>
        </div>
        <script id="editor" name="content" type="text/plain">你需要说点什么···············</script>
    </form>

    </div>
    <footer>
        

    </footer>
    <header id="navss" class="navbar-fixed-bottom">
        <img id="navs" src="/y_b/Public/home/img/home.png" onclick="location='/y_b/index.php/Index/index'">
    </header>
</body>
<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- 配置文件 -->
    <script type="text/javascript" src="/y_b/Public/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/y_b/Public/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
    var editor = UE.getEditor('editor', {
        initialFrameHeight: 450,
    });
    </script>


</html>