<?php
namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!cookie('userinfo')) {
            redirect('Login/login');
        }
    }

}

?>