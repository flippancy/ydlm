<?php
return array(
	//'配置项'=>'配置值'
    'UPLOAD_SITEIMG_QINIU' => array ( 
                    'maxSize' => 5 * 1024 * 1024,//文件大小
                    'rootPath' => './',
                    'saveName' => array ('uniqid', ''),
                    'driver' => 'Qiniu',
                    'driverConfig' => array (
                            'secrectKey' => '-fxARUAKUBGULVNH1-pF-ApqbYVdRga4FBrsdPqd', 
                            'accessKey' => 'Y86vP1ZhTFtOUP8MkLJz3cPCFZ-KP4FR0o8qUdFR',
                            'domain' => '7xlw9f.com1.z0.glb.clouddn.com',
                            'bucket' => 'ydlm',
                )
    ),

    'DB_TYPE' => 'mysql',
    'DB_HOST' => '127.0.0.1',
    'DB_NAME' => 'app_ydlm2',
    'DB_USER' => 'root',
    'DB_PWD' => '',
    'DB_PORT' => '3306',
    'DB_PREFIX'  => 'ma_',

    'TMPL_PARSE_STRING' =>array(
        '__PUBLIC__'  => __ROOT__.'/Public',
        '__HJS__'     => __ROOT__.'/Public/home/js',
        '__HCSS__'    => __ROOT__.'/Public/home/css',
        '__HIMG__'    => __ROOT__.'/Public/home/img',
        '__AJS__'     => __ROOT__.'/Public/admin/js',
        '__ACSS__'    => __ROOT__.'/Public/admin/css',
        '__AIMG__'    => __ROOT__.'/Public/admin/img',
        '__UPLOADS__' => __ROOT__.'/Uploads',
    ),

);
?>