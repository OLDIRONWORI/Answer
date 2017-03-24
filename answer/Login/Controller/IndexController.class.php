<?php
namespace Login\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {

        $stu = D("student");

        $stu->test();
    }
}