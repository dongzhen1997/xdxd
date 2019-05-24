<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/7
 * Time: 0:30
 */
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Cookie;
use \app\index\model\Address as AddressModel;
/**
 * @return mixed
 * 地址管理 增删改查
 */
class Address extends Base
{
    /**
     * @return mixed
     * 地址列表
     */
    public function addressList(){
        $uId=cookie("user")["id"];
        $model = new AddressModel();
        $result=$model->addressList( $uId);
        $this->assign('list',$result[0]);
        $this->assign('addr_id',$result[1]["addr_id"]);
        return $this->fetch("address/addressList");
    }
    /**
     * @return mixed
     * 添加地址
     */
    public function addressAdd(){
        $uId=cookie("user")["id"];
        $resquest = Request::instance();
        $data = $resquest->post();//接收收据
        $data1=$resquest->param();
        //判断是否有数据传输  没有则渲染界面
        if (empty($data)){
               if(!empty($data1["id"])){
                   if($resquest->get()["id"]==0){
                       $this->assign("change",1);
                   }else if ($resquest->get()["id"]==-1){
                       $this->assign("change",3);
                   }else{
                       $this->assign("change",2);
                       $this->assign("id",$resquest->get()["id"]);
                   }
               }else{
                   $this->assign("change",0);
               }
            return $this->fetch("address/addressAdd");
        }
        // 实例化model层
        $model = new AddressModel();
        $result = $model->addressAdd($data,$uId);
    }
    /**
     * @return mixed
     * 编辑地址
     */
    public function addressEdit(){
        $uId=cookie("user")["id"];
        $resquest = Request::instance();
        $data = $resquest->param();//接收收据
        //判断是否有数据传输  没有则渲染界面
        $model = new AddressModel();
            $result=$model->addressshow($data["id"],$uId);
            if($result[0]['Id']==$result[1]['addr_id']){
                $this->assign('addr_id','1');
            }else{
                $this->assign('addr_id','0');
            }
            $this->assign("editid",$result[0]['Id']);
            return $this->fetch("address/addressEdit",$result[0]);
    }
    /**
     * @return mixed
     * 更新地址
     */
    public function editInsert(){
        $uId=cookie("user")["id"];
        $resquest = Request::instance();
        $data = $resquest->param();//接收收据
        $model = new AddressModel();
        $model->addressEdit($data, $uId);
    }
    /**
     * @return mixed
     * 删除地址
     */
    public function addressDel(){
        $uId=cookie("user")["id"];
        $request = Request::instance();
        $arr=$request->post();
        $model = new AddressModel();
        $result=$model->addressDel($arr['Id'],$uId);
        return '"删除成功"';
    }
    public function addressmodify(){
        $resquest = Request::instance();
        $data = $resquest->param();//接收收据

        $uId=cookie("user")["id"];
        $model = new AddressModel();
        $result=$model->addressList($uId);
        $this->assign("orderId",$data["orderId"]);
        $this->assign('list',$result[0]);
        $this->assign('addr_id',$result[1]["addr_id"]);
        return $this->fetch("address/addressModify");
    }
}