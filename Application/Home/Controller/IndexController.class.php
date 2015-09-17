<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index() {
        $photo = M('Photo')->select();
        $this->assign('photo' ,$photo);
        $this->display();
    }
    
    public function download(){
        $filename = $_GET['filename'];
        $password = $_GET['pass'];
        $map['filename'] = $filename;
        $filepath = M('File')->where($map)->field('pass,path,savename')->select();
        if($filepath['0']['pass'] == $password){
            $path = sae_storage_root('file').'/'.$filepath['0']['savename'];
            redirect($path);
        }else{
            $this->error('文件密码错误');
        }
    }

    public function timeline(){
        $news = M('News')->order('date desc')->select();
        $this->assign('news' ,$news);
        $this->display();
    }
    
    public function kyline(){
        $file = M("File")->where('approval=1')->order('time desc')->select();
        $this->assign('file' ,$file);
        $this->display();
    }

    public function upload(){
    if(IS_POST){ 
        $name = I('post.name');
        $author = I('post.author');
        $name = iconv("utf-8","gb2312",$name);
        import('ORG.Net.UploadFile');
        $upload =  new UploadFile();// 实例化上传类
        $upload->maxSize = -1 ;// 设置附件上传大小
        $upload->allowExts = array('rar', 'zip');// 设置附件上传类型    
        $upload->savePath = 'File/'; // 设置附件上传目录
        $info = $upload->upload();    // 上传文件   
        if(!$info) {// 上传错误提示错误信息        
            $this->error($upload->getErrorMsg());    
        }
        else{// 上传成功       
            $file = $upload->getUploadFileInfo();
            // var_dump($file);
            $File = D('Admin://File');
            $data['filename'] = $name;
            $data['savename'] = $file['0']['savename'];
            $data['size'] = $file['0']['size'];
            //$data['path'] = $file['0']['savepath'];
            $data['path'] = 'File/'.$file['0']['savename'];
            $data['pass'] = md5(I('post.password'));
            $data['time'] = date('Y-m-d H:i:s');
            $data['author'] = $author;
            $data['instruction'] = I('post.instruction');
            // var_dump($data);
            $flag = $File->addfile($data);
            if($flag==1){
                $this->success('添加成功');
            } else if($flag==0){
                $this->error('添加失败');
            }else{
                $this->show($flag);
            }   
        }
    }
    }

    public function newshow(){
        $id = $_GET['id'];
        $new = M('News')->where('id='.$id)->find();
        $this->assign('new' ,$new);
        $this->assign('id',$id);
        $this->display();
    }

    public function salon(){
        $file = M("Salon")->where('approval=1')->order('date desc')->select();
        $this->assign('file' ,$file);
        $this->display();
    }

    public function downloadsl(){
      	$file = sae_storage_root('Uploads').'/Salon/'.$_GET['file'];
   		$path = $file;
        redirect($path);
    }

    public function uploadsl(){
        if(IS_POST){ 
            $name = I('post.name');
            $name = iconv("utf-8","gb2312",$name);
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
                $Salon = D('Admin://Salon');  
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
        }
    }
}