<?php
namespace Admin\Controller;
/**
 * 创建人:潘朝田
 * 创建时间:2017-2-7 12:19:57
 * 创建功能:PersonController
 */
class PersonController extends BaseController{
    //put your code here
    public function info(){
        $this->display('Main/Person/info') ;
    }
}
