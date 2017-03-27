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

    }
?>