<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>后台登陆</title>
    <!--<?php echo ($student_list); ?>-->
    <!--/Answer/Public-->
    <!-- Bootstrap Core CSS -->
    <link href="/Answer/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- MetisMenu CSS -->
    <link href="/Answer/Public/css/metisMenu.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="/Answer/Public/css/sb-admin-2.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="/Answer/Public/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .panel-title{
            text-align: center;
        }
        .container{
            margin-top: 5%;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">后台管理系统</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="<?php echo u('Login/loginAct');?>" method="post">
                        <fieldset>
                            <div class="form-group" >
                                <input class="form-control" placeholder="邮箱/手机"  required="required" name="code" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="密码" name="password" required="required"  type="password" value="">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <!--<a href="index.html" >Login</a>-->
                        <!--     <a href="<?php echo u('Login/selectRegister');?>" class="btn btn-lg btn-success btn-block"  >去注册</a> -->
                         <input type="submit" class="btn btn-lg btn-success btn-block"  value="提交" />
                        <a href="<?php echo u('Login/register');?>" class="btn btn-lg btn-success btn-block"  >去注册</a> 
                         

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- jQuery Version 1.11.0 -->
<script src="/Answer/Public/js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/Answer/Public/js/bootstrap.min.js"></script>

<script>

</script>

</body>

</html>