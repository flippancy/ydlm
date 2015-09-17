<?php
namespace Admin\Controller;
use Think\Controller;
class PhotoController extends CommonController {
    public function index(){
        $data = M("Photo")->order('id desc')->select();
        $this->assign('list',$data);
        $this->display();
    }

    public function upload(){
        $Photo = M('Photo');
        if(IS_POST){
            $photo = $_POST;
            import('ORG.Net.UploadFile');
            $upload =  new UploadFile();// 实例化上传类
            $upload->maxSize = 3145728 ;// 设置附件上传大小
            // $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->savePath  = './Uploads/Photo/'; // 设置附件上传目录
            $upload->thumb = true;
            $upload->thumbMaxWidth = '340,680';
            $upload->thumbMaxHeight = '215,430';
            $upload->thumbPrefix = 'tp_';
            $upload->thumbRemoveOrigin = true;
            $upload->upload();    // 上传文件 
            $info = $upload->getUploadFileInfo();
            $photo['img_path'] = sae_storage_root('Uploads').'/Photo/'.'tp_'.$info['0']['savename'];
            $photo['savename'] = 'tp_'.$info['0']['savename'];
            $photo['size'] = $info['0']['size'];
            // var_dump($info);
            // var_dump($photo);
            if(false === ($photo = $Photo->create($photo))){
                    $this->error("创建Photo对象错误！",'index');
                }
                else{
                    $id = $Photo->add($photo);
                    if($id != null && $id != false){
                        $this->success("生成成功！",'index');
                    }
                    else{
                        $this->error("生成失败！",'index');
                    }
                }
            }
    }
    //$name = './Uploads/Photo/'.$photo['savename'];
    public function delete(){
        $Photo = M('Photo');
        if ($_GET['id'] == NULL) {
            $this->error("没有找到该ID！",'index');
        }
        $id = $_GET['id'];

        $photo = $Photo->where(array('id' => $id))->find();
        if($photo != null && $photo != false){
            $reslut = $Photo->delete($id);
            if (!$photo['savename'] == '') {
                    sae_unlink('./Uploads/Photo/'.$photo['savename']);
            }
            //var_dump($photo);
            if(false === $reslut){
                $this->error("删除失败！",'index');
            }
            else{
                $this->success("删除成功！", 'index');
            }
        }
        else{
            $this->error("没有找到该信息！",'index');
        }
    }
}