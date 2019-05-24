<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/12
 * Time: 16:15
 */
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Cookie;
use \app\index\model\Orders as OrdersModel;
class Orders extends Controller
{
    /**
     *点击购买  生成订单  订单状态  1---未支付  详情页面
     */
    public function orderPlace(){
        if(!Cookie::has("user")){
            echo returnData("2","尚未登录");
            exit;
        }
        $model = new OrdersModel();
        $result=$model->orderAddr();
        if(empty($result)){
            echo returnData("1","请完善地址");
        }else{
            $request = Request::instance();
            $arr=$request->post();
            $goods=$arr["goods"];
            $price=$arr["price"];
            $orderId = md5(time().$goods[0]["Id"]);
            $model->orderPlace($goods,$price,$orderId);
            echo returnData("0","成功",json_encode($orderId));
        }
    }
    /**
     *点击购买  生成订单  订单状态  1---未支付  购物车页面
     */
    public function orderPlacecar(){
        $model = new OrdersModel();
        $result=$model->orderAddr();
        if(empty($result)){
            echo returnData("1","请完善地址");
        }else{
            //删除缓存
            $shopcar=json_decode(cookie("shopcar"),true);
            $request = Request::instance();
            $arr=$request->post();
            $goods=$arr["goods"];
            $price=$arr["price"];

            for ($i=0;$i<count($shopcar);$i++){
                for($j=0;$j<count($goods);$j++){
                    if($shopcar[$i]["Id"]==$goods[$j]["Id"]){
                        $list[]=$i;
                    }
                }
            }
            for ($i=0;$i<count($list);$i++){
                unset($shopcar[$list[$i]]);
            }
            cookie("shopcar",json_encode($shopcar),3600);
            $orderId = md5(time().$goods[0]["Id"]);
            $model->orderPlace($goods,$price,$orderId);
            echo returnData("0","成功",json_encode($orderId));
        }
    }
    /**
     *点击购买  生成订单  订单状态  1---未支付  积分页面
     */
    public function orderPlacgrade(){

        $request = Request::instance();
        $arr=$request->post();
        $model = new OrdersModel();
        $result=$model->orderAddr();

        if ($arr["usergrade"] < $arr["goodsgrade"]) {
            echo returnData(2, "积分不足");
        } else {
            if(empty($result)) {
                echo returnData("1","请完善地址");
            }else{
                $model = new OrdersModel();
                if(Cookie::has("position")){
                    $pos=json_decode(cookie("position"),true);
                }else{
                    $pos=[116.5025000,38.0454800];
                }
                $orderId = md5(time().$arr["Id"]);
                $model->orderPlacegrade($arr["Id"], $orderId, $arr["goodsgrade"], $arr["usergrade"],$pos);
                echo returnData(0, "成功");
            }
        }
    }
    /**
     *确认订单
     */
    public function confirm(){
        $resquest = Request::instance();
        $orderid = $resquest->get();
        $model = new OrdersModel();
        $id=json_decode($orderid["orderid"],true);
        $result=$model->confirm($id);
        $addr=$model->chooseAddr();
        $this->assign("addr",$addr);
        return $this->fetch("alipay/confirm",["list"=>$result[0],"orderid"=>$orderid["orderid"],"total"=>$result[1]["allprice"]]);
    }
    /**
     *购买成功
     */
    public function paySuccess(){
        if(Cookie::has("position")){
            $pos=json_decode(cookie("position"),true);
        }else{
            $pos=[116.5025000,38.0454800];
        }
        $resquest = Request::instance();
        $orderId = $resquest->get()["orderId"];
        $model = new OrdersModel();
        $model->paid($orderId,$pos);
        $orderList=$model->orderList();
        $this->assign("active",0);
        return $this->fetch("orderList",["list"=>$orderList]);
    }
    public function orderList(){
        $model = new OrdersModel();
        $orderList=$model->orderList();
        $this->assign("active",0);
        return $this->fetch("orderList",["list"=>$orderList]);
    }
    public function orderClassify(){
        $resquest = Request::instance();
        $ordertype= $resquest->get()["type"];
        $model = new OrdersModel();
        $orderList=$model->orderClassify($ordertype);
        $this->assign("active",$ordertype);
        return $this->fetch("orderList",["list"=>$orderList]);
    }
    public function cancelorder(){
        $resquest = Request::instance();
        $orderId= $resquest->get()["orderId"];
        $model = new OrdersModel();
        $model->cancelorder($orderId);
        $orderList=$model->orderList();
        $this->assign("active",0);
        return $this->fetch("orderList",["list"=>$orderList]);
    }
    public function delorder(){
        $resquest = Request::instance();
        $orderId= $resquest->post()["orderId"];
        $model = new OrdersModel();
        $model->delorder($orderId);
    }
    public function addrmodify(){
        $resquest = Request::instance();
        $orderid = $resquest->get();
        $model = new OrdersModel();
        $id=json_decode($orderid["orderid"],true);
        $result=$model->confirm($id);
        $addr=$model->changeAddr($orderid["addrid"]);
        $this->assign("addr",$addr);
        $this->assign("orderId",$orderid["orderid"]);
        return $this->fetch("alipay/confirm",["list"=>$result[0],"orderid"=>$orderid["orderid"],"total"=>$result[1]["allprice"]]);
    }
}