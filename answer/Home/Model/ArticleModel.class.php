<?php
    namespace Home\Model;

    use Think\Model;

    class ArticleModel extends Model
    {
        // 学生提问提交处理
        public function askAct()
        {
            // 接受参数
            $title = I('post.title');
            $content = I('post.content');
            $keys = rtrim(I('post.keys') , ','); // 1,2,3,4,

            // 剥离标签处理(预留)

            // 插入数据库
            $data['title'] = $title;
            $data['content'] = $content;
            $data['keys'] = $keys;

            $this->data($data)->add();
        }
    }
?>