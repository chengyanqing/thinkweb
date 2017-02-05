<?php
namespace Admin\Controller;
/**
 * 创建人:潘朝田
 * 创建时间:2017-2-5 15:07:54
 * 创建功能:登录成功之后的首页
 */
class MainController extends \Think\Controller{
    /**
     * 创建人:潘朝田
     * 创建时间:2017-2-5 15:07:54
     * 创建功能:登录成功之后的首页
     */
    public function index(){
        $this->display('Main/sy_index') ;
    }
}
