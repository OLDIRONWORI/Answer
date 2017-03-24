<?php
namespace Login\Controller;

use Think\Controller;

class IndexController extends Controller
{
    // 进入注册页面
    public function register()
    {

        $stu = D("Student");

        $student_list = $stu->getStudentList();

//        dump($student_list);

        $this->assign('student_list' , $student_list);
        $this->display();
    }

    public function registerAct(){
        I('post.realname');
    }
}