<?php
namespace Common\Model ;
/**
 * 创建人:潘朝田
 * 创建时间:2017-2-6 13:15:29
 * 创建功能:菜单表模型
 */
class MenuModel extends \Think\Model{
    protected $tablePrefix = 'admin_' ;
    protected $tableName = 'menu' ;
    // 字段信息
    protected $fields = [];
    // 自动验证定义
    protected $_validate = [];
    // 自动完成定义
    protected $_auto = [
        ['create_time', 'time', self::MODEL_INSERT, 'function'],
        ['update_time', 'time', self::MODEL_BOTH, 'function']
    ];
    // 字段映射定义
    protected $_map = [];
    // 命名范围定义
    protected $_scope = [];

    public function __construct($name = '', $tablePrefix = '', $connection = '') {
        parent::__construct($name, $tablePrefix, $connection);
    }
}
