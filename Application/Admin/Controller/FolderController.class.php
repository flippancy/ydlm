<?php
namespace Admin\Controller;
use Think\Controller;
class FolderController extends CommonController {
    public function index(){
        $data = M("Folder")->select();
        $this->assign('list',$data);
        $this->display();
    }

    public function upload(){
        $Folder = M('Folder');
        if(IS_POST){
            $folder = $_POST;
            import('ORG.Net.UploadFile');
            $upload =  new UploadFile();// 实例化上传类
            $upload->maxSize = 3145728 ;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->savePath  = './Uploads/Folder/'; // 设置附件上传目录 
            $upload->upload();    // 上传文件 
            $info = $upload->getUploadFileInfo();
            $folder['img_path'] = sae_storage_root('Uploads').'/Folder/'.$info['0']['savename'];
            $folder['savename'] = $info['0']['savename'];
            $folder['size'] = $info['0']['size'];
            // var_dump($info);
            // var_dump($folder);
            if(false === ($folder = $Folder->create($folder))){
                    $this->error("创建Photo对象错误！",'index');
                }
                else{
                    $id = $Folder->add($folder);
                    if($id != null && $id != false){
                        $this->success("生成成功！",'index');
                    }
                    else{
                        $this->error("生成失败！",'index');
                    }
                }
            }
    }

    public function delete(){
        $Folder = M('Folder');
        if ($_GET['id'] == NULL) {
            $this->error("没有找到该ID！",'index');
        }
        $id = $_GET['id'];

        $folder = $Folder->where(array('id' => $id))->find();
        if($folder != null && $folder != false){
            $reslut = $Folder->delete($id);
            if (!$folder['savename'] == '') {
                sae_unlink('./Uploads/Folder/'.$folder['savename']);
            }
            // var_dump($folder);
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