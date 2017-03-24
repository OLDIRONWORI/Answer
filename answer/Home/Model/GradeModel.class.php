<?php
    namespace Home\Model;

    use Think\Model;

    class ClassModel extends Model
    {
        public function getClassList(){

            return $this->select();

        }
    }

?>