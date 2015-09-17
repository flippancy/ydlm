<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<link href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/y_b/Public/Admin/css/index.css" rel="stylesheet">
    <link href="/y_b/Public/Admin/css/dropzone.min.css" rel="stylesheet">
    <title> y_b blog </title>
</head>

<body>
    <form action="" class="dropzone">
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    </form>
    <div class="add">
        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><div class="alert alert-info">
                <div class="row">
                    <div class="col-sm-2">
                        <img src="<?php echo ($info["url"]); ?>" class="img-rounded pure-img" style="height:80px;">
                    </div>
                    <div class="col-sm-8">
                        <p> <?php echo ($info["name"]); ?>__<?php echo ($info["type"]); ?>__<?php echo ($info["size"]); ?>__<?php echo ($info["ext"]); ?></p>
                    </div>
                    <div class="col-sm-2">
                        <a href="/y_b/admin.php/Index/delete?name=<?php echo ($info["name"]); ?>" class="btn btn-info">delete</a>
                        <a href="#" class="btn btn-info" data-dismiss="alert">&times;</a>
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</body>
<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/y_b/Public/Admin/js/dropzone.min.js"></script>
<script type="text/javascript">
$(".dropzone").dropzone({
    paramName: "file",
    url: "<?php echo U('Index/up');?>",
    // addRemoveLinks: true,
    // dictRemoveLinks: "x",
    // dictCancelUpload: "x",
    maxFiles: 10,
    maxFilesize: 512,
    acceptedFiles: ".bmp,.jpg,.gif,.svg,.png,.jpeg",
    init: function() {
        this.on("success", function(file, info) {
            $(".add").append(
                '<div class="alert alert-info">' +

                '<div class="row">' +
                '    <div class="col-sm-2">' +
                '        <img src="'+info.url+'" class="img-rounded pure-img" style="height:80px;">' +
                '    </div>' +
                '   <div class="col-sm-8">' +
                '        <p> '+info.name+'__'+info.type+'__'+info.size+'__'+info.ext+'</p>' +
                '    </div>' +
                '    <div class="col-sm-2">' +
                '        <a href="/y_b/admin.php/Index/delete?name='+info.name+'" class="btn btn-info">delete</a>' +
                '        <a href="#" class="btn btn-info" data-dismiss="alert">&times;</a>' +
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