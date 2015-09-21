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
            if ($data != 0) {
            $this->success('添加成功');
            }else{
            $this->error('添加失败');
            }
        }
    }
}