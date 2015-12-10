<?php
namespace Admin\Controller;
use Think\Controller;
class LogController extends CommonController {
    public function index(){
        $index = D('Log','Service');
        $Page = $index->get_page(M('Log'));
        $info = $index->get_logs($info, $Page);
        $show = $Page->show();

        $this->assign('list',$info);
        $this->assign('page',$show);
        $this->display();
    }

    public function add(){
        $Log = M('log');
        if(IS_POST){
            $log = I('post.');
            $log['time'] = date('Y-m-d H:i:s');
            if($Log->data($log)->add()){
                $this->success("日志生成成功！");
            }
            else{
                $this->error("日志生成失败！");
            }
        }else{
            $this->display();
        }
    }

    public function update(){
        $id = I('get.id');
        $Log = M('log');
        $map['id'] = $id;
        if (IS_POST) {
            $log = I('post.');
            $info = $Log->where($map)->save($log);
            if($info == true){
                $this->success("修改成功");
            }else{
                $this->error("修改失败");
            }
        }else{
            $info = $Log->where($map)->find();
            $this->assign('vo',$info);
            $this->display();
        }
    }

    public function delete(){
        if (IS_GET) {
            $Log = M('log');
            $id = I('get.id');
            $log = $Log->where(array('id' => $id))->find();
            if($log != null && $log != false){
                $reslut = $Log->delete($id);
                if(false === $reslut){
                    $this->error("删除失败！");
                }
                else{
                    $this->success("删除成功！");
                }
            }
            else{
                $this->error("没有找到新闻！");
            }
        }
    }
}