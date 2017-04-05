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

        // 收藏
        public function collectAct($articleid)
        {
            $userinfo = cookie('userinfo');
            
            $data['userid'] = $userinfo['id'];
            $data['articleid'] = $articleid;
            $data['usertype'] = $userinfo['type'];
            $data['time'] = time();

            return $add = $this->data($data)->add();
        }

        // 取消收藏
        public function cancel()
        {
            $id = I('get.id');

            $where['id'] = $id;

            return $this->where($where)->delete();
        }
    }


?>