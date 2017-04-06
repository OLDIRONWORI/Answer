<?php
    namespace Home\Model;

    use Think\Model;

    class ReplyModel extends Model
    {
        // 查询当前用户回答的所有问题
        public function getReplyUserReplyList()
        {
            // 从cookie获取用户登录信息
            $userinfo = cookie('userinfo');

            $where['userid'] = $userinfo['id'];

            return $this->where($where)->select();
        }

        // 回复
        public function askedsAct()
        {
            $post = I('post.');
            
            // 从cookie获取用户登录信息
            $userinfo = cookie('userinfo');

            $data['contents'] = $post['contents'];
            $data['articleid'] = $post['articleid'];
            $data['time'] = time();
            $data['userid'] = $userinfo['id'];

            return $this->data($data)->add();
        }

        // 传入文章id获取所有回复
        public function getArticleReply($articleid)
        {
            $where['articleid'] = $articleid;
            return $this->where($where)->order('`time` DESC')->select();
        }
    }
?>