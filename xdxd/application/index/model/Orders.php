<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/12
 * Time: 16:25
 */
namespace app\index\model;
use think\Model;
use think\Db;
use think\response\Json;

class Orders extends Model
{
    public function orderPlace($goods,$price,$orderId){
        $uId=cookie("user")["id"];
        for($i=0;$i<count($goods);$i++){
            $list["orderId"]=$orderId;
            $list["goodsId"]=$goods[$i]["Id"];
            $list["count"]=$goods[$i]["num"];
            $arr[]=$list;
        }
        try {
            //启动事务
            Db::startTrans();
            //查询商品
            Db::name("order_list")
                ->insert(["orderId"=>$orderId,"allprice"=>$price,
                    "status"=>1,"orderTime"=>date("Y-m-d H:i:s"),"uId"=>$uId,"pay_way"=>1]);
            Db::name("order_detail")->insertAll($arr);
            //提交事务
            Db::commit();

        } catch (\Exception $e) {
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }
    }
    public function orderAddr(){
        $uId=cookie("user")["id"];
        $result=Db::name("addr")->where("uId",$uId)->limit(0,1)->select();
        return $result;
    }
    public function orderPlacegrade($goodsId,$orderId,$goodsgrade,$usergrade,$pos){
        $uId=cookie("user")["id"];
        try {
            //启动事务
            Db::startTrans();
            //查询商品
            Db::name("order_list")
                ->insert(["orderId"=>$orderId,
                    "status"=>2,"orderTime"=>date("Y-m-d H:i:s"),"uId"=>$uId,"pay_way"=>2,"Lng"=>$pos[0],"Lat"=>$pos[1]]);
            Db::name("order_detail")->insert([
                "orderId"=>$orderId,
                "goodsId"=>$goodsId,
                "count"=>1
            ]);

            $usergrade-=$goodsgrade;
            Db::name("user")
                ->where("Id",$uId)
                ->update(["score"=>$usergrade]);
            //提交事务
            Db::commit();
        } catch (\Exception $e) {
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }
    }
    public function chooseAddr(){
        $uId=cookie("user")["id"];
        $re=Db::name("user")->where("Id",$uId)
            ->field("addr_id")->find();
        if($re["addr_id"]==0){
            $result=Db::name("addr")->where("uId",$uId)->find();
        }else{
            $result=Db::name("addr")->where("Id",$re["addr_id"])->find();
        }
        return $result;
    }
    public function changeAddr($addrid){
        return Db::name("addr")->where("Id",$addrid)->find();
    }
    /**
     * @param $orderid
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function confirm($orderid)
    {
        $goodslist= Db::name("order_detail")
            ->alias('o')
            ->join("goods g", 'o.goodsId=g.Id')
               ->field("o.goodsId,o.count,g.sale_price,g.thumb,g.goodsname,o.orderId")
               ->where("o.orderId",$orderid)
            ->select();
        $totalfee=Db::name("order_list")->where("orderId",$orderid)
            ->field("allprice")->find();
        $result=[$goodslist,$totalfee];
        return $result;
    }
    /**
     * @param $orderId
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function paid($orderId,$pos){
        try {
        $re=Db::name("order_list")->where("orderId",$orderId)
            ->update(["status"=>2,"Lng"=>$pos[0],"Lat"=>$pos[1]]);
        $this->orderList();
        Db::commit();
        } catch (\Exception $e) {
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }
    }
    /**
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function orderList(){
        $uId=cookie("user")["id"];
        $orderlist=Db::name("order_list")->
            alias("l")
            ->join("order_detail d","l.orderId=d.orderId")
            ->join("goods g","g.Id=d.goodsId")
            ->where("l.uId",$uId)
            ->field("l.orderId,l.allprice,l.orderTime,l.status,group_concat(g.goodsname) as goodsname,group_concat(g.sale_price) as sale_price ,group_concat(g.thumb) as thumb ,group_concat(d.count) as count,group_concat(g.Id) as Id")
            ->group('l.orderId')
            ->select();
        $orderlist=$this->division($orderlist);
        return $orderlist;
    }
    public function division($res){
        for($i=0;$i<count($res);$i++){
            $res[$i]["goodsname"]=explode(",",$res[$i]["goodsname"]);
            $res[$i]["sale_price"]=explode(",",$res[$i]["sale_price"]);
            $res[$i]["thumb"]=explode(",",$res[$i]["thumb"]);
            $res[$i]["count"]=explode(",",$res[$i]["count"]);
            $res[$i]["Id"]=explode(",",$res[$i]["Id"]);
        }
        return $res;
    }
    /**
     * @param $type
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function orderClassify($type){
        $uId=cookie("user")["id"];
        $orderlist=Db::name("order_list")->
        alias("l")
            ->join("order_detail d","l.orderId=d.orderId")
            ->join("goods g","g.Id=d.goodsId")
            ->where("l.uId",$uId)
            ->where("l.status",$type)
            ->field("l.orderId as orderId,l.allprice,l.orderTime,l.status,group_concat(g.goodsname) as goodsname,group_concat(g.sale_price) as sale_price ,group_concat(g.thumb) as thumb ,group_concat(d.count) as count,group_concat(g.Id) as Id")
            ->group('l.orderId')
            ->select();
        $orderlist=$this->division($orderlist);
        return $orderlist;
    }
    /**
     * @param $orderId
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function cancelorder($orderId){
        Db::name("order_list")->where("orderId",$orderId)
            ->update(
                ["status"=>3]
            );
    }
    public function delorder($orderId){
        try {
            //启动事务
            Db::startTrans();
            //查询商品
            Db::name("order_detail")->where("orderId",$orderId)
                ->delete();
            Db::name("order_list")->where("orderId",$orderId)
                ->delete();
            echo returnData("0","删除成功!");
            //提交事务
            Db::commit();

        } catch (\Exception $e) {
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }
    }
}