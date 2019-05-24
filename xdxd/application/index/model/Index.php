<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/10
 * Time: 12:56
 */
namespace app\index\model;
use think\Model;
use think\Db;

class Index extends Model
{
    public function index(){
        try {
            //启动事务
            Db::startTrans();
            //查询礼盒
            $result1 = Db::table('xdxd_goods')
                ->where('classifyId',2)
                ->where("status",4)
                ->limit(0,4)
                ->select();
            //查询大米
            $result2 = Db::table('xdxd_goods')
                ->where('classifyId',1)
                ->where("status",4)
                ->limit(0,3)
                ->select();
            //查询年卡
            $result3 = Db::table('xdxd_goods')
                ->where('classifyId',3)
                ->where("status",4)
                ->limit(0,3)
                ->select();
            $arr = [$result1,$result2, $result3];
            //提交事务
            Db::commit();
            return $arr;
        } catch (\Exception $e) {
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
        }
    }
}