<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/16
 * Time: 0:07
 */
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Session;
use \app\admin\model\Member as MemberModel;

class Member extends Controller
{
    /**
     * 用户列表
     * @return mixed
     */
    public function memberList (){
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
        $model = new MemberModel();
        $list = $model->memberlist();
        $t_data["list"] = $list;
        return $this->fetch("member/memberlist",$t_data);
    }

    /**
     * 会员详细信息
     * @return mixed
     */
    public function memberShow(){
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
        //获取get数据
        //验证
        $data = $resquest->get("id",",","strip_tags");
        $id = judgeType($data,"int");
        $model = new MemberModel();
        $memberDetail = $model->memberShow($id);
        return $this->fetch("member/memberShow",["memberDetail" => $memberDetail]);
    }

    /**
     * 编辑会员信息
     * @return mixed
     */
    public function memberEdit (){
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
        $data = $resquest->post();
        //判断是否有表单数据提交
        if (empty($data)){
            //获取get数据
            //验证
            $_id = $resquest->get("id",",","strip_tags");
            $id = judgeType($_id,"int");
            $model = new MemberModel();
            $member = $model->memberShow($id);
            return $this->fetch("member/memberEdit",["member" => $member]);
        }
        //获取验证类  验证场景
        $validate = validate("Member")->scene("edit");
        //验证数据
        if (!$validate->check($data)){
            //错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        //验证上传文件
        $file = \request()->file("headimg");//获取表单上传文件
        if (!empty($file)){
            //不为空  验证文件  并移动到 public/uploads 目录下
            $imgType = config("imgType");//获取配置文件
            $info = $file->validate(['size'=>20000000,'ext' => $imgType])//验证
            ->move(ROOT_PATH . 'public' . DS . 'static' . DS .'uploads'. DS .'admin');//移动
            if($info){
                // 成功上传后 获取上传信息
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $headimg =  $info->getSaveName();
                $data["headimg"] = $headimg;
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
        //实例化model层
        $model = new MemberModel();
        $result = $model->memberEdit($data);
        if ($result){
            return returnData(0,"修改成功");
        }else{
            return returnData(1,"请重新操作");
        }
    }


    /**
     *用户冻结
     */
    public function memberStop (){
        $resquest = Request::instance();
        //接收用户id
        $_id = $resquest->post("id",",","strip_tags");
        $id = judgeType($_id,"int");//验证类型
        echo 321;
        //实例化model层
//        $model = new MemberModel();
//        $result = $model->memberStop($id);
//        var_dump($result);
//        if ($result){
//            return 2;
//        }else{
//            return 1;
//        }
    }

    /**
     *用户激活
     */
    public function memberStart (){
        $resquest = Request::instance();
        //接收用户id
        $_id = $resquest->post("id",",","strip_tags");
        $id = judgeType($_id,"int");//验证类型
//        实例化model层
//        $model = new MemberModel();
//        $result = $model->memberStart($id);
//        var_dump($result);
//        if ($result){
//            return 1;
//        }else{
//            return 2;
//        }
    }

    /**
     *删除用户
     */
    public function memberDel (){
        $resquest = Request::instance();
        //接收用户id
        $_id = $resquest->post("id",",","strip_tags");
        $id = judgeType($_id,"int");//验证类型
        //        实例化model层
        $model = new MemberModel();
        $result = $model->memberDel($id);
        if ($result){
            return "删除成功";
        }
    }

    /**
     * 修改会员密码
     * @return mixed
     */
    public function memberPwd (){
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
        $data = $resquest->post();
        //判断是否有数据传输
        if (empty($data)){
            $_id = $resquest->get("id",",","strip_tags");
            $id = judgeType($_id,"int");//验证类型
            $_name = $resquest->get("name",",","strip_tags");
            $name = judgeType($_name,"string");//验证类型
            return $this->fetch("member/memberPwd",["id" => $id,"name" => $name]);
        }
        //获取验证类  验证场景
        $validate = validate("Member")->scene("updatePwd");
        //验证数据
        if (!$validate->check($data)){
            //错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        $id = $data["mid"];
        $pwd = $data["pwd"];
//        $pwd = md5(md5(sha1($data["pwd"])));//密码加密
        //        实例化model层
        $model = new MemberModel();
        $result = $model->memberPwd($id,$pwd);
        if ($result){
            return returnData(0,"密码设置成功");
        }else{
            return returnData(1,"密码设置失败");
        }
    }
}