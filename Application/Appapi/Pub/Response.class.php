<?php

namespace Appapi\Pub;

/**
 * 响应模板类
 *
 * @author Nick
 * @date 2015-12-4
 */
class Response extends \Think\Controller{

    //返回参数模板
    protected $response = [
        'status' => 0,
        'info' => '',
        'data' => []
    ];

    /**
     * setter
     * @author Nick
     * @param type $name
     * @param type $value
     */
    public function __set($name, $value) {
        $this->response[$name] = $value;
    }

    /**
     * getter
     * @author Nick
     * @param type $name
     * @return type
     */
    public function __get($name) {
        return $this->response[$name];
    }

    /**
     * 组装返回参数
     * @author Nick
     * @param type $status 状态码
     * @param type $info 提示信息
     * @param type $data 返回数据
     * @param array $param 其他自定义数据,如:['count'=>654]
     * @return type
     */
    public function response($status, $info, $data, $param = []) {
        null !== $status && $this->status = $status;
        null !== $info && $this->info = $info;
        null !== $data && $this->data = (array) $data;
        is_array($param) && $this->response = array_merge($this->response, $param);
        return $this->response;
    }

    /**
     * 快捷成功参数返回
     * @author Nick 
     * @param type $data 返回的数据
     * @param array $param 其他自定义数据,如:['count'=>654]
     * @return type
     */
    public function success($data, $param = []) {
        $this->status = 1;
        $this->info = 'success';
        null !== $data && $this->data = (array) $data;
        is_array($param) && $this->response = array_merge($this->response, $param);
        return $this->response;
    }

    /**
     * 快捷错误参数返回
     * @author Nick 
     * @param type $error 返回提示的错误信息
     * @return type
     */
    public function error($error) {
        $this->status = 0;
        null !== $error ? $this->info = $error : 'error';
        return $this->response;
    }
    
     /**
     * 快捷错误参数返回
     * @author Nick 
     * @param type $error 返回提示的错误信息
     * @return type
     */
    public function error_ex($error,$param = []) {
        $this->status = 0;
        null !== $error ? $this->info = $error : 'error';
        null !== $param && $this->data = (array) $param;
        return $this->response;
    }

    /**
     * 上传文件至文件服务器
     * @author Echo
     * @date 2016-11-15
     * @params $savePath  文件保存路径
     * @params $data      数据
     */
    public function sendFile($savePath='',$data){
        if(!$savePath)
            return false;
        //设置文件保存路径
        $path = "/uploads/{$savePath}/".date('Y/m/d').'/'.uniqid().'.txt';
        mkdir(TEMP_PATH . pathinfo($path, PATHINFO_DIRNAME), 0777, true);
        file_put_contents(TEMP_PATH.$path,$data);
        $local = TEMP_PATH . $path;
        $file = realpath($local);
        if (file_exists($file)) {
            $fields['file'] = '@' . $file;
            $fields['path'] = $path;
        }
        //服务器地址
        $url = 'http://' . C('IMG_DOMAIN') . '/image/uploads';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $resJson = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($resJson);
        if ($result->status == 0) {
            E($result->info);
        } else {
            unlink($local); //删除本地缓存
            return $path;
        }
    }


    /*
    * @author Echo
    * @date 2016-12-26
    * 获取当前登录用户owner_id
    */
    public function get_owner_id($userid){
        $User = D('Common/User')->where(['id'=>intval($userid)])->field('id,user_role_id,recommend_id')->find();
        $role_id  = [2,3]; // 厂商、经销商角色
        if(in_array($User['user_role_id'],$role_id)){
            return intval($User['id']);
        }else{
            return intval($User['recommend_id']);
        }
    }

    /**
     * @author Echo
     * @date 2017-1-16
     */
    public function getFactoryId($userid){
        $User = D('Common/User')->where(['id'=>intval($userid)])->field('id,user_role_id,recommend_id')->find();
        $role_id  = [6,7,8]; //经销商子账号
        if($User['user_role_id'] == 3){
            //厂商
            return intval($User['id']);
        }elseif ($User['user_role_id'] == 2){
            //经销商
            return intval($User['recommend_id']);
        }elseif(in_array($User['user_role_id'], $role_id)){
            //经销商子账号
            $res = D('Common/User')->where(['id'=>intval($User['recommend_id'])])->field('id,user_role_id,recommend_id')->find();
            return intval($res['recommend_id']); // 返回厂商的id
        }
    }



}
