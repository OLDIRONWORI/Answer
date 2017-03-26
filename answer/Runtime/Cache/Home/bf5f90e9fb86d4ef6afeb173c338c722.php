<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>后台管理的主页面</title>

    <!-- Bootstrap Core CSS -->
    <link href="/waibao/Answer/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/waibao/Answer/Public/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/waibao/Answer/Public/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/waibao/Answer/Public/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/waibao/Answer/Public/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">


<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">后台管理系统</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
     <!--       <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>-->
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>Read All Messages</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo ($userinfo["realname"]); ?>  </a>
                </li>
                <!--      <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                      </li>-->
                <li class="divider"> <?php echo ($userinfo["realname"]); ?>  </li>
                <li>
                    <!--href="<?php echo U('Home/Login/loginOut');?>"-->
                    <a  data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->









    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav in" id="side-menu">
                <!--<li class="sidebar-search">-->
                <!--<div class="input-group custom-search-form">-->
                <!--<input type="text" class="form-control" placeholder="Search...">-->
                <!--<span class="input-group-btn">-->
                <!--<button class="btn btn-default" type="button">-->
                <!--<i class="fa fa-search"></i>-->
                <!--</button>-->
                <!--</span>-->
                <!--</div>-->
                <!--&lt;!&ndash; /input-group &ndash;&gt;-->
                <!--</li>-->
                <div class="sidebar-nav navbar-collapse">
                    <?php if($userinfo["type"] == 'admin'): ?><!--管理员-->
                        <ul class="nav in" id="side-menu">
                            <li>
                                <a href="#"><i class="fa fa-dashboard fa-fw"></i> 学生管理<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                    <li>
                                        <a href="blank.html">学生添加</a>
                                    </li>
                                    <li>
                                        <a href="login.html">学生列表</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li class="">
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> 教师管理<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                    <li>
                                        <a href="blank.html">教师添加</a>
                                    </li>
                                    <li>
                                        <a href="login.html">教师列表</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="index.html"><i class="fa fa-edit fa-fw"></i> 文章列表</a>
                            </li>
                            <li>
                                <a href="index.html"><i class="fa fa-wrench fa-fw"></i> 问题列表</a>
                            </li>
                            <li>
                                <a href="index.html"><i class="fa fa-sitemap fa-fw"></i> 预约列表</a>
                            </li>
                            <li>
                                <a href="index.html"><i class="fa fa-table fa-fw"></i> 关键字管理</a>
                            </li>
                            <li class="">
                                <a href="#"><i class="fa fa-tasks fa-fw"></i> 班级管理<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                    <li>
                                        <a href="blank.html">添加班级</a>
                                    </li>
                                    <li>
                                        <a href="login.html">添加系</a>
                                    </li>
                                    <li>
                                        <a href="login.html">添加班级</a>
                                    </li>
                                    <li>
                                        <a href="login.html">班级列表</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                        <?php elseif($userinfo["type"] == 'teacher'): ?>




                        <!--教师-->
                        <ul class="nav in" id="side-menu">
                            <li>
                                <a href="<?php echo u('Teach/asked');?>" class="<?php echo ($tea_asked); ?>"><i class="fa fa-edit fa-fw"></i> 回答问题</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Teach/collect');?>" class="<?php echo ($tea_collect); ?>"><i class="fa fa-bar-chart-o fa-fw"></i> 收藏夹<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="<?php echo u('Teach/question');?>" class="<?php echo ($tea_question); ?>"> 问题</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo u('Teach/article');?>" class="<?php echo ($tea_article); ?>"> 文章</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="<?php echo u('Teach/publics');?>" class="<?php echo ($tea_publics); ?>"><i class="fa fa-wrench fa-fw"></i> 发表文章（扩展:存草稿）</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Teach/questioned');?>" class="<?php echo ($tea_questioned); ?>"><i class="fa fa-table fa-fw"></i> 已回答问题</a>
                            </li>
                        </ul>














                        <?php else: ?>
                        <!--学生-->
                        <ul class="nav in" id="side-menu">
                            <li>
                                <a href="<?php echo u('Stu/ask');?>" class="<?php echo ($active); ?>"><i class="fa fa-edit fa-fw"></i> 提问</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Stu/collect');?>" class="<?php echo ($collect); ?>"><i class="fa fa-files-o fa-fw"></i> 收藏夹</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Stu/find');?>" class="<?php echo ($find); ?>"><i class="fa fa-wrench fa-fw"></i> 寻找教师</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Stu/question');?>" class="<?php echo ($question); ?>"><i class="fa fa-table fa-fw"></i> 历史问题</a>
                            </li>
                        </ul><?php endif; ?>
                </div>

                <!--      <li>
                          <a href="index.html" class="active"><i class="fa fa-edit fa-fw"></i> 提问</a>
                      </li>
                      <li>
                          <a href="index.html" class="active"><i class="fa fa-files-o fa-fw"></i>收藏夹</a>
                      </li>
                      <li>
                          <a href="index.html" class="active"><i class="fa fa-wrench fa-fw"></i>寻找教师</a>
                      </li>
                      <li>
                          <a href="index.html" class="active"><i class="fa fa-table fa-fw"></i>历史问题</a>
                      </li>-->

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper" style="min-height: 475px;">
 

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">提问</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                     <!--    <div class="panel-heading">
                         提问
                     </div> -->
                        <div class="panel-body">
                           <form role="form">
                                   <div class="form-group">
                                        <label>标题</label>
                                        <input class="form-control" placeholder="请输入标题">
                                   </div>
                                    <div class="form-group">
                                        <label>内容</label>
                                        <input class="form-control" placeholder="请输入内容">
                                   </div>
                                   <div class="form-group">
                                            <label>关键词 : </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked="">1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                                            </label>
                                        </div>
                                   <button type="button" class="btn btn-primary">提交</button>
                               <!--    <button type="button" class="btn btn-outline btn-primary btn-lg btn-block">提交</button> -->
                           </form>
                        </div>
                       <!--  -->
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
<!-- /#page-wrapper -->
<!-- /#wrapper -->


<!--底部-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">确认退出</h4>
            </div>
            <div class="modal-body">
                退出后，可重新登录
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <a href="<?php echo U('Home/Login/loginOut');?>" type="button" class="btn btn-primary">确定</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- jQuery -->
<script src="/waibao/Answer/Public/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/waibao/Answer/Public/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/waibao/Answer/Public/js/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="/waibao/Answer/Public/js/raphael.min.js"></script>
<script src="/waibao/Answer/Public/js/morris.min.js"></script>
<script src="/waibao/Answer/Public/js/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/waibao/Answer/Public/js/sb-admin-2.js"></script>

<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    // popover demo
    $("[data-toggle=popover]")
        .popover()
</script>


</body>

</html>