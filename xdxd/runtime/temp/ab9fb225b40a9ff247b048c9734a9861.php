<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/usr/share/nginx/html/xdxd/public/../application/index/view/user/regist.html";i:1557984529;s:66:"/usr/share/nginx/html/xdxd/application/index/view/user/footer.html";i:1557989264;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" type="text/css" href="/static/index/login/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/static/index/login/css/type.css" />
    <link rel="icon" type="image/x-icon" href="/static/common/img/favicon.ico">
</head>
<body>
<section class="aui-flexView">
    <section class="aui-scrollView">
        <div class="aui-jop-chang">
            <h2>用户注册</h2>
        </div>
        <div class="aui-jop-top">
            <div class="aui-jop-top-box">
                <form action="<?php echo url('index/user/regist'); ?>"method="post">
                    <div class="aui-flex b-line">
                        <!--<div class="aui-form-item">-->
                        <!--<img src="/static/index/login/img/psd.png" alt="">-->
                        <!--</div>-->
                        <div class="aui-flex-box">
                            <input type="text" placeholder="请输入用户名" name="user">
                        </div>
                    </div>
                    <div class="aui-flex b-line">
                        <!--<div class="aui-form-item">-->
                            <!--<img src="/static/index/login/img/iphone.png" alt="">-->
                        <!--</div>-->
                        <div class="aui-flex-box">
                            <input type="text" placeholder="请输入手机号码" name="tel">
                        </div>
                    </div>
                    <div class="aui-flex b-line">
                        <!--<div class="aui-form-item">-->
                            <!--<img src="/static/index/login/img/psd.png" alt="">-->
                        <!--</div>-->
                        <div class="aui-flex-box">
                            <input type="pwd" placeholder="请输入8-16位密码" name="pwd">
                        </div>
                    </div>
                    <div class="aui-flex b-line">
                        <!--<div class="aui-form-item">-->
                        <!--<img src="/static/index/login/img/psd.png" alt="">-->
                        <!--</div>-->
                        <div class="aui-flex-box">
                            <input type="pwd" placeholder="请再次输入密码" name="repwd">
                        </div>
                    </div>
                    <div class="aui-flex b-line">
                        <!--<div class="aui-form-item">-->
                            <!--<img src="/static/index/login/img/psd.png" alt="">-->
                        <!--</div>-->
                        <div class="aui-flex-box">
                            <input type="text" placeholder="请输入邮箱" name="email">
                        </div>
                    </div>
                    <input type="hidden"name="__token__"value="<?php echo \think\Request::instance()->token(); ?>"/>
                    <div class="aui-form-button">
                        <input class="sd" type="submit" value="注册">
                    </div>
                </form>
            </div>
        </div>
        <div class="aui-register">
            <div style="max-width: 15%;margin: auto;height: 30px;">
                <a href="<?php echo url('index/User/login'); ?>" style="margin: -18px;">返回登录</a>
            </div>
        </div>
    </section>
    <!--_footer 作为公共模版分离出去-->
    <footer class="aui-footer-link">
    <p class="aui-tabBar-item aui-tabBar-item-active" style="width: 40%;margin: auto;padding-bottom: 10px;height: 40px;">
        <a href="<?php echo url('index/index/index'); ?>">
            本网站由鲜道先得提供
        </a>
    </p>
</footer>

    <!--/footer 作为公共模版分离出去-->
</section>

</body>
<script type="text/javascript" src="/static/common/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/static/common/js/jquery.validate-1.13.1.js"></script>
<script type="text/javascript" src="/static/common/js/messages_zh.min.js"></script>
<script type="text/javascript" src="/static/common/js/jquery.form.js"></script>
<script type="text/javascript" src="/static/common/layer/layer.js"></script>
<script type="text/javascript" src="/static/index/login/js/alert.js"></script>
<script>
    var validator = $("form").validate({
        rules:{
            user:{
                required:true,
            },
            tel:{
                required:true,
            },
            pwd:{
                required:true,
            },
            email:{
                required:true,
            }
        },
        messages:{
            user:{
                required:"用户名必填",
            },
            tel:{
                required:"手机号必填",
            },
            pwd:{
                required:"密码必填",
            },
            email:{
                required:"邮箱必填",
            }
        },
        submitHandler:function(form){
            $("form").ajaxSubmit(function (data) {
                var obj = JSON.parse(data);
                if (obj["code"]==0) {
                    dialog.success(obj["msg"],"<?php echo url('index/user/login'); ?>");
                }else{
                    dialog.error(obj["msg"]);
                }
            })
        }
    });
</script>
</html>