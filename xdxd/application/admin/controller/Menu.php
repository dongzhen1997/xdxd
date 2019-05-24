<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/22
 * Time: 11:15
 */

namespace app\admin\controller;

use \app\admin\model\Menu as MenuModel;
use think\Controller;
use think\Request;
use think\Session;

class Menu extends Controller
{
    /**
     * 菜单列表
     * @return mixed
     */
    public function menuList (){
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
        $model = new MenuModel();
        $menul = $model->menuList();
        $t_data["menul"] = $menul;
        //获取数据长度
        $m_count = count($menul);
        $t_data["m_count"] = $m_count;
        return $this->fetch("menu/menuList",$t_data);
    }

    /**
     * 添加菜单
     * @return mixed
     */
    public function menuAdd (){
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
        $model =new MenuModel();
        //获取数据
        $data = $resquest->post();
        //验证数据传输
        if (empty($data)){
            //若为空   渲染界面
            //获取菜单数据
            $menul = $model->menuList();
            //数组转为json串
            $str = json_encode($menul,true);
            return $this->fetch("menu/menuAdd",["menul" => $str]);
        }
        //获取验证类  验证场景
        $validate = validate("Menu")->scene("menuAdd");
        //验证数据
        if (!$validate->check($data)){
            //错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        //实例化model层
        $model = new MenuModel();
        $result = $model->menuAdd($data);
        if ($result){
            return returnData(0,"添加成功");
        }else {
            return returnData(1,"添加失败");
        }
    }

    /**
     * 编辑菜单
     * @return mixed
     */
    public function menuEdit (){
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
        $model =new MenuModel();
        //获取数据
        $data = $resquest->post();
        //验证数据传输
        if (empty($data)){
            //若为空   渲染界面
            //验证
            $_id = $resquest->get("mid",",","strip_tags");
            $id = judgeType($_id,"int");
            //获取指定菜单数据
            $mDetail = $model->menuShow($id);
            //获取所有菜单数据
            $menul = $model->menuList();
            //数组转为json串
            $str = json_encode($menul,true);
            return $this->fetch("menu/menuEdit",["menul" => $str,"mDetail" => $mDetail]);
        }
        //获取验证类  验证场景
        $validate = validate("Menu")->scene("menuEdit");
        //验证数据
        if (!$validate->check($data)){
            //错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        //实例化model层
        $model = new MenuModel();
        $result = $model->menuEdit($data);
        if ($result){
            return returnData(0,"编辑成功");
        }else {
            return returnData(1,"编辑失败");
        }
    }

    /**
     * 删除菜单
     * @return string
     */
    public function menuDel (){
        $resquest = Request::instance();
        //接收用户id
        $_id = $resquest->post("id",",","strip_tags");
        $id = judgeType($_id,"int");//验证类型
        //        实例化model层
        $model = new MenuModel();
        $result = $model->menuDel($id);
        if ($result){
            return "删除成功";
        }else{
            return "删除失败";
        }
    }
    /**
     * 系统日志
     * @return mixed
     */
    public function systemLog (){
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
        $model = new MenuModel();

        return $this->fetch("menu/systemLog",$t_data);
    }

    /**
     * 敏感词汇
     * @return mixed
     */
    public function systemShielding (){
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
        $model = new MenuModel();

        return $this->fetch("menu/systemShielding",$t_data);
    }
}