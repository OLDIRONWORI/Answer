<?php
namespace Home\Controller;

use Think\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $userinfo = cookie('userinfo');

        // 是否登录
        if (!$userinfo) {
            $this->redirect('Home/Login/login');
        }

        // 是否对应权限
        if($userinfo['type'] != 'admin'){
            $this->error('您不是管理员，无权访问此页面','Home/Login/login',3);
        }

    }

    //管理员首页
    public function home()
    {
        $this->display();
    }

}

?>