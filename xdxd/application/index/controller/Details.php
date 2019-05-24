<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/8
 * Time: 19:26
 */
namespace app\index\controller;
use think\Controller;
use think\Request;
use \app\index\model\Details as DetailsModel;
class details extends Controller
{
    public function details(){
        $request = Request::instance();
        $arr=$request->get();
        $model = new DetailsModel();
        $result=$model->details($arr["Id"]);
        $this->assign("goods",$result);
        return $this->fetch();
    }
}