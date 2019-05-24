<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/5
 * Time: 18:04
 */
namespace app\index\controller;
use think\Controller;
use think\Cookie;
use think\Request;
use lib\mail\PHPMailer;
use lib\tel\libs\SmsOperator;
use \app\index\model\User as UserModel;
class User extends Controller
{
    /**
     * @return mixed|string
     * 密码登录
     */
   public function login(){
       //判断是否存在cookie  若存在则跳转到系统主页
       if(Cookie::has('user')){
           $this->success("已登录，即将跳转至首页","index/index/index");
       };
       $resquest = Request::instance();
       $data = $resquest->post();//接收收据
       //判断是否有数据传输  没有则渲染界面
       if (empty($data)){
           return $this->fetch("user/login");
       }
       //获取验证类
       $validate = validate("User")->scene("login");//验证场景
       //验证数据
       if (!$validate->check($data)){
           // 错误信息
           $msg = $validate->getError();
           return returnData(1,$msg);
       }
       // 实例化model层
       $model = new UserModel();
       $user = $data["user"];
       $pwd = md5(md5(sha1($data["pwd"])));//密码加密
       $result = $model->login($user);
       if ($result){
           //验证密码是否正确
           if ($result["username"]==$user&&$result["pwd"]==$pwd){
               //密码正确  设置cookie 保存用户名、id
               //存入cookie
               $user=[
                 "username"  =>$result["username"],
                 "id"=>$result["id"]
               ];
               cookie('user', $user, 3600);
               return returnData(0,"登录成功");
           }else{
               return returnData(1,"用户密码不正确，请重新输入");
           }
       }else{
           return returnData(1,"用户名不正确，请重新输入");
       }
   }
    /**
     * @return mixed|string
     * 注册
     */
   public function regist(){
       $resquest = Request::instance();
       $data = $resquest->post();//接收收据
       //判断是否有数据传输  没有则渲染界面
       if (empty($data)){
           return $this->fetch("user/regist");
       }
       //获取验证类
       $validate = validate("User")->scene("regist");//验证场景
       //验证数据
       if (!$validate->check($data)){
           //错误信息
           $msg = $validate->getError();
           return returnData(1,$msg);
       }
       // 实例化model层
       $model = new UserModel();
       $user = $data["user"];
       $pwd = md5(md5(sha1($data["pwd"])));//密码加密
       $email=$data["email"];
       $tel=$data["tel"];
       $arr=[
           "username"=>$user,
           "pwd"=>$pwd,
           "email"=>$email,
           "tel"=>$tel
       ];
       $result = $model->regist($arr);
       if($result){
           return returnData(0,"注册成功");
       }else{
           return returnData(1,"注册失败");
       }
   }
    /**
     * @return mixed
     * 忘记密码
     */
    public function forget(){
        $resquest = Request::instance();
        $data = $resquest->post();//接收收据
        //判断是否有数据传输  没有则渲染界面
        if (empty($data)){
            return $this->fetch("user/forget");//渲染界面
        }
        //获取验证类
        $validate = validate("User")->scene("forget");//验证场景
        //验证数据
        if (!$validate->check($data)){
            //错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        //实例化model层
        $model = new UserModel();
        $user = $data["user"];
        $email = $data["email"];
        $result = $model->forget($user);
        $_user = md5(md5(sha1($user)));
        $uid= $result["Id"];
        //验证用户名是否存在
        if ($result){
            //验证邮箱是否正确
            if ($result["username"]==$user&&$result["email"]==$email){

                $mail = new PHPMailer();
                // 是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
                //$mail->SMTPDebug = 1;
                // 使用smtp鉴权方式发送邮件
                $mail->isSMTP();
                // smtp需要鉴权 这个必须是true
                $mail->SMTPAuth = true;
                // 链接qq域名邮箱的服务器地址
                $mail->Host = 'smtp.qq.com';
                // 设置使用ssl加密方式登录鉴权
                $mail->SMTPSecure = 'ssl';
                // 设置ssl连接smtp服务器的远程服务器端口号
                $mail->Port = 465;
                // 设置发送的邮件的编码
                $mail->CharSet = 'UTF-8';
                // 设置发件人昵称 显示在收件人邮件的发件人邮箱地址前的发件人姓名
                $mail->FromName = '鲜道先得';
                // smtp登录的账号 QQ邮箱即可
                $mail->Username = '1025932659@qq.com';
                // smtp登录的密码 使用生成的授权码
                $mail->Password = 'cvpnhlhlxavzbbgc';
                // 设置发件人邮箱地址 同登录账号
                $mail->From = '1025932659@qq.com';
                // 邮件正文是否为html编码 注意此处是一个方法
                $mail->isHTML(true);
                // 设置收件人邮箱地址
                $mail->addAddress("$email");
                // 添加该邮件的主题
                $mail->Subject = '找回密码';
                // 添加邮件正文
                $content = <<<mail
    http://dz.jujiaoweb.com/index/user/resetpwd/uid/$uid/user/$_user
mail;
                $mail->Body = '<a href='.$content.'>重置密码</a>';
                // 为该邮件添加附件
                // 发送邮件 返回状态
                $type = $mail->send();
                if (!$type){
                    return returnData(1,"发送失败，请重新操作");
                }
                return returnData(0,"发送成功，请注意查收邮件");
            }else{
                return returnData(1,"邮箱地址不正确，请重新输入");
            }
        }else{
            return returnData(1,"用户名不正确，请重新输入");
        }
    }
    /**
     * @return mixed
     * 找回密码
     */
    public function resetpwd(){
        $resquest = Request::instance();
        //接收用户数据
        $_id = $resquest->param("uid","","strip_tags");
        $uid = judgeType($_id,"int");//验证类型
        $user = $resquest->param("user","","strip_tags");
        //判断是否有数据传输
        if (empty($user)){
            $this->error("错误操作，即将跳转到登录界面","index/user/login");//显示失败界面
        }
        $data = $resquest->post();//获取post数据
        //判断是否有post数据传输  没有则渲染界面
        if (empty($data)){
            return $this->fetch("user/resetpwd",["uid" => $uid ,"user" => $user]);
        }
        //获取验证类
        $validate = validate("User")->scene("resetpwd");//验证场景
        //验证数据
        if (!$validate->check($data)){
            //错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        $pwd = md5(md5(sha1($data["pwd"])));//密码加密
        //实例化model层
        $model = new UserModel();
        $model->resetpwd($uid,$user,$pwd);
    }
    /**
     * @return mixed
     * 短信登录
     */
    public function phonelogin(){
        //判断是否存在cookie  若存在则跳转到系统主页
        if(Cookie::has('user')){
            $this->success("已登录，即将跳转至首页","index/index/index");
        };
        $resquest = Request::instance();
        $data = $resquest->post();//接收收据
        //判断是否有数据传输  没有则渲染界面
        if (empty($data)){
            return $this->fetch("user/phonelogin");//渲染界面
        }
        //获取验证类
        $validate = validate("User")->scene("phonelogin");//验证场景
        //验证数据
        if (!$validate->check($data)){
            //错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        $tel = $data["tel"];
        $code=$data["code"];
        $telcode=$data["telcode"];
        //实例化model层
        $model = new UserModel();
        $result = $model->phonelogin($tel);
        if (!$result) return returnData(1,"当前账户不存在");
        if ($tel==$result["tel"]&&$code==$telcode){
            //密码正确  设置cookie 保存电话、id
            //存入cookie
            $user=[
                "username"  =>$result["tel"],
                "id"=>$result["Id"]
            ];
            cookie('user', $user, 3600);
            return returnData(0,"登录成功");
        }
        return returnData(1,"验证码错误");
    }
    /**
     *发送短信
     */
    public function sendmsg (){
        $resquest = Request::instance();
        $tel = $resquest->param("tel","","strip_tags");
        $sendcode=rand(1000,9999);
//        $msg=$this->sendmsgApi($tel,$sendcode);
        echo returnData(0,"发送成功",$sendcode);
    }
    public function sendmsgApi($_tel,$sendcode){
        require EXTEND_PATH."lib/tel/YunpianAutoload.php";
        $smsOperator=new SmsOperator();
        $data["mobile"]=$_tel;
//        $data["text"]='【小久测试的短信】您的验证码是'.$sendcode.'。如非本人操作，请忽略本短信';
        $data["text"]='【董真1】您的验证码是'.$sendcode.'。如非本人操作，请忽略本短信';
        $result=$smsOperator->single_send($data);
        $code=$result->responseData["code"];
        $msg=$result->responseData["msg"];
        return $msg;
    }
    /**
     *退出登录
     */
    public function login_out (){
        //清除cookie
        cookie('user', null);
        $this->redirect("index/user/login");//直接跳转
    }
}