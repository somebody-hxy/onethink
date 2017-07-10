<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nancy
 * Date: 17-7-6
 * Time: 下午2:06
 * To change this template use File | Settings | File Templates.
 */

namespace Admin\Controller;
use \Tools\Page;

class CenterController extends AdminController{
    /**
     *列表
     */
    public function index(){
        /* 获取频道列表 */
        $map  = array('status' => array('gt', -1));
        //M函数：用于实例化一个没有模型文件的Model
//        $list = M('Center')->where($map)->order('id asc')->select();
        $info = M('Center');
        import('ORG.Util.Page');// 导入分页类
        $total = $info->where($map)->count();//获取总条数
        //实例化分页类
        $page=new \Think\Page($total);//框架自带分页工具
        $show = $page->show();
       // $listRows = 2;//每页显示几条
        $list = $info->where($map)->order('id asc')->limit($page->firstRow.','.$page->listRows)->select();

        //分配
        $this->assign('page',$show);
        $this->assign('list', $list);
        $this->meta_title = '小区租售';
        $this->display();
    }
//添加频道
    public function add(){
        if(IS_POST){
            //D函数用于实例化模型类
            $Center = D('Center');
            //dump($Center);
            $data = $Center->create();
            //dump($data);exit;
            if($data){
                $id = $Center->add();
                if($id){
                    $this->success('新增成功', U('index'));
                    //记录行为
                    action_log('update_center', 'center', $id, UID);
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Center->getError());
            }
        } else {
            /**
            $pid = I('get.pid', 0);
            //获取父导航
            if(!empty($pid)){
                $parent = M('Center')->where(array('id'=>$pid))->field('title')->find();
                $this->assign('parent', $parent);
            }

            $this->assign('pid', $pid);
            $this->assign('info',null);
             */
            $this->meta_title = '添加租售';
            $this->display('edit');
        }
    }
//修改频道
    public function edit($id = 0){
        if(IS_POST){
            $Center = D('Center');
            $data = $Center->create();
            if($data){
                if($Center->save()){
                    //记录行为
                    action_log('update_center', 'center', $data['id'], UID);
                    $this->success('编辑成功', U('index'));
                } else {
                    $this->error('编辑失败');
                }

            } else {
                $this->error($Center->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = M('Center')->find($id);

            if(false === $info){
                $this->error('获取配置信息错误');
            }
            /**
            $pid = I('get.pid', 0);
            //获取父导航
            if(!empty($pid)){
                $parent = M('Center')->where(array('id'=>$pid))->field('title')->find();
                $this->assign('parent', $parent);
            }

            $this->assign('pid', $pid); */
            $this->assign('info', $info);
            $this->meta_title = '编辑导航';
            $this->display();
        }
    }

//删除频道
    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(M('Center')->where($map)->delete()){
            //记录行为
            action_log('update_center', 'center', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
/**
 *报修管理
 */
    public function repair(){
        $map  = array('status' => array('gt', -1));
        $info = M('Center');
        import('ORG.Util.Page');// 导入分页类
        $total = $info->where($map)->count();//获取总条数
        //实例化分页类
        $page=new \Think\Page($total);//框架自带分页工具
        $show = $page->show();
        // $listRows = 2;//每页显示几条
        $list = $info->where($map)->order('id asc')->limit($page->firstRow.','.$page->listRows)->select();

        //分配
        $this->assign('page',$show);
        $this->assign('list', $list);
        $this->meta_title = '小区租售';
        $this->display('repair');
    }
}