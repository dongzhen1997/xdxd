<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/3/1
 * Time: 20:38
 */
namespace app\admin\model;
use think\Model;
use think\Db;
class Adduser extends Model
{
    public function add($info){
        //       $headimg=$info["headimgurl"];
        $sex=$info["sex"];
        $subscribe=$info["subscribe"];
        $openid=$info["openid"];
        $time=$info["subscribe_time"];
        $nickname=$info["nickname"];
        $check=Db::table("xdxd_user")
        ->where("openid",$openid)->find();
        if($check==false){
            Db::table("xdxd_user")->insert(["subscribe"=>$subscribe,
                "openid"=>$openid,"nickname"=>$nickname,"sex"=>$sex, "subscribe_time"=>$time]);
        }else{
            Db::table("xdxd_user")->where("openid",$openid)->update(["subscribe"=>1]);
        }
    }
    public function rightsuser($info){
        $openid=$info["openid"];
        $ifexsit=Db::table("xdxd_user")->where("openid",$openid)->find();
        if(empty($ifexsit)){
            $sex=$info["sex"];
            $nickname=$info["nickname"];
            Db::table("xdxd_user")->insert([
                "openid"=>$openid,"nickname"=>$nickname,"sex"=>$sex]);
        }
    }
}