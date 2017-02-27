<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 *
 * 此Login控制器 -> 对应View/Login (/index.html)
 */
class LoginController extends Controller {

    public function index(){
    	return $this->display();
    }

    public function check(){
        //在前端login.js已经进行了是否为空的判断；
        //为了安全起见，在服务器端也要进行判断。

        //$_POST用于收集来自 method="post" 的表单form中的值，index.html中。
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(!trim($username)){
            return show(0,'用户名不能为空的');
        }
        if(!trim($password)){
            return show(0,'密码不能为空的');
        }
    }
}