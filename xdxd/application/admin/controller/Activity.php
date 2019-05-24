<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/25
 * Time: 18:30
 */
namespace app\admin\controller;
use think\Controller;
use \app\admin\model\Activity as ActivityModel;
use think\Request;
use think\Session;

class Activity extends Controller
{
    /**
     * 抽奖管理
     * @return mixed
     */
    public function turntable (){
        /****************************************************************************/
        //从配置文件获取session信息
        $sessionName = config("sessionName");//session键
        //获取session中的用户  键名
        $user_session = $sessionName["user"];
        //实例化base类
        $base = new Base();
        //验证登录信息
        $base->testSession($user_session,"尚未登录，即将跳转至登录界面","admin/user/login");
        /*******************************************************************************/
        //获取session中的权限   键名
        $role_session = $sessionName["role"];
        //验证权限信息  接收权限数据
        $role_data = $base->testRole($role_session,"你没有权限访问当前页面,即将跳转至首页","admin/index/index");

        //从session中获取用户信息
        $user_data = session($user_session);
        $user = $user_data["uname"];
        $roleName = $user_data["rname"];
        //模板数据
        $t_data = [];
        $t_data["user"] = $user;
        $t_data["roleName"] = $roleName;
        $t_data["role_data"] = $role_data;
        $time = date("Y-m-d");//当前时间
        $t_data["time"] = $time;
        /****************************************************************************/

        //实例化model层
        $model =new ActivityModel();
        $tList = $model->turntable();
        $tUser = $model->getTuser();
        $t_data["tList"] = $tList;
        $t_data["tUser"] = $tUser;
        return $this->fetch("activity/turntable",$t_data);
    }
    /**
     *抽奖编辑
     */
    public function turntableEdit (){
        /****************************************************************************/
        //从配置文件获取session信息
        $sessionName = config("sessionName");//session键
        //获取session中的用户  键名
        $user_session = $sessionName["user"];
        //实例化base类
        $base = new Base();
        //验证登录信息
        $base->testSession($user_session,"尚未登录，即将跳转至登录界面","admin/user/login");
        /*******************************************************************************/
        $resquest = Request::instance();
        //实例化model层
        $model =new ActivityModel();
        //获取数据
        $data = $resquest->post();
        //验证数据传输
        if (empty($data)){
            //获取奖项信息
            $_id = $resquest->get("id",",","strip_tags");
            $id = judgeType($_id,"int");
            $tdetail = $model->getturntable($id);
            return $this->fetch("activity/turntableEdit",["tdetail" => $tdetail]);
        }
        $result = $model->turntableEdit($data);
        if ($result){
            return returnData(0,"编辑成功");
        }else{
            return returnData(1,"失败,请重新操作");
        }
    }

}