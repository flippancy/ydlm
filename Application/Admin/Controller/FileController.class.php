<?php
namespace Admin\Controller;
use Think\Controller;
class FileController extends CommonController {
    public function index(){ 
      $index = D('File','Service');
      
      $Page = $index->get_page(M('file'));
      $info = $index->get_file($info, $Page);
      $show = $Page->show();

      $Page_no = $index->get_page_no(M('file'));
      $info_no = $index->get_file_no($info_no, $Page);
      $show_no = $Page_no->show();

      $this->assign('list',$info);
      $this->assign('page',$show);
      $this->assign('list_no',$info_no);
      $this->assign('page_no',$show_no);
      $this->display();
    }

    public function upload(){
      $Service = D('File','Service');
      if (IS_POST) {
        $data = I('post.');
        $data = $Service->add_file($data);
        $this->ajaxReturn($data);
      }
    }
    public function add(){
      $Service = D('File','Service');
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

    public function delete(){
        $Service = D('file','Service');
        if (IS_GET) {
            $data = I('get.');
            $data = $Service->delete($data);
            $this->success($data);
        }
    }

    public function update(){
    if(IS_POST){
      $name = I('post.name');
      $data['filename'] = $name;
      $data['time'] = date('Y-m-d H:i:s');
      $data['author'] = I('post.author');
      $data['instruction'] = I('post.instruction');
      $id = I('get.id');
      if(M('File')->where('id='.$id)->save($data)){
        $this->success('删除成功');
      }else{
        $this->error('修改失败');
      }
    }
    }

    public function change(){
      $id = $_GET['id'];
      $map['id'] = $id;
      $file = M('File')->where($map)->find();
      if ($file['approval'] == 1) {
        $file['approval'] = 0;
      }else{
        $file['approval'] = 1;
      }
      if(M('File')->where($map)->save($file)){
        $this->redirect('File/index');
      }else{
        $this->error('审批修改失败');
      }
    }
}