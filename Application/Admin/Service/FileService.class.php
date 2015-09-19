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
}
