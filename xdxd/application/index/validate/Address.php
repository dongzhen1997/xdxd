<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/7
 * Time: 12:42
 */

namespace app\index\validate;
use \think\Validate;

class Address extends Validate
{
    //验证规则
    protected $rule = [
        'tel' => 'require|length:11|number|token',
        'code' => 'require|length:4',
    ];
    //错误提示信息
    protected $message = [
        'tel.require' => '手机号必填',
        'tel.length' => '手机号为11位',
        'linkman.require' => '手机验证码必填',
        'postalcode.length' => '邮政编码为4位',
    ];
    //验证场景
    protected $scene = [

    ];
}