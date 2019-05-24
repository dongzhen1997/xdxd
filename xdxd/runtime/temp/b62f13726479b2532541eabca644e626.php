<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:85:"/usr/share/nginx/html/xdxd/public/../application/admin/view/classify/classifyAdd.html";i:1555578674;s:66:"/usr/share/nginx/html/xdxd/application/admin/view/common/meta.html";i:1550898692;s:68:"/usr/share/nginx/html/xdxd/application/admin/view/common/footer.html";i:1551351184;}*/ ?>
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

<title> xdxd - 添加分类</title>
</head>
<body>
<article class="cl pd-20">
	<form action="<?php echo url('Classify/classifyAdd'); ?>" method="post" class="form form-horizontal" id="form-member-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">分类名：</label>
			<div class="formControls col-xs-6 col-sm-5">
				<input type="text" class="input-text" value="" placeholder="" id="c_name" name="c_name">
				<input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">分类状态：</label>
			<div class="formControls col-xs-6 col-sm-5 skin-minimal">
				<div class="radio-box">
					<input name="c_status" type="radio" id="c_status-1" value="1" checked>
					<label for="c_status-1">普通分类</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="c_status-2" name="c_status" value="2">
					<label for="c_status-2">首页推广</label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-6 col-sm-5 col-xs-offset-4 col-sm-offset-3">
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

<script type="text/javascript" src="/static/admin/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-member-add").validate({
		rules:{
            c_name:{
				required:true,
                maxlength:10
			},
            c_status:{
				required:true,
                maxlength:1
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
                        parent.$('.btn-refresh').click();
                        parent.layer.close(index);
                    }
                });
            });
		}
	});
});
</script>
</body>
</html>