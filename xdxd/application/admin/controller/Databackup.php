<?php
/**
 * Created by PhpStorm.
 * User: 10259
 * Date: 2019/4/22
 * Time: 16:53
 */
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Session;
use \tp5er\Backup;

class Databackup extends Controller
{
    public function backupList()
    {
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

        $config=config("backup");
        $db= new Backup($config);
        $db=$db->fileList();
        $d_count = count($db);
        $t_data["c_count"] =$d_count;
        $i=0;
        foreach ($db as $k=>$v){
            $i++;
            $db[$k]["filename"]=date("Ymd-His-1",$v["time"]).".sql";
            $db[$k]["createtime"]=date("Y-m-d H:i:s",$v["time"]);
            $db[$k]["index"]=$i;
        }
        $t_data["datalist"]=$db;
        return $this->fetch("backup/backup",$t_data);
    }
    public function backup(){
        $config=config("backup");
        $db= new Backup($config);
        $tables=$db->dataList();
        foreach($tables as $k=>$v){
            $db->backup($v['name'],0);
        }
        echo returnData(0,"备份成功");
    }
    public function backupdel(){
        $config=config("backup");
        $db= new Backup($config);
        $resquest = Request::instance();
        $data = $resquest->post();//接收收据
        $time=$data["time"];
        $db->delFile($time);
        echo returnData(0,"删除成功");
    }
    public function restore(){
        $config=config("backup");
        $resquest = Request::instance();
        $data = $resquest->post();//接收收据
        $time=$data["time"];
        $db= new Backup($config);
        $db=$db->import(0,$time);
        echo returnData(0,"还原成功");
    }
    public function download(){
        $config=config("backup");
        $db= new Backup($config);
        $resquest = Request::instance();
        $data = $resquest->get();//接收收据
        $time=$data["time"];
        $db->downloadFile($time);
    }
}