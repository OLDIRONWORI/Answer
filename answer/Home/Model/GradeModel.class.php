<?php
    namespace Home\Model;

    use Think\Model;

    class ClassModel extends Model
    {
        public function getClassList(){

            $where['seriesid'] = I("post.gid");

            return $this->where($where)->select();

        }
    }

?>