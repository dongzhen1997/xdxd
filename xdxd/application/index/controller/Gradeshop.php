<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/5/2
 * Time: 17:26
 */
namespace app\index\controller;
use think\Controller;
use think\Request;
use \app\index\model\Gradeshop as GradeshopModel;
class Gradeshop extends Base
{
    public function gradeshop(){
        $model = new GradeshopModel();
        $result=$model->gradeshop();
        return $this->fetch("gradeshop",["list"=>$result[0],"score"=>$result[1]["score"]]);
    }
}