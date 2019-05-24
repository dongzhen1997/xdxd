<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/10
 * Time: 11:44
 */
namespace app\index\controller;
use \app\index\model\Activity as ActivityModel;
use think\Controller;
use think\Request;
class Activity extends Base
{
    /**
     *幸运大转盘
     */
    public function turntable (){
        $model = new ActivityModel();
        $score=$model->turntable()["score"];
        $award=$model->getaward();
        $this->assign("award",json_encode($award));
        if (is_mobile()){
            $this->assign("ismobile",1);
        }else{
            $this->assign("ismobile",0);
        }
        return $this->fetch("activity/turntable",["score"=>$score]);
    }
    public function guess(){
        $model = new ActivityModel();
        $result1=$model->turntable();
        if($result1["score"]>20){
            $result=$model->guess();
            $arr=[0];
            $arr2=[0];
            for($i=0;$i<count($result);$i++){
                $randnum=$result[$i]["possibility"]*$result[$i]["num"]*100;
                $lastnum=$arr[count($arr)-1];
                $randnum+=$lastnum;
                array_push($arr,$randnum);
                $arr2[]=$result[$i]["Id"];
            }
            $lotterynum=rand(0,$arr[count($arr)-1]);

            for($i=0;$i<count($result);$i++){
                if($lotterynum<$arr[$i]){
                    $range=$i;
                    break;
                }
            }
            $model->reward($arr2[$i]);
            echo returnData("0","成功",$arr2[$i]);
        }else{
            echo returnData("1","积分不足");
        }
    }
    /**
     *签到
     */
    public function sign (){
        $model = new ActivityModel();
        $result=$model->signShow();
        //判断是否连续签到
        $result1=$model->sign();
        $last=strtotime($result1["lastsignTime"]);
        $day=date("d",$last);
        $today=date("d");

        //判断今天是否签到
        if($day==$today){
            $this->assign("signed",1);
        }else{
            $this->assign("signed",0);
        }
        $now=time();
        $compare=$now-$last;
        $compare/=(3600*24);

        if(1<$compare&&$compare<2){
            $this->assign("ifcontinue",1);
            $this->assign("signDays",$result1["signDays"]);
        }else{
            $this->assign("ifcontinue",0);
            $this->assign("signDays",0);
        }
        if(empty($result[0])){
            $which=json_encode([]);
        }else{
            foreach ($result[0] as $item){
                $arr[]=$item["signday"]-1;
            }
            $which=json_encode($arr);
        }

        $result[1][0]["monthsign"]=count($result[0]);
        $this->assign("record", $result[0]);
        $this->assign("days",$result[1]);
        $this->assign("whichsign",$which);
        return $this->fetch("activity/sign");
    }
    public function signFinished(){
        $model = new ActivityModel();
        $resquest = Request::instance();
        $data = $resquest->post();

        if($data["flag"]==1){
            //连续签到的操作
            $model->continueSign();

            if($data["signDays"]==15){
                //签到16天额外操作
                $msg="获得100积分";
                $model->signAddition();
            }
            $msg="签到成功，连续签到天数+1";
        }
        //只要签到都有的操作
        $model->signed($data["signDays"]);
        $msg="5";
        echo returnData(0,$msg);
    }
    /**
     *秒杀
     */
    public function seckill(){
        $model = new ActivityModel();
        $resquest = Request::instance();
        $data = $resquest->post();

        $starttimestr = "08:00:00";
        $endtimestr = "22:00:00";

        $starttime = strtotime($starttimestr);
        $endtime = strtotime($endtimestr);
        $nowtime = time();   //时间戳
        $lefttime=-1;
        $info="";

        if ($nowtime<$starttime){
            $info="活动还没开始,活动时间是：{$starttimestr}至{$endtimestr}";
        }else if($nowtime>$endtime){
            $info="活动已经结束";
        }else{
            $lefttime = $endtime-$nowtime; //实际剩下的时间（秒）
        }
        $list = $model->seckill();
        return $this->fetch("activity/seckill",["list"=>$list,"lefttime"=>$lefttime,"info"=>$info]);
    }
    public function seckillbuy(){
        $id=Request::instance()->param("id");
        $price=Request::instance()->param("price");
        $model = new ActivityModel();
        $orderId = md5(time().$id);
        $model->seckillbuy($id,$orderId,$price);
    }
}