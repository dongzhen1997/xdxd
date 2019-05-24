<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/8
 * Time: 19:25
 */
namespace app\index\controller;
use think\Controller;
use think\Cookie;
use think\Request;
class shopcar extends Controller
{
    //读取cookie值,渲染页面
    public function shopcar(){
        if(!Cookie::has("user")){
            $this->error("您尚未登录","index/user/login");
        }
        $shopcar=json_decode(cookie("shopcar"),true);
        return $this->fetch("shopcar/shopcar",["list"=>$shopcar]);
    }
    //删除商品
    public function deleteShop(){
        $shopcar=json_decode(cookie("shopcar"),true);
        $request = Request::instance();
        $arr=$request->post();
        for ($i=0;$i<count($shopcar);$i++){
            if($shopcar[$i]["Id"]==$arr["Id"]){
                $id=$i;
            }
        }
        unset($shopcar[$id]);
        cookie("shopcar",json_encode($shopcar),3600);
        return '"删除成功"';
    }
    //添加商品
    public function plus(){
        $shopcar=json_decode(cookie("shopcar"),true);
        $request = Request::instance();
        $arr=$request->post();
        for ($i=0;$i<count($shopcar);$i++){
            if($shopcar[$i]["Id"]==$arr["Id"]){
                $shopcar[$i]["num"]++;
            }
        }
        cookie("shopcar",json_encode($shopcar),3600);
    }
    //减少商品
    public function minus(){
        $shopcar=json_decode(cookie("shopcar"),true);
        $request = Request::instance();
        $arr=$request->post();
        for ($i=0;$i<count($shopcar);$i++){
            if($shopcar[$i]["Id"]==$arr["Id"]){
                $shopcar[$i]["num"]--;
            }
        }
        cookie("shopcar",json_encode($shopcar),3600);
    }
    //详情页面计入cookie
    public function cookieSet(){
        if(!Cookie::has("user")){
            echo returnData("1","尚未登录");
            exit;
        }
        $request = Request::instance();
        $arr=$request->post();
        $data=[
            "Id"=>$arr["Id"],
            "num"=>intval($arr["num"]),
            "goodsname"=>$arr["name"],
            "thumb"=>$arr["thumb"],
            "price"=>floatval($arr["price"]),
            "shopnum"=>intval($arr["shopnum"])
        ];
        if(Cookie::has("shopcar")){
            $flag=true;
            $shopcar=json_decode(cookie("shopcar"),true);
            for ($i=0;$i<count($shopcar);$i++){
                if($shopcar[$i]["Id"]==$arr["Id"]){
                    $shopcar[$i]["num"]+=$arr["num"];
                    $flag=false;
                }
            }
            if($flag){
                array_push($shopcar,$data);
            }
        }else{
           $shopcar[0]=$data;
        }
        cookie("shopcar",json_encode($shopcar),3600);
        echo returnData("0","加入购物车成功");
    }
}