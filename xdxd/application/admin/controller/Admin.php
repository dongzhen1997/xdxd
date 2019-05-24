<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/21
 * Time: 18:35
 */

namespace app\admin\controller;


use think\Controller;
use \app\admin\model\Admin as AdminModel;
use think\Request;
use think\Session;


class Admin extends Controller
{
    /**
     * 管理员列表
     * @return mixed
     */
    public function adminList (){
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
        $model = new AdminModel();
        $alist = $model->adminList();
        $t_data["alist"] = $alist;
        //获取数据长度
        $a_count = count($alist);
        $t_data["a_count"] = $a_count;
        return $this->fetch("admin/adminList",$t_data);
    }

    /**
     * 添加管理员
     * @return mixed
     */
    public function adminAdd (){
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
        $model =new AdminModel();
        //获取数据
        $data = $resquest->post();
        //验证数据传输
        if (empty($data)){
            //若为空   渲染界面
            $rlist = $model->getRole();
            return $this->fetch("admin/adminAdd",["rlist" => $rlist]);
        }
        //获取验证类  验证场景
        $validate = validate("Admin")->scene("adminAdd");
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
//                echo $file->getError();
                return returnData(1,$file->getError());
            }
        }
        $result = $model->adminAdd($data);
        if ($result){
            return returnData(0,"添加成功");
        }else{
            return returnData(1,"添加失败,请重新操作");
        }
    }

    /**
     * 编辑管理员
     * @return mixed
     */
    public function adminEdit (){
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
        $model =new AdminModel();
        //获取数据
        $data = $resquest->post();
        //验证数据传输
        if (empty($data)){
            //若为空   渲染界面
            //验证
            $_id = $resquest->get("aid",",","strip_tags");
            $id = judgeType($_id,"int");
            $adminDetail = $model->adminShow($id);
            $rlist = $model->getRole();
            return $this->fetch("admin/adminEdit",["rlist" => $rlist,"adminDetail" => $adminDetail]);
        }
        //获取验证类  验证场景
        $validate = validate("Admin")->scene("adminEdit");
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
//                echo $file->getError();
                return returnData(1,$file->getError());
            }
        }
        $result = $model->adminEdit($data);
        if ($result){
            return returnData(0,"添加成功");
        }else{
            return returnData(1,"添加失败,请重新操作");
        }
    }

    /**
     * 修改管理员密码
     * @return mixed
     */
    public function adminPwd (){
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
            $_id = $resquest->get("aid",",","strip_tags");
            $id = judgeType($_id,"int");//验证类型
            $_name = $resquest->get("aname",",","strip_tags");
            $name = judgeType($_name,"string");//验证类型
            return $this->fetch("admin/adminPwd",["id" => $id,"name" => $name]);
        }
        //获取验证类  验证场景
        $validate = validate("Admin")->scene("adminPwd");
        //验证数据
        if (!$validate->check($data)){
            //错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        $id = $data["aid"];
//        $pwd = $data["pwd"];
        $pwd = md5(md5(sha1($data["password"])));//密码加密
        //        实例化model层
        $model = new AdminModel();
        $result = $model->adminPwd($id,$pwd);
        if ($result){
            return returnData(0,"密码设置成功");
        }else{
            return returnData(1,"密码设置失败");
        }
    }

    /**
     * 删除管理员
     * @return string
     */
    public function adminDel (){
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
        $_id = $resquest->get("id",",","strip_tags");
        $id = judgeType($_id,"int");//验证类型
        //        实例化model层
        $model = new AdminModel();
        $result = $model->adminDel($id);
        if ($result){
            return "删除成功";
        }else{
            return "删除失败";
        }
    }
    /**
     * 角色列表
     * @return mixed
     */
    public function adminRole (){
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
        $model = new AdminModel();
        $role_list = $model->adminRole();
        $t_data["role_list"] = $role_list;
        //获取数据长度
        $r_count = count($role_list);
        $t_data["r_count"] = $r_count;
        return $this->fetch("admin/adminRole",$t_data);
    }

    /**
     * 新建角色
     * @return mixed
     */
    public function adminRoleAdd (){
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
        $model =new AdminModel();
        //获取数据
        $data = $resquest->post();
        //验证数据传输
        if (empty($data)){
            //若为空   渲染界面
            $result = $model->getCarte();
            //处理菜单数据
            $carteList = $this->carteHandle($result);
//            print_r($carteList);
            return $this->fetch("admin/adminRoleAdd",["carteList" => $carteList]);
        }
        //获取验证类  验证场景
        $validate = validate("Admin")->scene("adminRoleAdd");
        //验证数据
        if (!$validate->check($data)){
            //错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        //处理数据
        $role = [
            "role" => $data["roleName"],
            "describe" => $data["r_describe"]
        ];
        $dataKeys = array_keys($data);
        $p_menu = '/^(menu&)([0-9]+)$/';
        $p_operation = '/^([0-9]+)(\w+)$/';

        $_data = [];
        for ($i=0;$i<count($dataKeys);$i++){
            if (preg_match($p_menu, $dataKeys[$i],$match)) {
                $arr = [
                    "roleId" => "",
                    "carteId" =>$data[$match["0"]],
                    "o_add" => "",
                    "o_edit" => "",
                    "o_del" => "",
                    "o_see" => "",
                    "o_mind" => "",
                ];
                array_push($_data,$arr);
            }
        }
        for ($j=0;$j<count($dataKeys);$j++){
            if (preg_match($p_operation, $dataKeys[$j],$match)) {
                $arr2 = [
                    "id" => $match["1"],
                    "key" => $match["2"],
                    "value" => $data[$match["0"]],
                ];
                for ($k=0;$k<count($_data);$k++){
                    if ($_data[$k]["carteId"] ==$arr2["id"]){
                        $_data[$k]["o_".$arr2["key"]] = $arr2["value"];
                    }
                }
            }
        }
        $result = $model->adminRoleAdd($role,$_data);
        if ($result){
            return returnData(0,"添加成功");
        }else{
            return returnData(0,"添加失败");
        }
    }


    /**
     * 处理菜单数据
     * @param $_data
     * @return array
     */
    public function carteHandle ($_data){
        $FCarte = $_data["FCarte"];
        $SCarte = $_data["SCarte"];
        $TCarte = $_data["TCarte"];
        for ($i=0;$i<count($FCarte);$i++){
            $FCarte[$i]['child'] = [];
            for ($j=0;$j<count($SCarte);$j++){
                $SCarte[$j]['child'] = [];
                if ($SCarte[$j]["parentId"] == $FCarte[$i]["Id"]){
                    for ($k=0;$k<count($TCarte);$k++){
                        if ($TCarte[$k]["parentId"] == $SCarte[$j]["Id"]){
                            array_push($SCarte[$j]["child"], $TCarte[$k]);
                        }
                    }
                    array_push($FCarte[$i]["child"], $SCarte[$j]);
                }
            }
        }
        return $FCarte;
    }
    /**
     * 角色编辑
     * @return mixed
     */
    public function adminRoleEdit (){
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
        $model =new AdminModel();
        //获取数据
        $data = $resquest->post();
        //验证数据传输
        if (empty($data)){
            //若为空   渲染界面
            //接收角色id
            $_id = $resquest->get("rid",",","strip_tags");
            $rid = judgeType($_id,"int");//验证类型
            //获取角色信息
            $roleDetail = $model->roleShow($rid);
            //获取菜单数据
            $result = $model->getCarte();
            //处理菜单数据
            $carteList = $this->carteHandle($result);
//            print_r($roleDetail);
            return $this->fetch("admin/adminRoleEdit",["carteList" => $carteList,"roleDetail" => $roleDetail]);
        }
        //获取验证类  验证场景
        $validate = validate("Admin")->scene("adminRoleEdit");
        //验证数据
        if (!$validate->check($data)){
            //错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        //角色Id
        $id = $data["rId"];
        //处理数据
        $role = [
            "role" => $data["roleName"],
            "describe" => $data["r_describe"]
        ];
        $dataKeys = array_keys($data);
        $p_menu = '/^(menu&)([0-9]+)$/';
        $p_operation = '/^([0-9]+)(\w+)$/';

        $_data = [];
        for ($i=0;$i<count($dataKeys);$i++){
            if (preg_match($p_menu, $dataKeys[$i],$match)) {
                $arr = [
                    "roleId" => $id,
                    "carteId" =>$data[$match["0"]],
                    "o_add" => "",
                    "o_edit" => "",
                    "o_del" => "",
                    "o_see" => "",
                    "o_mind" => "",
                ];
                array_push($_data,$arr);
            }
        }
        for ($j=0;$j<count($dataKeys);$j++){
            if (preg_match($p_operation, $dataKeys[$j],$match)) {
                $arr2 = [
                    "id" => $match["1"],
                    "key" => $match["2"],
                    "value" => $data[$match["0"]],
                ];
                for ($k=0;$k<count($_data);$k++){
                    if ($_data[$k]["carteId"] ==$arr2["id"]){
                        $_data[$k]["o_".$arr2["key"]] = $arr2["value"];
                    }
                }
            }
        }
        $result = $model->roleEdit($id,$role,$_data);
        if ($result){
            return returnData(0,"编辑成功");
        }else{
            return returnData(0,"编辑失败");
        }
    }

    /**
     *删除角色
     */
    public function adminRoleDel (){
        $resquest = Request::instance();
        //接收用户id
        $_id = $resquest->post("id",",","strip_tags");
        $id = judgeType($_id,"int");//验证类型
        //        实例化model层
        $model = new AdminModel();
        $result = $model->roleDel($id);
        if ($result){
            return "删除成功";
        }else{
            return "删除失败";
        }
    }

    /**
     * 权限列表
     * @return mixed
     */
    public function adminPermission (){
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
        $model = new AdminModel();
//        $alist = $model->adminList();
//        //获取数据长度
//        $a_count = count($alist);
        return $this->fetch("admin/adminPermission",$t_data);
    }
}