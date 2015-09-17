<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- <meta name="" content=""> -->
	<!-- <link rel="shortcut icon" href="../favicon.ico"> -->
	<link rel="stylesheet" type="text/css" href="/ydlm/Public/home/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="/ydlm/Public/fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/ydlm/Public/home/css/demo.css" />
	<link rel="stylesheet" type="text/css" href="/ydlm/Public/home/css/menu.css" />
	
    <title>移动联盟 |  新闻列表</title>
	<link href="/ydlm/Public/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/ydlm/Public/admin/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="/ydlm/Public/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/ydlm/Public/admin/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="/ydlm/Public/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="/ydlm/Public/admin/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="/ydlm/Public/admin/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link href="/ydlm/Public/admin/css/timeline.css" rel="stylesheet" type="text/css"/>
    <link href="/ydlm/Public/admin/css/jquery.fancybox.css" rel="stylesheet" />
    <link href="/ydlm/Public/admin/css/jquery.fileupload-ui.css" rel="stylesheet" />
    <link href="/ydlm/Public/admin/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/ydlm/Public/admin/css/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="/ydlm/Public/admin/css/jquery-ui-1.10.1.custom.min.css"/>

	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	<script src="/ydlm/Public/home/js/TweenMax.min.js"></script>
	<script src="/ydlm/Public/home/js/jquery.min.js"></script>
    <style>
a,a:hover{
	text-decoration: none;
}
    </style>
</head>

<body>
	<div class="container">

		
	<div class="row-fluid">

		<div class="span12">

			<ul class="timeline">
				<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?><li class="timeline-grey">

					<div class="timeline-time">
						<span class="date"><?php echo ($news["date"]); ?></span>
						<!-- <span class="time"><?php echo ($file["time"]); ?></span> -->
					</div>

					<div class="timeline-icon" ><a href="#add" data-toggle="modal"><i class="icon-plus"></i></a></div>

					<div class="timeline-body">
						<h2><?php echo ($news["title"]); ?></h2>
						<div class="timeline-content">
                            <?php if(!empty($news["img"])): ?><img class="timeline-img pull-left" src="<?php echo ($news["img"]); ?>" alt=""><?php endif; ?>
							<?php echo ($news["content"]); ?>
						</div>

						<div class="timeline-footer">
							<a class="nav-link" href="/ydlm/index.php/Index/newshow?id=<?php echo ($news["id"]); ?>">更多<i class="m-icon-swapright m-icon-white"></i></a>  
						</div>

					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>

		</div>

	</div>

		<div class="menu">
			<div class="menu-bg js-blur"></div>
			<nav class="menu-items">
				<a href="<?php echo U("Index/index");?>" class="menu-item">
					<span class="js-blur">首页</span>
				</a>
				<a href="<?php echo U("Index/kyline");?>" class="menu-item">
					<span class="js-blur">开源</span>
				</a>
				<a href="<?php echo U("Index/timeline");?>" class="menu-item">
					<span class="js-blur">新闻</span>
				</a>
				<a href="<?php echo U("Index/salon");?>" class="menu-item">
					<span class="js-blur">沙龙</span>
				</a>
				<!--<a href="#" class="menu-item">
					<span class="js-blur">成员</span>
				</a>
				<a href="#" class="menu-item">
					<span class="js-blur">关于</span>
				</a>-->
			</nav>
		</div>
		<button class="menu-toggle"><span>Open Menu</span></button>
	</div>
	<!-- /container -->
	
	<script src="/ydlm/Public/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="/ydlm/Public/admin/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="/ydlm/Public/admin/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="/ydlm/Public/admin/js/bootstrap.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
	<script src="media/js/excanvas.min.js"></script>
	<script src="media/js/respond.min.js"></script>  
	<![endif]-->   
	<script src="/ydlm/Public/admin/js/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="/ydlm/Public/admin/js/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="/ydlm/Public/admin/js/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="/ydlm/Public/admin/js/jquery.uniform.min.js" type="text/javascript" ></script>
	<script type="text/javascript" src="/ydlm/Public/admin/js/bootstrap-fileupload.js"></script>
	<script src="/ydlm/Public/admin/js/bootstrap-modal.js" type="text/javascript" ></script>
	<script src="/ydlm/Public/admin/js/bootstrap-modalmanager.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<script src="/ydlm/Public/admin/js/app.js"></script>      
	<script src="/ydlm/Public/admin/js/form-components.js"></script>  
	<script src="/ydlm/Public/admin/js/ui-modals.js"></script>     
	<script>
		// jQuery(document).ready(function() {       

		   // initiate layout and plugins
		   // App.init();
		   // FormComponents.init();
		   // UIModals.init();
		// });
	</script>
	<!-- END JAVASCRIPTS -->

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>


	<script src="/ydlm/Public/home/js/motionblur.js"></script>
	<script src="/ydlm/Public/home/js/menu.js"></script>
</body>

</html>