<?php
    namespace Home\Model;

    use Think\Model;

    class SeriesModel extends Model
    {
        public function getSeriesList(){

            return $this->select();

        }

        // 所有系
        public function getAllSeriesList()
        {
            return $this->select();
        }

        // 入参id获取系信息
        public function getSeriesInfo($seriesid)
        {
            $where['id'] = $seriesid;

            return $this->where($where)->find();
        }

        // 添加系
        public function addSeriesAct()
        {
            $post = I('post.');

            $data['seriesname'] = $post['seriesname'];
            return $this->data($data)->add();
        }
    }

?>