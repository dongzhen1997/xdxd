<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/10
 * Time: 16:39
 */
namespace app\index\controller;
use think\Controller;
use think\Cookie;
use think\Request;
class Base extends Controller
{
    public  function __construct(Request $request = null)
    {
        parent::__construct($request);
        if(!Cookie::has("user")){
            $this->error("您尚未登录","index/user/login");
        }
    }
}