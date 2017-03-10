<?php
return array(
	//'配置项'=>'配置值'

    //URL地址不区分大小写
    'URL_CASE_INSENSITIVE' =>true,
    'URL_MODEL'=>0,

    //不是随便写个db.php就是配置了，要在这里"加载额外的配置文件"db
    'LOAD_EXT_CONFIG' => 'db',
    'MD5_PRE' => 'sing_cms',
);