<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/23
 * Time: 17:54
 */

namespace app\admin\validate;


use think\Validate;

class Admin extends Validate
{
    //验证规则
    protected $rule = [
        "adminName" => "require|length:2,10|chsDash",
        "trueName" => "require|length:2,10|chsAlphaNum",
        'password' =>  'require|length:3,6|alphaDash|token',
        'repassword' =>  'require|length:3,6|alphaDash|confirm:password',
        'sex|性别' => 'require|number|max:1',
        'phone' => 'require|length:11|number',
        'idcard' => 'require|length:18|alphaNum',
        'email' => 'require|email',
        'adminRole|角色' => 'require|number',
        "aId" => 'require|number|token',
        "aid" => 'require|number',
        "roleName" => "require|length:2,10|chsDash|token",
        "r_describe" => "max:20|chsDash",
        "rId" => 'require|number',
    ];
    //错误提示信息
    protected $message = [
        'adminName.require' => '用户名必填',
        'adminName.length' => '用户名为2至10位字符',
        'adminName.chsDash' => '用户名只能是汉字、字母、数字和下划线_及破折号-',
        'password.require'     => '初始密码必填',
        'password.length' => '初始密码为3至6位字符',
        'password.alphaDash' => '初始密码只能是字母和数字，下划线_及破折号-',
        'repassword.require'     => '确认密码必填',
        'repassword.length' => '确认密码为3至6位字符',
        'repassword.alphaDash' => '确认密码只能是字母和数字，下划线_及破折号-',
        'repassword.confirm' => '密码必须一致',
        'truename.require' => '真实姓名必填',
        'truename.length' => '真实姓名为2至10位字符',
        'truename.chsAlphaNum' => '真实姓名只能是汉字',
        'idcard.require' => '身份证号必填',
        'idcard.length' => '请填写18位身份证号',
        'idcard.alphaNum' => '身份证号格式不正确',
        'phone.require' => '手机号必填',
        'phone.length' => '手机号为11位',
        'phone.number' => '手机号格式不正确',
        'email.require' => '邮箱必填',
        'email.email' => '邮箱格式不正确',
        'roleName.require' => '角色名称必填',
        'roleName.length' => '角色名称为2至10位字符',
        'roleName.chsDash' => '角色名称只能是汉字、字母、数字和下划线_及破折号-',
        'r_describe.chsDash' => '角色描述只能是汉字、字母、数字和下划线_及破折号-',
    ];
    //验证场景
    protected $scene = [
        "adminAdd" => ["adminName","trueName","password","repassword","sex","phone","idcard","email","adminRole"],
        "adminEdit" => ["aId","adminName","trueName","sex","phone","idcard","email","adminRole"],
        "adminPwd" => ["aid","password","repassword"],
        "adminRoleAdd" => ["roleName","r_describe"],
        "adminRoleEdit" => ["roleName","r_describe","rId"],
    ];
}