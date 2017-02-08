<?php
namespace Weixin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        print_r(json_decode(post(C('SITE_URL').'/appapi?mod=1&act=1'),TRUE))  ;  // 调用接口的方法
    }
}