<?php
namespace Admin\Controller;
/**
 * 创建人:潘朝田
 * 创建时间:2017-2-6 14:16:16
 * 创建功能:系统管理
 */
class SystemController extends BaseController{
    public function index(){
        $this->display('System/xt_index') ;
    }
}
