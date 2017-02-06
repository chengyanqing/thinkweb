<?php
return array(
    'URL_MODEL'=>2,  // 隐藏index.php文件
    'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    // 配置系统静态资源
    "SITE_URL"=>"http://" . $_SERVER["HTTP_HOST"],  // 配置当前域名
    
    // 配置静态资源管理
    'TMPL_PARSE_STRING' => [
        // 后台管理
        'ADMIN_CSS_URL' => __ROOT__ . '/Public/Admin/css' ,
        'ADMIN_JS_URL' => __ROOT__ . '/Public/Admin/js' ,
        'ADMIN_IMG_URL' => __ROOT__ . '/Public/Admin/image' ,
    ] ,
    
    // 配置数据库连接信息
    'DB_TYPE' => 'mysql' ,
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'webdemo', // 数据库名
    'DB_USER' => 'webdemo', // 用户名
    'DB_PWD' => 'webdemo', // 密码
    'DB_PORT' => '3306', // 端口
    'DB_PREFIX' => '', // 数据库表前缀
    'DB_PARAMS' => [], // 数据库连接参数    
    'DB_DEBUG' => false, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE' => false, // 启用字段缓存
    'DB_CHARSET' => 'utf8', // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE' => 0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE' => false, // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM' => 1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO' => '', // 指定从服务器序号
);