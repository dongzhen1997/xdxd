<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/5/2
 * Time: 19:09
 */
namespace app\index\model;
use think\Db;
use think\Model;
class Classify extends Model
{
    public function chooseall(){
        $result = Db::name('goods')
            ->field("goodsname,price,sale_price,thumb,Id")
            ->select();
        return $result;
    }
    public function classify($classifyId){
        if($classifyId!=0){
            $result = Db::name('goods')
                ->field("goodsname,price,sale_price,thumb,Id")
                ->where("classifyId",$classifyId)
                ->select();
            return $result;
        }else{
            return $this->chooseall();
        }
    }
    public function search($key){
        $result =Db::name("goods")
            ->field("goodsname,price,sale_price,thumb,Id")
            ->where('goodsname','like',"%$key%")
            ->select();
        return $result;
    }
}