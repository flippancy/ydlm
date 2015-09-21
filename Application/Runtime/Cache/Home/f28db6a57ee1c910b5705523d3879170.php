<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="" content=""> -->
    <!-- <link rel="shortcut icon" href="../favicon.ico"> -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/ydlm/Public/home/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/ydlm/Public/home/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="/ydlm/Public/home/css/menu.css" />
    
    <title>移动联盟 | 新闻列表</title>
    <link href="/ydlm/Public/home/css/timeline.css" rel="stylesheet" type="text/css" />

    <!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <script src="/ydlm/Public/home/js/TweenMax.min.js"></script>
    <style>
    a,
    a:hover {
        text-decoration: none;
    }
    </style>
</head>

<body>
        
    <div class="col-sm-8">
        <ul class="timeline">
            <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?><li class="timeline-grey">
                    <div class="timeline-time">
                        <span class="date"><?php echo ($news["date"]); ?></span>
                    </div>
                    <!-- <div class="timeline-icon"><a href="#add" data-toggle="modal"><i class="fa fa-plus"></i></a></div> -->
                    <div class="timeline-body" onclick="location='/ydlm/index.php/Index/newshow?id=<?php echo ($news["id"]); ?>'">
                        <h2><?php echo ($news["title"]); ?></h2>
                        <div class="timeline-content">
                            <?php if(!empty($news["img"])): ?><img class="timeline-img pull-left" src="<?php echo ($news["img"]); ?>" alt=""><?php endif; ?>
                        </div>
<!--                         <div class="timeline-footer">
                            <a class="nav-link" href="/ydlm/index.php/Index/newshow?id=<?php echo ($news["id"]); ?>">更多<i class="m-icon-swapright m-icon-white"></i></a>
                        </div> -->
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="col-sm-4">
        <div class="time-right">
            <div class="col-sm-6">
                <a class="btn btn-info" style="width:100%" href="#">提交</a>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-info" style="width:100%" href="#">评论</a>
            </div>
        </div>
    </div>

        <div class="menu">
            <div class="menu-bg js-blur"></div>
            <nav class="menu-items">
                <a href="<?php echo U('Index/index');?>" class="menu-item">
                    <span class="js-blur">首页</span>
                </a>
                <a href="<?php echo U('Index/kyline');?>" class="menu-item">
                    <span class="js-blur">开源</span>
                </a>
                <a href="<?php echo U('Index/timeline');?>" class="menu-item">
                    <span class="js-blur">新闻</span>
                </a>
                <a href="<?php echo U('Index/salon');?>" class="menu-item">
                    <span class="js-blur">沙龙</span>
                </a>
                <a href="/ydlm/admin.php" class="menu-item">
                    <span class="js-blur">登陆</span>
                </a>
            </nav>
        </div>
        <button class="menu-toggle"><span>Open Menu</span></button>
    

    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/ydlm/Public/home/js/motionblur.js"></script>
    <script src="/ydlm/Public/home/js/menu.js"></script>
</body>

</html>