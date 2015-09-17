<?php
namespace Admin\Controller;
use Think\Controller;
class FileController extends CommonController {
    public function index(){
    	$data = M("File")->where('approval=1')->select();
    	$this->assign('list',$data);
      $data_no = M("File")->where('approval=0')->select();
      $this->assign('list_no',$data_no);
    	$this->display();
    }

   	// public function upload(){
   	// if(IS_POST){ 
   	// 	$name = I('post.name');
   	// 	$author = I('post.author');
   	// 	$upload = new \Think\Upload();// 实例化上传类
   	// 	$upload->maxSize = -1 ;// 设置附件上传大小
   	// 	$upload->allowExts = array('rar', 'zip');// 设置附件上传类型
   	// 	$upload->savePath = 'File/'; // 设置附件上传目录
   	// 	$info = $upload->upload();    // 上传文件
   	// 	if(!$info) {// 上传错误提示错误信息        
   	// 		$this->error($upload->getErrorMsg());    
   	// 	}
   	// 	else{// 上传成功       
   	// 		$file = $upload->getUploadFileInfo();
   	// 		$File = D('File');
	   //  	$data['filename'] = $name;
	   //  	$data['savename'] = $file['0']['savename'];
	   //  	$data['size'] = $file['0']['size'];
    //     $data['path'] = 'File/'.$file['0']['savename'];
	   //  	$data['pass'] = md5(I('post.password'));
	   //  	$data['time'] = date('Y-m-d H:i:s');
	   //  	$data['author'] = $author;
	   //  	$data['instruction'] = I('post.instruction');
	   //  	// var_dump($data);
	   //  	$flag = $File->addfile($data);
    // 		if($flag==1){
    // 			$this->success('添加成功');
    // 		} else if($flag==0){
    // 			$this->error('添加失败');
    // 		}else{
    // 			$this->show($flag);
    // 		}   
   	// 	}
   	// 	$this->redirect('File/index');
   	// }
   	// }

   	// public function download(){
    //   $id = $_GET['id'];
    //   $password = md5(I('post.password'));
   	// 	$map['filename'] = $filename;
   	// 	$filepath = M('File')->where($map)->field('pass,path,savename')->select();
   	// 	if($filepath['0']['pass'] == $password){
    //         $path = sae_storage_root('file').'/'.$filepath['0']['savename'];
   	// 		redirect($path);
   	// 	}else{
   	// 		$this->error('文件密码错误');
   	// 	}
   	// }

   	// public function delete(){
    //   $id = $_GET['id'];
    //   $map['id'] = $id;
   	// 	$filepath = M('File')->where($map)->field('path,savename')->select();
    //   $name = './File/'.$filepath['0']['savename'];
   	// 	if(M('File')->where($map)->delete()){
   	// 		if(sae_unlink($name)){
    //         	$this->success('删除成功');
    //         }
    //         else $this->error('删除失败1');
    //     } else{
    //         $this->error('删除失败2');
    //     }
    //     $this->redirect('File/index');
   	// }

    // public function update(){
    // if(IS_POST){
    //   $name = I('post.name');
    //   $data['filename'] = $name;
    //   $data['time'] = date('Y-m-d H:i:s');
    //   $data['author'] = I('post.author');
    //   $data['instruction'] = I('post.instruction');
    //   $id = $_GET['id'];
    //   if(M('File')->where('id='.$id)->save($data)){
    //     $this->redirect('File/index');
    //   }else{
    //     $this->error('修改失败');
    //   }
    // }
    // }

    // public function change(){
    //   $id = $_GET['id'];
    //   $map['id'] = $id;
    //   $file = M('File')->where($map)->select();
    //   if ($file[0]['approval'] == 1) {
    //     $file[0]['approval'] = 0;
    //   }else{
    //     $file[0]['approval'] = 1;
    //   }
    //   if(M('File')->where($map)->save($file[0])){
    //     $this->redirect('File/index');
    //   }else{
    //     $this->error('审批修改失败');
    //   }
    // }
}