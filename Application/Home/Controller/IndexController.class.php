<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index() {
        $photo = M('photo')->select();
        $this->assign('photo' ,$photo);
        $this->display();
    }

    public function timeline(){
        $news = M('news')->order('date desc')->select();
        $this->assign('news' ,$news);
        $this->display();
    }
    
    public function kyline(){
        $file = M("file")->where('approval=1')->order('time desc')->select();
        $this->assign('file' ,$file);
        $this->display();
    }

    public function upload(){
      $Service = D('Admin/File','Service');
      if (IS_POST) {
        $data = I('post.');
        $data = $Service->add_file($data);
        $this->ajaxReturn($data);
      }
    }
    public function add(){
      $Service = D('Admin/File','Service');
      if (IS_POST) {
        $data = I('post.');
        $flag = $Service->add($data);
        if($flag!=0){
          $this->success('添加成功');
        }else if($flag==0){
          $this->error('添加失败');
        }
      }
    }

    public function newshow(){
        $id = $_GET['id'];
        $new = M('news')->where('id='.$id)->find();
        $this->assign('new' ,$new);
        $this->assign('id',$id);
        $this->display();
    }

    public function salon(){
        $file = M("salon")->where('approval=1')->order('date desc')->select();
        $this->assign('file' ,$file);
        $this->display();
    }

    public function uploadSalon(){
        $Service = D('Admin/Salon','Service');
        if (IS_POST) {
            $data = I('post.');
            $data = $Service->add_files($data);
            // var_dump($data);
            if ($data != 0) {
            $this->success('添加成功,等待审批');
            }else{
            $this->error('添加失败');
            }
        }
    }
}