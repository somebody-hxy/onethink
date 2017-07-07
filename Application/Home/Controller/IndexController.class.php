<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {

	//系统首页
    public function index(){
/**
        $category = D('Category')->getTree();
        $lists    = D('Document')->lists(null);

        $this->assign('category',$category);//栏目
        $this->assign('lists',$lists);//列表
        $this->assign('page',D('Document')->page);//分页
*/
                 
        $this->display();
    }
    //小区租售
    public function center(){

        $map1  = array('status' => array('gt', -1),'type'=>array(0));
        $map2  = array('status' => array('gt', -1),'type'=>array(1));
        $list1 = M('Center')->where($map1)->order('id asc')->select();
        $list2 = M('Center')->where($map2)->order('id asc')->select();
        $this->assign('list1', $list1);
        $this->assign('list2', $list2);
        $this->display('center');
    }
    //小区详细信息
    public function intro($id=0){
        $info=[];
        $info=M('Center')->find($id);
        $this->assign('info', $info);
        $this->display('center-detail');
    }

    //小区通知
    public function notice(){
        $map  = array('status' => array('gt', -1));
        $list = M('Document')->where($map)->order('id asc')->select();
        $this->assign('list', $list);
        $this->display('notice');
    }
    //小区通知详情
    public function notice_intro($id=0){
        $list = M('Document')->find($id);
//        dump($list['uid']);exit;//用户ID
        $uid=$list['uid'];
        $list2 = M('Document_article')->find($id);
        $list3=M('Ucenter_member')->find($uid);
        $this->assign('list', $list);
        $this->assign('list2', $list2);
        $this->assign('list3', $list3);
        $this->display('notice-detail');
    }
    //小区通知
    public function server(){
        $map  = array('status' => array('gt', -1));
        $list = M('Document')->where($map)->order('id asc')->select();
        $this->assign('list', $list);
        $this->display('server');
    }
    //小区通知详情
    public function server_intro($id=0){
        $list = M('Document')->find($id);
//        dump($list['uid']);exit;//用户ID
        $uid=$list['uid'];
        $list2 = M('Document_article')->find($id);
        $list3=M('Ucenter_member')->find($uid);
        $this->assign('list', $list);
        $this->assign('list2', $list2);
        $this->assign('list3', $list3);
        $this->display('server-detail');
    }

}