<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/26
 * Time: 13:51
 */
namespace app\admin\controller;
use think\Controller;
use think\Session;
class Base extends Controller
{
    /**
     * 验证session信息  若没有登陆  拒绝访问
     * @param $session   session需要验证的用户键名
     * @param $msg      需要提示的信息
     * @param $url      需要跳转的网址
     */
    public function testSession ($session,$msg, $url){
        //判断是否存在session  若不存在则跳转到登录界面
        if (!(Session::has($session,"think"))){
            $this->error($msg,$url);//显示失败界面
        }
    }
    /**
     * 验证权限信息 获取权限  若没有只允许访问指定界面
     * @param $session      session中需要验证的权限键名
     * @param $msg          需要提示的信息
     * @param $url          需要跳转的网址
     * @return array        返回的权限列表
     */
    public function testRole ($session, $msg, $url){
        //判断是否存在权限session  不存在则只可以访问首页
        if ((Session::has($session,"think"))){
            //从session中获取权限信息
            $role_arr = session($session);
            $fData = [];
            $sData = [];
            $tData = [];
            for ($i=0;$i<count($role_arr);$i++){
                if ($role_arr[$i]["status"] == 1){
                    array_push($fData,$role_arr[$i]);
                }else if ($role_arr[$i]["status"] == 2){
                    array_push($sData,$role_arr[$i]);
                }else if ($role_arr[$i]["status"] == 3){
                    array_push($tData,$role_arr[$i]);
                }
            }
            $role_data = [
                "fData" => $fData,
                "sData" => $sData,
                "tData" => $tData
            ];
            return $role_data;
        }
        return $this->error($msg,$url);//显示失败界面
    }
}