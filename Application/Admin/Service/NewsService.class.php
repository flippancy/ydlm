<?php
namespace Admin\Service;
class NewsService extends CommonService {
	public function get_news($info, $Page){
        $info = M('news')->order('date desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        return $info;
	}
}
