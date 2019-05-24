<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/5/7
 * Time: 18:47
 */
namespace app\admin\controller;
use think\Controller;
use \app\admin\model\Order as OrderModel;
use think\Request;
use PHPExcel_IOFactory;
use PHPExcel;
class Order extends Controller
{
    /**
     * 订单列表
     * @return mixed
     */
    public function orderList () {
        /****************************************************************************/
        //从配置文件获取session信息
        $sessionName = config("sessionName");//session键
        //获取session中的用户  键名
        $user_session = $sessionName["user"];
        //实例化base类
        $base = new Base();
        //验证登录信息
        $base->testSession($user_session,"尚未登录，即将跳转至登录界面","admin/user/login");
        /*******************************************************************************/
        //获取session中的权限   键名
        $role_session = $sessionName["role"];
        //验证权限信息  接收权限数据
        $role_data = $base->testRole($role_session,"你没有权限访问当前页面,即将跳转至首页","admin/index/index");

        //从session中获取用户信息
        $user_data = session($user_session);
        $user = $user_data["uname"];
        $roleName = $user_data["rname"];
        //模板数据
        $t_data = [];
        $t_data["user"] = $user;
        $t_data["roleName"] = $roleName;
        $t_data["role_data"] = $role_data;
        $time = date("Y-m-d");//当前时间
        $t_data["time"] = $time;
        /****************************************************************************/
        //实例化model层
        $model =new OrderModel();
        //获取订单信息
        $olist = $model->orderList();
        $t_data["olist"] = $olist;
        //获取数据长度
        $o_count = count($olist);
        $t_data["o_count"] = $o_count;
//        //获取商品信息
//        $glist = $model->goodsList();
//        $t_data["glist"] = $glist;
//        //获取分类信息
//        $clist = $model->classifyList();
//        $t_data["clist"] = $clist;
//        //获取数据长度
//        $g_count = count($glist);
//        $t_data["g_count"] = $g_count;
        return $this->fetch("order/orderList",$t_data);

    }
    /**
     *订单详情
     */
    public function orderShow (){
        /****************************************************************************/
        //从配置文件获取session信息
        $sessionName = config("sessionName");//session键
        //获取session中的用户  键名
        $user_session = $sessionName["user"];
        //实例化base类
        $base = new Base();
        //验证登录信息
        $base->testSession($user_session,"尚未登录，即将跳转至登录界面","admin/user/login");
        /*******************************************************************************/
        $resquest = Request::instance();
        //获取get数据
        //验证
        $oid = $resquest->get("oid",",","strip_tags");
        //实例化model层
        $model =new OrderModel();
        //获取商品信息
        $gDetail = $model->orderShow($oid);

        return $this->fetch("goods/goodsShow",["gDetail" => $gDetail[0]]);
    }
    /**
     * tp5 使用excel导出
     * @param
     * @author staitc7  * @return mixed
     */
    public function excel() {
        $resquest = Request::instance();
        $result=$resquest->post();
        //实例化model层
        $model =new OrderModel();
        //获取订单信息
        $olist = $model->orderList();

        $name='订单详情';
        $header=['订单号','总价','订单时间','用户名'];
        foreach ($olist as $item){
            $arr=[$item["orderId"],$item["allprice"],$item["orderTime"],$item["username"]];
            $data[]=$arr;
        }
        $this->excelExport($name,$header,$data);
    }
    /**
     * excel表格导出
     * @param string $fileName 文件名称
     * @param array $headArr 表头名称
     * @param array $data 要导出的数据
     * @author static7  */
    function excelExport($fileName = '', $headArr = [], $data = []) {
        $fileName .= "_" . date("Y_m_d", Request::instance()->time()) . ".xls";
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties();
        $key = ord("A"); // 设置表头
        foreach ($headArr as $v) {
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);
            $key += 1;
        }
        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
        foreach ($data as $key => $rows) { // 行写入
            $span = ord("A");
            foreach ($rows as $keyName => $value) { // 列写入
                $objActSheet->setCellValue(chr($span) . $column, $value);
                $span++;
            }
            $column++;
        }
        $fileName = iconv("utf-8", "gb2312", $fileName); // 重命名表
        $objPHPExcel->setActiveSheetIndex(0); // 设置活动单指数到第一个表,所以Excel打开这是第一个表
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename='$fileName'");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); // 文件通过浏览器下载
        exit();
    }
    public function orderPlace(){
        /****************************************************************************/
        //从配置文件获取session信息
        $sessionName = config("sessionName");//session键
        //获取session中的用户  键名
        $user_session = $sessionName["user"];
        //实例化base类
        $base = new Base();
        //验证登录信息
        $base->testSession($user_session,"尚未登录，即将跳转至登录界面","admin/user/login");
        /*******************************************************************************/
        //获取session中的权限   键名
        $role_session = $sessionName["role"];
        //验证权限信息  接收权限数据
        $role_data = $base->testRole($role_session,"你没有权限访问当前页面,即将跳转至首页","admin/index/index");
        //从session中获取用户信息
        $user_data = session($user_session);
        $user = $user_data["uname"];
        $roleName = $user_data["rname"];
        //模板数据
        $t_data = [];
        $t_data["user"] = $user;
        $t_data["roleName"] = $roleName;
        $t_data["role_data"] = $role_data;
        $model =new OrderModel();
        $re=$model->orderPlace();
        $this->assign("distribution",json_encode($re));
        /****************************************************************************/
        //实例化model层
        return $this->fetch("order/orderPlace",$t_data);
    }
}