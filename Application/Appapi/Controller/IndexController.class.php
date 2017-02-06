<?php
namespace Appapi\Controller;
use Think\Controller;
class IndexController extends Controller {
     private $_mod = [
        '1' =>  'UserOne' ,
        '2' =>  'UserTwo' ,
    ] ;
    private $_act = [
        'UserOne'   =>  [
            '1' =>  'getList',
            '2' =>  'addUser'
        ],
        'UserTwo'   =>  [
             '1' =>  'getById',
             '2' =>  'deleteUser'
        ]
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