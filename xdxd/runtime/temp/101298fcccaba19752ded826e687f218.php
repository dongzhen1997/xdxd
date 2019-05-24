<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:78:"/usr/share/nginx/html/xdxd/public/../application/admin/view/backup/backup.html";i:1558185004;s:66:"/usr/share/nginx/html/xdxd/application/admin/view/common/meta.html";i:1550898692;s:68:"/usr/share/nginx/html/xdxd/application/admin/view/common/header.html";i:1555570256;s:66:"/usr/share/nginx/html/xdxd/application/admin/view/common/menu.html";i:1555502150;s:68:"/usr/share/nginx/html/xdxd/application/admin/view/common/footer.html";i:1551351184;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/static/admin/favicon.ico" >
    <link rel="Shortcut Icon" href="/static/admin/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/static/admin/hui/lib/html5.js"></script>
    <script type="text/javascript" src="/static/admin/hui/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui.admin/css/style.css" />
    <!--------自己导入的图标库  font-awesome----------->
    <link rel="stylesheet" href="/static/common/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
<!--/meta 作为公共模版分离出去-->

<title> xdxd - 数据库备份 </title>
</head>
<body>
<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl">
            <a class="logo navbar-logo f-l mr-10 hidden-xs" href="<?php echo url('admin/index/index'); ?>">鲜道先得</a>
            <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="<?php echo url('admin/index/index'); ?>">鲜道先得</a>
            <span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.0</span>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <nav class="nav navbar-nav">
                <ul class="cl">
                    <li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A">
                        <i class="Hui-iconfont">&#xe600;</i> 功能预览
                        <i class="Hui-iconfont">&#xe6d5;</i>
                    </a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <?php if(is_array($role_data['fData']) || $role_data['fData'] instanceof \think\Collection || $role_data['fData'] instanceof \think\Paginator): $i = 0; $__LIST__ = $role_data['fData'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fl): $mod = ($i % 2 );++$i;?>
                            <li>
                                <a href="javascript:;" onclick="article_add('<?php echo $fl['carte_name']; ?>','#')">
                                    <i class="Hui-iconfont"><?php echo $fl['iconame']; ?></i><?php echo $fl['carte_name']; ?>
                                </a>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>
                        <?php if($roleName == "超级管理员"): ?>
                        <!--图标-->
                        <i class="Hui-iconfont" style="font-size:18px;">&#xe6d3;</i>
                        <?php else: ?>
                        <!--图标-->
                        <i class="Hui-iconfont" style="font-size:20px;">&#xe72c;</i>
                        <?php endif; ?>
                        <?php echo $roleName; ?>
                    </li>

                    <li class="dropDown dropDown_hover">
                        <a href="#" class="dropDown_A"><?php echo $user; ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
                            <li><a href="<?php echo url('admin/user/login_out'); ?>">切换账户</a></li>
                            <li><a href="<?php echo url('admin/user/login_out'); ?>">退出</a></li>
                        </ul>
                    </li>

                    <li id="Hui-skin" class="dropDown right dropDown_hover">
                        <a href="javascript:;" class="dropDown_A" title="换肤">
                            <i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i>
                        </a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">
        <?php if(is_array($role_data['fData']) || $role_data['fData'] instanceof \think\Collection || $role_data['fData'] instanceof \think\Paginator): $i = 0; $__LIST__ = $role_data['fData'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$FL): $mod = ($i % 2 );++$i;?>
        <dl id="menu-<?php echo $FL['carteId']; ?>">
            <dt>
                <i class="Hui-iconfont"><?php echo $FL['iconame']; ?></i> <?php echo $FL['carte_name']; ?>
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>
            <dd>
                <ul>
                    <?php if(is_array($role_data['sData']) || $role_data['sData'] instanceof \think\Collection || $role_data['sData'] instanceof \think\Paginator): $i = 0; $__LIST__ = $role_data['sData'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$SL): $mod = ($i % 2 );++$i;if($SL['parentId'] == $FL['carteId']): ?>
                    <li>
                        <a href="<?php if($SL['carte_url'] != null): ?> <?php echo url($SL['carte_url']); endif; ?>" title="<?php echo $SL['carte_name']; ?>"><?php echo $SL['carte_name']; ?></a>
                    </li>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </dd>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<!--/_menu 作为公共模版分离出去-->

<section class="Hui-article-box">
    <!---路径导航---->
    <nav class="breadcrumb">
        <i class="Hui-iconfont"></i>
        <a href="<?php echo url('admin/index/index'); ?>" class="maincolor">首页</a>
        <span class="c-999 en">&gt;</span>
        <span class="c-777">系统管理</span>
        <span class="c-999 en">&gt;</span>
        <span class="c-999">数据库备份</span>
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <div class="Hui-article">
        <article class="cl pd-20">
            <div class="cl pd-5 bg-1 bk-gray">
                <a class="btn btn-primary radius" onclick="databackup_add()" href="javascript:;">
                    <i class="Hui-iconfont">&#xe600;</i> 添加备份
                </a>
                <span class="r">共有数据：<strong><?php echo $c_count; ?></strong> 条</span>
            </div>
            <div class="mt-20">
                <table class="table table-hover table-border table-bordered table-bg table-sort">
                    <thead>
                    <tr class="text-c">
                        <th>
                            <input type="checkbox">
                        </th>
                        <th>编号</th>
                        <th>备份数据名称</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($datalist) || $datalist instanceof \think\Collection || $datalist instanceof \think\Paginator): $i = 0; $__LIST__ = $datalist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr class="text-c">
                        <td><input type="checkbox" value="" key="k" name=""></td>
                        <td><?php echo $vo['index']; ?></td>
                        <td><?php echo $vo['filename']; ?></td>
                        <td><?php echo $vo['createtime']; ?></td>
                        <td class="td-manage">
                            <a title="还原" href="javascript:;" onclick="databackup_restore(<?php echo $vo['time']; ?>)" class="ml-5" style="text-decoration:none">
                                <i class="Hui-iconfont">&#xe6df;</i>
                            </a>
                            <a style="text-decoration:none" class="ml-5" onClick="databackup_download(<?php echo $vo['time']; ?>)" href="javascript:;" title="下载">
                                <i class="Hui-iconfont">&#xe63f;</i>
                            </a>
                            <a title="删除" href="javascript:;" onclick="databackup_del(<?php echo $vo['time']; ?>,this)" class="ml-5" style="text-decoration:none">
                                <i class="Hui-iconfont">&#xe6e2;</i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </article>
    </div>
</section>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/admin/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/admin/hui/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/admin/hui/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<script>
    /*个人信息*/
    function myselfinfo(){
        layer.open({
            type: 1,
            area: ['300px','200px'],
            fix: false, //不固定
            maxmin: true,
            shade:0.4,
            title: '查看信息',
            content: '<div><div>用户：</div><div>权限：</div> --- 管理员信息</div>'
        });
    }
</script>
<!--/_footer /作为公共模版分离出去-->
<script type="text/javascript" src="/static/admin/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/static/index/login/js/alert.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    $(function(){
        $('.table-sort').dataTable({
            "aaSorting": [[ 1, "asc" ]],//默认第几个排序
            "bStateSave": true,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable":false,"aTargets":[2,3,4]}// 制定列不参与排序
            ]
        });
    });
    function databackup_add() {
        layer.confirm('确认添加？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.ajax({
                url:"<?php echo url('admin/Databackup/backup'); ?>",
                type:"get",
                dataType:"json",
                success:function(data){
                    if(data["code"]==0){
                        window.location.reload();
                    }
                }
            });
        });
    }
    function databackup_del(time,_this) {
        layer.confirm('确认删除？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.ajax({
                url:"<?php echo url('admin/Databackup/backupdel'); ?>",
                type:"post",
                dataType:"json",
                data:{
                    time,
                },
                success:function(data){
                    if(data["code"]==0){
                        $(_this).parents(".text-c").remove();
                        window.location.reload();
                    }
                }
            });
        })
    }
    function databackup_download(time) {
        location.href="<?php echo url('admin/Databackup/download'); ?>?time="+time;
    }
    function databackup_restore(time) {
        $.ajax({
            url:"<?php echo url('admin/Databackup/restore'); ?>",
            type:"post",
            dataType:"json",
            data:{
                time,
            },
            success:function(data){
                if(data["code"]==0){
                    layer.msg(data["msg"],{icon: 6,time:1000});
                }
            }
        });
    }
</script>
</body>
</html>