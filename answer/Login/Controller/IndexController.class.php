<?php
namespace Login\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function register()
    {

        $stu = D("student");

        $student_list = $stu->getStudentList();

        $this->assign('student_list' , $student_list);
        $this->display();
    }
}