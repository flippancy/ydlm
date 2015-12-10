<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index() {
        $photo = M('photo')->order('created_at desc')->limit(40)->select();
        $this->assign('photo' ,$photo);
        $this->display();
    }

    public function timeline(){
        $log = M('log')->order('time desc')->limit(8)->select();
        $index = D('Admin/News','Service');
        $Page = $index->get_page(M('news'));
        $info = $index->get_news($info, $Page);
        $show = $Page->show();

        $this->assign('news',$info);
        $this->assign('page',$show);
        $this->assign('log' ,$log);
        $this->display();
    }
    
    public function kyline(){
        $index = D('Admin/File','Service');
        $Page = $index->get_page(M('file'));
        $info = $index->get_file($info, $Page);
        $show = $Page->show();

        $log = M('log')->order('time desc')->limit(8)->select();
        // $file = M("file")->where('approval=1')->order('time desc')->select();
        $this->assign('file' ,$info);
        $this->assign('page',$show);
        $this->assign('log' ,$log);
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
        $log = M('log')->order('time desc')->limit(8)->select();
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