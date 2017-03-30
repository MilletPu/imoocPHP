<?php

namespace Common\Model;
use Think\Model;

class MenuModel extends Model{
    private $_db = '';
    public function __construct(){
        //数据库表名'cms_menu'
        $this->_db = M('cms_menu');
    }

    public function insert($data = array()){
        //校验
        if (!$data || !is_array($data)){
            return 0;
        }
        return $this->_db->add($data);
    }


    //到cms_menu表中查询第page页上的多行内容。
    public function getMenus($data, $page, $pageSize=10){
        $data['status'] = array('neq',-1); //staus=-1的不取（删除的数据）
        $offset = ($page-1) * $pageSize;   //$offset 每页第一行的行号
        $list = $this->_db->where($data)->order('menu_id desc')->limit($offset,$pageSize)->select();
        return $list;
    }

    //获得cms_menu表中符合条件的总行数。
    public function getMenusCount($data = array()){
        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->count();
    }
}