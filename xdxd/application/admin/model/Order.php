<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/5/7
 * Time: 18:47
 */

namespace app\admin\model;


use think\Db;
use think\Model;

class Order extends Model
{
    public function orderList (){
        //连接数据库
        $result = db("order_list")
            ->alias("o")
            ->join("user u","o.uId = u.Id")
            ->field("o.Id,o.orderId,o.allprice,o.orderTime,o.status,o.uId,u.username")
            ->select();
        return $result;
    }
    public function orderShow ($_id){
        //连接数据库
        $result = db("order_list")
            ->alias("o")
            ->where("o.orderId","=",$_id)
            ->join("order_detail d","o.orderId = d.orderId")
            ->join("goods g","g.Id = d.goodsId")
            ->join("classify c","c.Id=g.classifyId")
            ->field("o.Id,o.orderId,o.allprice,o.orderTime,o.status,g.Id,g.goodsname,g.price,g.sale_price,g.thumb,d.count,c.classify_name,g.goods_score,g.num")
            ->select();
        return $result;
    }
    public function orderPlace(){
        return db("order_list")->where("status",2)
            ->field("Lng,Lat")->select();
    }
}