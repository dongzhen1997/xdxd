<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/27
 * Time: 12:06
 */
namespace app\index\model;
use think\Db;
use think\Model;
class Activity extends Model
{
    public function signShow (){
        $uId=cookie("user")["id"];
        $result=Db::name("sign")->where("uId",$uId)
            ->whereTime('signTime', 'month')
            ->select();
        $result1=Db::name("user")->where("Id",$uId)
            ->field("signDays,signAllDays,signScore")
            ->select();
        return  [$result,$result1];
    }
    public function sign (){
        $uId=cookie("user")["id"];
        return Db::name("user")->field("lastsignTime,signDays")
            ->where("Id",$uId)
            ->find();
    }
    public function signed($signDays){
        $uId=cookie("user")["id"];
        $day=date("d");

        if($signDays==0){
            Db::name("user")->where("Id", $uId)
                ->setField("signDays", 1);
        }
        $time=date("Y-m-d H:i:s");
        try {

            Db::startTrans();
            Db::name("sign")->insert([
                "uId" => $uId,
                "note" => "获得5积分",
                "add_score" => 5,
                "signTime" =>$time,
                "signday" => $day
            ]);

            Db::name("user")->where("Id", $uId)
                ->setInc('signAllDays');

            Db::name("user")->where("Id", $uId)
                ->setField("lastsignTime", $time);

            Db::name("user")->where("Id", $uId)
                ->setInc('signScore', 5);

            Db::commit();
        }catch (\Exception $e){
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }
    }
    public function signAddition(){
        $uId=cookie("user")["id"];
        $day=date("d");
        $time=date("Y-m-d H:i:s");
        try {
            Db::name("sign")->insert([
                "uId" => $uId,
                "note" => "增加100积分",
                "add_score" => 100,
                "signTime" =>$time,
                "signday" => $day
            ]);
            Db::name("user")->where("Id", $uId)
                ->setField("signDays", 0);

            Db::name("user")->where("Id", $uId)
                ->setInc('signScore', 100);

            Db::commit();
        }catch (\Exception $e){
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }
    }
    public function continueSign(){
        $uId=cookie("user")["id"];
        Db::name("user")->where("Id", $uId)
            ->setInc('signDays');
    }
    /**
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function seckill(){
        $list=Db::name("seckill")
            ->alias("s")
            ->join("goods g","g.Id=s.goodsId")
            ->join("classify c","g.classifyId=c.Id")
            ->field("s.num,g.goodsname,g.thumb ,s.seckillprice,g.Id,g.sale_price,c.classify_name,g.classifyId")
            ->select();
        return $list;
    }
    public function seckillbuy($id,$orderId,$price){

        $uId=cookie("user")["id"];
        try{
            //读取当前的数量（可以看成是版本号）  1
            $goodscount= Db::name("seckill")
                ->where("goodsId",$id)
                ->field("num")
                ->find();
            $goodscount=$goodscount["num"];  //版本号
            if($goodscount<=0){
                echo "数量不够";
                exit;
            }
            //立刻再更新库存的数据 减一 然后再进行其他订单的操作 这样这个用户就占了一个名额
            $result= Db::name("seckill")
                ->where("goodsId",$id)
                ->setDec("num");

            //在更新的时候拿上面的和数据库中的字段进行对比 如果不成功说明有人修改了
            Db::startTrans();

            $brand=Db::name("seckill")
                ->field("num")
                ->where("goodsId",$id)
                ->find();

            if($brand["num"]!=($goodscount-1)){
                throw new \think\Exception('异常消息', 100006);
            }
            Db::name("order_list")
                ->insert(["orderId"=>$orderId,"allprice"=>$price,
                    "status"=>1,"orderTime"=>date("Y-m-d H:i:s"),"uId"=>$uId,"pay_way"=>1]);
            Db::name("order_detail")->insert([
                "orderId"=>$orderId,
                "goodsId"=>$id,
                "count"=>1
            ]);
            echo returnData("0","抢购成功!",json_encode($orderId));

            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
            //失败了还得把库存更新回来 加一
            $result= Db::name("seckill")
                ->where("goodsId",$id)
                ->setInc("num");

            echo returnData("1","抢购失败!");
        }
    }
    public function guess(){
        $result=Db::name("turntable_list")->select();
        return $result;
    }
    public function reward($Id){
        $uId=cookie("user")["id"];
        try {
            //启动事务
            Db::startTrans();
            Db::name("turntable_detail")->insert(["uId" => $uId, "t_Id" => $Id]);
            Db::name("user")->where("Id",$uId)->setDec("score",20);
            Db::commit();
        }catch (\Exception $e){

            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }

    }
    public function turntable(){
        $uId=cookie("user")["id"];
        return Db::name("user")->where("Id",$uId)->field("score")->find();
    }
    public function getaward(){
        return Db::name("turntable_list")->field("award")->select();
    }
}