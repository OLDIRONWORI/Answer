<?php
    namespace Home\Model;

    use Think\Model;

    class SeriesModel extends Model
    {
        public function getSeriesList(){

            $where['gradeid'] = I("post.gid");

            return $this->where($where)->select();

        }
    }

?>