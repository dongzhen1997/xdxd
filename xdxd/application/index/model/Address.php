<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/10
 * Time: 15:41
 */
namespace app\index\model;
use think\Model;
use think\Db;
class Address extends Model
{
    public function addressList($uid){
        try {
            //启动事务
            Db::startTrans();
            //查询地址列表
            $result1 = Db::table('xdxd_addr')->where('uId',$uid)->select();
            //查询默认地址id
            $result2 =Db::table('xdxd_user')->field("addr_id")->where('Id',$uid)->find();
            //返回数据
            $arr = [$result1,$result2];
            //提交事务
            Db::commit();
            return $arr;
        } catch (\Exception $e) {
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }
    }
    public function addressAdd($arr,$uid){
        //整理数据
        $linkman=$arr["linkman"];
        $tel=$arr["tel"];
        $addr=$arr["addr"];
        $area=$arr["addr_detail"];
        $area_detail=explode(" ",$addr);
        $province=$area_detail[0];
        $city=$area_detail[1];
        $block=$area_detail[2];
        $postalcode=$arr["postalcode"];
        $ifdefault=$arr["defaultaddr"];

        $data=[
            'uId'=>$uid,
            'linkman'=>$linkman,
            'tel'=>$tel,
            'addr_detail'=>$area,
            'city'=>$city,
            'province'=>$province,
            'block'=>$block,
            'postalcode'=>$postalcode
        ];
        //添加地址
        $success=Db::table('xdxd_addr')->insert($data);
        $addr_id=Db::table('xdxd_addr')->getLastInsID();
        //判断是否为默认地址
        if($ifdefault==1){
            Db::table('xdxd_user')->where('Id', $uid)->update(["addr_id"=>$addr_id]);
        }
        //判断是否添加成功
        if($success==1){
            echo returnData("0","添加成功!");
        }
        if($success==0){
            echo returnData("1","添加失败!");
        }
    }
    public function addressDel($addr_id,$uid){
        //获取默认地址id
        $dfid=Db::table('xdxd_user')->where('Id',$uid)->find();
        //删除地址
        Db::table('xdxd_addr')->where('Id',$addr_id)->delete();
        //如果是默认id，用户表设为0
        if($addr_id==$dfid["addr_id"]){
            Db::table('xdxd_user')->where('Id', 1)->update(["addr_id"=>0]);
        }
    }
    public function addressshow($addr_id,$uid){
        try {
            //启动事务
            Db::startTrans();
            //查询地址
            $result1 = Db::table('xdxd_addr')->where('Id',$addr_id)->find();
            //查询默认地址id
            $result2 =Db::table('xdxd_user')->field("addr_id")->where('Id',$uid)->find();
            //返回数据
            $arr = [$result1,$result2];
            //提交事务
            Db::commit();
            return $arr;
        } catch (\Exception $e) {
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }
    }
    public function addressEdit($arr,$uId){
        $Id=$arr["editid"];

        $linkman=$arr["linkman"];
        $tel=$arr["tel"];
        $addr=$arr["addr"];
        $area=$arr["addr_detail"];
        $area_detail=explode(" ",$addr);
        $province=$area_detail[0];
        $city=$area_detail[1];
        $block=$area_detail[2];
        $postalcode=$arr["postalcode"];
        $ifdefault=$arr["defaultaddr"];
        $re1=0;
        $data=[
            'uId'=>"1",
            'linkman'=>$linkman,
            'tel'=>$tel,
            'addr_detail'=>$area,
            'city'=>$city,
            'province'=>$province,
            'block'=>$block,
            'postalcode'=>$postalcode
        ];
        $dfid=Db::table('xdxd_user')->where('Id',$uId)->find();
        if($ifdefault==1){
            if($dfid["addr_id"]!=$Id){
                $re1=Db::table('xdxd_user')->where('Id', $uId)->update(["addr_id"=>$Id]);
            }
        }else{
            if($dfid["addr_id"]==$Id){
                $re1=Db::table('xdxd_user')->where('Id', $uId)->update(["addr_id"=>"0"]);
            }
        }
        $re=Db::table('xdxd_addr')->where('Id', $Id)->update($data);

        if($re==0&&$re1==0){
            echo returnData("1","您尚未编辑");
        }else{
            echo returnData("0","编辑成功");
        }
    }
}