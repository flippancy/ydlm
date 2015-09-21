<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>移动联盟官方首页</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/ydlm/Public/home/css/default.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="/ydlm/Public/Home/ar/css/style.css" />
    <script type="text/javascript" src="/ydlm/Public/Home/ar/js/modernizr.custom.26633.js"></script>
</head>

<body>
    <div id="header-wrapper">
        <div id="header" class="container">
            <div id="menu">
                <ul>
                    <li><a href="#" accesskey="1">首页</a></li>
                    <li><a href="<?php echo U('Index/kyline');?>" accesskey="2">开源</a></li>
                    <li><a href="<?php echo U('Index/timeline');?>" accesskey="3">新闻</a></li>
                    <li><a href="<?php echo U('Index/salon');?>" accesskey="4">沙龙</a></li>
                    <li><a href="/ydlm/admin.php" accesskey="5">登陆</a></li>
                </ul>
            </div>
            <div id="logo">
                <h1><a href="#">移动联盟</a></h1>
                <span>Design by <a href="" rel="nofollow">flippancy</a></span>
            </div>
        </div>
    </div>
    <div id="wrapper1">
        <div id="welcome" class="container">
            <div class="title">
                <h2>Welcome to our website</h2>
                <span class="byline">关注it前沿技术，关注it最新动态。</span>
            </div>
            <div class="content">
                <p>这是<strong>移动联盟</strong>，沿着目前移动开发方向发展的学科性团队。主要开发移动互联网，包括网站开发、安卓APP等.如：微网站集成平台，移动设备上的软件开发等，这些项目都是在跟紧移动互联网的前提下的产学研结合。用行动说话，顺应时代潮流，培养应用型人才，是这支团队的宗旨。这支团队在韩迪老师的带领下，硕果累累，曾囊括2014粤港澳大学生移动互联网创新设计大赛一等奖，同时也为企业输送了许多应用型人才。
                </p>
            </div>
        </div>
    </div>
    <div id="wrapper3">
        <section class="main">
            <div id="ri-grid" class="ri-grid ri-grid-size-2">
                <img class="ri-loading-image" src="/ydlm/Public/Home/ar/images/loading.gif" />
                <ul>
                    <?php if(is_array($photo)): $i = 0; $__LIST__ = $photo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$photo): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo ($photo["url"]); ?>"><img src="<?php echo ($photo["url"]); ?>?imageView2/1/w/150/h/150" /></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </section>
    </div>
    <div id="wrapper2">
        <div id="newsletter" class="container">
            <div class="title">
                <h2>加入我们</h2>
                <span class="byline">输入您的具体信息发送到我们的邮箱(功能未实现)</span> </div>
            <div class="content">
                <form method="post" action="#">
                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10">
                            <input type="text" class="text" name="name" placeholder="Name" />
                        </div>
                        <div class="col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10">
                            <input type="text" class="text" name="email" placeholder="Email" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10">
                            <textarea name="message" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-8 col-xs-offset-3 col-xs-6"> <a href="#" class="button submit">发送信息</a> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="copyright">
        <p>&copy; 移动联盟官方首页 | Design by <a href="" rel="nofollow">flippancy</a>.</p>
    </div>
    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/ydlm/Public/Home/ar/js/jquery.gridrotator.js"></script>
    <script type="text/javascript">
    $(function() {
        $('#ri-grid').gridrotator({
            rows: 2,
            columns: 7,
            animType: 'fadeInOut',
            animSpeed: 2000,
            interval: 600,
            step: 1,
            w1024: {
                rows: 2,
                columns: 4
            },
            w768: {
                rows: 2,
                columns: 4
            },
            w480: {
                rows: 2,
                columns: 4
            },
            w320: {
                rows: 2,
                columns: 4
            },
            w240: {
                rows: 2,
                columns: 4
            },
        });

    });
    </script>
</body>

</html>