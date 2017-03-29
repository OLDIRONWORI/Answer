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

    // 学生添加
    public function stu_add()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        $class = D('class');
        $class_list = $class->getClassList();

        dump($class_list);

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('ad_adds', $active);
        $this->assign('class_list', $class_list);
        $this->display();
    }

    // 学生添加执行
    public function addStudentAct()
    {
        // 学生添加
        $student = D('student');
        $add = $student->addStudent();

        if($add){
            $this->success('新增成功', 'stu_table');
        }else{
            $this->error('新增失败');
        }
    }

    // 学生列表
    public function stu_table()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        $student = D('student');
        $student_list = $student->getStudentList();

        // 实例化班级
        $class = D('class');

        foreach($student_list as $key => &$val){
            $val['time'] = date("Y-m-d H:i:s" , $val['time']);
            $classInfo = $class->getClassInfo($val['classid']);
            $val['classid'] = $classInfo['classname'];
        }

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('ad_table', $active);
        $this->assign('student_list', $student_list);
        $this->display();
    }

    // 教师添加
    public function teach_add()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        $class = D('class');
        $class_list = $class->getClassList();

        dump($class_list);

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('teach_add', $active);
        $this->assign('class_list', $class_list);
        $this->display();
    }

    // 教师添加执行
    public function addTeacherAct()
    {
        // 教师添加
        $teacher = D('teacher');
        $add = $teacher->addTeacher();

        if($add){
            $this->success('新增成功' , 'teach_add');
        }else{
            $this->error('新增失败');
        }
    }

    // 教师列表
    public function teach_table()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        $teacher = D('teacher');
        $teacher_list = $teacher->getTeacherList();

        // 实例化班级
        $class = D('class');

        foreach($teacher_list as $key => &$val){
            $val['time'] = date("Y-m-d H:i:s" , $val['time']);
            $classInfo = $class->getClassInfo($val['classid']);
            $val['classid'] = $classInfo['classname'];
        }

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

        // 查出关键词
        $keys = D('keys');
        $typearr = array('未被解答的问题','已被解答的问题','文章');
        foreach($article_list as $key => &$val){
            $val['time'] = date("Y-m-d H:i:s" , $val['time']);
            $val['keys'] = explode(',' , $val['keys']);

            // 把关键字ID变成关键字名字
            $keystr = '';
            foreach($val['keys'] as $k => $v){
                $keyInfo = $keys->getKeysInfo($v);
                $keystr .= $keyInfo['keyname'] . ' | ';
            }
            $val['keys'] = rtrim($keystr , ' | ');

            // 文章类型
            $val['type'] = $typearr[$val['type']];
        }

        // 实例化关键词
        $keys = D('keys');

        foreach($article_list as $key => &$val){
            $val['time'] = date("Y-m-d H:i:s" , $val['time']);
            $keysInfo = $keys->getKeysInfo($val['classid']);


        }

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
        $class = D('class');

        // 遍历出师生信息
        $lists = array();
        $i = 0;
        foreach($appointment_list as $key => $val){
            $lists[$i] = $val;
            $stulists = $student->getStudentInfo($lists[$i]['studentid']);
            $tealists = $teacher->getTeacherInfo($lists[$i]['teacherid']);

            // 学生信息
            unset($lists[$i]['studentid']);
            $lists[$i]['sturealname'] = $stulists['realname'];
            $lists[$i]['stuclassid'] = $class->getClassInfo($stulists['classid']);
            $lists[$i]['stuclassid'] = $lists[$i]['stuclassid']['classname'];
            $lists[$i]['stuphone'] = $stulists['phone'];

            // 教师信息
            unset($lists[$i]['teacherid']);
            $lists[$i]['tearealname'] = $tealists['realname'];
            $lists[$i]['teaclassid'] = $class->getClassInfo($tealists['classid']);
            $lists[$i]['teaclassid'] = $lists[$i]['teaclassid']['classname'];
            $lists[$i]['teaphone'] = $tealists['phone'];

            $i++;
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

    // 关键字添加执行
    public function addKeysAct()
    {
        // 关键字
        $keys = D('keys');
        $add = $keys->addKeys();

        if($add){
            $this->success('新增成功' , 'keys_table');
        }else{
            $this->error('新增失败');
        }
    }

    // 关键字列表
    public function keys_table()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        $keys = D('keys');
        $keys_list = $keys->getKeysList();

        dump($keys_list);

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('keys_table', $active);
        $this->assign('keys_list', $keys_list);
        $this->display();
    }

    // 添加年级
    public function add_grade(){
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('add_grade', $active);
        $this->display();
    }

    // 添加年级执行
    public function addGradeAct()
    {
        $grade = D('grade');

    }

    // 添加班级
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

    // 添加系
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

    // 添加系执行
    public function addSeries()
    {
        $series = D('series');
        $add = $series->addSeriesAct();

        if($add){
            $this->success('新增成功' , 'add_tie');
        }else{
            $this->error('新增失败');
        }
    }

    // 班级列表
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