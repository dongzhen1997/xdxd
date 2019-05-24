<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"/usr/share/nginx/html/xdxd/public/../application/admin/view/admin/adminRoleAdd.html";i:1551321562;s:66:"/usr/share/nginx/html/xdxd/application/admin/view/common/meta.html";i:1550898692;s:68:"/usr/share/nginx/html/xdxd/application/admin/view/common/footer.html";i:1551351184;}*/ ?>
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

<title> xdxd - 添加网站角色</title>
</head>
<body>
<article class="cl pd-20">
	<form action="<?php echo url('admin/adminRoleAdd'); ?>" method="post" class="form form-horizontal" id="form-admin-role-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="请输入角色名称" id="roleName" name="roleName" datatype="*4-16" nullmsg="用户账户不能为空">
				<input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">角色描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="请输入20字以内角色描述" id="r_describe" name="r_describe">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">网站角色：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<?php if(is_array($carteList) || $carteList instanceof \think\Collection || $carteList instanceof \think\Paginator): $i = 0; $__LIST__ = $carteList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$clist): $mod = ($i % 2 );++$i;?>
				<dl class="permission-list">
					<dt>
						<label>
							<input type="checkbox" value="<?php echo $clist['Id']; ?>" name="menu&<?php echo $clist['Id']; ?>">
							<?php echo $clist['carte_name']; ?></label>
					</dt>
					<?php if(is_array($clist['child']) || $clist['child'] instanceof \think\Collection || $clist['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $clist['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$son): $mod = ($i % 2 );++$i;?>
					<dd>
						<dl class="cl permission-list2">
							<dt>
								<label class="">
									<input type="checkbox" value="<?php echo $son['Id']; ?>" name="menu&<?php echo $son['Id']; ?>">
									<span style="background-color: #9acfea;"><?php echo $son['carte_name']; ?></span>
								</label>
							</dt>
							<?php if($son['child']): ?>
							<div style="margin-top: 25px;margin-left: 80px">
								<?php if(is_array($son['child']) || $son['child'] instanceof \think\Collection || $son['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $son['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$grandson): $mod = ($i % 2 );++$i;?>
								<dl class="cl permission-list3" style="margin-top: 10px">
									<dt>
										<label class="">
											<input type="checkbox" value="<?php echo $grandson['Id']; ?>" name="menu&<?php echo $grandson['Id']; ?>">
											<span style="background-color: #9dc7e7;"><?php echo $grandson['carte_name']; ?></span>
										</label>
									</dt>
									<dd>
										<?php if($grandson['c_add'] == 1): ?>
										<label class="">
											<input type="checkbox" value="1" name="<?php echo $grandson['Id']; ?>add" id="">
											添加
										</label>
										<?php endif; if($grandson['c_edit'] == 1): ?>
										<label class="">
											<input type="checkbox" value="1" name="<?php echo $grandson['Id']; ?>edit" id="">
											修改
										</label>
										<?php endif; if($grandson['c_del'] == 1): ?>
										<label class="">
											<input type="checkbox" value="1" name="<?php echo $grandson['Id']; ?>del" id="">
											删除
										</label>
										<?php endif; if($grandson['c_see'] == 1): ?>
										<label class="">
											<input type="checkbox" value="1" name="<?php echo $grandson['Id']; ?>see" id="">
											查看
										</label>
										<?php endif; if($grandson['c_mind'] == 1): ?>
										<label class="">
											<input type="checkbox" value="1" name="<?php echo $grandson['Id']; ?>mind" id="">
											审核
										</label>
										<?php endif; ?>
									</dd>
								</dl>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
							<?php else: ?>
							<dd>
								<?php if($son['c_add'] == 1): ?>
								<label class="">
									<input type="checkbox" value="1" name="<?php echo $son['Id']; ?>add" id="">
									添加
								</label>
								<?php endif; if($son['c_edit'] == 1): ?>
								<label class="">
									<input type="checkbox" value="1" name="<?php echo $son['Id']; ?>edit" id="">
									修改
								</label>
								<?php endif; if($son['c_del'] == 1): ?>
								<label class="">
									<input type="checkbox" value="1" name="<?php echo $son['Id']; ?>del" id="">
									删除
								</label>
								<?php endif; if($son['c_see'] == 1): ?>
								<label class="">
									<input type="checkbox" value="1" name="<?php echo $son['Id']; ?>see" id="">
									查看
								</label>
								<?php endif; if($son['c_mind'] == 1): ?>
								<label class="">
									<input type="checkbox" value="1" name="<?php echo $son['Id']; ?>mind" id="">
									审核
								</label>
								<?php endif; ?>
							</dd>
							<?php endif; ?>
						</dl>
					</dd>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</dl>
				<?php endforeach; endif; else: echo "" ;endif; ?>

			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button type="submit" class="btn btn-success radius" id="admin-role-save"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
	</form>
</article>

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
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
	});
	
	$("#form-admin-role-add").validate({
		rules:{
			roleName:{
				required:true,
                minlength:2,
                maxlength:10
			},
            r_describe : {
                maxlength:20
			}
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
            $(form).ajaxSubmit(function (data) {
                var data = JSON.parse(data);
                var code = data["code"];
                var msg = data["msg"];
                layer.msg(msg,{
                    time: 0 //不自动关闭
                    ,btn: ['确定', '留在本界面']
                    ,yes: function(index){
                        layer.close(index);
                        //关闭编辑界面
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);
                    }
                });
            });
		}
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>