<?php
namespace Home\Model;

use Think\Model;

class ClassModel extends Model
{
    // 获取年级下的班级
    public function getClassList(){

        $where['grade'] = I("post.gid");

        return $this->where($where)->select();

    }

    // 获取所有班级列表
    public function getAllClassList()
    {
        return $this->select();
    }

    // 入参id查询班级信息
    public function getClassInfo($classid)
    {
        $where['id'] = $classid;

        return $this->where($where)->find();
    }

    // 添加班级
    public function addClassAct()
    {
        $post = I('post.');

        $data['gradeid'] = $post['gradeid'];
        $data['classname'] = $post['classname'];

        return $this->data($data)->add();
    }
}

?>