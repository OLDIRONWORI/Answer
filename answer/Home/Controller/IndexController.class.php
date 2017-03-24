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
        $this->display();
    }

}

?>