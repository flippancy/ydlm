<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->display();
    }

    public function login(){
        if(IS_POST) {
            $User = M("User");
            $loginname = I('post.loginname');
            $password = I('post.password');
            if(!empty($loginname) && !empty($password)){
                $where['loginname'] = $loginname;
                $result = $User->where($where)->find();
                if($result != NULL && $result != false){
                    if(md5($result['salt'] . $password) == $result['password']){
                        $_SESSION[C("USER_AUTH_KEY")] = $result['loginname'];
                        session('user_name',$result['loginname']);
                        $data['lastlogin'] = date('Y-m-d H:i:s');
                        $data['ip'] = get_client_ip();
                        $User->where($result)->data($data)->save();
                        $this->success("登陆成功！",U('File/index'));
                    }
                    else{
                        $this->error("密码错误，请检查！",'Index/login');
                    }
                }
                else{
                    $this->error("没有找到该用户，请检查你的用户名！",'Index/login');
                }
            }
            else{
                $this->error("没有找到该用户，请检查你的用户名！",'Index/login');
            }
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