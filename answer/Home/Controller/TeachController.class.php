<?php
namespace Home\Controller;

use Think\Controller;

class TeachController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // 是否登录
        if (!cookie('userinfo')) {
            redirect('Home/Login/login');
        }
    }
    // 后台主页面---回答问题
    public function asked()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $this->assign('userinfo', $userinfo);
        $this->display();
    }
    //收藏夹
    public function collect()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $this->assign('userinfo', $userinfo);
        $this->display();
    }
    //收藏夹-问题
    public function question()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $this->assign('userinfo', $userinfo);
        $this->display();
    }
    //收藏夹-文章
    public function article()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $this->assign('userinfo', $userinfo);
        $this->display();
    }
    //发表文章
    public function publics()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $this->assign('userinfo', $userinfo);
        $this->display();
    }
    //已回答问题
    public function questioned()
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