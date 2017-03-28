<?php
    namespace Home\Model;

    use Think\Model;

    class KeysModel extends Model
    {
        // 学生提问提交处理
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
    }
?>