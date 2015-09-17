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
    <link href="/y_b/Public/Home/css/base.css" rel="stylesheet">
    

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
            <a class="navbar-brand">
                <span id="return" class="glyphicon glyphicon-menu-left" onclick="javascript:history.go(-1);"></span>
                
            </a>
        </div>
        <div class="clear"></div>
        
    </header>
    <div class="container" id="container">
        
    <br>
    <form action="/y_b/index.php/User/adminArticleEdit?id=<?php echo ($info['id']); ?>" class="form-horizontal" method="post">
        <div class="input-group">
            <input type="text" class="form-control" name="title" value="<?php echo ($info["title"]); ?>" placeholder="输入标题">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">修改</button>
            </span>
        </div>
        <script id="editor" name="content" type="text/plain"><?php echo ($info["content"]); ?></script>
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
        initialFrameHeight: 450,
    });
    </script>


</html>