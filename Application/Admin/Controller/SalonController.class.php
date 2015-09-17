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

   	public function upload(){
   	if(IS_POST){ 
   		$name = I('post.name');
      import('ORG.Net.UploadFile');
   		$upload =  new UploadFile();// 实例化上传类     
   		$upload->maxSize = -1 ;// 设置附件上传大小
   		$upload->savePath = 'Uploads/Salon/'; // 设置附件上传目录\
   		$info = $upload->upload();    // 上传文件   
   		if(!$info) {// 上传错误提示错误信息        
   			$this->error($upload->getErrorMsg());    
   		}
   		else{// 上传成功       
   			$salon = $upload->getUploadFileInfo();
   			// var_dump($salon);
   			$Salon = D('Salon');  
	    	$data['name'] = $name;
	    	$data['file'] = __ROOT__.'/'.$salon['0']['savepath'].$salon['0']['savename'];
        $data['mainfile'] = __ROOT__.'/'.$salon['1']['savepath'].$salon['1']['savename'];
        $data['pptfile'] = __ROOT__.'/'.$salon['2']['savepath'].$salon['2']['savename'];
        $data['filename'] = $salon['0']['savename'];
        $data['mainfilename'] = $salon['1']['savename'];
        $data['pptfilename'] = $salon['2']['savename'];
	    	$data['date'] = date('Y-m-d H:i:s');
	    	$data['author'] = I('post.author');
	    	$data['instruction'] = I('post.instruction');
	    	// var_dump($data);
	    	$flag = $Salon->addfile($data);
    		if($flag==1){
    			$this->success('添加成功');
    		} else if($flag==0){
    			$this->error('添加失败');
    		}else{
    			$this->show($flag);
    		}   
   		}
   		$this->redirect('Salon/index');
   	}
   	}

   	public function download(){
      // if ($_GET['filename']!=null) {
      //   $file = sae_storage_root('Uploads').'/Salon/'.$_GET['filename'];
      // }elseif($_GET['mainfilename']!=null){
      //   $file = sae_storage_root('Uploads').'/Salon/'.$_GET['mainfilename'];
      // }else{
      //   $file = sae_storage_root('Uploads').'/Salon/'.$_GET['pptfilename'];
      // }
      $file = sae_storage_root('Uploads').'/Salon/'.$_GET['file'];
   		$path = $file;
      // var_dump($path);
   		redirect($path);
   	}

   	public function delete(){
      $id = $_GET['id'];
      $map['id'] = $id;
   		$filepath = M('Salon')->where($map)->field('filename,mainfilename,pptfilename')->select();
   		// $name = './'.$filepath['0']['path'].$filepath['0']['savename'];
      var_dump($filepath);

      // if (unlink('./Uploads/Salon/'.$filepath['0']['filename']) && unlink('./Uploads/Salon/'.$filepath['0']['mainfilename']) && unlink('./Uploads/Salon/'.$filepath['0']['pptfilename']))
      // 		{echo "yes";}else{echo "no";}
      $flag = sae_unlink('./Uploads/Salon/'.$filepath['0']['filename']) && sae_unlink('./Uploads/Salon/'.$filepath['0']['mainfilename']) && sae_unlink('./Uploads/Salon/'.$filepath['0']['pptfilename']);
   		if(M('Salon')->where($map)->delete()){
   			  if($flag){
            	// deldir('./'.$filepath['0']['path']);
            	$this->success('删除成功');
          }
          else $this->error('删除失败1');
        } else{
            $this->error('删除失败2');
        }
        $this->redirect('Salon/index');
   	}

    public function update(){
    if(IS_POST){
      $name = I('post.name');
      $data['name'] = $name;
      $data['date'] = date('Y-m-d H:i:s');
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
      // var_dump($file[0]['approval']);
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