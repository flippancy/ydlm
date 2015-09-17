<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends CommonController {
    public function index(){
        $News  = M('News');
        $news = $News->select(); 
        $this->assign('list' ,$news);
        $this->display();
    }


    public function add(){
        $News = M('News');
        if(IS_POST){
            $news['title']    = I('post.title');
            $news['date']     = I('post.date');
            $news['content']  = I('post.content');
            $length = strlen($news['content']);
            for($length; $length < 120; $length++)
                $news['content'] = $news['content'] . " ";
            }

            // if(false === ($News->create())){
            //         $this->error("创建News对象错误！",'index');
            //     }
            //     else{
            //         if($News->data($news)->add()){
            //             $this->success("新闻生成成功！",'index');
            //         }
            //         else{
            //             $this->error("新闻生成失败！",'index');
            //         }
            //     }

                    if($News->data($news)->add()){
                        $this->success("新闻生成成功！",'index');
                    }
                    else{
                        $this->error("新闻生成失败！",'index');
                    }
    }



    public function upload(){
        $News = M('News');
        if ($_GET['id'] == NULL) {
            $this->error("没有找到该ID！",'index');
        }
        $id = $_GET['id'];

        $news = $News->where(array('id' => $id))->find();
        if($news != null && $news != false){
            $this->assign('news' ,$news);
            $this->assign('id' ,$id);
            $this->display();
        }
        else{
            $this->error("没有找到该新闻信息！",'index');
        }
    }

    public function handle(){
        $News = M('News');
        $news = $_POST;
        $id = $_GET['id'];
        $map['id'] = $id;

        $reslut = $News->where($map)->save($news);
        if($reslut == true){
            $this->success("修改成功",'index');
        }else{
            $this->error("修改失败",'index');
        }

        // var_dump($news['image-text']);
        // p($news);die;
    }

    public function delete(){
        $News = M('News');
        if ($_GET['id'] == NULL) {
            $this->error("没有找到该ID！",'index');
        }
        $id = $_GET['id'];

        $news = $News->where(array('id' => $id))->find();
        if($news != null && $news != false){
            $reslut = $News->delete($id);
            if(false === $reslut){
                $this->error("删除失败！",'index');
            }
            else{
                $this->success("删除成功！", 'index');
            }
        }
        else{
            $this->error("没有找到该新闻信息！",'index');
        }
    }
}