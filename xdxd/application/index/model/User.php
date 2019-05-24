<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/5
 * Time: 0:00
 */
namespace app\index\model;
use think\Model;
use think\Db;
class User extends Model
{
    public function login ($_user){
        $result=db("user")->where("username",$_user)
            ->field("username,pwd,id")->find();
        return $result;
    }
    public function regist($_regist){
        $result=db("user")->insert($_regist);
        return $result;
    }
    public function forget ($_user){
        $result = db("user")->where("username",$_user)->field("Id,username,email")->find();
        return $result;
    }
    public function resetpwd($id,$user,$pwd){
        try{
            //启动事务
            Db::startTrans();
            //查询数据库
            $result1 = db("user")->where("Id",$id)->field("username")->find();
            $_user = md5(md5(sha1($result1["username"])));
            if($_user!=$user){
                echo $user;
                throw new \Exception("用户名不正确，请重新操作");
            }
            //更新密码
            $result2 = db("user")->where("Id",$id)->update(["pwd" => $pwd]);
            //提交事务
            Db::commit();
            echo returnData(0,"密码重置成功,请重新登录");
        }catch (\Exception $e){
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }
    }
    public function phonelogin($_tel){
        $result=db("user")->where("tel",$_tel)->find();
        return $result;
    }
}