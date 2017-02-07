<?php
namespace Admin\Controller;

/**
 * 创建人:潘朝田
 * 创建时间:2017-2-7 12:03:54
 * 创建功能:MediaController
 */
class MediaController extends BaseController{
    //put your code here
    public function index(){
        $this->display('media/mt_index') ;
    }
}
