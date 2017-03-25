<?php
    namespace Home\Model;

    use Think\Model;

    class AdminModel extends Model
    {
        // 查询所有管理员信息
        public function getAdminList(){

            return $this->select();

        }

        // 验证登录是否成功
        public function verifyLogin($username , $password)
        {
            $where['username'] = $username;
            $where['password'] = md5($password);

            $teainfo = $this->where($where)->find();

            if($teainfo){
                $teainfo['type'] = 'admin';
                cookie('userinfo' , $teainfo , 24*60*60*7);
                return true;
            }else{
                return false;
            }
        }
    }
?>