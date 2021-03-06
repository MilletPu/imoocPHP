<?php

/**
 * 公用的方法
 */

function show($status, $message, $data=array()){
    $result = array(
        'status' => $status,
        'message' => $message,
        'data' => $data,
    );

    exit(json_encode($result));
}

function getMd5Password($password){
    return md5($password . C('MD5_PRE'));
}

function getMenuType($type){
    return  $type == 1 ? '后台菜单': '前端导航';

}

function getMenuStatus($status){
    if ($status == 0){
        $sta = '关闭';
    }elseif ($status == 1){
        $sta = '正常';
    }elseif ($status == -1){
        $sta = '删除';
    }
    return $sta;
}