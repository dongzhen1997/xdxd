<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/26
 * Time: 9:26
 */
namespace app\admin\model;
use think\Db;
use think\Model;
class Activity extends Model
{
    public function turntable (){
        $result = db("turntable_list")->select();
        return $result;
    }
    public function getturntable($_id){
        $result = db("turntable_list")->where("id",$_id)->find();
        return $result;
    }
    public function turntableEdit ($_data){
        $data = [
            "level" => $_data["level"],
            "award" => $_data["award"],
            "num" => $_data["num"],
            "possibility" => $_data["possibility"]
        ];
        $id = $_data["tid"];
        $result = db("turntable_list")->where("Id",$id)->update($data);
        return $result;
    }
    public function getTuser (){
        $result = db("turntable_list")
            ->alias("l")
            ->join("turntable_detail d","l.Id = d.t_Id")
            ->join("user u","d.uId = u.Id")
            ->field("group_concat(d.Id) as didList,group_concat(l.award) as awardlist,u.username,u.tel")
            ->group("u.Id")
            ->select();
        $data = $this->division($result);
        return $data;
    }
    public function division($res){
        $data = [];
        $item = [];
        for($i=0;$i<count($res);$i++){
            $awardlist = explode(",",$res[$i]["awardlist"]);
            $didList = explode(",",$res[$i]["didList"]);
            $item["username"] = $res[$i]["username"];
            $item["tel"] = $res[$i]["tel"];
            if (count($awardlist)>1){
                for ($j=0;$j<count($awardlist);$j++){
                    $item["did"] = $didList[$j];
                    $item["award"] = $awardlist[$j];
                    array_push($data,$item);
                }
            }else{
                $item["did"] = $res[$i]["didList"];
                $item["award"] = $res[$i]["awardlist"];
                array_push($data,$item);
            }
        }
        //二维数组按照 一个键排序
        array_multisort(array_column($data,'did'),SORT_DESC,$data);
        return $data;
    }
    //快速排序
//    public function QSort($arr){
//        $length = count($arr);
//        if($length <=1){
//            return $arr;
//        }
//        $pivot = $arr[0]["did"];//枢轴
//        $left_arr = array();
//        $right_arr = array();
//        for($i=1;$i<$length;$i++){//注意$i从1开始0是枢轴
//            if($arr[$i]["did"]<=$pivot){
//                $left_arr[] = $arr[$i];
//            }else{
//                $right_arr[] = $arr[$i];
//            }
//        }
//        $left_arr = QSort($left_arr);//递归排序左半部分    1,2,3,5,6
//        $right_arr = QSort($right_arr);//递归排序右半部份8  9,10
//        return array_merge($left_arr,array($pivot),$right_arr);//合并左半部分、枢轴、右半部分
//    }
}