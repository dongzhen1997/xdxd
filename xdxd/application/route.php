<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    /******************  client  *************************/




    /******************   server  *************************/
    "admin/index" => "admin/index/index",
    "admin/login" => "admin/user/login",
    "admin/login_tel" => "admin/user/login_tel",
    "admin/forget" => "admin/user/forget",
    "admin/getback/:uid/:user" => ["admin/user/getback",['uid'=>'\d+']],
    "mlist" => "admin/member/memberlist",
    "clist" => "admin/goods/classifyList",
    "glist" => "admin/goods/goodsList",
    "olist" => "admin/order/orderList",
];
