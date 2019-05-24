<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/5
 * Time: 22:06
 */
namespace app\index\controller;
use think\Controller;
use think\Session;
use \app\index\model\Index as IndexModel;
class Index extends Controller
{
   public function index(){
       if(cookie("user")){
           $this->assign("login",1);
       }else{
           $this->assign("login",0);
       }
       $model = new IndexModel();
       $result=$model->index();
       $this->assign("box",$result[0]);
       $this->assign("rice",$result[1]);
       $this->assign("card",$result[2]);
       return $this->fetch();
   }
}