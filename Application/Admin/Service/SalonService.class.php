<?php
namespace Admin\Service;
class SalonService extends CommonService {
    // 添加文件
    public function add_files($data){
        $setting=C('UPLOAD_SITEIMG_QINIU');
        $qiniu = new \Think\Upload\Driver\Qiniu\QiniuStorage($setting['driverConfig']);
        $Upload = new \Think\Upload($setting);

        $info = $Upload->upload($_FILES);
        // var_dump($info);die();
        $time = date('Y-m-d');
        $data['date'] = $time;
        $data['file'] = $info['file']['url'];
        $data['filename'] = $info['file']['savename'];
        $data['mainfile'] = $info['mainfile']['url'];
        $data['mainfilename'] = $info['mainfile']['savename'];
        $data['pptfile'] = $info['pptfile']['url'];
        $data['pptfilename'] = $info['pptfile']['savename'];

        $result = M('salon')->data($data)->add();
        return $info;
    }

    // 删除文件
    public function delete($file){
    	$file = M('salon')->where($file)->find();
    	$data['file'] = $file['date'].'/'.$file['filename'];
    	$data['mainfile'] = $file['date'].'/'.$file['mainfilename'];
    	$data['pptfile'] = $file['date'].'/'.$file['pptfilename'];

        $flag = M('salon')->where($file)->delete();
        if ($flag) {
            $file['file'] = $data['file'];
            $file['file'] = str_replace("/", "_", $file['file']);
            $file['mainfile'] = $data['mainfile'];
            $file['mainfile'] = str_replace("/", "_", $file['mainfile']);
            $file['pptfile'] = $data['pptfile'];
            $file['pptfile'] = str_replace("/", "_", $file['pptfile']);

            $setting=C('UPLOAD_SITEIMG_QINIU');
            $qiniu = new \Think\Upload\Driver\Qiniu\QiniuStorage($setting['driverConfig']);
            $qiniu->del($file['file']);
            $qiniu->del($file['mainfile']);
            $qiniu->del($file['pptfile']);

            $info = '文件删除成功！';
        }
        return $info;
    }

    public function get_accessToken(){
        $setting=C('UPLOAD_SITEIMG_QINIU');
        $qiniu = new \Think\Upload\Driver\Qiniu\QiniuStorage($setting['driverConfig']);
        $accessToken = $qiniu->UploadToken();
        return $accessToken;
    }
}
