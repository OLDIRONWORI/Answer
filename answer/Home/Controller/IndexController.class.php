<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $userinfo = cookie('userinfo');
        // 是否登录
        if (!$userinfo) {
            $this->redirect('Home/Login/login');
        }else{
            $this->redirect('Home/Index/question/act/home');
        }
    }

    // 待解答问题
    public function question()
    {
        $act = I('get.act');

        $userinfo = cookie('userinfo');

        $article = D('article');
        $keys = D('keys');

        $articlearr = $article->getAwaitSolveQuestionList();

        foreach($articlearr as $key => &$val){
            $val['time'] = date('Y-m-d H:i:s' , $val['time']);

            $val['keysname'] = $keys->getKeysNameList($val['keys']);

            $val['keys'] = explode(',' , $val['keys']);

            foreach($val['keys'] as $k => &$v){
                $v = (int)$keys->getOrderNumber($v);
            }

            rsort($val['keys']);
            $val['keys'] = $val['keys'][0];
        }

        $articlearr = $this->list_sort_by($articlearr , 'keys' , 'desc');

        $this->assign('userinfo' , $userinfo);
        $this->assign('articlearr' , $articlearr);
        $this->assign('act' , $act);
        $this->display();
    }

    // 待解答问题
    public function overQuestion()
    {
        $act = I('get.act');

        $userinfo = cookie('userinfo');

        $article = D('article');
        $keys = D('keys');

        $articlearr = $article->getOverQuestionList();

        foreach($articlearr as $key => &$val){
            $val['time'] = date('Y-m-d H:i:s' , $val['time']);

            $val['keysname'] = $keys->getKeysNameList($val['keys']);

            $val['keys'] = explode(',' , $val['keys']);

            foreach($val['keys'] as $k => &$v){
                $v = (int)$keys->getOrderNumber($v);
            }

            rsort($val['keys']);
            $val['keys'] = $val['keys'][0];
        }

        $articlearr = $this->list_sort_by($articlearr , 'keys' , 'desc');

        $this->assign('userinfo' , $userinfo);
        $this->assign('articlearr' , $articlearr);
        $this->assign('act' , $act);
        $this->display();
    }

    // 文章列表
    public function article()
    {
        $act = I('get.act');

        $userinfo = cookie('userinfo');

        $article = D('article');
        $keys = D('keys');

        $articlearr = $article->getToArticleList();

        foreach($articlearr as $key => &$val){
            $val['time'] = date('Y-m-d H:i:s' , $val['time']);

            $val['keysname'] = $keys->getKeysNameList($val['keys']);

            $val['keys'] = explode(',' , $val['keys']);

            foreach($val['keys'] as $k => &$v){
                $v = (int)$keys->getOrderNumber($v);
            }

            rsort($val['keys']);
            $val['keys'] = $val['keys'][0];
        }

        $articlearr = $this->list_sort_by($articlearr , 'keys' , 'desc');

        $this->assign('userinfo' , $userinfo);
        $this->assign('articlearr' , $articlearr);
        $this->assign('act' , $act);
        $this->display();
    }

    // 搜索页面
    public function select()
    {
        $act = I('get.act');

        $userinfo = cookie('userinfo');

        $keys = D('keys');
        $keys_list = $keys->getKeysList();

        $this->assign('userinfo' , $userinfo);
        $this->assign('keys_list' , $keys_list);
        $this->assign('act' , $act);
        $this->display();
    }

    // 搜索执行
    public function selectAct()
    {
        $userinfo = cookie('userinfo');
        $act = I('get.act');

        $post = I('post.');

        $article = D('article');
        $keys = D('keys');
        $student = D('student');
        $teacher = D('teacher');

        $typearr = array("待解答问题" , "已解答问题" , "教师文章");

        if($post['type'] < 3){
            // article
            $articlearr = $article->getTypeList($post['type'] , $post['title']);
        }else{
            // keys
            $keylist = $keys->getIdToName($post['title']);

            if($keylist){
                $arr = $article->getAllArticleList();
                $articlearr = array();

                foreach($arr as $key => &$val){
                    foreach($keylist as $k => &$v){
                        $boo = strstr($val['keys'] , $v['id']);
                        
                        if($boo){
                            $val['time'] = date('Y-m-d H:i:s');
                            $val['type'] = $typearr[(int)$val['type']];
                            
                            if($val['usertype'] == 'student'){
                                $ui = $student->getStudentInfo($val['userid']);
                                $val['username'] = $ui['realname'];
                            }else{
                                $ui = $teacher->getTeacherInfo($val['userid']);
                                $val['username'] = $ui['realname'];
                            }

                            $articlearr[] = $val;
                        }
                    }
                }
            }else{
                $articlearr = false;
            }

        }

        $this->assign('userinfo' , $userinfo);
        $this->assign('act' , $act);
        $this->assign('articlearr' , $articlearr);
        $this->assign('title' , $post['title']);
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
        $this->assign('act' , 'home');
        $this->display();
    }

    // 回答问题处理
    public function askedsAct()
    {
        $reply = D('reply');
        $url = I('post.url');

        $add = $reply->askedsAct();

        if($add){
            $article = D('article');
            $article->updateStatus(I('post.articleid'));
            $this->redirect('/Home/Index/' . $url . '/act/home');
        }else{
            $this->error('回答失败');
        }
    }

    // 收藏问题或文章
    public function collectAct()
    {
        $arcticleid = I('get.id');
        $url = I('get.url');
        $userinfo = cookie('userinfo');

        $collect = D('collect');

        $add = $collect->collectAct($arcticleid);

        if($add){
            $this->redirect('/Home/Index/' . $url . '/act/home');
        }else{
            $this->error('收藏失败');
        }
    }

    /**
     * 二维数组排序
     * @access public
     * @param array $list 查询结果
     * @param string $field 排序的字段名
     * @param string $sortby 排序类型 （asc正向排序 desc逆向排序 nat自然排序）
     * @return array
     */
    public function list_sort_by($list, $field, $sortby = 'asc')
    {
        if (is_array($list))
        {
            $refer = $resultSet = array();
            foreach ($list as $i => $data)
            {
                $refer[$i] = &$data[$field];
            }
            switch ($sortby)
            {
                case 'asc': // 正向排序
                    asort($refer);
                    break;
                case 'desc': // 逆向排序
                    arsort($refer);
                    break;
                case 'nat': // 自然排序
                    natcasesort($refer);
                    break;
            }
            foreach ($refer as $key => $val)
            {
                $resultSet[] = &$list[$key];
            }
            return $resultSet;
        }
        return false;
    }

    // 详情
    public function detail()
    {
        $arcticleid = I('get.id');
        $url = I('get.url');
        $act = 'home';
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
        $this->assign('act' , $act);
        $this->display();
    }
}

?>