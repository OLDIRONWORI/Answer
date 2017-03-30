<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $userinfo = cookie('userinfo');

        // 是否登录
        if (!$userinfo) {
            $this->redirect('Home/Login/login');
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
        $post = I('post.');
dump($post);
        $article = D('article');
        $keys = D('keys');
        if($post['type'] < 3){
            // article
            $articlearr = $article->getTypeList($post['type'] , $post['title']);
        }else{
            // keys
            $keylist = $keys->getIdToName($post['title']);
dump($keylist);
            if($keylist){
                $arr = $article->getAllArticleList();
                $articlearr = array();

                foreach($arr as $key => $val){
                    foreach($keylist as $k => $v){
                        echo strpos($val['keys'] , $v);
                        dump($boo);
                        if($boo){
                            $articlearr = $val;
                        }
                    }
                }
            }else{
                $articlearr = false;
            }

        }

        dump($articlearr);
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

}

?>