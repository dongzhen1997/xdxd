<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/22
 * Time: 11:16
 */

namespace app\admin\model;


use think\Db;
use think\Model;

class Menu extends Model
{
    public function menuList (){
        //连接数据库
        $result = db("admin_carte")
            ->alias("c")
            ->join("ico i","c.icoId = i.Id","LEFT")
            ->field("c.Id,c.carte_name,c.carte_url,c.parentId,c.icoId,c.status,i.iconame,i.introduce")
            ->select();
        return $result;
    }
    public function menuAdd ($_data){
        $data = [
            "carte_name" => $_data["menuname"],
            "carte_url" => $_data["menu_url"],
        ];
        if (empty($_data["menu1"])){
            $data["status"] = 1;
            $data["parentId"] = 0;
        }else if (!empty($_data["menu1"])&empty($_data["menu2"])){
            $data["status"] = 2;
            $data["parentId"] = $_data["menu1"];
        }else if (!empty($_data["menu1"])&!empty($_data["menu2"])&empty($_data["menu3"])){
            $data["status"] = 3;
            $data["parentId"] = $_data["menu2"];
        }else{
            $data["status"] = 4;
            $data["parentId"] = $_data["menu3"];
        }
        //连接数据库
        $result = db("admin_carte")->insert($data);
        return $result;
    }
    public function menuShow ($_id){
        //连接数据库
        $result = db("admin_carte")
            ->where("Id",$_id)
            ->find();
        return $result;
    }
    public function menuEdit ($_data){
        $data = [
            "carte_name" => $_data["menuname"],
            "carte_url" => $_data["menu_url"],
        ];
        if (empty($_data["menu1"])){
            $data["status"] = 1;
            $data["parentId"] = 0;
        }else if (!empty($_data["menu1"])&empty($_data["menu2"])){
            $data["status"] = 2;
            $data["parentId"] = $_data["menu1"];
        }else if (!empty($_data["menu1"])&!empty($_data["menu2"])&empty($_data["menu3"])){
            $data["status"] = 3;
            $data["parentId"] = $_data["menu2"];
        }else{
            $data["status"] = 4;
            $data["parentId"] = $_data["menu3"];
        }
        //连接数据库
        $result = db("admin_carte")->where("Id",$_data["menuId"])->update($data);
        return $result;
    }
    public function menuDel ($_id){
        try{
            //启动事务
            Db::startTrans();
            //先查询指定菜单是否有子菜单
            $result = db("admin_carte")->where("Id",$_id)->delete();
            //删除  admin_role_permission 对应菜单权限数据
            $result2 = db("admin_role_permission")->where("carteId",$_id)->delete();
            //提交事务
            Db::commit();
            return $result;
        }catch (\Exception $e){
            //错误信息
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }
    }
}