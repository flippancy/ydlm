<?php 
function Qiniu_Encode($str) // URLSafeBase64Encode
    {
        $find = array('+', '/');
        $replace = array('-', '_');
        return str_replace($find, $replace, base64_encode($str));
    }

function Qiniu_Sign($url) {//$info里面的url
        $setting = C ( 'UPLOAD_SITEIMG_QINIU' );
        $duetime = NOW_TIME + 86400;//下载凭证有效时间
        $DownloadUrl = $url . '?e=' . $duetime;
        $Sign = hash_hmac ( 'sha1', $DownloadUrl, $setting ["driverConfig"] ["secrectKey"], true );
        $EncodedSign = Qiniu_Encode ( $Sign );
        $Token = $setting ["driverConfig"] ["accessKey"] . ':' . $EncodedSign;
        $RealDownloadUrl = $DownloadUrl . '&token=' . $Token;
        return $RealDownloadUrl;
    }

function check_login(){
    if(!isset($_SESSION[C("USER_AUTH_KEY")])) {
        redirect("Index/login/",2,"你还没登录或登录信息已过期，请重新登录");
    }
}

function deldir($dir){
  //先删除目录下的文件：
    $dh=opendir($dir);
    $file=readdir($dh);
    $file=readdir($dh);
    $file=readdir($dh);
    if(!$file) {
        closedir($dh);
        //删除当前文件夹：
        if(rmdir($dir)) {
            return true;
        }
    } else {
        return false;
    }
}
?>