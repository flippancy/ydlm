<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        header('Content-Type: text/html; charset=utf-8');
        if(!isset($_SESSION[C("USER_AUTH_KEY")])){
            $this->redirect('Index/login');
        }else{
            $this->redirect('Admin/index');
        }
    }

    public function login(){
        if(IS_POST) {
            $User = M("User");
            $username = I('post.username');
            $password = I('post.password');
            if(!empty($username) && !empty($password)){
                $where['username'] = $username;
                $result = $User->where($where)->find();
                if($result != NULL && $result != false){
                    if(md5($result['salt'] . $password) == $result['password']){
                        $_SESSION[C("USER_AUTH_KEY")] = $result['username'];
                        session('user_name',$result['username']);
                        $data['lastlogin'] = date('Y-m-d H:i:s');
                        $data['ip'] = get_client_ip();
                        $User->where($result)->data($data)->save();
                        echo json_encode(0);
                    }
                    else{
                        echo json_encode(1);
                    }
                }
                else{
                    echo json_encode(2);
                }
            }
            else{
                echo json_encode(2);
            }
        }else{
            $this->display();
        }
    }

    public function logout(){
        if (isset($_SESSION[C("USER_AUTH_KEY")])) {
            unset($_SESSION[C("USER_AUTH_KEY")]);
            $this->success("成功退出！",'Index/login');
        }else {
            $this->error("已经注销登录！",'Index/login');
        }
    }
}