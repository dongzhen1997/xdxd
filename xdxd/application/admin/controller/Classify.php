<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/17
 * Time: 19:34
 */
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Session;
use \app\admin\model\Goods as GoodsModel;

class Classify extends Controller
{
    /**
     * 商品分类列表
     * @return mixed
     */
    public function classifyList (){
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
        $model =new GoodsModel();
        //获取分类数据
        $clist = $model->classifyList();
        $t_data["c_list"] = $clist;
        //获取数据长度
        $c_count = count($clist);
        $t_data["c_count"] = $c_count;
        return $this->fetch("classify/classifyList",$t_data);
    }
    /**
     * 添加商品分类
     * @return mixed
     */
    public function classifyAdd (){
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
        //获取数据
        $data = $resquest->post();
        //验证数据传输
        if (empty($data)){
            //若为空   渲染界面
            return $this->fetch("classify/classifyAdd");
        }
        //获取验证类  验证场景
        $validate = validate("Goods")->scene("classifyAdd");
        //验证数据
        if (!$validate->check($data)){
            //错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        //实例化model层
        $model = new GoodsModel();
        $result = $model->classifyAdd($data);
        if ($result){
            return returnData(0,"添加成功");
        }else {
            return returnData(1,"添加失败");
        }
    }

    /**
     * 编辑商品分类
     * @return mixed
     */
    public function classifyEdit (){
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
        $model = new GoodsModel();
        //获取数据
        $data = $resquest->post();
        //验证数据传输
        if (empty($data)){
            //若为空   渲染界面
            //验证
            $_id = $resquest->get("id",",","strip_tags");
            $id = judgeType($_id,"int");
            $c_detail = $model->getClassify($id);
            return $this->fetch("classify/classifyEdit",["c_detail" => $c_detail]);
        }
        //获取验证类  验证场景
        $validate = validate("Goods")->scene("classifyEdit");
        //验证数据
        if (!$validate->check($data)){
            //错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        $result = $model->classifyEdit($data);
        if ($result){
            return returnData(0,"添加成功");
        }else {
            return returnData(1,"添加失败");
        }
    }
}