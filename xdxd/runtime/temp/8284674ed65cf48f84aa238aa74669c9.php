<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"/usr/share/nginx/html/xdxd/public/../application/index/view/user/phonelogin.html";i:1558084511;s:66:"/usr/share/nginx/html/xdxd/application/index/view/user/footer.html";i:1557989264;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>手机登录</title>
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
            <h2>手机登录</h2>
        </div>
        <div class="aui-jop-top">
            <div class="aui-jop-top-box">
                <form action="<?php echo url('index/user/phonelogin'); ?>" method="post">
                    <div class="aui-flex b-line">
                        <div class="aui-form-item">
                            <img src="/static/index/login/img/iphone.png">
                        </div>
                        <div class="aui-flex-box">
                            <input type="text" placeholder="请输入手机号码" name="tel">
                        </div>
                    </div>
                    <div class="aui-flex b-line">
                        <div class="aui-form-item">
                            <img src="/static/index/login/img/psd.png">
                        </div>
                        <div class="aui-flex-box">
                            <input type="text" placeholder="请输入验证码" name="code">
                        </div>
                        <div class="aui-psd">
                            <a href="javascript:void(0);" onclick="sendSns()">发送验证码</a>
                        </div>
                    </div>
                    <div class="aui-form-button">
                        <input class="sd" type="submit" value="登录">
                    </div>
                    <div class="aui-register aui-register-a">
                        <a href="<?php echo url('index/User/login'); ?>" style="max-width: 22%;margin: auto;">用户名登录</a>
                    </div>
                    <input type="hidden"name="__token__"value="<?php echo \think\Request::instance()->token(); ?>"/>
                    <input type="hidden"name="telcode" value="">
                </form>
            </div>
        </div>
        <div class="aui-register">
            <div style="max-width: 15%;margin: auto;height: 30px;">
                <a href="<?php echo url('index/User/regist'); ?>" style="margin: -18px;">注册账号</a>
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


<script type="text/javascript" src="/static/common/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/static/common/js/jquery.validate-1.13.1.js"></script>
<script type="text/javascript" src="/static/common/js/messages_zh.min.js"></script>
<script type="text/javascript" src="/static/common/js/jquery.form.js"></script>
<script type="text/javascript" src="/static/common/layer/layer.js"></script>
<script type="text/javascript" src="/static/index/login/js/alert.js"></script>
<script>
function sendSns(){
    var tel=$("input[name='tel']").val();
    $.ajax({
        url:"<?php echo url('index/user/sendmsg'); ?>",
        type:"post",
        dataType:"json",
        data:{
            tel:tel
        },
        success:function(data){
            var code=data["code"];
            if(code==0){
                var other=data["param"];
                layer.alert(data["msg"], {
                    skin: 'layui-layer-molv' //样式类名
                    ,closeBtn: 0
                }, function(){
                    layer.closeAll();
                });
                $("input[name='telcode']").val(other);
                console.log($("input[name='telcode']").val())
            }else{
                dialog.error(JSON.parse(data)["msg"]);
            }
        }
    })
}
var validator = $("form").validate({
    rules:{
        tel:{
            required:true,
            minlength:11,
            maxlength:11
        },
        code:{
            required:true,
        }
    },
    messages:{
        tel:{
            required:"手机号必填",
        },
        code:{
            required:"验证码必填",
        }
    },
    submitHandler:function(form){
        $("form").ajaxSubmit(function (data) {
            var obj = JSON.parse(data);
            if (obj["code"]==0) {
                dialog.success(obj["msg"],"<?php echo url('index/index/index'); ?>");
            }else{
                dialog.error(obj["msg"]);
            }
        })
    }
});
</script>
</body>
</html>