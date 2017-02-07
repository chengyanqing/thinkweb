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
        $menuModel = new \Common\Model\MenuModel() ; // 创建菜单模型
        $menu_1 = $menuModel->field('name,url,icon,sort')->where(['level'=>1])->select(); // 获取查询一级菜单
        $this->assign('menu_1',$menu_1) ;
        $currentMenuId = $menuModel->where(['controller'=>CONTROLLER_NAME])->getField('id'); // 查询当前点击菜单的id
        // 点击菜单的分类[一级菜单、二级菜单、三级菜单]
        $menu = $menuModel->field('id,name,url,icon,sort')->where(['pid'=>$currentMenuId])->select();
        for($i=0;$i<count($menu);$i++){
            $menu[$i]['children'] = $menuModel->field('name,url,icon,sort')->where(['pid'=>$menu[$i]['id']])->select();
        }
        $this->assign('menu',$menu) ;
    }
}
