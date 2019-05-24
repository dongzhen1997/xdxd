<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/2/2
 * Time: 17:35
 */
namespace app\index\validate;
use \think\Validate;
class User extends Validate
{
    //验证规则
    protected $rule = [
        'user'  =>  'require|length:2,10|chsAlphaNum|token',
        'pwd' =>  'require|length:3,6|alphaDash',
        'repwd' =>  'require|length:3,6|alphaDash|confirm:pwd',
        'email' => 'require|email',
        'tel' => 'require|length:11|number|token',
        'code' => 'require|length:4',
    ];
    //错误提示信息
    protected $message = [
        'user.require' => '用户名必填',
        'user.length' => '用户名为2至10位字符',
        'user.chsAlphaNum' => '用户名只能是汉字、字母和数字',
        'pwd.require'     => '用户密码必填',
        'pwd.length' => '用户密码为3至6位字符',
        'pwd.alphaDash' => '用户密码只能是字母和数字，下划线_及破折号-',
        'repwd.require'     => '重复密码必填',
        'repwd.length' => '重复密码为3至6位字符',
        'repwd.alphaDash' => '用户密码只能是字母和数字，下划线_及破折号-',
        'repwd.confirm' => '密码必须一致',
        'email.require' => '邮箱必填',
        'email.email' => '邮箱格式不正确',
        'tel.require' => '手机号必填',
        'tel.length' => '手机号为11位',
        'code.require' => '手机验证码必填',
        'code.length' => '手机验证码为4位',
        'code.confirm' => '验证码不符',
    ];
    //验证场景
    protected $scene = [
        'login' => ["user","pwd"],
        "forget" => ["user","email"],
        "resetpwd" => ["pwd","repwd"],
        "phonelogin" => ["tel","code"],
        "regist"=>["user","repwd","pwd","email"],
        "sendmsg"=>["tel"]
    ];
}