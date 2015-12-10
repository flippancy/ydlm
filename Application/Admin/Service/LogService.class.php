<?php
namespace Admin\Service;
class LogService extends CommonService {
	public function get_logs($info, $Page){
        $info = M('log')->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        return $info;
	}
}