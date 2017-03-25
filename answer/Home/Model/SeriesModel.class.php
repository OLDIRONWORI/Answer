<?php
    namespace Home\Model;

    use Think\Model;

    class SeriesModel extends Model
    {
        public function getSeriesList(){

            return $this->select();

        }
    }

?>