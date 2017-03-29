<?php
    namespace Home\Model;

    use Think\Model;

    class KeysModel extends Model
    {
        // 关键字列表
        public function getKeysList()
        {
            return $this->order('`order` desc')->select();
        }

        // 入参id查询关键词
        public function getKeysInfo($keysid)
        {
            $where['id'] = $keysid;

            return $this->where($where)->find();
        }

        // 关键字添加
        public function addKeys()
        {
            $post = I('post.');

            $data['keyname'] = $post['keyname'];
            $data['order'] = $post['order'];

            return $this->data($data)->add();
        }
    }
?>