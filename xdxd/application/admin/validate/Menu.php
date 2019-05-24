<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/23
 * Time: 11:44
 */

namespace app\admin\validate;


use think\Validate;

class Menu extends Validate
{
    //验证规则
    protected $rule = [
        "menuname" => "require|length:2,10|chsDash|token",
    ];
    //错误提示信息
    protected $message = [
        'menuname.require' => '菜单名必填',
        'menuname.length' => '菜单名为2至10位字符',
        'menuname.chsDash' => '菜单名只能是汉字、字母、数字和下划线_及破折号-',
    ];
    //验证场景
    protected $scene = [
        'menuAdd' => ["menuname"],
        "menuEdit" => ["menuname"]
    ];
}