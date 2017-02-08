<?php
namespace Admin\Controller;
/**
 * 创建人:潘朝田
 * 创建时间:2017-2-6 9:48:07
 * 创建功能:基础控制器的编写
 */
class BaseController extends \Think\Controller{
    public function _initialize(){
        // 获取一级菜单
        $menu_1 = json_decode(post(C('SITE_URL').'/appapi?mod=1&act=1'),TRUE) ;
        $this->assign('menu_1',$menu_1['data']) ;
        // 获取其他菜单
        $menu = json_decode(post(C('SITE_URL').'/appapi?mod=1&act=2',['controller'=>CONTROLLER_NAME]),TRUE);
        $this->assign('menu',$menu['data']) ;
    }
}
