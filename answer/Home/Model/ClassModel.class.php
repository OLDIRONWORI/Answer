<?php
namespace Home\Model;

use Think\Model;

class GradeModel extends Model
{
    public function getGradetList(){

        $where['seriesid'] = I("post.sid");

        return $this->where($where)->select();

    }
}

?>