<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"D:\phpstudy\PHPTutorial\WWW\xdxd\public/../application/index\view\user\login.html";i:1558230745;s:72:"D:\phpstudy\PHPTutorial\WWW\xdxd\application\index\view\user\footer.html";i:1557989264;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>用户登录</title>
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
                    <h2>用户登录</h2>
                </div>
                <div class="aui-jop-top">
                    <div class="aui-jop-top-box">
                        <form action="<?php echo url('index/User/login'); ?>" method="post">
                            <div class="aui-flex b-line">
                                <div class="aui-form-item">
                                    <img src="/static/index/login/img/iphone.png">
                                </div>
                                <div class="aui-flex-box">
                                    <input type="text" placeholder="请输入用户名" name="user">
                                </div>
                            </div>
                            <div class="aui-flex b-line">
                                <div class="aui-form-item">
                                    <img src="/static/index/login/img/psd.png">
                                </div>
                                <div class="aui-flex-box">
                                    <input type="password" placeholder="请输入密码" name="pwd">
                                </div>
                                <div class="aui-psd">
                                    <a href="<?php echo url('index/user/forget'); ?>">忘记密码</a>
                                </div>
                            </div>
                            <div class="aui-form-button">
                                <input class="sd" type="submit" value="登录">
                            </div>
                            <div class="aui-register aui-register-a">
                                <a href="<?php echo url('index/user/phonelogin'); ?>" style="max-width: 20%;margin: auto;">手机登录</a>
                            </div>
                            <input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>"/>
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
                email:{
                    required:true,
                }
            },
            messages:{
                user:{
                    required:"用户名必填",
                },
                email:{
                    required:"邮箱必填",
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
</html>
