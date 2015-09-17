<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController {
    public function index(){
        $this->display();
    }

    public function add(){
        $this->display();
    }

    public function add_admin(){
        if(IS_POST){
            $User = M('User');
            $loginname = I('post.loginname');
            $password = I('post.password');
            $result = $User->where(array('loginname' => $loginname))->find();
            if($result != null && $result != false){
                $admin['username']  = $_POST['username'];
                $admin['lastlogin'] = date('Y-m-d H:i:s');
                $admin['ip']        = get_client_ip();
                $admin['loginname'] = $loginname;
                $admin['salt']      = randomkeys(6);  //加盐6位
                $admin['password']  = md5($admin['salt'].$password);

                if(false === ($admin = $User->create($admin))){
                    $this->error("创建Admin对象错误！",'Admin/add');
                }

                $id = $User->add($admin);  //该ID为用户ID
                $this->success("创建用户成功！",'Admin/add');
            }
            else{
                $this->error("该登录名已存在！",'Admin/add');
            }
        }

    }


    public function update(){
        $this->display();
    }

    public function update_admin(){
        $User = M('User');
        if ($_GET['id'] == NULL) {
            $this->error('需要删除的管理员不存在！','Admin/index');
        }
        $id = $_GET['id'];
        $result = $User->where(array('user_id' => $id))->find();

        if($result != null && $result != false){
            //POST过来的input中的name属性必须要有$admin['xx'];
            if(!empty($_POST['admin'])){
                $admin['id']        = $id;
                $admin              = $_POST['admin'];
                $admin['lastlogin'] = date('Y-m-d H:i:s');
                $admin['ip']        = get_client_ip();
                $admin['salt']      =randomkeys(6);    //加盐6位
                $admin['password']  =md5($admin['salt'].$admin['password']);

                if(false === ($admin = $User->create($admin))){
                    $this->error("创建Admin对象错误！",'Admin/update');
                }

                if (false === $User->save($admin)) {
                    $this->error("保存失败！",'Admin/update');
                }
                else{
                    $this->success("修改成功！",'Admin/update');
                }
            }
            else{
                $this->error("填写数据出错！",'Admin/update');
            }
        }
        else{
            $this->error("没有找到该用户！",'Admin/update');
        }
    }


    public function delete(){
        $User = M('User');
        if ($_GET['id'] == NULL) {
            $this->error('需要删除的管理员不存在！','Admin/index');
        }
        $id = $_GET['id'];

        $result = $User->where(array('user_id' => $id))->find();
        if($result != null && $result != false){
            $delete = $User->delete($id);
            if(false === $delete){
                $this->error("删除失败！",'Admin/index');
            }
            else{
                $this->success("删除成功！", 'Admin/index');
            }
        }
        else{
            $this->error("没有找到该用户！",'Admin/index');
        }
    }
}