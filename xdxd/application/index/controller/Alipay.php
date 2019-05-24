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
use lib\alipay\pc\lib\AlipaySubmit;
class Alipay extends Controller
{
    /**
     *支付宝支付端口
     */
    public function alipayapi (){
        $resquest = Request::instance();
        $data = $resquest->param();
        //判断平台
        if (is_mobile()){
            //  mobile  支付
            $this->m_alipay($data);
        }else{
            //    pc端  支付
            $this->pc_alipay($data);
        }
    }
    /**
     *支付宝pc支付
     */
    public function pc_alipay ($data){
        require EXTEND_PATH."lib/alipay/pc/alipay.config.php";

        /**************************请求参数**************************/
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $data['WIDout_trade_no'];

        //订单名称，必填
        $subject = $data['WIDsubject'];

        //付款金额，必填
        //$total_fee = $data['WIDtotal_fee'];
        $total_fee = 0.01;
        //商品描述，可空
        //$body = $_POST['WIDbody'];
        $body = "赶紧买，别犹豫";
        /************************************************************/
        //构造要请求的参数数组，无需改动
        $parameter = array(
            "service"       => $alipay_config['service'],
            "partner"       => $alipay_config['partner'],
            "seller_id"  => $alipay_config['seller_id'],
            "payment_type"	=> $alipay_config['payment_type'],
//            "notify_url"	=> $alipay_config['notify_url'],
            "return_url"	=> $alipay_config['return_url'],

            "anti_phishing_key"=>$alipay_config['anti_phishing_key'],
            "exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
            "out_trade_no"	=> $out_trade_no,
            "subject"	=> $subject,
            "total_fee"	=> $total_fee,
            "body"	=> $body,
            "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
            //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
            //如"参数名"=>"参数值"
        );
        //建立请求
        $alipaySubmit = new AlipaySubmit($alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
        echo $html_text;
    }
    /**
     *支付宝mobile支付
     */
    public function m_alipay ($data){
        require EXTEND_PATH."lib/alipay/mobile/alipay.config.php";
        /**************************请求参数**************************/

        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $data['WIDout_trade_no'];
        //订单名称，必填
        $subject = $data['WIDsubject'];
        //付款金额，必填
        //$total_fee = $data['WIDtotal_fee'];
        $total_fee = 0.01;
        //收银台页面上，商品展示的超链接，必填
        $show_url = "http://dz.jujiaoweb.com/index/Orders/paySuccess?orderId=.$out_trade_no";
        //商品描述，可空
//        $body = $data['WIDbody'];
        $body = "赶紧买，别犹豫";
        /************************************************************/

        //构造要请求的参数数组，无需改动
        $parameter = array(
            "service"       => $alipay_config['service'],
            "partner"       => $alipay_config['partner'],
            "seller_id"  => $alipay_config['seller_id'],
            "payment_type"	=> $alipay_config['payment_type'],
//            "notify_url"	=> $alipay_config['notify_url'],
            "return_url"	=> $alipay_config['return_url'],
            "_input_charset"	=> trim(strtolower($alipay_config['input_charset'])),
            "out_trade_no"	=> $out_trade_no,
            "subject"	=> $subject,
            "total_fee"	=> $total_fee,
            "show_url"	=> $show_url,
            //"app_pay"	=> "Y",//启用此参数能唤起钱包APP支付宝
            "body"	=> $body,
            //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.2Z6TSk&treeId=60&articleId=103693&docType=1
            //如"参数名"	=> "参数值"   注：上一个参数末尾需要“,”逗号。

        );
        //建立请求
        $alipaySubmit = new AlipaySubmit($alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
        echo $html_text;
    }
//    public function payback(){
//        $resquest = Request::instance();
//        $model = new DemoModel();
//        $orderId = $resquest->get("orderId");
//        $result = $model->payback($orderId);
//        if ($result){
//            $this->success("付款成功，即将跳转","admin/demo/gList");//显示成功界面
//        }else{
//            $this->error("付款失败，即将跳转","admin/demo/gList");//显示失败界面
//        }
//    }
}