<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/21
 * Time: 18:36
 */

namespace app\admin\model;

use think\Db;
use think\Model;

class Admin extends Model
{
    public function adminList (){
        //连接数据库
        $result = db("admin")
            ->alias("a")
            ->join("admin_role r","a.roleId = r.Id","LEFT")
            ->field("a.*,r.role,r.describe")
            ->select();
        return $result;
    }
    public function getRole (){
        //连接数据库
        $result = db("admin_role")->select();
        return $result;
    }
    public function adminAdd ($_data){
        //连接数据库
        $pwd = md5(md5(sha1($_data["password"])));//密码加密
        $data = [
            "username" => $_data["adminName"],
            "tName" => $_data["trueName"],
            "pwd" => $pwd,
            "email" => $_data["email"],
            "tel" => $_data["phone"],
            "sex" => $_data["sex"],
            "IDcard" => $_data["idcard"],
            "roleId" => $_data["adminRole"],
            "registTime" => date("Y-m-d H:i:s")
        ];
        if (isset($_data["headimg"])){
            $data["headimg"] = $_data["headimg"];
        }
        $result = db("admin")->data($data)->insert();
        return $result;
    }
    public function adminShow ($_id){
        //连接数据库
        $result = db("admin")->where("Id",$_id)->find();
        return $result;
    }
    public function adminEdit ($_data){
        //连接数据库
        $id = $_data["aId"];
        $data = [
            "username" => $_data["adminName"],
            "tName" => $_data["trueName"],
            "email" => $_data["email"],
            "tel" => $_data["phone"],
            "sex" => $_data["sex"],
            "IDcard" => $_data["idcard"],
            "roleId" => $_data["adminRole"],
            "registTime" => date("Y-m-d H:i:s")
        ];
        if (isset($_data["headimg"])){
            $data["headimg"] = $_data["headimg"];
        }
        $result = db("admin")->where("Id",$id)->data($data)->update();
        return $result;
    }
    public function adminPwd ($_id,$_pwd){
        //连接数据库
        $result = db("admin")->where("Id",$_id)->update(["pwd" => $_pwd]);
        return $result;
    }
    public function adminDel ($_id){
        //连接数据库
        $result = db("admin")->where("Id",$_id)->delete();
        return $result;
    }
    public function adminRole (){
        //连接数据库
        $result = db("admin_role")
            ->alias("r")
            ->join("admin a","r.Id = a.roleId","LEFT")
            ->field("r.Id,r.role,r.describe,group_concat(a.username) as list")
            ->group("r.Id")
            ->select();
        return $result;
    }
    public function getCarte (){
        //连接数据库
        $FCarte = db("admin_carte")->where("status","1")->select();
        $SCarte = db("admin_carte")->where("status","2")->select();
        $TCarte = db("admin_carte")->where("status","3")->select();
        $result = [
            "FCarte" => $FCarte,
            "SCarte" => $SCarte,
            "TCarte" => $TCarte
        ];
        return $result;
    }
    public function adminRoleAdd ($role,$_data){
        try{
            //启动事务
            Db::startTrans();
            $id = db("admin_role")->insertGetId($role);
            for ($i=0;$i<count($_data);$i++){
                $_data[$i]["roleId"] = $id;
            }
            $result = db("admin_role_permission")->insertAll($_data);
            //提交事务
            Db::commit();
            return 1;
        }catch (\Exception $e){

            //错误信息
//            return $e->getMessage();
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
            return 0;
        }
    }
    public function roleShow ($_id){
        //连接数据库
        $result = db("admin_role")->where("Id",$_id)->find();
        $result2 = db("admin_role_permission")->where("roleId",$_id)->select();
        $arr = [$result,$result2];
        return $arr;
    }
    public function roleEdit ($id,$role,$_data){
        try{
            //启动事务
            Db::startTrans();
            $result = db("admin_role")->where("Id",$id)->data($role)->update();
            $result2 = db("admin_role_permission")->where("roleId",$id)->delete();
            $result3 = db("admin_role_permission")->insertAll($_data);
            //提交事务
            Db::commit();
            return 1;
        }catch (\Exception $e){

            //错误信息
//            return $e->getMessage();
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
            return 0;
        }
    }
    public function roleDel ($_id){
        try{
            //启动事务
            Db::startTrans();
            //删除  admin_role数据
            $result1 = db("admin_role")->where("Id",$_id)->delete();
            //删除 admin_role_permission  权限数据
            $result2 = db("admin_role_permission")->where("roleId",$_id)->delete();
            //更新admin表中角色数据
            $result3 = db("admin")->where("roleId",$_id)->update(["roleId" => ""]);
            //提交事务
            Db::commit();
        }catch (\Exception $e){
            //错误信息
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }
    }
}