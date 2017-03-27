<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $userinfo = cookie('userinfo');

        // 是否登录
        if (!$userinfo) {
            $this->redirect('Home/Login/login');
        }else{
            // 判断当前登录者的身份
            if($userinfo['type'] == 'student'){
                // 学生
                $this->redirect('Stu/ask');
            }else if($userinfo['type'] == 'teacher'){
                // 教师
                $this->redirect('Teach/asked');
            }else if($userinfo['type'] == 'admin'){
                // 管理员
                $this->redirect('Admin/index');
            }
        }
    }
}

?>