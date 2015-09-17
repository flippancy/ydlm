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
    <a id="menu" href="#myModal" class="dropdown-toggle" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span></a>
    <a id="menu" href="<?php echo U('User/adminArticle');?>" class="dropdown-toggle"><span class="glyphicon glyphicon-comment"></span></a>

        </nav>
        <div class="navbar-header" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="cursor:pointer">
            <h5 class="brand">
    y_b
</h5>
            <a class="navbar-brand" onclick="javascript:history.go(-1);">
                <span id="return" class="glyphicon glyphicon-menu-left"></span>
                相册
            </a>
        </div>
        <div class="clear"></div>
        
    </header>
    <div class="container" id="container">
        
    <select class="form-control set-albums">
        <option value="0">请选择查看的相册</option>
        <?php if(is_array($albums)): $i = 0; $__LIST__ = $albums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$albums): $mod = ($i % 2 );++$i;?><option value="<?php echo ($albums["id"]); ?>"><?php echo ($albums["name"]); ?>---<?php echo ($albums["remark"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    </select>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <th colspan="1">操作</th>
                <th>图片</th>
                <th>简介</th>
            </thead>
            <tbody class="add_photos">
            </tbody>
        </table>
    </div>
    <!-- 相册修改 -->
    <div class="album-edit"></div>
    <!-- 添加相册模态框 -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">新建专辑相册</h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="name" name="name" placeholder="相册名">
                    <input type="text" class="form-control" id="remark" name="remark" placeholder="相册简介">
                </div>
                <div class="modal-footer">
                    <button type="button" id="sub" class="btn btn-info">添加</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 添加图片模态框 -->
    <div class="modal fade" id="addPhotos" tabindex="-1" role="dialog" aria-labelledby="myModalLabe2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">添加图片</h4>
                </div>
                <div class="modal-footer">
                    <?php if(is_array($photos)): $i = 0; $__LIST__ = $photos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$photos): $mod = ($i % 2 );++$i;?><div class="col-sm-4 col-xs-4" onclick="javascript:if(confirm('确认选择该图片?'))choose(<?php echo ($photos["id"]); ?>)">
                            <img src="<?php echo ($photos["url"]); ?>?imageView2/1/w/40/h/40" id="<?php echo ($photos["id"]); ?>" onclick="" value="<?php echo ($photos["id"]); ?>" style="height:40px;margin:1px;">
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    <br>
                    <button type="button" id="sub" class="btn btn-info">添加</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    <footer>
        

    </footer>
    <header id="navss" class="navbar-fixed-bottom">
        <img id="navs" src="/y_b/Public/home/img/home.png" onclick="location='/y_b/index.php/Index/index'">
    </header>
</body>
<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        changed();
    });

    var album_id;

    $('#sub').click(function() {
        $.ajax({
            type: 'POST',
            url: "<?php echo U('User/addAlbum');?>",
            data: {
                name: $('#name').val(),
                remark: $('#remark').val(),
            },
            cache: false,
            async: true,
            // dataType: 'JSON',
            success: function(data) {
                if (data == 0) {
                    alert('添加相册成功');
                } else if (data == 1) {
                    alert('添加相册失败');
                }
            },
            error: function() {
                alert("网络不好");
            }
        });
    });

    $(".set-albums").change(function(){
        changed();
    });

    function changed(){
        var id = $(".set-albums option:selected").val();
        if (id != 0) {
            $.ajax({
                type: "POST",
                url: "<?php echo U('User/getPhotos');?>",
                dataType: 'json',
                async: false,
                data: {
                    id: id
                },
                success: function(data) {
                    $(".add_photos").html('');
                    var option = '';
                    if (data) {
                        $.each(data, function(index, item) {
                            option +=
                                '<tr>' +
                                '    <td>' +
                                '        <p class="glyphicon glyphicon-remove" onclick="javascript:if(confirm(\'确认移除该图片?\'))location=\'/y_b/index.php/User/changeSee?id=' + item.id + '\'" style="font-size:20px;color:#5BC0DE;margin:0;"></p>' +
                                '    </td>' +
                                '    <td><img src="' + item.url + '?imageView2/1/w/80/h/80" style="height:40px;"></td>' +
                                '    <td>' + item.remark + '</td>' +
                                '</tr>';
                        });
                    }
                    $(".add_photos").append(option);
                }
            });
            album_id = id;
            $(".album-edit").html('');
            var option2 =
                '<div class="col-sm-6 col-xs-6">' +
                '    <a class="btn btn-info" style="width:100%" href="#addPhotos" data-toggle="modal">' +
                '        <span class="">添加图片</span>' +
                '    </a>' +
                '</div>' +
                '<div class="col-sm-6 col-xs-6">' +
                '    <a class="btn btn-info" style="width:100%" href="#">' +
                '        <span class="">修改相册</span>' +
                '    </a>' +
                '</div>' +
                '<div class="col-sm-6 col-xs-6" style="margin-top:10px;">' +
                '    <a class="btn btn-info" style="width:100%" href="#addPhotos" data-toggle="modal">' +
                '        <span class="">是否可见</span>' +
                '    </a>' +
                '</div>' +
                '<div class="col-sm-6 col-xs-6" style="margin-top:10px;">' +
                '    <a class="btn btn-info" style="width:100%" href="#">' +
                '        <span class="">删除相册</span>' +
                '    </a>' +
                '</div>';
            $(".album-edit").append(option2);
        }else{
            $(".add_photos").html('');
            $(".album-edit").html('');
        };
    };

    function choose(id){
        if (id != 0) {
            $.ajax({
                type: 'POST',
                url: "<?php echo U('User/changeAlbum');?>",
                data: {
                    changeId: album_id,
                    id: id,
                },
                cache: false,
                async: true,
                // dataType: 'JSON',
                success: function(data) {
                    if (data == 0) {
                        alert('添加成功');
                    } else {
                        alert('添加失败');
                    }
                },
                error: function() {
                    alert("网络不好");
                }
            });
        };
        $('#addPhotos').modal('hide');
    };
    </script>


</html>