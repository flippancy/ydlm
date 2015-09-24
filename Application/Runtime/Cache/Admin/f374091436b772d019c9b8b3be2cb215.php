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
    

</head>

<body>
    <div class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <div class="logo">
                <h1>移动联盟 - 文件管理</h1>
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
                <li><a href="/ydlm/index.php"><i class="fa fa-backward"></i>返回前台</a></li>
                <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>退出</a></li>
            </ul>
        </div>
        <!--/.navbar-collapse -->
        <div class="templatemo-content-wrapper">
            <div class="templatemo-content">
                
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <ul class="nav nav-tabs" role="tablist" id="templatemo-tabs">
                <li class="active"><a href="#list" role="tab" data-toggle="tab" style="color:#222">开源项目列表</a></li>
                <li><a href="#check" role="tab" data-toggle="tab" style="color:#222">未审批项目列表</a></li>
                <li><a href="#new" role="tab" data-toggle="tab" style="color:#222">新建项目</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="list">
                    <table class="table-bordered table-striped table-condensed" style="width:100%">
                        <thead>
                            <tr>
                                <th>文件名称</th>
                                <th>文件大小</th>
                                <th>文件路径</th>
                                <th>创建时间</th>
                                <th>作者</th>
                                <th>作品说明</th>
                                <th colspan="4">操作</th>
                            </tr>
                        </thead>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tbody>
                                <tr>
                                    <td class="name"><?php echo ($vo["filename"]); ?></td>
                                    <td class="size"><?php echo ($vo["size"]); ?></td>
                                    <td class="path"><?php echo ($vo["path"]); ?></td>
                                    <td class="time"><?php echo ($vo["time"]); ?></td>
                                    <td class="author"><?php echo ($vo["author"]); ?></td>
                                    <td class="instruction"><?php echo ($vo["instruction"]); ?></td>
                                    <td>
                                        <p href="<?php echo ($vo["path"]); ?>" data-toggle="modal" style="font-size:20px;color:#5BC0DE;margin:0;"><i class="fa fa-download"></i></p>
                                    </td>
                                    <td>
                                        <p class="fa fa-trash" onclick="javascript:if(confirm('确定删除该开源项目?'))location='/ydlm/admin.php/File/delete?id=<?php echo ($vo["id"]); ?>'" style="font-size:20px;color:#5BC0DE;margin:0;"></p>
                                    </td>
                                    <td>
                                        <p href="#update<?php echo ($vo["id"]); ?>" data-toggle="modal" style="font-size:20px;color:#5BC0DE;margin:0;"><i class=" fa fa-edit"></i></p>
                                    </td>
                                    <td>
                                        <p onclick="location.href='/ydlm/admin.php/File/change?id=<?php echo ($vo["id"]); ?>'" style="font-size:20px;color:#5BC0DE;margin:0;"><i class="fa fa-check-circle-o"></i></p>
                                    </td>
                                </tr>
                            </tbody>
                            <!-- 修改模态框 -->
                            <div id="update<?php echo ($vo["id"]); ?>" class="modal fade" tabindex="-1" data-backdrop="update">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">修改基本内容</h4>
                                        </div>
                                        <form form action="/ydlm/admin.php/File/update?id=<?php echo ($vo["id"]); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
                                            <div class="modal-body">
                                                <div class="row-fluid">
                                                    <div class="control-group">
                                                        <label class="control-label">项目名称:</label>
                                                        <input type="text" class="form-control" name="name" value="<?php echo ($vo["filename"]); ?>" />
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">项目参与者:</label>
                                                        <input type="text" class="form-control" name="author" value="<?php echo ($vo["author"]); ?>" />
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">开源介绍:</label>
                                                        <input type="text" class="form-control" name="instruction" value="<?php echo ($vo["instruction"]); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn">保存修改</button>
                                                <button type="button" data-dismiss="modal" class="btn">取消</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <?php echo ($Page); ?>
                </div>
                <div class="tab-pane fade" id="check">
                    <table class="table-bordered table-striped table-condensed" style="width:100%">
                        <thead>
                            <tr>
                                <th>文件名称</th>
                                <th>文件大小</th>
                                <th>文件路径</th>
                                <th>创建时间</th>
                                <th>作者</th>
                                <th>作品说明</th>
                                <th colspan="4">操作</th>
                            </tr>
                        </thead>
                        <?php if(is_array($list_no)): $i = 0; $__LIST__ = $list_no;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tbody>
                                <tr>
                                    <td class="name"><?php echo ($vo["filename"]); ?></td>
                                    <td class="size"><?php echo ($vo["size"]); ?></td>
                                    <td class="path"><?php echo ($vo["path"]); ?></td>
                                    <td class="time"><?php echo ($vo["time"]); ?></td>
                                    <td class="author"><?php echo ($vo["author"]); ?></td>
                                    <td class="instruction"><?php echo ($vo["instruction"]); ?></td>
                                    <td>
                                        <p href="/<?php echo ($vo["path"]); ?>" data-toggle="modal" style="font-size:20px;color:#5BC0DE;margin:0;"><i class="fa fa-download"></i></p>
                                    </td>
                                    <td>
                                        <p class="fa fa-trash" onclick="javascript:if(confirm('确定删除该开源项目?'))location='/ydlm/admin.php/File/delete?id=<?php echo ($vo["id"]); ?>'" style="font-size:20px;color:#5BC0DE;margin:0;"></p>
                                    </td>
                                    <td>
                                        <p href="#update<?php echo ($vo["id"]); ?>" data-toggle="modal" style="font-size:20px;color:#5BC0DE;margin:0;"><i class=" fa fa-edit"></i></p>
                                    </td>
                                    <td>
                                        <p onclick="location.href='/ydlm/admin.php/File/change?id=<?php echo ($vo["id"]); ?>'" style="font-size:20px;color:#5BC0DE;margin:0;"><i class="fa fa-circle-o"></i></p>
                                    </td>
                                </tr>
                            </tbody>
                            <!-- 修改模态框 -->
                            <div id="update<?php echo ($vo["id"]); ?>" class="modal fade" tabindex="-1" data-backdrop="update">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">修改基本内容</h4>
                                        </div>
                                        <form form action="/ydlm/admin.php/File/update?id=<?php echo ($vo["id"]); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
                                            <div class="modal-body">
                                                <div class="row-fluid">
                                                    <div class="control-group">
                                                        <label class="control-label">项目名称:</label>
                                                        <input type="text" class="form-control" name="name" value="<?php echo ($vo["filename"]); ?>" />
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">项目参与者:</label>
                                                        <input type="text" class="form-control" name="author" value="<?php echo ($vo["author"]); ?>" />
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">开源介绍:</label>
                                                        <input type="text" class="form-control" name="instruction" value="<?php echo ($vo["instruction"]); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn">保存修改</button>
                                                <button type="button" data-dismiss="modal" class="btn">取消</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <?php echo ($Page_no); ?>
                </div>
                <div class="tab-pane fade" id="new">
                    <div class="list-group">
                        <div class="control-group">
                            <label class="control-label">文件上传</label>
                            <div class="row file">
                                <input id="fileupload" type="file" name="files[]" data-url="/ydlm/admin.php/File/upload" onchange="fileSelected();" class="col-sm-3" multiple>
                                <div id="fileName" class="col-sm-3"></div>
                                <div id="fileSize" class="col-sm-3"></div>
                                <div class="col-sm-3 upload-file">
                                    <button class="btn pull-right upload-file-btn" style="width:100%">没有选择文件</button>
                                </div>
                            </div>
                        </div>
                        <div class="progress" id="progress">
                            <div class="bar progress-bar progress-bar-info" style="width: 0%;"></div>
                        </div>
                    </div>
                    <form action="/ydlm/admin.php/File/add" enctype="multipart/form-data" method="post" class="form-horizontal">
                        <input type="hidden" class="form-control" id="savename" name="savename" />
                        <input type="hidden" class="form-control" id="size" name="size" />
                        <input type="hidden" class="form-control" id="path" name="path" />
                        <input type="hidden" class="form-control" id="url" name="url" />
                        <div class="control-group">
                            <label class="control-label">项目名称</label>
                            <input type="text" class="form-control" id="filename" name="filename" />
                        </div>
                        <div class="control-group">
                            <label class="control-label">项目参与者</label>
                            <input type="text" class="form-control" id="author" name="author" />
                        </div>
                        <div class="control-group">
                            <label class="control-label">开源介绍</label>
                            <input type="text" class="form-control" id="instruction" name="instruction" />
                        </div>
                        <div class="control-group col-sm-offset-8 col-sm-4">
                            <button class="btn btn-info pull-right" style="width:100%">新建</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    
    <script src="/ydlm/Public/admin/js/jquery.ui.widget.js"></script>
    <script src="/ydlm/Public/admin/js/jquery.iframe-transport.js"></script>
    <script src="/ydlm/Public/admin/js/jquery.fileupload.js"></script>
    <script>
    $(function() {
        $('#fileupload').fileupload({
            dataType: 'json',
            add: function(e, data) {
                $('.upload-file-btn').text('上传');
                $('.upload-file-btn').click(function() {
                    $('.upload-file-btn').text('上传中...');
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

</body>

</html>