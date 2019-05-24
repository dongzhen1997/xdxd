<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/usr/share/nginx/html/xdxd/public/../application/admin/view/menu/menuEdit.html";i:1550909296;s:66:"/usr/share/nginx/html/xdxd/application/admin/view/common/meta.html";i:1550898692;s:68:"/usr/share/nginx/html/xdxd/application/admin/view/common/footer.html";i:1551351184;}*/ ?>
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

<title> xdxd - 编辑菜单</title>
</head>
<body>
<article class="cl pd-20 mt-10">
	<form action="<?php echo url('menu/menuEdit'); ?>" method="post" class="form form-horizontal" id="form-member-add">
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-3"><span class="c-red">*</span>栏目名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $mDetail['carte_name']; ?>" placeholder="请输入栏目名称" id="menuname" name="menuname">
				<input type="hidden" name="menuId" value="<?php echo $mDetail['Id']; ?>">
				<input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-3">访问地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $mDetail['carte_url']; ?>" placeholder="请输入访问地址" id="menu_url" name="menu_url">
				<p><span>提示:</span><span class="ml-20">index/index</span><span class="ml-20">模块/方法</span></p>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-3">所属分类：</label>
			<div class="formControls col-xs-3 col-sm-3">
				<span class="select-box">
					<select class="select" size="1" name="menu1" id="menu1">
						<option value="" selected>一级菜单</option>
					</select>
				</span>
			</div>
			<div class="formControls col-xs-3 col-sm-3">
				<span class="select-box" style="display:none;">
					<select class="select" size="1" name="menu2" id="menu2"></select>
				</span>
			</div>
			<div class="formControls col-xs-3 col-sm-3">
				<span class="select-box" style="display:none;">
					<select class="select" size="1" name="menu3" id="menu3"></select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-3">选择一级分类图标：</label>
			<div class="formControls col-xs-3 col-sm-3">
				<span class="select-box">
					<select class="select" size="1" name="menuico" id="menuico" style="height:22px;font-family: 'FontAwesome', Helvetica;">
						<option value="" selected>选择图标</option>
                        <option value=""><i>&#xf26e;</i>图标1</option>
                        <option value=""><i>&#xf2b9;</i>图标2</option>
                        <option value=""><i>&#xf0f9;</i>图标3</option>
                        <option value=""><i>&#xf13d;</i>图标4</option>
                        <option value=""><i>&#xf209;</i>图标5</option>
                        <option value=""><i>&#xf17b;</i>图标6</option>
                        <option value=""><i>&#xf179;</i>图标7</option>
                        <option value=""><i>&#xf24e;</i>图标8</option>
					</select>
				</span>
			</div>
		</div>
		<div class="row cl" style="margin-top: 60px">
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
<script type="text/javascript" src="/static/admin/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){

    /*******************分类三级联动*****************************/
    var menustr = <?php echo $menul; ?>;//接收数据
	// console.log(menustr);
    var fristMenu = [];//一级分类
    var secondMenu = [];//二级分类
    var thirdMenu =[];//三级分类
	for (var i=0;i<menustr.length;i++) {
		if (menustr[i].status == 1) {
            fristMenu.push(menustr[i]);
		}else if (menustr[i].status == 2) {
            secondMenu.push(menustr[i]);
		}else if (menustr[i].status == 3) {
            thirdMenu.push(menustr[i]);
        }
	}
	//获取select标签
	var menu1 = document.getElementById("menu1");
    var menu2 = document.getElementById("menu2");
    var menu3 = document.getElementById("menu3");
    var menuhidden =document.getElementById("menuhidden");
    for (var i in fristMenu) {
		var opt = document.createElement("option");
		opt.innerText = fristMenu[i].carte_name;
		opt.setAttribute("value", fristMenu[i].Id);
		opt.setAttribute("pId", fristMenu[i].parentId);
        menu1.appendChild(opt);
	}
    //给一级菜单添加change事件，选择菜单，获取二级分类
    menu1.onchange = function(){
        //获取一级菜单ID
        var fid = menu1.value;
        //先清除原来的数据
        menu2.parentNode.style.display = "block";

        menu2.innerHTML = "<option value=''>二级菜单</option>";

        menu3.parentNode.style.display = "none";
        menu3.innerHTML = "";
        if (menu1.getAttribute("value") == "") {
            menu2.parentNode.style.display = "none";
        }
        //根据一级分类id获取 二级分类列表(遍历一级分类去匹配)
        for(var i in secondMenu){
			if(secondMenu[i].parentId == fid){
				var opt = document.createElement("option");
				opt.innerText = secondMenu[i].carte_name;
				opt.setAttribute("value", secondMenu[i].Id);
                opt.setAttribute("pId", secondMenu[i].parentId);
                menu2.appendChild(opt);
			}
        }
    }
    //给二级分类添加change事件，选择二级菜单，获取三级分类
    menu2.onchange = function(){
        //获取二级菜单ID
        var sid = menu2.value;
        //先清除原来的数据
        menu3.parentNode.style.display = "block";
        menu3.innerHTML = "<option value=''>三级菜单</option>";
        //根据二级分类ID获取三级分类列表
        for(var i in thirdMenu){
            if(thirdMenu[i].parentId == sid){
                var opt = document.createElement("option");
                opt.innerText = thirdMenu[i].carte_name;
                opt.setAttribute("value", thirdMenu[i].Id);
                opt.setAttribute("pId", thirdMenu[i].parentId);
                menu3.appendChild(opt);
            }
        }
    }

	/***************************************************/
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-member-add").validate({
		rules:{
			menuname : {
				required:true,
				minlength:2,
				maxlength:10
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
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>