<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:80:"/usr/share/nginx/html/xdxd/public/../application/admin/view/order/orderList.html";i:1558005871;s:66:"/usr/share/nginx/html/xdxd/application/admin/view/common/meta.html";i:1550898692;s:68:"/usr/share/nginx/html/xdxd/application/admin/view/common/header.html";i:1555570256;s:66:"/usr/share/nginx/html/xdxd/application/admin/view/common/menu.html";i:1555502150;s:68:"/usr/share/nginx/html/xdxd/application/admin/view/common/footer.html";i:1551351184;}*/ ?>
﻿<!--_meta 作为公共模版分离出去-->
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

<title> xdxd - 订单列表</title>
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
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单管理 <span class="c-gray en">&gt;</span> 订单列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<div class="">
			<div class="pd-20">
				<div class="cl pd-5 bg-1 bk-gray mt-20">
					<span class="l">
						<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
							<i class="Hui-iconfont">&#xe6e2;</i>批量删除
						</a>
						<a class="btn btn-primary radius" onclick="excel()" href="javascript:;">
                    		<i class="Hui-iconfont">&#xe600;</i> 导出excel表格
                		</a>
					</span>
					<span class="r">共有数据：<strong><?php echo $o_count; ?></strong> 条</span>
				</div>
				<div class="mt-20">
					<table class="table table-border table-bordered table-bg table-hover table-sort">
						<thead>
							<tr class="text-c">
								<th>
									<input name="" type="checkbox" value="">
								</th>
								<th>ID</th>
								<th>订单号</th>
								<th>订单金额</th>
								<th>下单时间</th>
								<th>下单用户</th>
								<th>订单状态</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
						<?php if(is_array($olist) || $olist instanceof \think\Collection || $olist instanceof \think\Paginator): $i = 0; $__LIST__ = $olist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ol): $mod = ($i % 2 );++$i;?>
							<tr class="text-c va-m">
								<td><input name="" type="checkbox" value="<?php echo $ol['Id']; ?>"></td>
								<td><?php echo $ol['Id']; ?></td>
								<td>
									<a onClick="product_show('<?php echo $ol['username']; ?>的订单详情','<?php echo url('order/orderShow'); ?>?oid=<?php echo $ol['orderId']; ?>','<?php echo $ol['orderId']; ?>')" href="javascript:;">
										<?php echo $ol['orderId']; ?>
									</a>
								</td>
								<td class="text-c">￥<?php echo $ol['allprice']; ?>元</td>
								<td class="text-c"><?php echo $ol['orderTime']; ?></td>
								<td><?php echo $ol['username']; ?></td>
								<td class="td-status">
									<?php if($ol['status'] == '1'): ?>
									<span class="label label-error radius">未付款</span>
									<?php else: ?>
									<span class="label label-success radius">已支付</span>
									<?php endif; ?>
								</td>
								<td class="td-manage">
									<a style="text-decoration:none" onClick="product_stop(this,'10001')" href="javascript:;" title="冻结">
										<i class="Hui-iconfont">&#xe6de;</i>
									</a>
									<a style="text-decoration:none" class="ml-5" onClick="product_del(this,'10001')" href="javascript:;" title="删除">
										<i class="Hui-iconfont">&#xe6e2;</i>
									</a>
								</td>
							</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
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

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/admin/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
var code;

function showCode(str) {
	if (!code) code = $("#code");
	code.empty();
	code.append("<li>"+str+"</li>");
}


$('.table-sort').dataTable({
	"aaSorting": [[ 1, "asc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  {"orderable":false,"aTargets":[0,2,7]}// 制定列不参与排序
	]
});
/*图片-查看*/
function product_show(title,url,id){
    layer_show(title,url,700,600);
}
/*图片-下架*/
function product_stop(obj,id){
	layer.confirm('确认要冻结吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_start(this,id)" href="javascript:;" title="恢复"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已冻结</span>');
		$(obj).remove();
		layer.msg('已冻结!',{icon: 5,time:1000});
	});
}

/*图片-发布*/
function product_start(obj,id){
	layer.confirm('确认要恢复吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_stop(this,id)" href="javascript:;" title="冻结"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已支付</span>');
		$(obj).remove();
		layer.msg('已恢复!',{icon: 6,time:1000});
	});
}
/*图片-删除*/
function product_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
function excel() {
    location.href="<?php echo url('admin/order/excel'); ?>";
}
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>