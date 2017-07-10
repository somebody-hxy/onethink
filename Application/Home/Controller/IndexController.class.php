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
    //小区租售详细信息
    public function intro($id=0){
        $info=[];
        $info=M('Center')->find($id);
        $this->assign('info', $info);
        $this->display('center-detail');
    }

    //小区通知
    public function notice(){
        $map1['title']='小区通知' ;
        $map1['status']='1' ;
        $cate = M('Category')->where($map1)->select();
//        dump($cate);exit;//分类
        foreach($cate as $v){

        }
//        dump($v);exit;
        $id=$v['id'];
        $map  = array('status' => array('gt', -1),'category_id'=>$id);
        $model = M('Document')->where($map)->order('id asc')->select();
        foreach($model as $list){

        }
        //echo time();
        //dump($list['deadline']);exit;
        //判断活动是否过期
        if($list['deadline']>time()){
            //echo time();exit;
            $this->assign('list', $model);
            $this->display('notice');
        }else{
            //$list['deadline']<=time()
            //删除数据
            $id=$list['id'];
            $map = array('id' => array('in', $id) );
            M('Document')->where($map)->delete();
            M('Document_article')->where($map)->delete();
        }
    }
    //小区通知详情
    public function notice_intro($id=0){
//        $list = M('Document')->find($id);
        $model = M('Document');
        $list=$model->where("id=$id")->setInc('view',1);
//        dump($list['uid']);exit;//用户ID
        $uid=$list['uid'];
        $map  = array('status' => array('gt', -1));
        $model2=$model->where($map)->find($id);
        $list2 = M('Document_article')->find($id);
        $list3=M('Ucenter_member')->find($uid);
        $this->assign('list', $model2);
        $this->assign('list2', $list2);
        $this->assign('list3', $list3);
        $this->display('notice-detail');
    }
    //便民服务通知
    public function server(){
        $map1['title']='便民服务' ;
        $map1['status']='1' ;
        $cate = M('Category')->where($map1)->select();
//        dump($cate);exit;//分类
        foreach($cate as $v){

        }
//        dump($v);exit;
        $id=$v['id'];
        $map  = array('status' => array('gt', -1),'category_id'=>$id);
        $model = M('Document')->where($map)->order('id asc')->select();
        //dump($list);exit;
        foreach($model as $list){

        }
        //echo time();
        //dump($list['deadline']);exit;
        //判断活动是否过期
        if($list['deadline']>time()){
            //echo time();exit;
            $this->assign('list', $model);
            $this->display('server');
        }else{
            //$list['deadline']<=time()
            //删除数据
            $id=$list['id'];
            $map = array('id' => array('in', $id) );
            M('Document')->where($map)->delete();
            M('Document_article')->where($map)->delete();
        }
    }
    //便民服务详情
    public function server_intro($id=0){
        $model = M('Document');
        $list=$model->where("id=$id")->setInc('view',1);
//        dump($list['uid']);exit;//用户ID
        $uid=$list['uid'];
        $map  = array('status' => array('gt', -1));
        $model2=$model->where($map)->find($id);
        $list2 = M('Document_article')->find($id);
        $list3=M('Ucenter_member')->find($uid);
        $this->assign('list', $model2);
        $this->assign('list2', $list2);
        $this->assign('list3', $list3);
        $this->display('server-detail');
    }

    //小区活动
    public function activity(){
        $map1['title']='小区活动' ;
        $map1['status']='1' ;
        $cate = M('Category')->where($map1)->select();
        foreach($cate as $v){

        }
        $id=$v['id'];
        $map  = array('status' => array('gt', -1),'category_id'=>$id);
        $model = M('Document')->where($map)->order('id asc')->select();
        //dump($list);exit;
        foreach($model as $list){

        }
        //echo time();
        //dump($list['deadline']);exit;
        //判断活动是否过期
        if($list['deadline']>time()){
            //echo time();exit;
            $this->assign('list', $model);
            $this->display('activity');
        }else{
            //$list['deadline']<=time()
            //删除数据
            $id=$list['id'];
            $map = array('id' => array('in', $id) );
            M('Document')->where($map)->delete();
            M('Document_article')->where($map)->delete();
        }
    }
    //小区活动详情
    public function activity_intro($id=0){
        $model = M('Document');
        $list=$model->where("id=$id")->setInc('view',1);
//        dump($list['uid']);exit;//用户ID
       // dump($list);exit;
        $uid=$list['uid'];
        $map  = array('status' => array('gt', -1));
        $model2=$model->where($map)->find($id);
        $list2 = M('Document_article')->find($id);
        //dump($model2,$list2);exit;
        $list3=M('Ucenter_member')->find($uid);
        $this->assign('list', $model2);
        $this->assign('list2', $list2);
        $this->assign('list3', $list3);
        $this->display('activity-detail');
    }
    //申请参加活动
    public function activity_apply(){
        //判断用户是否登录
        if ( !is_login() ) {
            $this->error( '您还没有登陆',U('User/login') );
        }else{
            //已登录
            //如果已经报名不能再报名，通过ajax实现
            $id = array_unique((array)I('id',0));//活动id
            $art_id=$id[0];
            $uid=is_login();
            $map1=array('status' => array('gt', -1));
            $list2=M('Document')->where($map1)->find($art_id);
            $list3=M('Ucenter_member')->where($map1)->find($uid);
            $obj=[
                'title'=>$list2['title'],//1499652469 //1499652479
                'intro'=>$list2['description'],
                'username'=>$list3['username'],
                'stop_time'=>$list2['deadline'],
            ];
            //dump($obj);exit;
            $act = D('Activity');
            $data = $act->create($obj);
			//dump($data['username']);exit;
            $map=array('title'=>$data['title'],'username'=>$data['username']);
            $active_article = M('Activity')->where($map)->find();
            //echo 111;exit;
            if($active_article){
                $this->success('你已经申请过了',U('Index/index'));exit;
            }
            if($data){
                $id = $act->add($data);
                if($id){
                    $this->success('新增成功',U('Index/index'));exit;
                }else{
                    $this->error('新增失败');
                }
            }
        }
    }
    //商家活动
    public function shop(){
        $map1['title']='商家活动' ;
        $map1['status']='1' ;
        $cate = M('Category')->where($map1)->select();
//        dump($cate);exit;//分类
        foreach($cate as $v){

        }
//        dump($v);exit;
        $id=$v['id'];
        $map  = array('status' => array('gt', -1),'category_id'=>$id);
        $model = M('Document')->where($map)->order('id asc')->select();
        foreach($model as $list){

        }
        //echo time();
        //dump($list['deadline']);exit;
        //判断活动是否过期
        if($list['deadline']>time()){
            //echo time();exit;
            $this->assign('list', $model);
            $this->display('shop');
        }else{
            //$list['deadline']<=time()
            //删除数据
            $id=$list['id'];
            $map = array('id' => array('in', $id) );
            M('Document')->where($map)->delete();
            M('Document_article')->where($map)->delete();
        }

    }
    //商家活动详情
    public function shop_intro($id=0){
        $model = M('Document');
        $list=$model->where("id=$id")->setInc('view',1);
//        dump($list['uid']);exit;//用户ID
        $uid=$list['uid'];
        $map  = array('status' => array('gt', -1));
        $model2=$model->where($map)->find($id);
        $list2 = M('Document_article')->find($id);
        $list3=M('Ucenter_member')->find($uid);
        $this->assign('list', $model2);
        $this->assign('list2', $list2);
        $this->assign('list3', $list3);
        $this->display('shop-detail');
    }

    //在线报修
    public function repair(){
        //判断用户是否登录
        if ( !is_login() ) {
            $this->error( '您还没有登陆',U('User/login') );
        }else{
            $this->display('repair');
        }
    }
}