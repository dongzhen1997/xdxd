<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/5/2
 * Time: 19:49
 */
namespace app\index\model;
use think\Db;
use think\Model;
class Gradeshop extends Model
{
    public function gradeshop(){
        $uId=cookie("user")["id"];
        try{
            //启动事务
            Db::startTrans();
            $result=Db::name("score")
                ->alias("s")
                ->join("goods g","s.goodsId=g.Id")
                ->field("s.sale_score,g.goodsname,g.thumb,g.Id")
                ->select();
            $result2 =Db::name("user")
                ->field("score")
                ->where("Id",$uId)
                ->find();
            $arr = [$result,$result2];
            //提交事务
            Db::commit();
            return $arr;
        }catch (\Exception $e){
            //错误信息
//            return $e->getMessage();
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }
    }
}