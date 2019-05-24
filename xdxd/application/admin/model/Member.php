<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/16
 * Time: 10:59
 */
namespace app\admin\model;
use think\Db;
use think\Model;
class Member extends Model
{
    public function memberlist (){
        $result = db("user")->select();
        return $result;
    }
    public function memberShow ($_id){
        $result = db("user")->where("Id",$_id)->find();
        return $result;
    }
    public function memberEdit ($_data){
        $data = [
            "username" => $_data["username"],
            "trueName" => $_data["truename"],
            "idcard" => $_data["IDcard"],
            "sex" => $_data["sex"],
            "tel" => $_data["mobile"],
            "email" => $_data["email"],
            "wxId" => $_data["wechat"],
            "content" => $_data["beizhu"],
        ];
        if (!empty($_data["headimg"])){
            $data["headimg"] = $_data["headimg"];
        }
        $result = db("user")->where("Id",$_data["mid"])->update($data);
        return $result;
    }
    public function memberStop ($_id){
        $result = db("user")->where("Id",$_id)->update(["status" => 2]);
        return $result;
    }
    public function memberStart ($_id){
        $result = db("user")->where("Id",$_id)->update(["status" => 1]);
        return $result;
    }
    public function memberDel ($_id){
        $result = db("user")->where("Id",$_id)->delete();
        return $result;
    }
    public function memberPwd ($_id,$_pwd){
        $result = db("user")->where("Id",$_id)->update(["pwd" => $_pwd]);
        return $result;
    }
}