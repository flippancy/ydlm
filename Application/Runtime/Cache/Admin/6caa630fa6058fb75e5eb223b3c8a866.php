<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>移动联盟 | 后台管理系统</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="/ydlm/Public/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/ydlm/Public/admin/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="/ydlm/Public/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/ydlm/Public/admin/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="/ydlm/Public/admin/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="/ydlm/Public/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="/ydlm/Public/admin/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="/ydlm/Public/admin/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES --> 

    <link href="/ydlm/Public/admin/css/jquery.fancybox.css" rel="stylesheet" />
    <link href="/ydlm/Public/admin/css/jquery.fileupload-ui.css" rel="stylesheet" />
    <link href="/ydlm/Public/admin/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/ydlm/Public/admin/css/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="/ydlm/Public/admin/css/jquery-ui-1.10.1.custom.min.css"/>

	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="/ydlm/Public/admin/img/favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->

		<!-- END TOP NAVIGATION BAR --> 

	</div>

	<!-- END HEADER -->

	<!-- BEGIN CONTAINER -->

	<div class="page-container">

		<!-- BEGIN SIDEBAR -->

		<div class="page-sidebar nav-collapse collapse">

			<!-- BEGIN SIDEBAR MENU -->        

			<ul class="page-sidebar-menu">

				<li>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

					<div class="sidebar-toggler hidden-phone"></div>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

				</li>

				<li>

					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

					<form class="sidebar-search">

						<div class="input-box">

							<a href="javascript:;" class="remove"></a>

							<input type="text" placeholder="Search..." />

							<input type="button" class="submit" value=" " />

						</div>

					</form>

					<!-- END RESPONSIVE QUICK SEARCH FORM ==============================================================================-->

				</li>

				<li class="start active ">
					<a href="<?php echo U('File/index');?>">
					<i class="icon-home"></i> 
					<span class="title">文件信息管理</span>
					<span class="selected"></span>
					</a>
				</li>

<!-- 				<li class="">
					<a href="javascript:;">
					<i class="icon-cogs"></i> 
					<span class="title">前端介绍</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li >
							<a href="#">about</a>
						</li>
						<li >
							<a href="#">fung fu</a>
						</li>
						<li >
							<a href="#">showcase</a>
						</li>
						<li >
							<a href="#">our team</a>
						</li>
						<li >
							<a href="#">news</a>
						</li>
						<li >
							<a href="#">join us</a>
						</li>
					</ul>
				</li> -->

				<li class="">
					<a href="<?php echo U('Person/index');?>">
					<i class="icon-bookmark-empty"></i> 
					<span class="title">团队成员</span>
					<span class="arrow "></span>
					</a>
				</li>

				<li class="">
					<a href="<?php echo U('News/index');?>">
					<i class="icon-table"></i> 
					<span class="title">新闻管理</span>
					<span class="arrow "></span>
					</a>
				</li>

				<li class="">
					<a href="<?php echo U('Folder/index');?>">
					<i class="icon-table"></i> 
					<span class="title">文件列表</span>
					<span class="arrow "></span>
					</a>
				</li>

				<li class="">
					<a href="<?php echo U('Photo/index');?>">
					<i class="icon-table"></i> 
					<span class="title">图片列表</span>
					<span class="arrow "></span>
					</a>
				</li>

				<li class="">
					<a href="<?php echo U('Salon/index');?>">
					<i class="icon-table"></i> 
					<span class="title">沙龙展示</span>
					<span class="arrow "></span>
					</a>
				</li>
			<!-- END SIDEBAR MENU -->

		</div>

		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->

		<div class="page-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div>
				
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption"><i class="icon-cogs"></i>团队成员</div>
            <div class="tools">
                <a href="#add" data-toggle="modal"><b>添加成员</b></a>
                <a href="javascript:;" class="collapse"></a>
                <!-- <a href="#portlet-config" data-toggle="modal" class="config"></a> -->
                <!-- <a href="javascript:;" class="reload"></a> -->
                <!-- <a href="javascript:;" class="remove"></a> -->
            </div>
        </div>
        <div class="portlet-body no-more-tables">

            <table class="table-bordered table-striped table-condensed cf">
                <thead class="cf">
                    <tr>
                        <th class="numeric">头像</th>
                        <th class="numeric">人物姓名</th>
                        <th class="numeric">英文名</th>
                        <th class="numeric">职务</th>
                        <th class="numeric">学院</th>
                        <th class="numeric">简介</th>
                        <th class="numeric">操作</th>
                    </tr>
                </thead>
            
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tbody class="file">
                    <tr class="template-domeload dade in">
                        <td class="img_path"><img width="30" height="30" src="<?php echo ($vo["img_path"]); ?>"/></td>
                        <td class="name"><?php echo ($vo["name"]); ?></td>
                        <td class="english_name"><?php echo ($vo["english_name"]); ?></td>
                        <td class="sex"><?php echo ($vo["role"]); ?></td>
                        <td class="age"><?php echo ($vo["college"]); ?></td>
                        <td class="role"><?php echo ($vo["content"]); ?></td>
                        <td class="delete" align="center"> 
                            <a class="btn red mini" onclick="location.href='/ydlm/admin.php/Person/update?id=<?php echo ($vo["id"]); ?>'"><i class="icon-edit"></i></a>
                            <a class="btn red mini" id="delete" href="#delete<?php echo ($vo["id"]); ?>" data-toggle="modal"><i class="icon-trash"></i></a>
                            <div id="delete<?php echo ($vo["id"]); ?>" class="modal hide fade" tabindex="-1" data-backdrop="delete" data-keyboard="false">
                                <div class="modal-body">
                                    <p>确定删除该成员信息？</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" onclick="location.href='/ydlm/admin.php/Person/delete?id=<?php echo ($vo["id"]); ?>'" class="btn green">确定</button>
                                    <button type="button" data-dismiss="modal" class="btn">取消</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        </div>
    </div>

    <div id="add" class="modal hide fade" tabindex="-1" data-backdrop="add" data-keyboard="false">

        <div class="modal-body">
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN PORTLET-->   
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-reorder"></i>添加成员</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <!-- <a href="#portlet-config" data-toggle="modal" class="config"></a> -->
                        <!-- <a href="javascript:;" class="reload"></a> -->
                        <!-- <a href="javascript:;" class="remove"></a> -->
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form form action="/ydlm/admin.php/Person/add" enctype="multipart/form-data" method="post" class="form-horizontal">

                        <div class="control-group">
                            <label class="control-label">Image Upload</label>
                            <div class="controls">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="/ydlm/Public/admin/img/AAAAAA&amp;text=no+image" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                        <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                        <span class="fileupload-exists">Change</span>
                                        <input type="file" class="default" name="tx"/></span>
                                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
<!--                                 <span class="label label-important">NOTE!</span>
                                <span>
                                Attached image thumbnail is

                                supported in Latest Firefox, Chrome, Opera, 

                                Safari and Internet Explorer 10 only
                                </span> -->
                            </div>

                        </div>
                        <div class="control-group">
                            <label class="control-label">Name</label>
                            <div class="controls">
                                <input type="text" class="span6 m-wrap" name="name" />
                                <span class="help-inline">姓名</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">English_Name</label>
                            <div class="controls">
                                <input type="text" class="span6 m-wrap" name="english_name" />
                                <span class="help-inline">英文名</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Role</label>
                            <div class="controls">
                                <input type="text" class="span6 m-wrap" name="role" />
                                <span class="help-inline">职务</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">College</label>
                            <div class="controls">
                                <input type="text" class="span6 m-wrap" name="college" />
                                <span class="help-inline">学院</span>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label">Content</label>
                            <div class="controls">
                                <input type="text" class="span6 m-wrap" name="content" />
                                <span class="help-inline">简介</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                            <button type="submit" class="btn blue start">
                            <i class="icon-upload icon-white"></i>
                            <span>添加</span>
                            </button>
                            </div>
                        </div>
                    </form>

                    <!-- END FORM-->  

                </div>

            </div>

            <!-- END PORTLET-->

        </div>

    </div>
        </div>

        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn">取消</button>
        </div>

    </div>

			</div>
			<!-- END PAGE -->
		</div>

	<!-- END CONTAINER -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN CORE PLUGINS -->

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

	<!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="/ydlm/Public/admin/js/bootstrap-fileupload.js"></script>

    <script src="/ydlm/Public/admin/js/bootstrap-modal.js" type="text/javascript" ></script>

    <script src="/ydlm/Public/admin/js/bootstrap-modalmanager.js" type="text/javascript" ></script>

    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->

    <script src="/ydlm/Public/admin/js/app.js"></script>

    <script src="/ydlm/Public/admin/js/form-components.js"></script>  

    <script src="/ydlm/Public/admin/js/ui-modals.js"></script>     

    <!-- END PAGE LEVEL SCRIPTS -->

    <script>

        jQuery(document).ready(function() {

        // initiate layout and plugins

            App.init();
            FormComponents.init();
            UIModals.init();
        });

    </script>

    <!-- END JAVASCRIPTS -->

	<!-- END JAVASCRIPTS -->

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>