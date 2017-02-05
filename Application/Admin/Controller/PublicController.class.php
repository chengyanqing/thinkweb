<?php
namespace Admin\Controller;
/**
 * 创建人:潘朝田
 * 创建时间:2017-2-5 12:05:36
 * 创建功能:登录控制器
 */
class PublicController extends \Think\Controller{
    /**
     * 创建人:潘朝田
     * 创建时间:2017-2-5 12:05:36
     * 创建功能:登录方法
     */
    public function login(){
        $this->display('Public/dl_login');
    }
}
