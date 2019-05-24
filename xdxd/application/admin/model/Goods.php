<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/20
 * Time: 10:06
 */

namespace app\admin\model;
use think\Db;
use think\Model;

class Goods extends Model
{
    public function goodsList (){
        //连接数据库
        $result = db("goods")
            ->alias("g")
            ->join("classify c","g.classifyId = c.Id")
            ->field("g.Id,g.goodsname,g.price,g.sale_price,g.classifyId,g.num,g.status,g.thumb,g.type,g.sale_num,g.goods_score,c.classify_name")
            ->select();
        return $result;
    }

    public function goodsShow ($_id){
        //连接数据库
        $result = db("goods")
            ->alias("g")
            ->where("g.Id","=",$_id)
            ->join("classify c","g.classifyId = c.Id")
            ->find();
        return $result;
    }

    public function goodsAdd ($_data,$_filename){
        $data = [
            "goodsname" => $_data["g_name"],
            "price" => $_data["g_price"],
            "sale_price" => $_data["s_price"],
            "classifyId" => $_data["g_cid"],
            "num" => $_data["g_num"],
            "status" => $_data["g_status"],
            "goods_score" => $_data["g_score"],
            "thumb"=>$_filename
        ];
//        if (!empty($_data["thumb"])){
//            $data["thumb"] =$_filename;
//        }
        $content = [
            "goods_content" => $_data["g_content"],
        ];
        try{
            //启动事务
            Db::startTrans();
            $content_id = db("goods_content")->insertGetId($content);
            $data["contentId"] = $content_id;
            //连接数据库
            $result = db("goods")->insert($data);
            //提交事务
            Db::commit();
            return $result;
        }catch (\Exception $e){
            //错误信息
//            return $e->getMessage();
            dump($e->getMessage());
            //回滚事务
            Db::rollback();
            return false;
        }
    }

    public function getgoods ($_id){
        $result = db("goods")
            ->alias("g")
            ->join("goods_content c","g.contentId = c.Id","LEFT")
            ->where("g.Id",$_id)
            ->field("g.Id,g.goodsname,g.price,g.sale_price,g.classifyId,g.num,g.status,g.thumb,g.goods_score,g.contentId,c.goods_content")
            ->find();
        return $result;
    }

    public function classifyList (){
        //连接数据库
        $result = db("classify")->select();
        return $result;
    }

    public function classifyAdd ($_data){
        $data = [
            "classify_name" => $_data["c_name"],
            "classify_status" => $_data["c_status"],
        ];
        //连接数据库
        $result = db("classify")->insert($data);
        return $result;
    }

    public function getClassify ($_id){
        //连接数据库
        $result = db("classify")->where("Id",$_id)->find();
        return $result;
    }

    public function classifyEdit ($_data){
        $data = [
            "classify_name" => $_data["c_name"],
            "classify_status" => $_data["c_status"],
        ];
        //连接数据库
        $result = db("user")->where("Id",$_data["c_id"])->update($data);
        return $result;
    }
}