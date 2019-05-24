<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/7
 * Time: 0:17
 */
namespace app\index\controller;
use think\Controller;
class Center extends Base
{
   public function center(){
       if(cookie("user")){
           $this->assign("login",1);
       }else{
           $this->assign("login",0);
       }
       $this->assign("user",cookie("user")["username"]);
        return $this->fetch();
   }
}