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
    <link href="/Answer/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/Answer/Public/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Answer/Public/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/Answer/Public/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Answer/Public/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
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
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> </a>
                    </li>
                    <!--      <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                          </li>-->
                    <li class="divider"> <?php echo ($_COOKIE['userinfo']['type']); ?></li>
                    <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
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

                        <?php if($_COOKIE['userinfo']['type']!= 'admin'): ?><ul class="nav in" id="side-menu">
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



                            <?php elseif($_COOKIE['userinfo']['type']!= 'teacher'): ?>
                            <ul class="nav in" id="side-menu">
                                <li>
                                    <a href="index.html"><i class="fa fa-edit fa-fw"></i> 回答问题</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 收藏夹<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level collapse">
                                        <li>
                                            <a href="flot.html">问题</a>
                                        </li>
                                        <li>
                                            <a href="morris.html">文章</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-second-level -->
                                </li>
                                <li>
                                    <a href="index.html" ><i class="fa fa-wrench fa-fw"></i>发表文章（扩展:存草稿）</a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fa fa-table fa-fw"></i>已回答问题</a>
                                </li>
                            </ul>









                            <?php else: ?>

                            <ul class="nav in" id="side-menu">
                                <li>
                                    <a href="index.html"><i class="fa fa-edit fa-fw"></i> 提问</a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fa fa-files-o fa-fw"></i>收藏夹</a>
                                </li>
                                <li>
                                    <a href="index.html" ><i class="fa fa-wrench fa-fw"></i>寻找教师</a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fa fa-table fa-fw"></i>历史问题</a>
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