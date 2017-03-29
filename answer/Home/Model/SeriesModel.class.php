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

        // 添加系
        public function addSeriesAct()
        {
            $post = I('post.');

            $data['seriesname'] = $post['seriesname'];
            return $this->data($data)->add();
        }
    }

?>