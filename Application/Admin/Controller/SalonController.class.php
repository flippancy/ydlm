<?php
namespace Admin\Controller;
use Think\Controller;
class SalonController extends CommonController {
    public function index(){
      $data = M("Salon")->where('approval=1')->select();
      $this->assign('list',$data);
      $data_no = M("Salon")->where('approval=0')->select();
      $this->assign('list_no',$data_no);
      $this->display();
    }

    public function upToken(){
      if(IS_GET){
        $Service = D('Salon','Service');
        $token['uptoken'] = $Service->get_accessToken();
        $this->ajaxReturn($token);
      }
    }

    public function upload(){
      $Service = D('Salon','Service');
      if (IS_POST) {
        $data = I('post.');
        // var_dump($data);die();
        $data = $Service->add_files($data);
        if ($data != 0) {
          $this->success('添加成功');
        }else{
          $this->error('添加失败');
        }
      }
    }

    public function delete(){
        $Service = D('Salon','Service');
        if (IS_GET) {
            $data = I('get.');
            $data = $Service->delete($data);
            $this->success($data);
        }
    }

    public function update(){
      if(IS_POST){
        $name = I('post.name');
        $data['name'] = $name;
        $data['date'] = date('Y-m-d');
        $data['author'] = I('post.author');
        $data['instruction'] = I('post.instruction');
        $id = $_GET['id'];
        if(M('Salon')->where('id='.$id)->save($data)){
          $this->redirect('Salon/index');
        }else{
          $this->error('修改失败');
        }
      }
    }

    public function change(){
      $id = $_GET['id'];
      $map['id'] = $id;
      $file = M('Salon')->where($map)->select();
      if ($file[0]['approval'] == 1) {
        $file[0]['approval'] = 0;
      }else{
        $file[0]['approval'] = 1;
      }
      if(M('Salon')->where($map)->save($file[0])){
        $this->redirect('Salon/index');
      }else{
        $this->error('审批修改失败');
      }
    }
}