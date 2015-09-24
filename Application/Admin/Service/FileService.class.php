<?php
namespace Admin\Service;
class FileService extends CommonService {
    // 获取审批分页数据
    public function get_page($model){
        $info = $model->where('approval=1')->count();
        $Page = new \Think\Page($info,8);
        $Page->lastSuffix=false;
        return $Page;
    }
	public function get_file($info, $Page){
    	$info = M("File")->where('approval=1')->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        return $info;
	}
	
    // 获取未审批分页数据
    public function get_page_no($model){
        $info = $model->where('approval=0')->count();
        $Page = new \Think\Page($info,8);
        $Page->lastSuffix=false;
        return $Page;
    }
	public function get_file_no($info, $Page){
      	$info = M("File")->where('approval=0')->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        return $info;
	}

    // 添加文件
    public function add_file($data){
        $setting=C('UPLOAD_SITEIMG_QINIU');
        $qiniu = new \Think\Upload\Driver\Qiniu\QiniuStorage($setting['driverConfig']);
        $Upload = new \Think\Upload($setting);

        $info = $Upload->upload($_FILES);
        return $info;
    }
    public function add($data){
        if($data!=null){
            $time = date('Y-m-d H:i:s');
            $data['time'] = $time;

            $result = M('file')->data($data)->add();
            return $result;
        }
    }

    // 删除文件
    public function delete($file){
        $file = M('file')->where($file)->field('path')->find();

        $flag = M('file')->where($file)->delete();
        if ($flag) {
            $file['path'] = str_replace("/", "_", $file['path']);
            $setting=C('UPLOAD_SITEIMG_QINIU');
            $qiniu = new \Think\Upload\Driver\Qiniu\QiniuStorage($setting['driverConfig']);
            $info = $qiniu->del($file['path']);

            $info = '文件删除成功！';
        }
        return $info;
    }
}
