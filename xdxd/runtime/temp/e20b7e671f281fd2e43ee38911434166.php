<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/usr/share/nginx/html/xdxd/public/../application/admin/view/user/login.html";i:1558059475;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/static/common/img/favicon.ico">
    <title>鲜道先得后台系统</title>
    <!------------style.css   背景css------------------->
    <link rel="stylesheet" type="text/css" href="/static/admin/css/user/login/style.css" />
    <!----------------reset.css  登录框的css--------->
    <link rel="stylesheet" type="text/css" href="/static/admin/css/user/login/reset.css" />
    <!--------------------------------------------------------------------------------->
    <link rel="stylesheet" type="text/css" href="/static/admin/css/user/login/login.css" />

    <link rel="stylesheet" type="text/css" href="/static/common/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/static/common/css/bootstrap-theme.css" />
</head>
<body>
<div id="particles-js">
    <div class="login">
        <div class="login-top" style="text-align:center;">
            <h3>管理员密码登录</h3>
            <hr>
        </div>
        <form id="_form" method="post" action="<?php echo url('admin/user/login'); ?>" enctype="multipart/form-data">
            <div class="login-center clearfix">
                <div class="login-center-img"><img src="/static/admin/img/user/login/name.png"/></div>
                <div class="login-center-input">
                    <input type="text" id="user" name="user" value="" placeholder="请输入您的用户名" onfocus="this.placeholder=''" onblur="this.placeholder='请输入您的用户名'"/>
                    <div class="login-center-input-text">用户名</div>
                </div>
                <span class="error"></span>
            </div>
            <div class="login-center clearfix">
                <div class="login-center-img"><img src="/static/admin/img/user/login/password.png"/></div>
                <div class="login-center-input">
                    <input type="password" id="pwd" name="pwd" value="" placeholder="请输入您的密码" onfocus="this.placeholder=''" onblur="this.placeholder='请输入您的密码'"/>
                    <div class="login-center-input-text">密码</div>
                </div>
                <span class="error"></span>
            </div>
            <div>
                <!-----------表单令牌的验证------------->
                <input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
            </div>

            <div class="login-button">
                <input class="sub_btn" type="submit" value="登录">
            </div>
        </form>
    </div>
    <div class="sk-rotating-plane"></div>
</div>
</body>
<script>
    var _url="<?php echo url('admin/index/index'); ?>";
    console.log(_url);
</script>
<!-- scripts -->
<script type="text/javascript" src="/static/admin/js/user/login/particles.min.js"></script>
<!--------------app.js   浮点特效-------------------->
<script type="text/javascript" src="/static/admin/js/user/login/app.js"></script>
<!--输入框特效-->
<script type="text/javascript" src="/static/admin/js/user/login/view_login.js"></script>

<script type="text/javascript" src="/static/common/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/static/common/js/bootstrap.js"></script>
<script type="text/javascript" src="/static/common/js/jquery.validate-1.13.1.js"></script>
<script type="text/javascript" src="/static/common/js/messages_zh.min.js"></script>
<script type="text/javascript" src="/static/common/js/jquery.form.js"></script>
<script type="text/javascript" src="/static/common/layer/layer.js"></script>
<script type="text/javascript" src="/static/index/login/js/alert.js"></script>
<script type="text/javascript" src="/static/admin/js/user/login/login.js"></script>


</html>