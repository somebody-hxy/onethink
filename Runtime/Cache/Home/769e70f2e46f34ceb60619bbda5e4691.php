<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>微信物业管理系统</title>

    <!-- Bootstrap -->
    <link href="/wwwroot/Public/Home/css/bootstrap.min.css" rel="stylesheet">
    <link href="/wwwroot/Public/Home/css/style.css" rel="stylesheet">

    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo U('Index/index');?>" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo U('Server/index');?>" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo U('Find/index');?>" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo U('User/index');?>" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">
        <div class="indexImg row">
            <img src="/wwwroot/Public/Home/images/wechat/index.png" width="100%" />
        </div>
        <div class="serviceList text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4">
                        <a href="<?php echo U('notice');?>">
                            <div class="indexLabel label-danger">
                                <span class="glyphicon glyphicon-bullhorn"></span><br/>
                                小区通知
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo U('server');?>">
                            <div class="indexLabel label-warning">
                                <span class="glyphicon glyphicon-ok-circle"></span><br/>
                                便民服务
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo U('repair');?>l">
                            <div class="indexLabel label-info">
                                <span class="glyphicon glyphicon-heart-empty"></span><br/>
                                在线报修
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo U('shop');?>">
                            <div class="indexLabel label-success">
                                <span class="glyphicon glyphicon-briefcase"></span><br/>
                                商家活动
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <!--<a href="zushou.html">-->
                        <a href="<?php echo U('center');?>">
                            <div class="indexLabel label-primary">
                                <span class="glyphicon glyphicon-usd"></span><br/>
                                小区租售
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo U('activity');?>">
                            <div class="indexLabel label-default">
                                <span class="glyphicon glyphicon-apple"></span><br/>
                                小区活动
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/wwwroot/Public/Home/js/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/wwwroot/Public/Home/js/bootstrap.min.js"></script>
</body>
</html>