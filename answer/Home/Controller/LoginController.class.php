<?php
namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
    // 跳转到注册界面
    public function register()
    {
        $this->display();
    }

    public function registerAct()
    {
        $post = I('post.');
    }
}

?>