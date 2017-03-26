<?php
namespace Home\Controller;

use Think\Controller;

class StuController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // 是否登录
        if (!cookie('userinfo')) {
            redirect('Home/Login/login');
        }
    }
    // 后台主页面---提问界面
    public function ask()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('active', $active);
        $this->display();
    }

    // 学生提问提交处理
    public function askAct()
    {
        
    }

    //收藏夹
    public function collect()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('collect', $active);
        $this->display();
    }
    //寻找老师
    public function find()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('find', $active);
        $this->display();
    }
    //历史问题
    public function question()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('question', $active);
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