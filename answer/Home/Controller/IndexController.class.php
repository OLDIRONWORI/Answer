<?php
namespace Home\Controller;

use Home\CommenController;

class IndexController extends CommenController
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
        $this->assign('userinfo', $userinfo);
        $this->display();
    }

    // 获取系信息
    public function getSeriesList()
    {

        $series = D("series");
        $series_list = $series->getGradeList();

        $this->ajaxReturn($series_list);
    }

    // 获取年级信息
    public function getGradeList()
    {

        $grade = D("grade");
        $grade_list = $grade->getGradeList();

        $this->ajaxReturn($grade_list);
    }

    // 获取班级信息
    public function getClassList()
    {

        $class = D("class");
        $class_list = $class->getGradeList();

        $this->ajaxReturn($class_list);
    }

}

?>