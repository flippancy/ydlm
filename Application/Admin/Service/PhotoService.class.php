<?php
namespace Admin\Service;
class PhotoService extends CommonService {
    // 添加图片
    public function add_photo($info){
        $setting=C('UPLOAD_SITEIMG_QINIU');
        $qiniu = new \Think\Upload\Driver\Qiniu\QiniuStorage($setting['driverConfig']);
        $Upload = new \Think\Upload($setting);

        $info = $Upload->upload($_FILES);

        $time = date('Y-m-d H:i:s');
        $info['file']['created_at'] = $time;
        $info['file']['created_by'] = 'cjx';
        $info['file']['remark'] = '暂时什么都没有！';

        $result = M('photo')->data($info['file'])->add();
        
        $info['file']['id'] = $result;
        return $info['file'];
    }

    // 获取所有图片以及七牛地址
    public function get_photo($info, $Page = ''){
        $info = M('photo')->order('created_at desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        return $info;
    }

    // 删除图片
    public function delete($file){
        $photo = M('photo')->where($file)->delete();
        if ($photo) {
            $file = $file['name'];
            $file = str_replace("/", "_", $file);
            $setting=C('UPLOAD_SITEIMG_QINIU');
            $qiniu = new \Think\Upload\Driver\Qiniu\QiniuStorage($setting['driverConfig']);
            $qiniu->del($file);
            $info = '图片删除成功！';
        }
        return $info;
    }
}
