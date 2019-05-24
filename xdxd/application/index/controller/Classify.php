<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/8
 * Time: 19:25
 */
namespace app\index\controller;
use think\Controller;
use think\Request;
use \app\index\model\Classify as ClassifyModel;
class Classify extends Controller
{
   public function classify(){
       if(cookie("user")){
           $this->assign("login",1);
       }else{
           $this->assign("login",0);
       }
       $model = new ClassifyModel();
       $result=$model->chooseall();
       $this->assign("chosen",0);
       return $this->fetch("classify",["list"=>$result]);
   }
   public function choose(){
       if(cookie("user")){
           $this->assign("login",1);
       }else{
           $this->assign("login",0);
       }
       $resquest = Request::instance();
       $data = $resquest->get();//接收收据
       $model = new ClassifyModel();
       $result=$model->classify($data["id"]);
       $this->assign("chosen",$data["id"]);
       return $this->fetch("classify",["list"=>$result]);
   }
   public function search(){
       if(cookie("user")){
           $this->assign("login",1);
       }else{
           $this->assign("login",0);
       }
       $resquest = Request::instance();
       $data = $resquest->post();//接收收据
       $model = new ClassifyModel();
       $result=$model->search($data["key"]);
       $this->assign("chosen",-1);
       return $this->fetch("classify",["list"=>$result]);
   }
}