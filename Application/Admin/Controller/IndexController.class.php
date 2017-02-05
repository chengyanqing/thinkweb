<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 创建人:潘朝田
 * 创建时间:17-2-5 下午12:03
 * 创建功能:后台管理系统首页控制器
 */
class IndexController extends Controller {
    /**
     * 创建人:潘朝田
     * 创建时间:17-2-5 下午12:03
     * 创建功能:后台管理系统首页控制器
     */
    public function index(){
        $this->redirect('Public/login') ;
    }
}