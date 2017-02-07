<?php
namespace Admin\Controller;
/**
 * 创建人:潘朝田
 * 创建时间:2017-2-7 12:06:11
 * 创建功能:ApplicationController
 */
class ApplicationController extends BaseController{
    //put your code here
    public function index(){
        $this->display('Application/yd_index') ;
    }
}
