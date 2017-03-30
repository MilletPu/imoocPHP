<?php

namespace Admin\Controller;
use Think\Controller;

class MenuController extends Controller {

    public function add(){
        if($_POST){
            if(!isset($_POST['name']) || !$_POST['name']){ //用于收集来自method="post"的表单中的值(add.html，函数同名模板)
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
                                //如果没有这一句，common.js中的 window.location.href = /admin.php?c=menu&a=add; 就打不开
        }
    }

    public function index(){
        /**
         * 分页操作逻辑
         */

        //获取html数据
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1; //没有接收到，就第一页
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 3; //没有接收到，就默认三行

        //获取Menu表数据
        $data = array();
        $menus = D("Menu")->getMenus($data,$page,$pageSize);
        $menusCount = D("Menu")->getMenusCount($data);

        $res = new \Think\Page($menusCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('menus', $menus); //'menus'写在index.html的volist
        $this->display();

    }
}
