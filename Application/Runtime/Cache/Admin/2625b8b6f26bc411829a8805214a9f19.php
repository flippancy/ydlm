<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>移动联盟后台</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/ydlm/Public/admin/css/templatemo_main.css">
    
    <link href="/ydlm/Public/admin/css/dropzone.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/lightbox2/2.8.1/css/lightbox.min.css" rel="stylesheet">

</head>

<body>
    <div class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <div class="logo">
                <h1>移动联盟 - 照片管理</h1>
            </div>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">下拉框</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>
    <div class="template-page-wrapper">
        <div class="navbar-collapse collapse templatemo-sidebar">
            <ul class="templatemo-sidebar-menu">
                <li>
                    <form class="navbar-form">
                        <input type="text" class="form-control" id="templatemo_search_box" placeholder="搜索">
                        <span class="btn btn-default">Go</span>
                    </form>
                </li>
                <li><a href="<?php echo U('Admin/index');?>"><i class="fa fa-home"></i>主页</a></li>
                <li><a href="<?php echo U('File/index');?>"><i class="fa fa-cubes"></i><span class="badge pull-right"></span>开源软件管理</a></li>
                <li><a href="<?php echo U('News/index');?>"><i class="fa fa-newspaper-o"></i><span class="badge pull-right"></span>新闻管理</a></li>
                <li><a href="<?php echo U('Photo/index');?>"><i class="fa fa-photo"></i><span class="badge pull-right"></span>照片管理</a></li>
                <li><a href="<?php echo U('Salon/index');?>"><i class="fa fa-file-code-o"></i>沙龙管理</a></li>
                <li class="sub">
                    <a href="javascript:;">
                        <i class="fa fa-cog"></i> 系统管理
                        <div class="pull-right"><span class="caret"></span></div>
                    </a>
                    <ul class="templatemo-submenu">
                        <li><a href="<?php echo U('Person/index');?>">账户管理</a></li>
                    </ul>
                </li>
                <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>退出</a></li>
            </ul>
        </div>
        <!--/.navbar-collapse -->
        <div class="templatemo-content-wrapper">
            <div class="templatemo-content">
                
    <form action="" class="dropzone">
        <div class="fallback">
            <input name="file" type="file" multiple/>
        </div>
    </form>
    <div>
        <div class="add"></div>
        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><div class="alert alert-info">
                <div class="row">
                    <div class="col-sm-1">
                        <center>
                            <a href="<?php echo ($info["url"]); ?>" data-lightbox="image-1" data-title="<?php echo ($info["remark"]); ?>"><img src="<?php echo ($info["url"]); ?>?imageView2/1/w/150/h/150" style="width:100%;max-width:150px;" /></a>
                        </center>
                    </div>
                    <div class="col-sm-10">
                        <form action="<?php echo U('Photo/update');?>" class="form-horizontal" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" name="remark" value="<?php echo ($info["remark"]); ?>">
                                <input type="hidden" class="form-control" name="id" value="<?php echo ($info["id"]); ?>">
                                <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="fa fa-edit"></button>
                            </span>
                            </div>
                        </form>
                        <div class="col-sm-4">文件类型：<?php echo ($info["type"]); ?></div>
                        <div class="col-sm-4">文件大小：<?php echo ($info["size"]); ?> B</div>
                        <div class="col-sm-4">文件后缀：<?php echo ($info["ext"]); ?></div>
                        <hr style="margin-bottom:0">
                        <div class="col-sm-12">文件链接：<?php echo ($info["url"]); ?></div>
                        <hr style="margin-bottom:0">
                        <div class="col-sm-12">创建时间：<?php echo ($info["created_at"]); ?></div>
                    </div>
                    <!--                     <div class="col-sm-1 col-xs-6">
                        <a href="#" class="btn btn-info" style="width:100%;" data-dismiss="alert"><span class="fa fa-eye"></span></a>
                    </div> -->
                    <div class="col-sm-1 col-xs-6">
                        <a href="/ydlm/admin.php/Photo/delete?name=<?php echo ($info["name"]); ?>" class="btn btn-info" style="width:100%;"><span class="fa fa-trash"></span></a>
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php echo ($page); ?>
    </div>

            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">确定退出？</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo U('Index/logout');?>" class="btn btn-primary">是</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">否</button>
                    </div>
                </div>
            </div>
        </div>
<!--         <footer class="templatemo-footer">
            <div class="templatemo-copyright">
                <p>&copy; 移动联盟官方首页 | Design by <a href="" rel="nofollow">flippancy</a>.</p>
            </div>
        </footer> -->
    </div>
    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/ydlm/Public/admin/js/templatemo_script.js"></script>
    
    <script type="text/javascript" src="/ydlm/Public/admin/js/dropzone.min.js"></script>
    <script src="http://cdn.bootcss.com/lightbox2/2.8.1/js/lightbox.min.js"></script>
    <script type="text/javascript">
    $(".dropzone").dropzone({
        paramName: "file",
        url: "<?php echo U('Photo/upload');?>",
        maxFiles: 10,
        maxFilesize: 512,
        acceptedFiles: ".bmp,.jpg,.gif,.svg,.png,.jpeg",
        init: function() {
            this.on("success", function(file, info) {
                $(".add").append(
                    '<div class="alert alert-success">' +
                    '<div class="row">' +
                    '    <div class="col-sm-1">' +
                    '       <center>' + 
                    '        <a href="' + info.url + '" data-lightbox="image-1" data-title="' + info.remark + '"><img src="' + info.url + '?imageView2/1/w/150/h/150" style="width:100%;max-width:150px;"/></a>' +
                    '       </center>' + 
                    '    </div>' +
                    '<div class="col-sm-10">' +
                    '    <form action="<?php echo U('Photo/update');?>" class="form-horizontal" method="post">' +
                    '        <div class="input-group">' +
                    '            <input type="text" class="form-control" name="remark" value="' + info.remark + '">' +
                    '            <input type="hidden" class="form-control" name="id" value="' + info.id + '">' +
                    '            <span class="input-group-btn">' +
                    '        <button class="btn btn-default" type="submit"><span class="fa fa-edit"></button>' +
                    '        </span>' +
                    '        </div>' +
                    '    </form>' +
                    '    <div class="col-sm-4">文件类型：' + info.type + '</div>' +
                    '    <div class="col-sm-4">文件大小：' + info.size + '  B</div>' +
                    '    <div class="col-sm-4">文件后缀：' + info.ext + '</div><hr style="margin-bottom:0">' +
                    '    <div class="col-sm-12">文件链接：' + info.url + '</div><hr style="margin-bottom:0">' +
                    '    <div class="col-sm-12">创建时间：' + info.created_at + '</div>' +
                    '</div>' +
                    '    <div class="col-sm-1 col-xs-6">' +
                    '        <a href="/ydlm/admin.php/Photo/delete?name=' + info.name + '" class="btn btn-info" style="width:100%;"><span class="fa fa-file-image-o"></span></a>' +
                    '    </div>' +
                    // '    <div class="col-sm-1 col-xs-6">' +
                    // '        <a href="#" class="btn btn-info" data-dismiss="alert" style="width:100%;"><span class="fa fa-file-image-o"></span></a>' +
                    // '    </div>' +
                    '</div>' +
                    '</div>');
            });
            this.on("removedfile", function(file) {
                console.log("File " + file.name + "removed");
            });
        }
    });
    </script>

</body>

</html>