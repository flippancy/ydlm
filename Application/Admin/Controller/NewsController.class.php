<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends CommonController {
    public function index(){
        $index = D('News','Service');
        $Page = $index->get_page(M('news'));
        $info = $index->get_news($info, $Page);
        $show = $Page->show();

        $this->assign('list',$info);
        $this->assign('page',$show);
        $this->display();
    }


    public function add(){
        $News = M('News');
        if(IS_POST){
            $news = I('post.');
            if($News->data($news)->add()){
                $this->success("新闻生成成功！");
            }
            else{
                $this->error("新闻生成失败！");
            }
        }
    }

    public function update(){
        if (IS_GET) {
            $News = M('News');
            $news = I('post.');
            $id = I('get.id');
            $map['id'] = $id;
            $reslut = $News->where($map)->save($news);
            if($reslut == true){
                $this->success("修改成功");
            }else{
                $this->error("修改失败");
            }
        }
    }

    public function delete(){
        if (IS_GET) {
            $News = M('News');
            $id = I('get.id');
            $news = $News->where(array('id' => $id))->find();
            if($news != null && $news != false){
                $reslut = $News->delete($id);
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