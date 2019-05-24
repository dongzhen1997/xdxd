<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/17
 * Time: 9:35
 */

namespace app\admin\validate;


use think\Validate;

class Member extends Validate
{
    //验证规则
    protected $rule = [
        'username'  =>  'require|length:2,6|chsAlphaNum|token',
        'truename'  =>  'require|length:2,6|chs',
        'mid' =>  'require|number',
        'IDcard' => 'require|length:18|alphaNum',
        'sex|性别' => 'number|max:1',
        'mobile' => 'require|length:11|number',
        'email' => 'require|email',
        'wechat' => 'max:20|chsDash',
        'beizhu|备注' => 'max:30',
        'pwd' =>  'require|length:3,6|alphaDash|token',
        'repwd' =>  'require|length:3,6|alphaDash|confirm:pwd',
    ];
    //错误提示信息
    protected $message = [
        'username.require' => '用户名必填',
        'username.length' => '用户名为2至6位字符',
        'username.chsAlphaNum' => '用户名只能是汉字、字母和数字',
        'truename.require' => '真实姓名必填',
        'truename.length' => '真实姓名为2至6位字符',
        'truename.chsAlphaNum' => '真实姓名只能是汉字',
        'IDcard.require' => '身份证号必填',
        'IDcard.length' => '请填写18位身份证号',
        'IDcard.alphaNum' => '身份证号格式不正确',
        'mobile.require' => '手机号必填',
        'mobile.length' => '手机号为11位',
        'mobile.number' => '手机号格式不正确',
        'email.require' => '邮箱必填',
        'email.email' => '邮箱格式不正确',
        'wechat.max' => '微信号不能超过20位',
        'wechat.chsDash' => '微信号只能是汉字、字母、数字和下划线_及破折号-',
        'pwd.require'     => '用户密码必填',
        'pwd.length' => '用户密码为3至6位字符',
        'pwd.alphaDash' => '用户密码只能是字母和数字，下划线_及破折号-',
        'repwd.require'     => '重复密码必填',
        'repwd.length' => '重复密码为3至6位字符',
        'repwd.alphaDash' => '用户密码只能是字母和数字，下划线_及破折号-',
        'repwd.confirm' => '密码必须一致',
    ];
    //验证场景
    protected $scene = [
        'edit' => ["username","truename","mid","IDcard","sex","mobile","email","wechat","beizhu"],
        'updatePwd' => ["pwd","repwd","mid"],
    ];
}