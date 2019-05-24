<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"/usr/share/nginx/html/xdxd/public/../application/admin/view/admin/adminAdd.html";i:1550922808;s:66:"/usr/share/nginx/html/xdxd/application/admin/view/common/meta.html";i:1550898692;s:68:"/usr/share/nginx/html/xdxd/application/admin/view/common/footer.html";i:1551351184;}*/ ?>
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

<title> xdxd - 添加管理员</title>
</head>
<body>
<article class="cl pd-20">
	<form action="<?php echo url('admin/adminAdd'); ?>" method="post" class="form form-horizontal" id="form-admin-add" enctype="multipart/form-data">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="请输入用户名" id="adminName" name="adminName">
				<input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="repassword" name="repassword">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>真实姓名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="请输入真实姓名" id="trueName" name="trueName">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="sex" type="radio" id="sex-1" value="0" checked>
					<label for="sex-1">男</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="sex" value="1">
					<label for="sex-2">女</label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="请输入手机号" id="phone" name="phone">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>身份证号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="请输入身份证号" id="idcard" name="idcard">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="@" name="email" id="email">
			</div>
		</div>
		<div class="row cl" style="height: 100px">
			<label class="form-label col-xs-4 col-sm-3">用户头像：</label>
			<div class="formControls col-xs-6 col-sm-6">
				<!--隐藏域限制文件大小-&#45;&#45;1000为1000字节即1k，2000000即2000k=2M-->
				<input type="hidden" name="MAX_FILE_SIZE" value="20000000">
				<input type="file" class="input-text pos-a" id="headimg" name="headimg" style="width: 100px;height: 100px;z-index: 999;opacity: 0">
				<img src="/static/admin/img/member/upLoad.png" class="pos-a" style="width: 100px;height: 100px;">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">角色：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box" style="width:150px;">
					<select class="select" name="adminRole" size="1">
						<option value="" selected>选择角色</option>
						<?php if(is_array($rlist) || $rlist instanceof \think\Collection || $rlist instanceof \think\Paginator): $i = 0; $__LIST__ = $rlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $ro['Id']; ?>"><?php echo $ro['role']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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
    //获取图片地址
    $("#headimg").change(function(){
        var imgTag=$(this).next("img");
        var imgFile=this.files.item(0);
        var _url=window.URL.createObjectURL(imgFile);  //获取地址
        imgTag.attr("src",_url);
    });
    /***************/
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{
			adminName:{
				required:true,
				minlength:2,
				maxlength:10
			},
			password:{
				required:true,
                minlength:3,
                maxlength:6
			},
            repassword:{
				required:true,
                minlength:3,
                maxlength:6,
				equalTo: "#password"
			},
            trueName : {
                required:true,
                minlength:2,
                maxlength:10
			},
			sex:{
				required:true,
			},
			phone:{
				required:true,
                minlength:11,
                maxlength:11,
				isPhone:true,
			},
            idcard : {
                required:true,
                minlength:18,
                maxlength:19,
			},
			email:{
				required:true,
				email:true,
			},
			adminRole:{
				required:true,
			},
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
                        parent.$('.btn-refresh').click();
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