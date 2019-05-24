<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/1/22
 * Time: 11:23
 */
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Session;
use \app\admin\model\User as UserModel;
class User extends Controller
{
    /**
     * @return mixed|string
     * 密码登录
     */
    public function login (){
        //从配置文件获取session信息
        $sessionName = config("sessionName");//session键
        //判断是否存在session  若存在则跳转到系统主页
        if (Session::has($sessionName["user"])){
            //获取session
            session($sessionName["user"]);
            $this->success("已登录，即将跳转至首页","admin/index/index");
        }
        $resquest = Request::instance();
        $data = $resquest->post();//接收收据
        //判断是否有数据传输  没有则渲染界面
        if (empty($data)){
            return $this->fetch("user/login");
        }
        //获取验证类
        $validate = validate("User")->scene("login");//验证场景
        //验证数据
        if (!$validate->check($data)){
            // 错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        // 实例化model层
        $model = new UserModel();
        $user = $data["user"];
        $pwd = md5(md5(sha1($data["pwd"])));//密码加密
        $result = $model->login($user);
        //验证用户名是否存在
        if (count($result[0])>0){
            //验证密码是否正确
            if ($result[0]["username"]==$user&&$result[0]["pwd"]==$pwd){
                //密码正确  设置session 保存用户名、角色名
                $userdata = [
                    "aid" => $result[0]["Id"],
                    "uname" => $user,
                    "rid" => $result[0]["roleId"],
                    "rname" => $result[0]["role"]
                ];
                //存入session
                session($sessionName["user"],$userdata);
                //将权限数据 存入session
                $roledata = $result[1];
                //存入session
                session($sessionName["role"],$roledata);
                return returnData(0,"登录成功");
            }else{
                return returnData(1,"用户密码不正确，请重新输入");
            }
        }else{
            return returnData(1,"用户名不正确，请重新输入");
        }
    }
    /**
     *退出登录
     */
    public function login_out (){
        //从配置文件获取session信息
        $sessionName = config("sessionName");//session键
        //清除session
        session($sessionName["user"], null);
        $this->redirect("admin/user/login");//直接跳转
    }
}