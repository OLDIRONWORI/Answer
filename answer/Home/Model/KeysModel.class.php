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

        // 入参id查询排序等级
        public function getOrderNumber($keysid)
        {
            $where['id'] = $keysid;

            $order = $this->where($where)->field('order')->find();
            $order = $order['order'];

            return $order;
        }

        // 入参id增加排序等级
        public function updateOrderNumber($keysid)
        {
            $where['id'] = $keysid;
            $info = $this->where($where)->field('order')->find();
            $save['order'] = $info['order'] + 1;

            return $this->where($where)->save($save);
        }

        // 入参id字符串获取关键字名称
        public function getKeysNameList($idstr)
        {
            $where['id'] = array('IN' , $idstr);

            $infoarr = $this->where($where)->field('keyname')->select();

            $infostr = '';
            foreach($infoarr as $key => $val){

                $infostr .= $val['keyname'] . ',';
            }

            $infostr = rtrim($infostr , ',');

            return $infostr;
        }

        // 入参关键字名搜索id
        public function getIdToName($keyname)
        {
            $where['keyname'] = array('LIKE' , "%{$keyname}%");

            return $this->where($where)->field('id')->select();
        }
    }
?>