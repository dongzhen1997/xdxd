<?php
/**
 * Created by PhpStorm.
 * User: 97394
 * Date: 2019/2/20
 * Time: 0:33
 */
namespace app\admin\controller;
use think\Controller;
use think\Request;
use OSS\Core\OssException;
use OSS\OssClient;
use think\Image;
use \app\admin\model\Goods as GoodsModel;

class Goods extends Controller
{
    /**
     * 商品列表
     * @return mixed
     */
    public function goodsList () {
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
        $model =new GoodsModel();
        //获取商品信息
        $glist = $model->goodsList();
        $t_data["glist"] = $glist;
        //获取分类信息
        $clist = $model->classifyList();
        $t_data["clist"] = $clist;
        //获取数据长度
        $g_count = count($glist);
        $t_data["g_count"] = $g_count;
        return $this->fetch("goods/goodsList",$t_data);
    }

    /**
     *获取分类名
     */
    public function getClassifyName ($clist,$cid){
        foreach ($clist as $c){
            if (in_array($cid,$c)){
                return $c["classify_name"];
            }
        }
    }
    /**
     *商品详情
     */
    public function goodsShow (){
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
        $data = $resquest->get("gid",",","strip_tags");
        $gid = judgeType($data,"int");
        //实例化model层
        $model =new GoodsModel();
        //获取商品信息
        $gDetail = $model->goodsShow($gid);
        return $this->fetch("goods/goodsShow",["gDetail" => $gDetail]);
    }
    /**
     *添加商品
     */
    public function goodsAdd (){
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
        //实例化model层
        $model =new GoodsModel();
        //获取数据
        $data = $resquest->post();
        //验证数据传输
        if (empty($data)){
            //若为空   渲染界面
            //获取商品分类信息
            $clist = $model->classifyList();
            return $this->fetch("goods/goodsAdd",["clist" => $clist]);
        }
        //获取验证类  验证场景
        $validate = validate("Goods")->scene("goodsAdd");
        //验证数据
        if (!$validate->check($data)){
            //错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        //验证上传文件
        $file = \request()->file("thumb");//获取表单上传文件
        if (!empty($file)){
            //不为空  验证文件  并移动到 public/uploads 目录下
//            $imgType = config("imgType");//获取配置文件
//            $info = $file->validate(['size'=>20000000,'ext' => $imgType]);//验证
            $resResult = Image::open($file);
//            ->move(ROOT_PATH . 'public' . DS . 'static' . DS .'uploads'. DS .'admin');//移动
//            if($info){
//                // 成功上传后 获取上传信息
//                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
//
//                $thumb =  $info->getSaveName();
//                $data["thumb"] = $thumb;
//            }else{
//                // 上传失败获取错误信息
//                echo $file->getError();
//            }
            try {
                $config = config('aliyun_oss'); //获取Oss的配置
                //实例化对象 将配置传入
                $ossClient = new OssClient($config['KeyId'], $config['KeySecret'], $config['Endpoint']);
                //这里是有sha1加密 生成文件名 之后连接上后缀
                $fileName = sha1(date('YmdHis', time()) . uniqid()) . '.' . $resResult->type();
                //执行阿里云上传
                $result = $ossClient->uploadFile($config['Bucket'], $fileName, $file->getInfo()['tmp_name']);

//                $arr = [
//                    '图片地址:' => $result['info']['url'],
//                    '数据库保存名称' => $fileName
//                ];

                $model = new GoodsModel();
                $result = $model->goodsAdd($data,$fileName);
                if ($result){
                    return returnData(0,"上架成功");
                }else{
                    return returnData(1,"失败,请重新操作");
                }
            } catch (OssException $e) {
                return $e->getMessage();
            }
        }
    }
    /**
     *编辑商品
     */
    public function goodsEdit (){
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
        //实例化model层
        $model =new GoodsModel();
        //获取数据
        $data = $resquest->post();
        //验证数据传输
        if (empty($data)){
            //若为空   渲染界面
            //获取商品分类信息
            $clist = $model->classifyList();
            //获取商品信息
            $_id = $resquest->get("id",",","strip_tags");
            $id = judgeType($_id,"int");
            $goodsdetail = $model->getgoods($id);
            return $this->fetch("goods/goodsEdit",["clist" => $clist,"gdetail" => $goodsdetail]);
        }
        //获取验证类  验证场景
        $validate = validate("Goods")->scene("goodsEdit");
        //验证数据
        if (!$validate->check($data)){
            //错误信息
            $msg = $validate->getError();
            return returnData(1,$msg);
        }
        //验证上传文件
        $file = \request()->file("thumb");//获取表单上传文件
        if (!empty($file)){
            //不为空  验证文件  并移动到 public/uploads 目录下
//            $imgType = config("imgType");//获取配置文件
//            $info = $file->validate(['size'=>20000000,'ext' => $imgType])//验证
//            ->move(ROOT_PATH . 'public' . DS . 'static' . DS .'uploads'. DS .'admin');//移动
//            if($info){
//                // 成功上传后 获取上传信息
//                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
//                $thumb =  $info->getSaveName();
//                $data["thumb"] = $thumb;
//            }else{
//                // 上传失败获取错误信息
//                echo $file->getError();
//            }
            $resResult = Image::open($file);
            try {
                $config = config('aliyun_oss'); //获取Oss的配置
                //实例化对象 将配置传入
                $ossClient = new OssClient($config['KeyId'], $config['KeySecret'], $config['Endpoint']);
                //这里是有sha1加密 生成文件名 之后连接上后缀
                $fileName = sha1(date('YmdHis', time()) . uniqid()) . '.' . $resResult->type();
                //执行阿里云上传
                $result = $ossClient->uploadFile($config['Bucket'], $fileName, $file->getInfo()['tmp_name']);
                $model = new GoodsModel();
                $result = $model->goodsEdit($data);
                if ($result){
                    return returnData(0,"编辑成功");
                }else{
                    return returnData(1,"失败,请重新操作");
                }
            } catch (OssException $e) {
                return $e->getMessage();
            }
        }
    }
    /**
     *删除商品
     */
    public function goodsDel (){
        $resquest = Request::instance();
        //接收用户id
        $_id = $resquest->post("id",",","strip_tags");
        $id = judgeType($_id,"int");//验证类型
        //        实例化model层
        $model = new goodsModel();
        $result = $model->goodsDel($id);
        if ($result){
            return "删除成功";
        }
    }
}