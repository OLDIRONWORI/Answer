<?php
namespace Home\Model;

use Think\Model;

class GradeModel extends Model
{
    public function getGradetList(){

        return $this->select();

    }
}

?>