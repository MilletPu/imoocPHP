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
}