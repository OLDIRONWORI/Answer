<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    // 入口
    public function index()
    {
        $this->redirect('Login/login');
    }

    // 后台主页面
    public function home()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 分配信息到模板
        $this->assign('userinfo' , $userinfo);
        $this->display();
    }

}

?>