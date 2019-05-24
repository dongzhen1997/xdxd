<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/10
 * Time: 14:41
 */
namespace app\index\model;
use think\Model;
use think\Db;

class Details extends Model
{
   public function details($goods_id){
       $result1 = Db::table('xdxd_goods')
           ->where('Id',$goods_id)
           ->find();
       return $result1;
   }
}