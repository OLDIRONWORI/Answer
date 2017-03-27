<?php
    namespace Home\Model;

    use Think\Model;

    class CollectModel extends Model
    {
        // 获取当前登录id的收藏列表
        public function getCollectList()
        {
            // 获取用户信息
            $userinfo = cookie('userinfo');

            // 拼接查询条件
            $where['userid'] = $userinfo['id'];
            $where['usertype'] = $userinfo['type'];

            return $this->where($where)->select();
        }
    }
?>