<?php
namespace Home\Controller;

use Think\Controller;

class TeachController extends Controller
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
        if($userinfo['type'] != 'teacher'){
            $this->error('您不是教师，无权访问此页面','Home/Login/login',3);
        }
    }

    // 后台主页面---回答问题
    public function asked()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 查出所有未被回答的问题
        $article = D('article');
        $data = $article->getAwaitArticleList();

        $list = $data['list'];
        $show = $data['show'];

        foreach($list as $key => &$val){
            $val['time'] = date('Y-m-d H:i:s' , $val['time']);
        }

        // 分配信息到模板
        $active='active';

        $this->assign('list',$list);// 赋值数据集
        $this->assign('show',$show);// 赋值分页输出
        $this->assign('tea_asked', $active);
        $this->assign('userinfo', $userinfo);
        $this->display();
    }

    // 回答问题页面
    public function askeds()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        $article = D('article');
        $articleinfo = $article->getArticleDetail(I('get.id'));

        // 分配信息到模板
        $active='active';
        $this->assign('askeds', $active);
        $this->assign('userinfo', $userinfo);
        $this->assign('articleinfo', $articleinfo);
        $this->display();
    }

    // 回答问题处理
    public function askedsAct()
    {
        $reply = D('reply');

        $add = $reply->askedsAct();

        if($add){
            $article = D('article');
            $article->updateStatus(I('post.articleid'));
            $this->redirect('asked');
        }
    }

    //收藏夹
    public function collect()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('tea_collect', $active);
        $this->assign('userinfo', $userinfo);
        $this->display();
    }

    //收藏夹-问题
    public function question()
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

            if($info['type'] == '问题' || $info['type'] == '已解答的问题'){
                $article_lists[$i] = $info;
                $article_lists[$i]['cid'] = $val['id'];
                $i++;
            }

        }

        // 分配信息到模板
        $active='active';
        $this->assign('tea_question', $active);
        $this->assign('userinfo', $userinfo);
        $this->assign('article_lists', $article_lists);
        $this->display();
    }

    //收藏夹-文章
    public function article()
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

            if($info['type'] == '文章'){
                $article_lists[$i] = $info;
                $article_lists[$i]['cid'] = $val['id'];
                $i++;
            }
        }

        // 分配信息到模板
        $active='active';
        $this->assign('tea_article', $active);
        $this->assign('article_lists', $article_lists);
        $this->assign('userinfo', $userinfo);
        $this->display();
    }

    //发表文章
    public function publics()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 获取keys数据
        $keys = D('keys');
        $keysList = $keys->getKeysList();

        // 分配信息到模板
        $active='active';
        $this->assign('tea_publics', $active);
        $this->assign('keysList', $keysList);
        $this->assign('userinfo', $userinfo);
        $this->display();
    }

    // 发表文章提交处理
    public function publicsAct()
    {
        $article = D('article');

        $insert = $article->publicsAct();

        if($insert){
            $this->redirect('publics');
        }else{
            $this->error('提交失败,请检查输入');
        }
    }

    //已回答问题
    public function questioned()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 查询出当前登录用户的回答
        $reply = D('reply');
        $infos = $reply->getReplyUserReplyList();

        // 遍历存查询出所有详情
        $article = D('article');
        $reply_list = array();
        foreach($infos as $key => $val){
            $reply_list[] = $article->getArticleDetail($val['articleid']);
        }

        // 分配信息到模板
        $active='active';
        $this->assign('tea_questioned', $active);
        $this->assign('userinfo', $userinfo);
        $this->assign('reply_list', $reply_list);
        $this->display();
    }

    //查看预约
    public function appointmentList()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 查询出当前登录用户的回答
        $appointment = D('appointment');
        $appointmentList = $appointment->appointmentList();

        $student = D('student');
        $class = D('class');
        foreach($appointmentList as $key => &$val){
            $studentinfo = $student->getStudentInfo($val['studentid']);
            $val['realname'] = $studentinfo['realname'];
            $classinfo = $class->getClassInfo($studentinfo['classid']);
            $val['classname'] = $classinfo['classname'];
        }

        // 时间格式
        $timearr = array('8:00 - 8:20' , '8:20 - 8:40' , '8:40 - 9:00' , '9:00 - 9:20' , '9:20 - 9:40' , '9:40 - 10:00' , '10:00 - 10:20' , '10:20 - 10:40' , '10:40 - 11:00' , '11:00 - 11:20' , '11:20 - 11:40' , '11:40 - 12:00' , '13:00 - 13:20' , '13:20 - 13:40' , '13:40 - 14:00' , '14:00 - 14:20' , '14:20 - 14:40' , '14:40 - 15:00' , '15:00 - 15:20' , '15:20 - 15:40' , '16:00 - 16:20' , '16:20 - 16:40' , '16:40 - 17:00');
        $this->assign('timearr' , $timearr);

        // 分配信息到模板
        $active='active';
        $this->assign('appointmentList', $appointmentList);
        $this->assign('userinfo', $userinfo);
        $this->display();
    }

    // 设置空闲时间
    public function setTime()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 时间格式
        $timearr = array('8:00 - 8:20' , '8:20 - 8:40' , '8:40 - 9:00' , '9:00 - 9:20' , '9:20 - 9:40' , '9:40 - 10:00' , '10:00 - 10:20' , '10:20 - 10:40' , '10:40 - 11:00' , '11:00 - 11:20' , '11:20 - 11:40' , '11:40 - 12:00' , '13:00 - 13:20' , '13:20 - 13:40' , '13:40 - 14:00' , '14:00 - 14:20' , '14:20 - 14:40' , '14:40 - 15:00' , '15:00 - 15:20' , '15:20 - 15:40' , '16:00 - 16:20' , '16:20 - 16:40' , '16:40 - 17:00');
        $this->assign('timearr' , $timearr);

        $teacher = D('teacher');
        $teacherTime = $teacher->getTime();

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('teacherTime', $teacherTime);
        $this->display();
    }

    // 可预约时间设定
    public function setTimeAct()
    {
        $teacher = D('teacher');

        $update = $teacher->getTimeAct(); 

        if($update){
            $this->redirect('setTime');
        }else{
            $this->error('提交失败,请检查选择');
        }
    }

    // 取消收藏文章
    public function cancelarticle()
    {
        $collect = D('collect');

        $del = $collect->cancel();

        if($del){
            $this->redirect('article');
        }
    }

    // 取消收藏问题
    public function cancelquestion()
    {
        $collect = D('collect');

        $del = $collect->cancel();

        if($del){
            $this->redirect('question');
        }
    }

}

?>