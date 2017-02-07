<?php
namespace Admin\Controller;
/**
 * 创建人:潘朝田
 * 创建时间:2017-2-7 12:09:20
 * 创建功能:WebsiteController
 */
class WebsiteController extends BaseController{
    //put your code here
    public function index(){
        $this->display('Website/wz_index') ;
    }
}
