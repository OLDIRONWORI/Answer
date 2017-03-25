<?php
    namespace Home\Controller;

    use Think\Controller;

    class LoginController extends Controller
    {
        // 母版路由
        public function header()
        {
            $this->display();
        }

        public function nav()
        {
            $this->display();
        }
    }

?>