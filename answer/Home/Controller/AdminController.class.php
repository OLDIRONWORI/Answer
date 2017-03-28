<?php
namespace Home\Controller;

use Think\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $userinfo = cookie('userinfo');

        // 是否登录
        if (!$userinfo) {
            $this->redirect('Home/Login/login');
        }

        // 是否对应权限
        if($userinfo['type'] != 'admin'){
            $this->error('您不是管理员，无权访问此页面','Home/Login/login',3);
        }

    }

    //管理员首页
    public function home()
    {
        $userinfo = cookie('userinfo');
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('question', $active);
        $this->display();
    }

    //学生添加
    public function stu_add()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('ad_adds', $active);
        $this->display();
    }
    //学生列表
    public function stu_table()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        $student = D('student');
        $student_list = $student->getStudentList();

        foreach($student_list as $key => $val){
            $val['time'] = date("Y-m-d H:i:s" , $val['time']);
        }

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('ad_table', $active);
        $this->assign('student_list', $student_list);
        $this->display();
    }
    //教师添加
    public function teach_add()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板

        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('teach_add', $active);
        $this->display();
    }
    //教师列表
    public function teach_table()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        $teacher = D('teacher');
        $teacher_list = $teacher->getTeacherList();

        dump($teacher_list);

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('teach_table', $active);
        $this->assign('teacher_list', $teacher_list);
        $this->display();
    }
    //文章列表
    public function article()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        $article = D("article");
        $article_list = $article->getArticleList();
        dump($article_list);

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('ad_article', $active);
        $this->assign('article_list', $article_list);
        $this->display();
    }
    //问题列表
    public function question()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        $article = D("article");
        $question_list = $article->getQuestionList();
        dump($question_list[0]);

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('ad_question', $active);
        $this->assign('question_list', $question_list);
        $this->display();
    }
    //预约列表
    public function order()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        $appointment = D('appointment');
        $appointment_list = $appointment->getAppointmentList();

        $student = D('student');
        $teacher = D('teacher');

        // 遍历出师生信息
        $lists = array();
        foreach($appointment_list as $key => $val){
            $lists = $val;
            $lists['studentid'] = $student->getStudentInfo($lists['studentid']);
            $lists['teacherid'] = $teacher->getTeacherInfo($lists['teacherid']);
        }

        dump($lists);

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('ad_order', $active);
        $this->assign('lists', $lists);
        $this->display();
    }

    //关键字添加
    public function add_keys()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('add_keys', $active);
        $this->display();
    }

    // 关键字列表
    public function keys_table()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('keys_table', $active);
        $this->display();
    }

    //添加年级
    public function add_grade(){
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('add_grade', $active);
        $this->display();
    }

    //添加班级
    public function add_class()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('add_class', $active);
        $this->display();
    }
    //添加系
    public function add_tie()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('add_tie', $active);
        $this->display();
    }

    //班级列表
    public function classList()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('classList', $active);
        $this->display();
    }

}

?>