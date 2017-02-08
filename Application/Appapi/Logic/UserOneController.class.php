<?php
namespace Appapi\Logic;
/**
 * 创建人:潘朝田
 * 创建时间:2017-2-6 15:41:30
 * 创建功能:UserOneController
 */
class UserOneController extends \Appapi\Pub\Response{
    /**
     * mod=1&act=1
     * @return type
     */
    public function getList(){
        if(IS_POST){
            $menuModel = new \Common\Model\MenuModel() ;  // 自定义模型测试接口
            return $this->success($menuModel->select(1),['message'=>'ok']) ;
        }
    }
    
    /**
     * mod=1&act=2
     * @return type
     */
    public function addUser(){
        $menuModel = new \Common\Model\MenuModel() ;  // 自定义模型测试接口
        return $this->success($menuModel->find(2),['message'=>'ok']) ;
    }
}
