<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nancy
 * Date: 17-7-6
 * Time: 下午2:06
 * To change this template use File | Settings | File Templates.
 */

namespace Admin\Controller;

class ActivityController extends AdminController{
    /**
     *列表
     */
    public function index(){
        /* 获取频道列表 */
        $map  = array('status' => array('gt', -1));
        $info = M('Activity');
        //dump($info);exit;
        import('ORG.Util.Page');// 导入分页类
        $total = $info->where($map)->count();//获取总条数
        //实例化分页类
        $page=new \Think\Page($total);//框架自带分页工具
        $show = $page->show();
       // $listRows = 2;//每页显示几条
        $list = $info->where($map)->order('id asc')->limit($page->firstRow.','.$page->listRows)->select();
//        dump($list);exit;
        //分配
        $this->assign('page',$show);
        $this->assign('list', $list);
        $this->meta_title = '活动管理';
        $this->display();
    }

//删除频道
    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map = array('id' => array('in', $id) );
        if(M('Activity')->where($map)->delete()){
            //记录行为
            action_log('update_activity', 'activity', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }


}