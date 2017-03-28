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
    }
?>