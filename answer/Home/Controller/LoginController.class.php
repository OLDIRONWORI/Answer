<?php
namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
    // 跳转到注册选择界面
    public function selectRegister()
    {
        $this->display();
    }

    // 跳转到注册界面
    public function register()
    {
        // 查询出所有班级列表
        $class = D('class');
        $class_list = $class->getAllClassList();

        $this->assign('class_list', $class_list);
        $this->display();
    }

    // 注册处理，插入数据库
    public function registerAct()
    {
        $method = I('post.type');

        if($method == 'student'){
            // 学生注册
            $stusent = D('student');
            $add = $stusent->addStudent();
        }else if($method == 'teacher'){
            // 教师注册
            $teacher = D('teacher');
            $add = $teacher->addTeacher();
        }

        if($add){
            $this->success('注册成功，请登录' , 'login');
        }else{
            $this->error('注册失败');
        }

    }

    // 登录页面
    public function login()
    {
        $this->display();
    }

    // 登录处理
    public function loginAct()
    {
        // 获取用户输入的登录信息
        $post = I("post.");

        // 实例化student
        $stu = D('student');
        // 验证学生登录凭证
        $stulogin = $stu->verifyLogin($post['code'], $post['password']);

        // 实例化teacher
        $tea = D('teacher');
        // 验证学生登录凭证
        $tealogin = $tea->verifyLogin($post['code'], $post['password']);

        // 实例化admin
        $tea = D('admin');
        // 验证管理员登录凭证
        $admlogin = $tea->verifyLogin($post['code'], $post['password']);

        // 成功与否的重定向
        if($stulogin){
            //学生跳转
            $this->redirect('Home/Index/index');
        }else if($tealogin){
            $this->redirect('Home/Index/index');
        }else if($admlogin){
            $this->redirect('Home/Index/index');
        }else{
            $this->error('登录失败,请检查输入');
        }
    }

    // 退出登录
    public function loginOut()
    {
        cookie('userinfo', null);

        $this->redirect('login');
    }
}

?>