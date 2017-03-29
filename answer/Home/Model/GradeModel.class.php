<?php
    namespace Home\Model;

    use Think\Model;

    class GradeModel extends Model
    {
        public function getGradeList(){

            $where['seriesid'] = I("post.gid");

            return $this->where($where)->select();

        }

    }

?>