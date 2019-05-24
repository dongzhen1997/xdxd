<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
// 应用公共文件
/**
 * 验证是否为空
 * @param $_param
 * @param $_msg
 * @return string
 */
function paramEmpt($param, $msg){
    if(empty($param)){
        return '{"code":1,"msg":"'.$msg.'"}';
    }
}

/**
 * 验证字段是否存在
 * @param $_param
 * @param $_name
 * @param $_msg
 * @return string
 */
function paramIsset($_param, $_name, $_msg){
    if(!isset($_param[$_name])){
        return '{"code":1,"msg":"'.$_msg.'"}';
        exit;
    }
    return $_param[$_name];
}
/**
 * 返回信息
 * @param $code 0---成功  1---错误
 * @param $msg
 * @return mixed
 */
function returnData ($code,$msg,$param=0){
    $arr = array(
        "code" => $code,
        "msg" => $msg,
        "param"=>$param
    );
    return json_encode($arr);
}

/**
 * 验证数据长度
 * @param $str  需要验证的字段
 * @param $len  最大长度
 */
function judgeLen ($str, $len){
    $allLen = mb_strlen($str,"utf8");
    if($allLen>$len){
        return "当前长度过长";
    }
    return $str;
}

/**
 * 验证敏感字符
 * @param $data
 */
function judgeDangerWord ($data){
    $arr = config("dangerWord");
    print_r($arr);
    //遍历数组
    foreach ($arr as $item){
        if (mb_strpos($data,$item,0,"utf8")!==false){
            //存在
            return str_replace($item,"",$data);
        }
    }
    return $data;
}
/**
 * 判断类型
 * @param $data
 * @param $type  array int float string bool
 * @return bool|float|int|mixed|string
 */
function judgeType($data, $type){
    //数据与需要验证的类型一致  直接返回原数据
    if((is_array($data)&& $type=='array') || (is_string($data)&& $type=='string') ||(is_int($data)&& $type=='int') ||(is_float($data)&& $type=='float') ||(is_float($data)&& $type=='bool')){
        return $data;
    }
    //强转成type类型
    if (is_array($data)){
        $data = $data[0];
    }
    if ($type=='string'){
        return (string)$data;
    }
    if ($type=='int'){
        return (int)$data;
    }
    if ($type=='float'){
        return (float)$data;
    }
    if ($type=='bool'){
        return (bool)$data;
    }
    if ($type=='array'){
        return [$data];
    }
}
/**
 *is_mobile  判断pc  还是  mobile
 */
function is_mobile(){
    // returns true if one of the specified mobile browsers is detected
    // 如果监测到是指定的浏览器之一则返回true

    $regex_match="/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";

    $regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";

    $regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";

    $regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";

    $regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";

    $regex_match.=")/i";

    // preg_match()方法功能为匹配字符，既第二个参数所含字符是否包含第一个参数所含字符，包含则返回1既true
    return preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
}
/**
 * 抓取数据
 * @param $url  接口url
 * @param string $type   请求类型
 * @param string $res   返回类型
 * @param string $arr   请求参数
 */
//function http_curl ($url,$method="get",$type="http",$data=""){
//    $ch=curl_init();
//    curl_setopt($ch,CURLOPT_URL,$url);  //指定的地址
//    curl_setopt($ch,CURLOPT_HEADER,0);  //不抓起头部
//    if($type=="https"){
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//不做服务器认证
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//不做客户端认证
//    }
//    if($method=="post"){
//        curl_setopt($ch, CURLOPT_POST, true);//设置请求是POST方式
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//设置POST请求的数据
//    }
//    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//    $data=curl_exec($ch);
//    curl_close($ch);
//    return $data;
//}

/**
 *返回access_token *session解决办法 存mysql memcache
 */
//function  getWxAccessToken(){
//    //从配置文件获取session信息
//    $sessionName = config("sessionName");//session键
//    //获取session中的token  键名
//    $token_session = $sessionName["wechat_token"];
//    //获取session中的token过期时间  键名
//    $outTime = $sessionName["outTime"];
//
//    if( session($token_session) && session($outTime)>time()){
//        //如果access_token在session没有过期
//        echo "111";
//        // echo $_SESSION['access_token'];
//        return session($token_session);
//    }else {
//        //如果access_token不存在或者已经过期，重新取access_token
//        // 请求url地址
//        $AppId='wx7eec082cd2929b8d';//你的AppId
//        $AppSecret='e694246e992831b98e17b2ef422c5570';//你的AppSecret
//        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$AppId."&secret=".$AppSecret;
//        $res=http_curl($url,'get');
//        $access_token = json_decode($res,true)['access_token'];
//        //将重新获取到的aceess_token存到session
//        //存入session
//        session($token_session,$access_token);
////            $_SESSION['access_token']=$access_token;
//        session($outTime,time()+7000);
////            $_SESSION['expire_time']=time()+7000;
//        return $access_token;
//    }
//}

