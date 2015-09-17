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
    
    <link href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/y_b/Public/Home/css/dropzone.min.css" rel="stylesheet">

</head>

<body class="cbp-spmenu-push">
    <header class="navbar navbar-fixed-top navbar-custom" id="navbar">
        <nav class="dropdown navbar-menu">
            
    <!-- 菜单示例 -->
    <a id="menu" href="<?php echo U('Index/logout');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-off"></span></a>
    <a id="menu" href="#myModal" class="dropdown-toggle" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span></a>
    <a id="menu" href="<?php echo U('Index/adminArticle');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-comment"></span></a>
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
    <form action="" class="dropzone">
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    </form>
    <div>
        <div class="add"></div>
        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><div class="alert alert-info">
                <div class="row">
                    <div class="col-sm-2">
                        <img src="<?php echo ($info["url"]); ?>" class="img-rounded pure-img" style="height:80px;">
                    </div>
                    <div class="col-sm-8">
                        <form action="<?php echo U('Index/adminUpdate');?>" class="form-horizontal" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" name="remark" value="<?php echo ($info["remark"]); ?>">
                                <input type="hidden" class="form-control" name="id" value="<?php echo ($info["id"]); ?>">
                                <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-pencil"></button>
                            </span>
                            </div>
                        </form>
                        <p> 文件类型：<?php echo ($info["type"]); ?>__文件大小：<?php echo ($info["size"]); ?>__文件后缀：<?php echo ($info["ext"]); ?></p>
                    </div>
                    <div class="col-sm-2">
                        <a href="/y_b/index.php/Index/delete?name=<?php echo ($info["name"]); ?>" class="btn btn-info"><span class="glyphicon glyphicon-trash"></span></a>
                        <a href="#" class="btn btn-info" data-dismiss="alert"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!-- 模态框 -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">新建专辑文章</h4>
                </div>
                <div class="modal-body">
                    在这里添加一些文本
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary">提交更改</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo ($page); ?>

    </div>
    <footer>
        

    </footer>
</body>
<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/y_b/Public/Home/js/dropzone.min.js"></script>
    <script type="text/javascript">
    $(".dropzone").dropzone({
        paramName: "file",
        url: "<?php echo U('Index/up');?>",
        maxFiles: 10,
        maxFilesize: 512,
        acceptedFiles: ".bmp,.jpg,.gif,.svg,.png,.jpeg",
        init: function() {
            this.on("success", function(file, info) {
                $(".add").append(
                    '<div class="alert alert-info">' +
                    '<div class="row">' +
                    '    <div class="col-sm-2">' +
                    '        <img src="' + info.url + '" class="img-rounded pure-img" style="height:80px;">' +
                    '    </div>' +
                    '<div class="col-sm-8">' +
                    '    <form action="<?php echo U('
                    Index / adminUpdate ');?>" class="form-horizontal" method="post">' +
                    '        <div class="input-group">' +
                    '            <input type="text" class="form-control" name="remark" value="' + info.remark + '">' +
                    '           <input class="form-control" name="id" value="' + info.id + '">' +
                    '            <span class="input-group-btn">' +
                    '        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-pencil"></button>' +
                    '        </span>' +
                    '        </div>' +
                    '    </form>' +
                    '    <p> 文件类型：' + info.type + '__文件大小：' + info.size + '__文件后缀：' + info.ext + '</p>' +
                    '</div>' +
                    '    <div class="col-sm-2">' +
                    '        <a href="/y_b/index.php/Index/delete?name=' + info.name + '" class="btn btn-info"><span class="glyphicon glyphicon-trash"></span></a>' +
                    '        <a href="#" class="btn btn-info" data-dismiss="alert"><span class="glyphicon glyphicon-remove"></span></a>' +
                    '    </div>' +
                    '</div>' +
                    '</div>');
            });
            this.on("removedfile", function(file) {
                console.log("File " + file.name + "removed");
            });
        }
    });
    </script>


</html>