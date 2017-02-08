<?php
namespace Appapi\Controller;
use Think\Controller;
class IndexController extends Controller {
     private $_mod = [
        '1' =>  'MenuApi' ,
        '2' =>  'AdminApi' ,
    ] ;
    private $_act = [
        'MenuApi'   =>  [
            '1' =>  'getOneList',  // 获取一级菜单接口
            '2' =>  'getCurrentList', // 获取当前菜单接口
        ],
        'AdminApi'  =>  [
            '1' =>  'login',  // 后台登录接口
            '2' =>  'logout', // 后台退出接口
            '3' =>  'insertAdmin', // 新增管理员的接口
            '4' =>  'getAdminById', // 根据编号查询管理员接口
            '5' =>  'deleteAdmin', // 删除管理员接口
            '6' =>  'updateAdmin', // 更新管理员接口
        ],
    ] ;
    
    public function index($mod, $act){
        $class = "\\Appapi\\Logic\\{$this->_mod[$mod]}" . 'Controller';
        $action = $this->_act[$this->_mod[$mod]][$act];
		$Class = new $class();
		if (false === method_exists($Class, $action))
		{
			$this->ajaxReturn(['status' => 0, 'info' => 'error: not found !']);
		} else
		{
			$response = $Class->$action($mod, $act);
			$this->ajaxReturn($response);
		}
    }
}