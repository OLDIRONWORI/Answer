<?php
namespace Home\Model;

use Think\Model;

class ClassModel extends Model
{
    public function getClassList(){

        $where['seriesid'] = I("post.sid");

        return $this->where($where)->select();

    }

    // 入参id查询班级信息
    public function getClassInfo($classid)
    {
        $where['id'] = $classid;

        return $this->where($where)->find();
    }
}

?>