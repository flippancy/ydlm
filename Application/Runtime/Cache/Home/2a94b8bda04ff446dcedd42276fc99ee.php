<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>移动联盟官方首页</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
	<link href="/ydlm/Public/home/css/default.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/ydlm/Public/home/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="/ydlm/Public/Home/ar/css/style.css" />
	<script type="text/javascript" src="/ydlm/Public/Home/ar/js/modernizr.custom.26633.js"></script>
</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="menu">
			<ul>
				<li><a href="#" accesskey="1" title="">首页</a></li>
				<li><a href="<?php echo U("Index/kyline");?>" accesskey="2" title="">开源</a></li>
				<li><a href="<?php echo U("Index/timeline");?>" accesskey="3" title="">新闻</a></li>
				<li><a href="<?php echo U("Index/salon");?>" accesskey="4" title="">沙龙</a></li>
				<!--<li><a href="#" accesskey="5" title="">会员</a></li>
				<li><a href="#" accesskey="6" title="">关于</a></li>-->
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
			<span class="byline">关注it前沿技术，关注it最新动态。</span> </div>
		<div class="content">
			<p>这是<strong>移动联盟</strong>，沿着目前移动开发方向发展的学科性团队。主要开发移动互联网，包括网站开发、安卓APP等.如：微网站集成平台，移动设备上的软件开发等，这些项目都是在跟紧移动互联网的前提下的产学研结合。用行动说话，顺应时代潮流，培养应用型人才，是这支团队的宗旨。这支团队在韩迪老师的带领下，硕果累累，曾囊括2014粤港澳大学生移动互联网创新设计大赛一等奖，同时也为企业输送了许多应用型人才。
			</p>
<!-- 			<a href="#" class="button">了解更多</a> </div> -->
	</div>
</div>
<div id="wrapper3">
	<section class="main">
		<div id="ri-grid" class="ri-grid ri-grid-size-2">
			<img class="ri-loading-image" src="/ydlm/Public/Home/ar/images/loading.gif"/>
			<ul>
				<?php if(is_array($photo)): $i = 0; $__LIST__ = $photo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$photo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($photo["img_path"]); ?>"><img src="<?php echo ($photo["img_path"]); ?>"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</section>
</div>
<div id="wrapper2">
	<div id="newsletter" class="container">
		<div class="title">
			<h2>加入我们</h2>
			<span class="byline">输入您的具体信息发送到我们的邮箱</span> </div>
		<div class="content">
			<form method="post" action="#">
				<div class="row half">
					<div class="6u">
						<input type="text" class="text" name="name" placeholder="Name" />
					</div>
					<div class="6u">
						<input type="text" class="text" name="email" placeholder="Email" />
					</div>
				</div>
				<div class="row half">
					<div class="12u">
						<textarea name="message" placeholder="Message"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="12u"> <a href="#" class="button submit">Send Message</a> </div>
				</div>
			</form>
		</div>
	</div>
</div>
<div id="copyright">
	<p>&copy; 移动联盟官方首页 | Design by <a href="" rel="nofollow">flippancy</a>.</p>
</div>
	<script src="http://cdn.bootcss.com/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="/ydlm/Public/Home/ar/js/jquery.gridrotator.js"></script>
	<script type="text/javascript">	
		$(function() {
		
			$( '#ri-grid' ).gridrotator( {
				rows		: 2,
				columns		: 8,
				animType	: 'fadeInOut',
				animSpeed	: 1000,
				interval	: 600,
				step		: 1,
				w320		: {
					rows	: 3,
					columns	: 4
				},
				w240		: {
					rows	: 3,
					columns	: 4
				}
			} );
		
		});
	</script>
</body>
</html>