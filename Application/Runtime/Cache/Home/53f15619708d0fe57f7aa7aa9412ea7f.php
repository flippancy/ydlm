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
    
    <title>移动联盟 | 开源项目</title>
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
                        <span class="date"><?php echo ($file["time"]); ?></span>
                    </div>
                    <div class="timeline-body">
                        <h2><?php echo ($file["filename"]); ?></h2>
                        <div class="timeline-content">
                            <?php echo ($file["instruction"]); ?>
                        </div>
                        <div class="timeline-footer row">
                            <div class="col-sm-6 col-xs-6">
                                <a href="<?php echo ($file["url"]); ?>" class="nav-link btn btn-default" style="width:100%;text-align:center">下载</a>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <?php if(!empty($file["yulan"])): ?><a href="<?php echo ($file["yulan"]); ?>" class="nav-link btn btn-info" style="width:100%;text-align:center">
                                预览</a><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php echo ($page); ?>
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
                <div class="ds-thread" data-thread-key="kyline" data-title="kyline" data-url="kyline"></div>
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
                    <h4 class="modal-title">申请开源项目</h4>
                </div>
                <div class="modal-body">
                    <div class="list-group">
                        <div class="control-group">
                            <label class="control-label">文件上传</label>
                            <div class="row file">
                                <input id="fileupload" type="file" name="files[]" data-url="<?php echo U('Index/upload');?>" onchange="fileSelected();" class="col-sm-4" multiple>
                                <div id="fileName" class="col-sm-4"></div>
                                <div id="fileSize" class="col-sm-4"></div>
                            </div>
                        </div>
                        <div class="progress" id="progress">
                            <div class="bar progress-bar progress-bar-info" style="width: 0%;"></div>
                        </div>
                        <form action="/ydlm/1/index.php/Index/add" enctype="multipart/form-data" method="post" class="form-horizontal">
                            <input type="hidden" class="form-control" id="savename" name="savename" />
                            <input type="hidden" class="form-control" id="size" name="size" required/>
                            <input type="hidden" class="form-control" id="path" name="path" required/>
                            <input type="hidden" class="form-control" id="url" name="url" required/>
                            <div class="control-group">
                                <label class="control-label">项目名称</label>
                                <input type="text" class="form-control" id="filename" name="filename" required/>
                            </div>
                            <div class="control-group">
                                <label class="control-label">项目参与者</label>
                                <input type="text" class="form-control" id="author" name="author" required/>
                            </div>
                            <div class="control-group">
                                <label class="control-label">开源介绍</label>
                                <input type="text" class="form-control" id="instruction" name="instruction" required/>
                            </div>
                            <br>
                            <div class="control-group col-sm-4">
                                <button class="btn btn-info pull-right new" style="width:100%" disabled="disabled">新建</button>
                            </div>
                        </form>
                        <div class="control-group col-sm-offset-4 col-sm-4 upload-file">
                            <button class="btn pull-right upload-file-btn" style="width:100%">没有选择文件</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" data-dismiss="modal" class="btn btn-info">取消</button> -->
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
    
    <script src="/ydlm/1/Public/admin/js/jquery.ui.widget.js"></script>
    <script src="/ydlm/1/Public/admin/js/jquery.iframe-transport.js"></script>
    <script src="/ydlm/1/Public/admin/js/jquery.fileupload.js"></script>
    <script>
    $(function() {
        $('#fileupload').fileupload({
            dataType: 'json',
            add: function(e, data) {
                $('.upload-file-btn').text('上传');
                $('.upload-file-btn').click(function() {
                    $('.upload-file-btn').text('上传中，请耐心等待提示！');
                    data.submit();
                });
            },
            done: function(e, data) {
                var info = data.jqXHR.responseJSON;
                $('#savename').val(info[0].savename);
                $('#size').val(info[0].size);
                $('#path').val(info[0].name);
                $('#url').val(info[0].url);
                $('.upload-file-btn').text('上传完成');
                $('.new').attr('disabled', false);
                alert("上传完成");
            },
            progressall: function(e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .bar').css(
                    'width',
                    progress + '%'
                );
            }
        });
    });

    function fileSelected() {
        var file = document.getElementById('fileupload').files[0];
        if (file) {
            var fileSize = 0;
            if (file.size > 1024 * 1024)
                fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
            else
                fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
            document.getElementById('fileName').innerHTML = '文件名' + file.name;
            document.getElementById('fileSize').innerHTML = '文件大小:' + fileSize;
        }
    }
    </script>



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