<?php
    namespace Home\Model;

    use Think\Model;

    class StudentModel extends Model
    {
        public function getStudentList(){

            return $this->select();

        }
    }

?>