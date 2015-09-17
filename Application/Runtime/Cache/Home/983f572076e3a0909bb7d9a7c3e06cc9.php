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
    
    <link rel="stylesheet" type="text/css" href="/y_b/Public/home/css/style.css" />
    <link href="http://cdn.bootcss.com/lightbox2/2.8.1/css/lightbox.min.css" rel="stylesheet">

</head>

<body class="cbp-spmenu-push">
    <header class="navbar navbar-fixed-top navbar-custom" id="navbar">
        <nav class="dropdown navbar-menu">
            
    <!-- 菜单示例 -->
    <a id="menu" href="<?php echo U('Index/index3');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-triangle-right"></span></a>
    <a id="menu" href="<?php echo U('Index/index');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-triangle-left"></span></a>
    <a id="menu" href="<?php echo U('User/adminIndex');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-user"></span></a>

        </nav>
        <div class="navbar-header" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="cursor:pointer">
            <h5 class="brand">
    y_b
</h5>
            <a class="navbar-brand" onclick="javascript:history.go(-1);">
                <span id="return" class="glyphicon glyphicon-menu-left"></span>
                2
            </a>
        </div>
        <div class="clear"></div>
        
    </header>
    <div class="container" id="container">
        
    <select class="form-control set-albums">
        <option value="-1">请选择相册</option>
        <option value="0">查看全部图片</option>
        <?php if(is_array($albums)): $i = 0; $__LIST__ = $albums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$albums): $mod = ($i % 2 );++$i;?><option value="<?php echo ($albums["id"]); ?>">查看相册<?php echo ($albums["name"]); ?>---<?php echo ($albums["remark"]); ?>的图片</option><?php endforeach; endif; else: echo "" ;endif; ?>
    </select>
    <br>
    <section class="main">
        <div id="ri-grid" class="ri-grid ri-grid-size-2">
            <img class="ri-loading-image" src="/y_b/Public/home/img/loading.gif" />
            <ul>
                <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo ($info['url']); ?>" data-lightbox="image-1" data-title="<?php echo ($info['remark']); ?>"><img src="<?php echo ($info['url']); ?>?imageView2/1/w/180/h/180" /></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </section>

    </div>
    <footer>
        

    </footer>
    <header id="navss" class="navbar-fixed-bottom">
        <img id="navs" src="/y_b/Public/home/img/home.png" onclick="location='/y_b/index.php/Index/index'">
    </header>
</body>
<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="/y_b/Public/home/js/modernizr.custom.26633.js"></script>
    <script type="text/javascript" src="/y_b/Public/home/js/jquery.gridrotator.js"></script>
    <script src="http://cdn.bootcss.com/lightbox2/2.8.1/js/lightbox.min.js"></script>
    <script type="text/javascript">
    $(function() {
        $('#ri-grid').gridrotator({
            rows: 2,
            columns: 4,
            animType: 'fadeInOut',
            animSpeed: 2000,
            interval: 600,
            step: 1,
            w1024: {
                rows: 3,
                columns: 2
            },
            w768: {
                rows: 3,
                columns: 2
            },
            w480: {
                rows: 3,
                columns: 2
            },
            w320: {
                rows: 3,
                columns: 2
            },
            w240: {
                rows: 3,
                columns: 2
            },
        });

    });

    $(document).ready(function() {
        changed2();
    });

    $(".set-albums").change(function(){
        changed();
    });

    function changed(){
        var id = $(".set-albums option:selected").val();
        if (id != 0) {
            window.location.href='/y_b/index.php/Index/index2?id=' + id;
        }else{
            window.location.href='/y_b/index.php/Index/index2';
        };
    };

    function changed2(){
        var id = $(".set-albums option:selected").val();
        if (id > 0) {
            window.location.href='/y_b/index.php/Index/index2?id=' + id;
        };
    };
    </script>


</html>