<?php
namespace Home\Controller;

use Think\Controller;

class StuController extends Controller
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
        if($userinfo['type'] != 'student'){
            $this->error('您不是学生，无权访问此页面','Login/login',3);
        }
    }

    // 后台主页面---提问界面
    public function ask()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 获取keys数据
        $keys = D('keys');
        $keysList = $keys->getKeysList();

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('keysList', $keysList);
        $this->assign('active', $active);
        $this->display();
    }

    // 学生提问提交处理
    public function askAct()
    {
        $article = D('article');

        $insert = $article->askAct();

        // 增加排序等级
        $keysarr = I('post.keys');
        $keys = D('keys');
        foreach($keysarr as $key => $val){

        }

        if($insert){
            $this->success('提交成功','ask',2);
        }else{
            $this->error('提交失败,请检查输入');
        }
    }

    //收藏夹
    public function collect()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 查询出所有收藏的内容
        $collect = D('collect');
        $collect_list = $collect->getCollectList();

        // 查询出所有内容的详情
        $article = D('article');
        $article_lists = array();

        // 遍历存查询出所有详情
        $i = 0;
        foreach($collect_list as $key => $val){
            $info = $article->getArticleDetail($val['articleid']);

            $article_lists[$i] = $info;
            $article_lists[$i]['cid'] = $val['id'];
            $i++;
        }

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('collect', $active);
        $this->assign('article_lists', $article_lists);
        $this->display();
    }

    // 取消收藏问题
    public function cancelquestion()
    {
        $collect = D('collect');

        $del = $collect->cancel();

        if($del){
            $this->redirect('collect');
        }
    }

    //寻找老师
    public function find()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 查询教师列表
        $teacher = D('teacher');
        $teacher_list = $teacher->getTeacherList();

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('find', $active);
        $this->assign('teacher_list', $teacher_list);
        $this->display();
    }

    //历史问题
    public function question()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        $article = D('article');
        $article_list = $article->getUserArticle();

        $arr = array('未解答' , '已解答' , '教师文章');
        foreach($article_list as $key => &$val){
            $val['time'] = date('Y-m-d H:i:s' , $val['time']);
            $val['type'] = $arr[$val['type']];
        }

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('question', $active);
        $this->assign('article_list', $article_list);
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

    // 预约时间
    public function studentToTeacherCollect()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        $teacherid = I('get.id');

        // 时间格式
        $timearr = array('8:00 - 8:20' , '8:20 - 8:40' , '8:40 - 9:00' , '9:00 - 9:20' , '9:20 - 9:40' , '9:40 - 10:00' , '10:00 - 10:20' , '10:20 - 10:40' , '10:40 - 11:00' , '11:00 - 11:20' , '11:20 - 11:40' , '11:40 - 12:00' , '13:00 - 13:20' , '13:20 - 13:40' , '13:40 - 14:00' , '14:00 - 14:20' , '14:20 - 14:40' , '14:40 - 15:00' , '15:00 - 15:20' , '15:20 - 15:40' , '16:00 - 16:20' , '16:20 - 16:40' , '16:40 - 17:00');
        $this->assign('timearr' , $timearr);

        $teacher = D('teacher');
        $teacherTime = $teacher->getTimeId($teacherid);

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('teacherid', $teacherid);
        $this->assign('teacherTime', $teacherTime);
        $this->display();
    }

    //执行
    public function setTimeAct()
    {
        $appointment = D('appointment');

        $add = $appointment->setTimeAct(); 

        if($add){
            $this->success('提交成功','find',2);
        }else{
            $this->error('提交失败,请检查选择');
        }
    }

    // 详情
    public function detail()
    {
        $arcticleid = I('get.id');
        $userinfo = cookie('userinfo');

        // 文章/问题
        $article = D('article');
        $articleinfo = $article->getArticleDetail($arcticleid);

        // 解答
        $reply = D('reply');
        $replyList = $reply->getArticleReply($arcticleid);

        $teacher = D('teacher');
        foreach ($replyList as $key => &$val) {
            $val['time'] = date('Y-m-d H:i:s' , $val['time']);

            $uinfo = $teacher->getTeacherInfo($val['userid']);
            $val['username'] = $uinfo['realname'];
        }

        $detail='detail';
        $this->assign('active', $detail);
        $this->assign('userinfo' , $userinfo);
        $this->assign('articleinfo' , $articleinfo);
        $this->assign('replyList' , $replyList);
        $this->display();
    }
}

?>