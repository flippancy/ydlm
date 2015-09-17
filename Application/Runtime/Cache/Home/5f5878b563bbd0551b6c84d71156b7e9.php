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
    
    <link rel="stylesheet" type="text/css" href="/y_b/Public/Home/css/index.css" />

</head>

<body class="cbp-spmenu-push">
    <header class="navbar navbar-fixed-top navbar-custom" id="navbar">
        <nav class="dropdown navbar-menu">
            
    <!-- 菜单示例 -->
    <a id="menu" href="<?php echo U('Index/index2');?>" class="dropdown-toggle"><span class=" glyphicon glyphicon-triangle-right"></span></a>
    <a id="menu" href="#" class="dropdown-toggle">1</a>
    <a id="menu" href="<?php echo U('Index/index');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-triangle-left"></span></a>
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
    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><div class="panel panel-info">
            <div class="panel-heading"><?php echo ($info['remark']); ?></div>
            <div class="panel-body">
                <div class="col-sm-2">
                    <a href="<?php echo ($info['url']); ?>" data-lightbox="image-1" data-title="My caption"><img src="<?php echo ($info['url']); ?>"></a>
                </div>
                <div class="col-sm-10"></div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php echo ($page); ?>

    </div>
    <footer>
        

    </footer>
</body>
<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="/y_b/Public/Home/js/modernizr.custom.26633.js"></script>
    <script type="text/javascript" src="/y_b/Public/Home/js/jquery.gridrotator.js"></script>


</html>