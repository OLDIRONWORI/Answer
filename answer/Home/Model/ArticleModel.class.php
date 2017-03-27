<?php
    namespace Home\Model;

    use Think\Model;

    class ArticleModel extends Model
    {
        // 学生提问提交处理
        public function askAct()
        {
            // 从cookie获取用户登录信息
            $userinfo = cookie('userinfo');

            // 接受参数
            $title = I('post.title');
            $content = I('post.content');
            $keys = I('post.keys'); // 1,2,3,4,
            $keystr = "";
            foreach($keys as $key => $val){
                $keystr .= $val . ',';
            }

            // 去掉最后一个 ,
            $keystr = rtrim($keystr , ',');

            // 剥离标签处理(预留)

            // 插入数据库
            $data['title'] = $title;
            $data['content'] = $content;
            $data['keys'] = $keystr;
            $data['userid'] = $userinfo['id'];
            $data['time'] = time();
            $data['usertype'] = $userinfo['type'];

            return $this->data($data)->add();
        }

        // 传入id获取文章
        public function getArticleDetail($article_id)
        {
            $where['id'] = $article_id;
            $list = $this->where($where)->field('id,title,content,type,time')->find();

            // 格式化时间
            $list['time'] = date('Y-m-d H:i:s' , $list['time']);

            // 格式化类型
            $type = array('问题','已解答的问题','文章');
            $list['type'] = $type[$list['type']];

            return $list;
        }

        // 获取所有该用户问题列表
        public function getUserArticle(){
            // 从cookie获取用户登录信息
            $userinfo = cookie('userinfo');

            $where['userid'] = $userinfo['id'];
            $where['usertype'] = $userinfo['type'];

            return $this->where($where)->select();
        }

        // 分页查询出所有未被回答的问题
        public function getAwaitArticleList()
        {
            $count = $this->where('type=0')->count();  // 查询满足要求的总记录数
            $Page  = new \Think\Page($count,15);       // 实例化分页类 传入总记录数和每页显示的记录数(15)
            $show  = $Page->show();                    // 分页显示输出

            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $this->where('type=0')->order('`time` DESC')->limit($Page->firstRow.','.$Page->listRows)->select();

            $data['list'] = $list;
            $data['show'] = $show;

            return $data;
        }
    }
?>

