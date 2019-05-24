<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:83:"/usr/share/nginx/html/xdxd/public/../application/admin/view/activity/turntable.html";i:1557822330;s:66:"/usr/share/nginx/html/xdxd/application/admin/view/common/meta.html";i:1550898692;s:68:"/usr/share/nginx/html/xdxd/application/admin/view/common/header.html";i:1555570256;s:66:"/usr/share/nginx/html/xdxd/application/admin/view/common/menu.html";i:1555502150;s:68:"/usr/share/nginx/html/xdxd/application/admin/view/common/footer.html";i:1551351184;}*/ ?>
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

<title> xdxd - 幸运抽奖 </title>
<style>
	.list_lh{ height:300px; overflow:hidden;width: 90%;font-size:12px;
		margin: auto;}
	.list_lh li{ padding:10px;background: #e5e5e5;border-bottom:1px solid #fff;}
</style>
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
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 活动管理 <span class="c-gray en">&gt;</span> 幸运抽奖 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article row">
		<article class="cl pd-20 col-xs-8 col-sm-8 col-md-8">
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
					<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
						<i class="Hui-iconfont">&#xe6e2;</i> 批量删除
					</a>
				</span>
				<span class="r">共有数据：<strong>54</strong> 条</span>
			</div>
			<table class="table table-border table-bordered table-bg table-sort">
				<thead>
					<tr>
						<th class="text-c" scope="col" colspan="7">奖项列表</th>
					</tr>
					<tr class="text-c">
						<th><input type="checkbox" name="" value=""></th>
						<th>ID</th>
						<th>奖品等级</th>
						<th>奖品</th>
						<th>奖品数量</th>
						<th>奖品概率</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
				<?php if(is_array($tList) || $tList instanceof \think\Collection || $tList instanceof \think\Paginator): $i = 0; $__LIST__ = $tList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tl): $mod = ($i % 2 );++$i;?>
					<tr class="text-c">
						<td><input type="checkbox" value="<?php echo $tl['Id']; ?>" name=""></td>
						<td><?php echo $tl['Id']; ?></td>
						<td><?php echo $tl['level']; ?></td>
						<td><?php echo $tl['award']; ?></td>
						<td><?php echo $tl['num']; ?></td>
						<td><?php echo $tl['possibility']; ?></td>
						<td>
							<a style="text-decoration:none" class="ml-5" onClick="product_edit('抽奖编辑','<?php echo url('activity/turntableEdit'); ?>?id=<?php echo $tl['Id']; ?>','<?php echo $tl['Id']; ?>','','310')" href="javascript:;" title="编辑">
								<i class="Hui-iconfont">&#xe6df;</i>
							</a>
							<a style="text-decoration:none" class="ml-5" onClick="product_del(this,'10001')" href="javascript:;" title="删除">
								<i class="Hui-iconfont">&#xe6e2;</i>
							</a>
						</td>
					</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</article>
		<div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 3%;height: 600px;background-color: #F5FAFE;border-radius: 5px;padding: 10px;overflow: auto;">
			<div style="margin: auto;text-align:center;">
				<h3>中奖用户名单</h3>

				<div style="margin-top: 30px;">
					<p>
						<span>用户</span>
						<span style="margin: 10px 30% 10px 15%">手机号</span>
						<span>奖品</span>
					</p>
					<div class="list_lh">
						<ul>
							<?php if(is_array($tUser) || $tUser instanceof \think\Collection || $tUser instanceof \think\Paginator): $i = 0; $__LIST__ = $tUser;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tu): $mod = ($i % 2 );++$i;?>
							<li>
								<p class="row">
									<span class="col-xs-3 col-sm-3"><?php echo $tu['username']; ?></span>
									<span class="col-xs-4 col-sm-4"><?php echo $tu['tel']; ?></span>
									<span class="col-xs-5 col-sm-5">抽到了<?php echo $tu['award']; ?></span>
								</p>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
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

    $(document).ready(function(){
        $('.list_lh li:even').addClass('lieven');
    });
    $(function(){
        $("div.list_lh").myScroll({
            speed:40, //数值越大，速度越慢
            rowHeight:68 //li的高度
        });
    });
    (function($){
        $.fn.myScroll = function(options){
            //默认配置
            var defaults = {
                speed:40,  //滚动速度,值越大速度越慢
                rowHeight:24 //每行的高度
            };
            var opts = $.extend({}, defaults, options),intId = [];

            function marquee(obj, step){
                obj.find("ul").animate({
                    marginTop: '-=1'
                },0,function(){
                    var s = Math.abs(parseInt($(this).css("margin-top")));
                    if(s >= step){
                        $(this).find("li").slice(0, 1).appendTo($(this));
                        $(this).css("margin-top", 0);
                    }
                });
            }
            this.each(function(i){
                var sh = opts["rowHeight"],speed = opts["speed"],_this = $(this);
                intId[i] = setInterval(function(){
                    if(_this.find("ul").height()<=_this.height()){
                        clearInterval(intId[i]);
                    }else{
                        marquee(_this, sh);
                    }
                }, speed);
                _this.hover(function(){
                    clearInterval(intId[i]);
                },function(){
                    intId[i] = setInterval(function(){
                        if(_this.find("ul").height()<=_this.height()){
                            clearInterval(intId[i]);
                        }else{
                            marquee(_this, sh);
                        }
                    }, speed);
                });
            });
        }
    })(jQuery);


    $('.table-sort').dataTable({
        "aaSorting": [[ 1, "asc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            {"orderable":false,"aTargets":[0,3,6]}// 制定列不参与排序
        ]
    });
    /*图片-删除*/
    function product_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});
        });
    }
    /*图片-编辑*/
    function product_edit(title,url,id,w,h){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>