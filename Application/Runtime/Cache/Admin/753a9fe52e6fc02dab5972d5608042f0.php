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
    <link rel="stylesheet" href="/ydlm/1/Public/admin/css/templatemo_main.css">
    

</head>

<body>
    <div class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <div class="logo">
                <h1>移动联盟 - 沙龙管理</h1>
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
                <li><a href="<?php echo U('Salon/index');?>"><i class="fa fa-file-code-o"></i>沙龙管理</a></li>
                <li><a href="<?php echo U('News/index');?>"><i class="fa fa-newspaper-o"></i><span class="badge pull-right"></span>新闻管理</a></li>
                <li><a href="<?php echo U('Log/index');?>"><i class="fa fa-pencil"></i><span class="badge pull-right"></span>开发日志</a></li>
                <li><a href="<?php echo U('Photo/index');?>"><i class="fa fa-photo"></i><span class="badge pull-right"></span>照片管理</a></li>
                <li class="sub">
                    <a href="javascript:;">
                        <i class="fa fa-cog"></i> 系统管理
                        <div class="pull-right"><span class="caret"></span></div>
                    </a>
                    <ul class="templatemo-submenu">
                        <li><a href="<?php echo U('Person/index');?>">账户管理</a></li>
                    </ul>
                </li>
                <li><a href="/ydlm/1/index.php"><i class="fa fa-backward"></i>返回前台</a></li>
                <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>退出</a></li>
            </ul>
        </div>
        <!--/.navbar-collapse -->
        <div class="templatemo-content-wrapper">
            <div class="templatemo-content">
                
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <ul class="nav nav-tabs" role="tablist" id="templatemo-tabs">
                <li class="active"><a href="#list" role="tab" data-toggle="tab" style="color:#222">沙龙列表</a></li>
                <li><a href="#check" role="tab" data-toggle="tab" style="color:#222">未审批沙龙列表</a></li>
                <li><a href="#new" role="tab" data-toggle="tab" style="color:#222">新建项目</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="list">
                    <table class="table-bordered table-striped table-condensed" style="width:100%">
                        <thead>
                            <tr>
                                <th>名称</th>
                                <th>说明</th>
                                <th>文档路径</th>
                                <th>源代码路径</th>
                                <th>ppt路径</th>
                                <th>作者</th>
                                <th>创建时间</th>
                                <th colspan="3">操作</th>
                            </tr>
                        </thead>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tbody>
                                <tr>
                                    <td class="name"><?php echo ($vo["name"]); ?></td>
                                    <td class="instruction"><?php echo ($vo["instruction"]); ?></td>
                                    <td class="file"><?php echo ($vo["filename"]); ?>
                                        <a href="<?php echo ($vo["file"]); ?>" data-toggle="modal" style="font-size:20px;color:#5BC0DE;margin:0;float:right;"><i class="fa fa-download"></i></a>
                                    </td>
                                    <td class="mainfile"><?php echo ($vo["mainfilename"]); ?>
                                        <a href="<?php echo ($vo["mainfile"]); ?>" data-toggle="modal" style="font-size:20px;color:#5BC0DE;margin:0;float:right;"><i class="fa fa-download"></i></a>
                                    </td>
                                    <td class="pptfile"><?php echo ($vo["pptfilename"]); ?>
                                        <a href="<?php echo ($vo["pptfile"]); ?>" data-toggle="modal" style="font-size:20px;color:#5BC0DE;margin:0;float:right;"><i class="fa fa-download"></i></a>
                                    </td>
                                    <td class="author"><?php echo ($vo["author"]); ?></td>
                                    <td class="date"><?php echo ($vo["date"]); ?></td>
                                    <td>
                                        <p class="fa fa-trash" onclick="javascript:if(confirm('确定删除该沙龙?'))location='/ydlm/1/admin.php/Salon/delete?id=<?php echo ($vo["id"]); ?>'" style="font-size:20px;color:#5BC0DE;margin:0;"></p>
                                    </td>
                                    <td>
                                        <p href="#update<?php echo ($vo["id"]); ?>" data-toggle="modal" style="font-size:20px;color:#5BC0DE;margin:0;"><i class=" fa fa-edit"></i></p>
                                    </td>
                                    <td>
                                        <p onclick="location.href='/ydlm/1/admin.php/Salon/change?id=<?php echo ($vo["id"]); ?>'" style="font-size:20px;color:#5BC0DE;margin:0;"><i class="fa fa-check-circle-o"></i></p>
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
                                        <form form action="/ydlm/1/admin.php/Salon/update?id=<?php echo ($vo["id"]); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
                                            <div class="modal-body">
                                                <div class="row-fluid">
                                                    <div class="control-group">
                                                        <label class="control-label">名称:</label>
                                                        <input type="text" class="form-control" name="name" value="<?php echo ($vo["name"]); ?>" />
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">作者:</label>
                                                        <input type="text" class="form-control" name="author" value="<?php echo ($vo["author"]); ?>" />
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">说明:</label>
                                                        <textarea class="form-control" name="instruction"><?php echo ($vo["instruction"]); ?></textarea>
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
                                <th>名称</th>
                                <th>说明</th>
                                <th>文档路径</th>
                                <th>源代码路径</th>
                                <th>ppt路径</th>
                                <th>作者</th>
                                <th>创建时间</th>
                                <th colspan="3">操作</th>
                            </tr>
                        </thead>
                        <?php if(is_array($list_no)): $i = 0; $__LIST__ = $list_no;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tbody>
                                <tr>
                                    <td class="name"><?php echo ($vo["name"]); ?></td>
                                    <td class="instruction"><?php echo ($vo["instruction"]); ?></td>
                                    <td class="file"><?php echo ($vo["filename"]); ?>
                                        <a href="<?php echo ($vo["file"]); ?>" style="font-size:20px;color:#5BC0DE;margin:0;float:right;"><i class="fa fa-download"></i></a>
                                    </td>
                                    <td class="mainfile"><?php echo ($vo["mainfilename"]); ?>
                                        <a href="<?php echo ($vo["mainfile"]); ?>" style="font-size:20px;color:#5BC0DE;margin:0;float:right;"><i class="fa fa-download"></i></a>
                                    </td>
                                    <td class="pptfile"><?php echo ($vo["pptfilename"]); ?>
                                        <a href="<?php echo ($vo["pptfile"]); ?>" style="font-size:20px;color:#5BC0DE;margin:0;float:right;"><i class="fa fa-download"></i></a>
                                    </td>
                                    <td class="author"><?php echo ($vo["author"]); ?></td>
                                    <td class="date"><?php echo ($vo["date"]); ?></td>
                                    <td>
                                        <p class="fa fa-trash" onclick="javascript:if(confirm('确定删除该沙龙?'))location='/ydlm/1/admin.php/Salon/delete?id=<?php echo ($vo["id"]); ?>'" style="font-size:20px;color:#5BC0DE;margin:0;"></p>
                                    </td>
                                    <td>
                                        <p href="#update<?php echo ($vo["id"]); ?>" data-toggle="modal" style="font-size:20px;color:#5BC0DE;margin:0;"><i class=" fa fa-edit"></i></p>
                                    </td>
                                    <td>
                                        <p onclick="location.href='/ydlm/1/admin.php/Salon/change?id=<?php echo ($vo["id"]); ?>'" style="font-size:20px;color:#5BC0DE;margin:0;"><i class="fa fa-circle-o"></i></p>
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
                                        <form form action="/ydlm/1/admin.php/Salon/update?id=<?php echo ($vo["id"]); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
                                            <div class="modal-body">
                                                <div class="row-fluid">
                                                    <div class="control-group">
                                                        <label class="control-label">名称:</label>
                                                        <input type="text" class="form-control" name="name" value="<?php echo ($vo["name"]); ?>" />
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">作者:</label>
                                                        <input type="text" class="form-control" name="author" value="<?php echo ($vo["author"]); ?>" />
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">说明:</label>
                                                        <textarea class="form-control" name="instruction"><?php echo ($vo["instruction"]); ?></textarea>
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
                    <form action="/ydlm/1/admin.php/Salon/upload" enctype="multipart/form-data" method="post" class="form-horizontal">
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
                            <div class="control-group col-sm-offset-8 col-sm-4">
                                <button class="btn btn-info pull-right" style="width:100%">新建</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="col-md-12">
            <div id="container">
                <a class="btn btn-default btn-lg " id="pickfiles" href="#">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>选择文件</span>
                </a>
            </div>
        </div>
        <div style="display:none" id="success" class="col-md-12">
            <div class="alert-success">
                队列全部文件处理完毕
            </div>
        </div>
        <div class="col-md-12 ">
            <table class="table table-striped table-hover text-left" style="margin-top:40px;display:none">
                <thead>
                    <tr>
                        <th class="col-md-4">文件名称</th>
                        <th class="col-md-2">文件大小</th>
                        <th class="col-md-6">文件详情</th>
                    </tr>
                </thead>
                <tbody id="fsUploadProgress">
                </tbody>
            </table>
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
    <script src="/ydlm/1/Public/admin/js/templatemo_script.js"></script>
    
    <!-- // <script src="/ydlm/1/Public/qiniu/plupload.full.min.js" type="text/javascript"></script> -->
    <!-- // <script src="/ydlm/1/Public/qiniu/qiniu.js" type="text/javascript"></script> -->
    <script type="text/javascript">
    // var uploader = Qiniu.uploader({
    //     runtimes: 'html5,flash,html4', //上传模式,依次退化
    //     browse_button: 'pickfiles', //上传选择的点选按钮，**必需**
    //     uptoken_url: '/ydlm/1/admin.php/Salon/upToken',
    //     //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
    //     // uptoken : '<Your upload token>',
    //     //若未指定uptoken_url,则必须指定 uptoken ,uptoken由其他程序生成
    //     // unique_names: true,
    //     // 默认 false，key为文件名。若开启该选项，SDK会为每个文件自动生成key（文件名）
    //     // save_key: true,
    //     // 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK在前端将不对key进行任何处理
    //     domain: 'http://7xlw9f.com1.z0.glb.clouddn.com/',
    //     //bucket 域名，下载资源时用到，**必需**
    //     bucket: 'ydlm',
    //     container: 'container', //上传区域DOM ID，默认是browser_button的父元素，
    //     max_file_size: '100mb', //最大文件体积限制
    //     flash_swf_url: '/ydlm/1/Public/qiniu/Moxie.swf', //引入flash,相对路径
    //     max_retries: 1, //上传失败最大重试次数
    //     dragdrop: true, //开启可拖曳上传
    //     drop_element: 'container', //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
    //     chunk_size: '4mb', //分块上传时，每片的体积
    //     auto_start: true, //选择文件后自动上传，若关闭需要自己绑定事件触发上传
    //     init: {
    //         'FilesAdded': function(up, files) {
    //             plupload.each(files, function(file) {
    //                 // 文件添加进队列后,处理相关的事情
    //             });
    //         },
    //         'BeforeUpload': function(up, file) {
    //             // 每个文件上传前,处理相关的事情
    //         },
    //         'UploadProgress': function(up, file) {
    //             // 每个文件上传时,处理相关的事情
    //         },
    //         'FileUploaded': function(up, file, info) {
    //             // 每个文件上传成功后,处理相关的事情
    //             // 其中 info 是文件上传成功后，服务端返回的json，形式如
    //             // {
    //             //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
    //             //    "key": "gogopher.jpg"
    //             //  }
    //             // 参考http://developer.qiniu.com/docs/v6/api/overview/up/response/simple-response.html
    //             // var domain = up.getOption('domain');
    //             // var res = parseJSON(info);
    //             // var sourceLink = domain + res.key; 获取上传成功后的文件的Url
    //         },
    //         'Error': function(up, err, errTip) {
    //             //上传出错时,处理相关的事情
    //         },
    //         'UploadComplete': function() {
    //             //队列文件处理完毕后,处理相关的事情
    //         },
    //         'Key': function(up, file) {
    //             // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
    //             // 该配置必须要在 unique_names: false , save_key: false 时才生效
    //             var key = "";
    //             // do something with key here
    //             return key
    //         }
    //     }
    // });
    </script>

</body>

</html>