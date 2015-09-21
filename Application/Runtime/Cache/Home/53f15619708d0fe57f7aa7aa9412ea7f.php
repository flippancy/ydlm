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
    
    <title>移动联盟 | 开源项目</title>
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
                                <a href="<?php echo ($file["path"]); ?>" class="nav-link btn btn-info" style="width:100%;text-align:center">下载</a>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <?php if(!empty($file["yulan"])): ?><a href="<?php echo ($file["yulan"]); ?>" class="nav-link btn btn-info" style="width:100%;text-align:center">
                                预览</a><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="col-sm-4">
        <div class="time-right">
            <div class="col-sm-6">
                <a class="btn btn-info" style="width:100%" href="#add" data-toggle="modal">提交</a>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-info" style="width:100%" href="#">评论</a>
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
                            <div class="row">
                                <input type="file" id="fileToUpload" onchange="fileSelected();" class="col-sm-3">
                                <div id="fileName" class="col-sm-3"></div>
                                <div id="fileSize" class="col-sm-3"></div>
                                <div id="fileType" class="col-sm-3"></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" id="progressNumber" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">项目名称</label>
                            <input type="text" class="form-control" id="name" />
                        </div>
                        <div class="control-group">
                            <label class="control-label">项目参与者</label>
                            <input type="text" class="form-control" id="author" />
                        </div>
                        <div class="control-group">
                            <label class="control-label">开源介绍</label>
                            <input type="text" class="form-control" id="instruction" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info" onclick="uploadFile()">提交</button>
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
                <a href="/ydlm/admin.php" class="menu-item">
                    <span class="js-blur">登陆</span>
                </a>
            </nav>
        </div>
        <button class="menu-toggle"><span>Open Menu</span></button>
    
    <script type="text/javascript">
    function fileSelected() {
        var file = document.getElementById('fileToUpload').files[0];
        if (file) {
            var fileSize = 0;
            if (file.size > 1024 * 1024)
                fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
            else
                fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
            document.getElementById('fileName').innerHTML = '文件名' + file.name;
            document.getElementById('fileSize').innerHTML = '文件大小:' + fileSize;
            document.getElementById('fileType').innerHTML = '文件类型:' + file.type;
        }
    }

    function uploadFile() {
        var fd = new FormData();
        fd.append("fileToUpload", document.getElementById('fileToUpload').files[0]);
        fd.append("name", document.getElementById("name").value);
        fd.append("filename", document.getElementById('fileToUpload').files[0].name);
        fd.append("author", document.getElementById('author').value);
        fd.append("instruction", document.getElementById('instruction').value);
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener("progress", uploadProgress, false);
        xhr.addEventListener("load", uploadComplete, false);
        xhr.addEventListener("error", uploadFailed, false);
        xhr.addEventListener("abort", uploadCanceled, false);
        xhr.open("POST", "/ydlm/index.php/Index/upload"); //修改成自己的接口
        xhr.send(fd);
    }

    function uploadProgress(evt) {
        if (evt.lengthComputable) {
            var percentComplete = Math.round(evt.loaded * 100 / evt.total);
            document.getElementById('progressNumber').style.width = percentComplete.toString() + '%';
        } else {
            document.getElementById('progressNumber').innerHTML = 'unable to compute';
        }
    }

    function uploadComplete(evt) {
        // 服务器端返回响应时候触发event事件
        alert("添加成功,请等待审批");
    }

    function uploadFailed(evt) {
        alert("There was an error attempting to upload the file.");
    }

    function uploadCanceled(evt) {
        alert("The upload has been canceled by the user or the browser dropped the connection.");
    }
    </script>

    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/ydlm/Public/home/js/motionblur.js"></script>
    <script src="/ydlm/Public/home/js/menu.js"></script>
</body>

</html>