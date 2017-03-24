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

    // 注册处理，插入数据库
    public function registerAct()
    {
        $post = I('post.');
    }

    // 获取年级信息
    public function getGradeList(){

        $grade = D("grade");
        $grade_list = $grade->getGradeList();

        $this->ajaxReturn($grade_list);
    }

    // 获取系信息
    public function getSeriesList(){

        $series = D("series");
        $series_list = $series->getGradeList();

        $this->ajaxReturn($series_list);
    }

    // 获取班级信息
    public function getClassList(){

        $class = D("class");
        $class_list = $class->getGradeList();

        $this->ajaxReturn($class_list);
    }

    // 登录页面
    public function login()
    {
        $this->display();
    }
}

?>