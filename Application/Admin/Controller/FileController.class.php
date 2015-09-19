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
     	if(IS_POST){
     		$name = I('post.name');
     		$author = I('post.author');
        $instruction = I('post.instruction');
        $filename = explode('.', I('post.filename'));
     		$upload = new \Think\Upload();// 实例化上传类
     		$upload->maxSize = 0;// 设置附件上传大小
     		$upload->exts = array('rar', 'zip');// 设置附件上传类型
        $upload->saveName = $filename[0];
     		$upload->savePath = '/File/'; // 设置附件上传目录
     		$info = $upload->upload();    // 上传文件
     		if(!$info) {// 上传错误提示错误信息
     			var_dump($upload->getError());
     		}
     		else{// 上传成功
     			$file = $info['fileToUpload'];
  	    	$data['filename'] = $name;
  	    	$data['savename'] = $file['savename'];
  	    	$data['size'] = $file['size'];
          $data['path'] = './Uploads'.$file['savepath'].$file['savename'];
  	    	$data['time'] = date('Y-m-d H:i:s');
  	    	$data['author'] = $author;
  	    	$data['instruction'] = $instruction;
  	    	$flag = M('File')->add($data);
      		if($flag!=0){
      			$this->success('添加成功');
      		} else if($flag==0){
      			$this->error('添加失败');
      		}
     		}
     	}
   	}

   	public function delete(){
      $id = I('get.id');
      $map['id'] = $id;
   		$filepath = M('File')->where($map)->field('path')->find();
      $path = $filepath['path'];
   		if(M('File')->where($map)->delete()){
   			if(unlink($path)){
          $this->success('删除成功');
        }
        else $this->error('删除失败-文件');
      } else{
        $this->error('删除失败-数据');
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