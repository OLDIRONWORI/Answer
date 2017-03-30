<?php
    namespace Home\Model;

    use Think\Model;

    class TeacherModel extends Model
    {
        // 查询所有教师信息
        public function getTeacherList(){

            return $this->order('`time` DESC')->select();

        }

        // 验证登录是否成功
        public function verifyLogin($phone , $password)
        {
            $where['phone'] = $phone;
            $where['password'] = md5($password);

            $teainfo = $this->where($where)->find();

            if($teainfo){
                $teainfo['type'] = 'teacher';
                cookie('userinfo' , $teainfo , 24*60*60*7);
                return true;
            }else{
                return false;
            }
        }

        // 入参id获取信息
        public function getTeacherInfo($teacherid)
        {
            $where['id'] = $teacherid;

            return $this->where($where)->field('id,realname,classid,phone,time')->find();
        }

        // 教师添加
        public function addTeacher()
        {
            $post = I('post.');

            // 预留标签剥离，数据校验

            $data['realname'] = $post['realname'];
            $data['classid'] = $post['classid'];
            $data['phone'] = $post['phone'];
            $data['password'] = md5($post['password']);
            $data['time'] = time();

            return $this->data($data)->add();
        }

        // 空闲时间数组
        public function getTime()
        {
            $userinfo = cookie('userinfo');

            $where['id'] = $userinfo['id'];
            $leisuretime = $this->where($where)->field('leisuretime')->find();

            $leisuretime = explode(',' , $leisuretime['leisuretime']);

            return $leisuretime;
        }

        public function getTimeId($id)
        {
            $where['id'] = $id;
            $leisuretime = $this->where($where)->field('leisuretime')->find();

            $leisuretime = explode(',' , $leisuretime['leisuretime']);

            return $leisuretime;
        }

        // 空闲时间设定
        public function getTimeAct()
        {
            $leisuretime = I('post.leisuretime');

            $userinfo = cookie('userinfo');

            $str = '';

            foreach($leisuretime as $key => $val){
                $str .= $val . ',';
            }

            $str = rtrim($str , ',');

            $data['leisuretime'] = $str;
            $where['id'] = $userinfo['id'];
            
            return $this->data($data)->where($where)->save();
        }
    }
?>