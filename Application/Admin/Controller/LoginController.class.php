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
        if(session('adminUser')){
            //如果已经登录了，直接调到后台首页，不用登录了
            redirect('/admin.php?c=index');
        }
        $this->display();
    }

    public function check(){
        // "/index.php?m=admin&c=login&a=check"
        // 在前端login.js已经进行了是否为空的判断；
        // 为了安全起见，在服务器端也要进行判断。

        // $_POST用于收集来自 method="post"的表单form中的值（index.html中）/ ajax $.post (login.js)来的数据。
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(!trim($username)){
            return show(0,'用户名不能为空！');
        }
        if(!trim($password)){
            return show(0,'密码不能为空！');
        }

        //Admin是Model名
        //D方法用于实例化用户定义的模型类。可以调用验证机制 ，会查询到同名 Model类，自动验证、自动填充、关联查询，D的用处很多
        //M方法用于高效实例化一个基础模型类，就是一个原生态的new Model()
        $ret = D('Admin') -> getAdminByUsername($username);
        if (!$ret)
            return show(0, '该用户不存在！');

        if($ret['password'] != getMd5Password($password))
            return show(0, '密码错误！');

        session('adminUser', $ret);
        return show(1, '登录成功！');
    }

    public function logout(){
        session('adminUser', null);
        redirect('/admin.php?c=login');
    }
}