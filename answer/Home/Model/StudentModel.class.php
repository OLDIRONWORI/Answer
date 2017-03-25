<?php
    namespace Home\Model;

    use Think\Model;

    class StudentModel extends Model
    {
        // 查询所有学生信息
        public function getStudentList(){

            return $this->select();

        }

        // 验证登录是否成功
        public function verifyLogin($phone , $password)
        {
            $where['phone'] = $phone;
            $where['password'] = md5($password);

            $stuinfo = $this->where($where)->find();

            if($stuinfo){
                $stuinfo['type'] = 'student';
                session('userinfo' , $stuinfo , 24*60*60*7);
                return true;
            }else{
                return false;
            }
        }
    }
?>