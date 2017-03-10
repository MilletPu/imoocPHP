<?php
namespace Common\Model;
use Think\Model;


class AdminModel extends Model{

    private $_db = '';
    public function __construct(){
        $this -> _db = M('cms_admin');
        //再通俗一点说：M实例化参数是数据库的表名。
        //D实例化的是你自己在Model文件夹下面建立的模型文件。
    }

    public function getAdminByUsername($username){
        $ret = $this -> _db -> where(' username= "'.$username.'" ')->find();
        return $ret;
    }

}