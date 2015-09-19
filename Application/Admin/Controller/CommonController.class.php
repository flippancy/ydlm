<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize() {
        header('Content-Type: text/html; charset=utf-8');
        if(!isset($_SESSION[C("USER_AUTH_KEY")])){
            $this->redirect('Index/login');
        }
    }
}