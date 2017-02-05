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
);