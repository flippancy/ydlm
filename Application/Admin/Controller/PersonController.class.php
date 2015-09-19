<?php
namespace Admin\Controller;
use Think\Controller;
class PersonController extends CommonController {
    public function index(){
        $Person  = M('Person');
        $persons = $Person->select(); 
        $this->assign('list' ,$persons);
        $this->display();
    }


    public function add(){
        $Person = M('Person');
        if(IS_POST){
            $person = $_POST;
            import('ORG.Net.UploadFile');
            $upload =  new UploadFile();// 实例化上传类
            $upload->maxSize = 3145728 ;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->savePath  = '/Uploads/Person/'; // 设置附件上传目录 
            $upload->upload();    // 上传文件 
            $info = $upload->getUploadFileInfo();
            //$person['img_path'] = __ROOT__.'/Uploads/Person/'.$info['0']['savename'];
            $person['img_path'] = sae_storage_root('Uploads').'/Person/'.$info['0']['savename'];
            $person['savename'] = $info['0']['savename'];
            // var_dump($info);
            // var_dump($person);
            if(false === ($person = $Person->create($person))){
                    $this->error("创建Person对象错误！",'index');
                }
                else{
                    $id = $Person->add($person);
                    if($id != null && $id != false){
                        $this->success("人物生成成功！",'index');
                    }
                    else{
                        $this->error("人物生成失败！",'index');
                    }
                }
            }
        }


    public function update(){
        $Person = M('Person');
        if ($_GET['id'] == NULL) {
            $this->error("没有找到该ID！",'index');
        }
        $id = $_GET['id'];

        $person = $Person->where(array('id' => $id))->find();
        if($person != null && $person != false){
            $this->assign('person' ,$person);
            $this->assign('id' ,$id);
            $this->display();
        }
        else{
            $this->error("没有找到该人物信息！",'index');
        }
    }

    public function handle(){
        $Person = M('Person');
        $data = $_POST;
        $id = $_GET['id'];
        $map['id'] = $id;

        //图片上传设置
    if (!empty($_FILES['tx']['tmp_name'])) {
        import('ORG.Net.UploadFile');
        $upload =  new UploadFile();// 实例化上传类
        $upload->maxSize = 3145728 ;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
        $upload->savePath  = '/Uploads/Person/'; // 设置附件上传目录 
        $upload->upload();    // 上传文件 
        $info = $upload->getUploadFileInfo();
        //$data['img_path'] = __ROOT__.'/Uploads/Person/'.$info['0']['savename'];
        $data['img_path'] = sae_storage_root('Uploads').'/Person/'.$info['0']['savename'];
        $data['savename'] = $info['0']['savename'];

        // 删除之前的图片
        $fix = $Person->where($map)->select();
        if (!$fix['0']['savename'] == '') {
            //if(file_exists('./Uploads/Person/'.$fix['0']['savename'])){
                if(!sae_unlink('./Uploads/Person/'.$fix['0']['savename'])){
                    //$this->error("图片删除失败");
                }
            //}
        }
    }

        //更新
        $reslut = $Person->where($map)->save($data);
        if($reslut == true){
        	$this->success("修改成功",'index');
        }else{
        	$this->error("修改失败",'index');
        }
        // p($data);die;
    }

    public function delete(){
        $Person = M('Person');
        if ($_GET['id'] == NULL) {
            $this->error("没有找到该ID！",'index');
        }
        $id = $_GET['id'];

        $person = $Person->where(array('id' => $id))->find();
        if($person != null && $person != false){
            $reslut = $Person->delete($id);
            if (!$person['savename'] == '') {
                //if(file_exists('./Uploads/Person/'.$person['savename'])){
                sae_unlink('./Uploads/Person/'.$person['savename']);
            }
            // var_dump($person);
            if(false === $reslut){
                $this->error("删除失败！",'index');
            }
            else{
                $this->success("删除成功！", 'index');
            }
        }
        else{
            $this->error("没有找到该人物信息！",'index');
        }
    }
}