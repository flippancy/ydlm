<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="" content=""> -->
    <!-- <link rel="shortcut icon" href="../favicon.ico"> -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/ydlm/1/Public/home/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/ydlm/1/Public/home/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="/ydlm/1/Public/home/css/menu.css" />
    
    <title>移动联盟 | 沙龙展示</title>
    <link href="/ydlm/1/Public/home/css/timeline.css" rel="stylesheet" type="text/css" />

    <!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <script src="/ydlm/1/Public/home/js/TweenMax.min.js"></script>
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
            <?php if(is_array($file)): $i = 0; $__LIST__ = $file;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$file): $mod = ($i % 2 );++$i;?><li class="timeline-grey">
                    <div class="timeline-time">
                        <span class="date"><?php echo ($file["date"]); ?></span>
                    </div>
                    <div class="timeline-body">
                        <h2>
                            <?php echo ($file["name"]); ?>
                            <?php if(!empty($file["author"])): ?><div class="pull-right"><small>by <?php echo ($file["author"]); ?></small></div><?php endif; ?>
                        </h2>
                        <div class="timeline-content">
                            <?php echo ($file["instruction"]); ?>
                        </div>
                        </notempty>
                        <div class="timeline-footer row">
                            <div class="col-sm-4 col-xs-4">
                                <?php if(!empty($file["filename"])): ?><a href="<?php echo ($file["file"]); ?>" class="nav-link btn btn-default" style="width:100%;text-align:center">下载文档</a><?php endif; ?>
                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <?php if(!empty($file["mainfilename"])): ?><a href="<?php echo ($file["mainfile"]); ?>" class="nav-link btn btn-default" style="width:100%;text-align:center">下载源代码</a><?php endif; ?>
                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <?php if(!empty($file["pptfilename"])): ?><a href="<?php echo ($file["pptfile"]); ?>" class="nav-link btn btn-default" style="width:100%;text-align:center">下载ppt</a><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="col-sm-4">
        <div class="time-right">
            <div class="col-sm-6">
                <a class="btn btn-default" style="width:100%" href="#add" data-toggle="modal">提交</a>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-default" style="width:100%" href="#">评论</a>
            </div>
            <div class="list-group col-sm-12" style="padding:15px">
                <?php if(is_array($log)): $i = 0; $__LIST__ = $log;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?><button class="list-group-item" style="font-size:20px;"><?php echo ($log["title"]); ?></button><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="list-group col-sm-12" style="padding:15px">
                <div style="background-color:#fff;border-radius:5px;">
                <div class="ds-thread" data-thread-key="salon" data-title="salon" data-url="salon"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- 上传 -->
    <div id="add" class="modal fade" tabindex="-1" data-backdrop="add" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">申请沙龙项目</h4>
                </div>
                <form action="/ydlm/1/index.php/Index/uploadSalon" enctype="multipart/form-data" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <div class="list-group">
                            <div class="row">
                                <div class="control-group col-sm-4">
                                    <label class="control-label">文件上传</label>
                                    <input type="file" name="file">
                                </div>
                                <div class="control-group col-sm-4">
                                    <label class="control-label">源码上传</label>
                                    <input type="file" name="mainfile">
                                </div>
                                <div class="control-group col-sm-4">
                                    <label class="control-label">ppt上传</label>
                                    <input type="file" name="pptfile">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">名称:</label>
                                <input type="text" class="form-control" name="name" />
                            </div>
                            <div class="control-group">
                                <label class="control-label">作者:</label>
                                <input type="text" class="form-control" name="author" />
                            </div>
                            <div class="control-group">
                                <label class="control-label">说明:</label>
                                <textarea class="form-control" name="instruction"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        请耐心等待完成提示！
                        <button type="submit" class="btn btn-info">提交</button>
                        <button type="button" data-dismiss="modal" class="btn btn-info">取消</button>
                    </div>
                </form>
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
                <a href="/ydlm/1/admin.php" class="menu-item">
                    <span class="js-blur">登陆</span>
                </a>
            </nav>
        </div>
        <button class="menu-toggle"><span>Open Menu</span></button>
    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"ydlm"};
    (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0] 
         || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
    </script>
<!-- 多说公共JS代码 end -->

    <script src="/ydlm/1/Public/home/js/motionblur.js"></script>
    <script src="/ydlm/1/Public/home/js/menu.js"></script>
</body>

</html>