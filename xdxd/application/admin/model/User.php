<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/1/22
 * Time: 11:25
 */
namespace app\admin\model;
use think\Db;
use think\Model;

class User extends Model
{
    public function login ($_user){
        try{
            //启动事务
            Db::startTrans();
            //获取登录密码  及  角色名、id
            $result2 = db("admin")
                ->alias("a")
                ->join("admin_role r","a.roleId = r.Id")
                ->where("a.username",$_user)
                ->field("a.Id,a.username,a.pwd,a.roleId,r.role")
                ->find();
            //通过角色Id 获取角色权限
            $rId = $result2["roleId"];
            $result3 = db("admin_role_permission")
                ->alias("p")
                ->join("admin_carte c","p.carteId = c.Id")
                ->join("ico i","c.icoId = i.Id","LEFT")
                ->where("p.roleId",$rId)
                ->field("p.carteId,p.o_add,p.o_del,p.o_edit,p.o_see,p.o_mind,c.carte_name,c.carte_url,c.parentId,c.icoId,c.status,i.iconame")
                ->select();
            $arr = [$result2,$result3];
            //提交事务
            Db::commit();
            return $arr;
        }catch (\Exception $e){
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }
    }
}