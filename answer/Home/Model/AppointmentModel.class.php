<?php
    namespace Home\Model;

    use Think\Model;

    class appointmentModel extends Model
    {
        // 获取预约列表
        public function getAppointmentList()
        {
            return $this->order('`appointmenttime` DESC')->select();
        }

        // 预约执行
        public function setTimeAct()
        {
            $userinfo = cookie('userinfo');

            $leisuretime = I('post.leisuretime');

            $teacherid = I('post.id');

            $data['studentid'] = $userinfo['id'];
            $data['teacherid'] = $teacherid;
            $data['appointmenttime'] = $leisuretime;

            return $this->data($data)->add();
        }
    }
?>