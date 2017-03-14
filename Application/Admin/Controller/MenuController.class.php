<?php

namespace Admin\Controller;
use Think\Controller;

class MenuController extends Controller {

    public function add(){
        if($_POST){
            if(!isset($_POST['name']) || !$_POST['name']){
                return show(0, '菜单名不能为空'); //return给common.js中的result
            }
            if(!isset($_POST['m']) || !$_POST['m']){
                return show(0, '模块名不能为空');
            }
            if(!isset($_POST['c']) || !$_POST['c']){
                return show(0, '控制器不能为空');
            }
            if(!isset($_POST['f']) || !$_POST['f']){
                return show(0, '方法名不能为空');
            }

            $menuId = D('Menu')->insert($_POST);
            if ($menuId){
                return show(1,'新增成功',$menuId);
            }

            return show(0,'新增失败',$menuId);


        }else {
            $this->display();   //自动去找同名的add.html网页。
                                //没有参数，模板名称与当前操作方法名称一致。

        }
    }

    public function index(){
        $this->display();

    }
}
