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
    <!-- <link href="http://cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <link href="/y_b/Public/Home/css/base.css" rel="stylesheet">
    
    <link href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="cbp-spmenu-push">
    <header class="navbar navbar-fixed-top navbar-custom" id="navbar">
        <nav class="dropdown navbar-menu">
            
    <!-- 菜单示例 -->
    <a id="menu" href="<?php echo U('Index/logout');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-off"></span></a>
    <!-- <a id="menu" href="#myModal" class="dropdown-toggle" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span></a> -->
    <!-- <a id="menu" href="<?php echo U('Index/index');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-triangle-left"></span></a> -->
    <a id="menu" href="<?php echo U('Index/adminIndex');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-user"></span></a>

        </nav>
        <div class="navbar-header" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="cursor:pointer">
            <h5 class="brand">
    y_b
</h5>
            <a class="navbar-brand" href="<?php echo U('Index/index');?>">
                <span id="return" class="glyphicon glyphicon-menu-left"></span>
                
            </a>
        </div>
        <div class="clear"></div>
        
    </header>
    <div class="container" id="container">
        
    <br>
    <!-- <textarea class="form-control" rows="3" name="remark" placeholder="你需要说点什么···············" require></textarea> -->
    <form action="<?php echo U('Index/adminArticle');?>" class="form-horizontal" method="post">
        <script id="editor" name="content" type="text/plain">你需要说点什么···············</script>
        <input type="text" class="form-control" name="title" placeholder="输入标题" style="float:left;" require>
        <button class="btn btn-default" type="submit" style="float:right;">提交</button>
    </form>

    </div>
    <footer>
        

    </footer>
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
        initialFrameHeight : 450,
    });
    </script>


</html>