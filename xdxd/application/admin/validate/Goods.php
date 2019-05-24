<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/20
 * Time: 11:55
 */

namespace app\admin\validate;


use think\Validate;

class Goods extends Validate
{
    //验证规则
    protected $rule = [
        "c_name" => "require|max:10|chsDash|token",
        "c_status" => "require|length:1|number",
        "c_id" => "require|number",
        "g_name" => "require|token",
        "g_cid" => "require|number",
        "s_price" => "require",
        "g_price" => "require",
        "g_num" => "require|number",
        "g_status" => "require|number",
        "g_score" => "require|number",
        "g_content" => "require",
    ];
    //错误提示信息
    protected $message = [
        'c_name.require' => '分类名必填',
        'c_name.max' => '分类名不能超过10位',
        'c_name.chsDash' => '分类名只能是汉字、字母、数字和下划线_及破折号-',
        'c_status.require' => '分类状态必填',
    ];
    //验证场景
    protected $scene = [
        "classifyAdd" => ["c_name","c_status"],
        "classifyEdit" => ["c_name","c_status","c_id"],
        "goodsAdd" => ["g_name","g_cid","s_price","g_price","g_num","g_status","g_score","g_content"]
    ];
}