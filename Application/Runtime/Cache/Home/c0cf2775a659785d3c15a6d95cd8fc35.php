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
    <link href="/y_b/Public/home/css/base.css" rel="stylesheet">
    

</head>

<body class="cbp-spmenu-push">
    <header class="navbar navbar-fixed-top navbar-custom" id="navbar">
        <nav class="dropdown navbar-menu">
            
    <!-- 菜单示例 -->
    <a id="menu" href="<?php echo U('User/logout');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-off"></span></a>
    <a id="menu" href="<?php echo U('User/adminArticleAdd');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-plus"></span></a>
    <a id="menu" href="<?php echo U('User/adminIndex');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-user"></span></a>

        </nav>
        <div class="navbar-header" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="cursor:pointer">
            <h5 class="brand">
    y_b
</h5>
            <a class="navbar-brand" onclick="javascript:history.go(-1);">
                <span id="return" class="glyphicon glyphicon-menu-left"></span>
                文章
            </a>
        </div>
        <div class="clear"></div>
        
    </header>
    <div class="container" id="container">
        
    <br>
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <th colspan="3">
                        操作
                    </th>
                    <th>标题名</th>
                    <th>创建时间</th>
                    <th>浏览次数</th>
                </thead>
                <tbody>
                    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><tr>
                            <td>
                                <p class="glyphicon glyphicon-trash" onclick="javascript:if(confirm('确认删除该信息?'))location='/y_b/index.php/User/adminArticleDel?id=<?php echo ($info['id']); ?>'" style="font-size:20px;color:#5BC0DE;margin:0;"></p>
                            </td>
                            <td>
                                <p class="glyphicon glyphicon-pencil" onclick="location='/y_b/index.php/User/adminArticleEdit?id=<?php echo ($info['id']); ?>'" style="font-size:20px;color:#5BC0DE;margin:0;"></p>
                            </td>
                            <td>
                                <p class="glyphicon glyphicon-eye-open" onclick="location='/y_b/index.php/Index/index3Info?id=<?php echo ($info['id']); ?>'" style="font-size:20px;color:#5BC0DE;margin:0;"></p>
                            </td>
                            <td><?php echo ($info['title']); ?></td>
                            <td><?php echo ($info['created_at']); ?></td>
                            <td><?php echo ($info['view_count']); ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo ($page); ?>

    </div>
    <footer>
        

    </footer>
    <header id="navss" class="navbar-fixed-bottom">
        <img id="navs" src="/y_b/Public/home/img/home.png" onclick="location='/y_b/index.php/Index/index'">
    </header>
</body>
<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



</html>