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
    
    <link href="http://cdn.bootcss.com/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.min.css" rel="stylesheet">

</head>

<body>
    <div class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <div class="logo">
                <h1>移动联盟 - 新闻管理</h1>
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
                
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <ul class="nav nav-tabs" role="tablist" id="templatemo-tabs">
                <li class="active"><a href="#list" role="tab" data-toggle="tab" style="color:#222">新闻列表</a></li>
                <li><a href="#new" role="tab" data-toggle="tab" style="color:#222">新建新闻</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="list">
                    <table class="table-bordered table-striped table-condensed" style="width:100%">
                        <thead>
                            <tr>
                                <th>新闻标图</th>
                                <th>新闻日期</th>
                                <th>新闻标题</th>
                                <th>点击次数</th>
                                <th colspan="2">操作</th>
                            </tr>
                        </thead>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tbody>
                                <tr>
                                    <td class="img"><img src="<?php echo ($vo["img"]); ?>" style="max-width:80px"></td>
                                    <td class="date"><?php echo ($vo["date"]); ?></td>
                                    <td class="title"><?php echo ($vo["title"]); ?></td>
                                    <td class="view_count"><?php echo ($vo["view_count"]); ?></td>
                                    <td>
                                        <p href="#update<?php echo ($vo["id"]); ?>" data-toggle="modal" style="font-size:20px;color:#5BC0DE;margin:0;"><i class="fa fa-edit"></i></p>
                                    </td>
                                    <td>
                                        <p class="fa fa-trash" onclick="javascript:if(confirm('确定删除该新闻?'))location='/ydlm/admin.php/News/delete?id=<?php echo ($vo["id"]); ?>'" style="font-size:20px;color:#5BC0DE;margin:0;"></p>
                                    </td>
                                </tr>
                            </tbody>
                            <!-- 修改模态框 -->
                            <div id="update<?php echo ($vo["id"]); ?>" class="modal fade" tabindex="-1" data-backdrop="update">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">修改新闻内容</h4>
                                        </div>
                                        <form name="save" action="/ydlm/admin.php/News/update?id=<?php echo ($vo["id"]); ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
                                            <div class="modal-body">
                                                <div class="row-fluid">
                                                    <div class="control-group">
                                                        <label class="control-label">新闻标图:</label>
                                                        <input type="text" class="form-control" name="img" value="<?php echo ($vo["img"]); ?>" />
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">新闻标题:</label>
                                                        <input type="text" class="form-control" name="title" value="<?php echo ($vo["title"]); ?>" />
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">新闻日期:</label>
                                                        <input type="text" class="form-control" name="date" id="datepicker2" value="<?php echo ($vo["date"]); ?>" />
                                                    </div>
                                                    <br>
                                                    <script id="editor2" name="image-text" type="text/plain"><?php echo ($vo["image-text"]); ?></script>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn" name="save">保存修改</button>
                                                <button type="button" data-dismiss="modal" class="btn">取消</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <?php echo ($page); ?>
                </div>
                <div class="tab-pane fade" id="new">
                    <div class="list-group">
                        <form name="new" action="/ydlm/admin.php/News/add" enctype="multipart/form-data" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">新闻标图:</label>
                                <input type="text" class="form-control" name="img" />
                            </div>
                            <div class="control-group">
                                <label class="control-label">新闻标题:</label>
                                <input type="text" class="form-control" name="title" />
                            </div>
                            <div class="control-group">
                                <label class="control-label">新闻日期:</label>
                                <input type="text" class="form-control" name="date" id="datepicker" />
                            </div>
                            <br>
                            <script id="editor" name="image-text" type="text/plain">你需要说点什么···············</script>
                            <br>
                            <div class="control-group col-sm-offset-8 col-sm-4">
                                <button name="new" class="btn btn-info pull-right" style="width:100%">新建</button>
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
    
    <script src="http://cdn.bootcss.com/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap-datepicker/1.4.1/locales/bootstrap-datepicker.zh-CN.min.js"></script>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/ydlm/Public/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/ydlm/Public/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
    var editor = UE.getEditor('editor', {
        initialFrameHeight: 450,
    });
    var editor = UE.getEditor('editor2', {
        initialFrameHeight: 200,
    });


    $(document).ready(function() {
        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            language: 'zh-CN'
        });
        $('#datepicker2').datepicker({
            format: 'yyyy-mm-dd',
            language: 'zh-CN'
        });

    });
    </script>

</body>

</html>