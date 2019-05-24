<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/usr/share/nginx/html/xdxd/public/../application/index/view/center/center.html";i:1558230592;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no, email=no" />
    <meta name="keywords" content="鲜道先得">
    <meta name="description" content="鲜道先得">
    <title>鲜道先得</title>
    <link rel="stylesheet" type="text/css" href="/static/index/common/css/core.css" />
    <link rel="stylesheet" type="text/css" href="/static/index/common/css/home.css" />
    <script type="text/javascript" src="/static/index/common/js/react.js"></script>
    <link rel="icon" type="image/x-icon" href="/static/common/img/favicon.ico">
</head>
<body>
<header class="g-hd m-topnav-space" id="g-hd">
    <div class="m-topnav-wrap">
        <div class=" m-topnav" id="topbar-box">
            <a href="<?php echo url('index/index/index'); ?>">
                <div class="u-topbar-arrow-wrapper">
                    <div class="u-topbar-arrow"></div>
                </div>
            </a>
            <div class="m-topnavbar">
                <span class="tit" id="toptitle">个人中心</span>
            </div>
            <div class="btns">
                <a href="<?php echo url('index/index/index'); ?>" class="u-topbaridx" title="回首页"></a>
                <a href="<?php echo url('index/user/login_out'); ?>" id="j-topLogin" class="u-topbarlogin">
                    <?php if($login): ?>
                        退出
                    <?php else: ?>
                        登录
                    <?php endif; ?>
                </a>
            </div>
        </div>
    </div>
</header>

<div class="g-bd">
    <div class="m-profile">
        <div class="m-avatar">
            <a href="javascript:void(0);">
                <img src="/static/index/common/img/header.jpg" alt="用户头像">
            </a>
        </div>
        <div class="m-username">
            <a href="javascript:void(0);">
                <span class="m-nick"><?php echo $user; ?></span><i class="u-arrow"></i>
            </a>
        </div>
    </div>
    <a href="<?php echo url('index/Orders/orderList'); ?>" class="u-link-item f-border-bottom">
        <div class="u-link-item-inner">
            <div class="u-link-item-left">
                我的订单
            </div>
            <div class="u-link-item-right u-hint">
                <span>查看订单</span><i class="u-arrow"></i>
            </div>
        </div>
    </a>
    <ul class="m-order-items">
        <li class="m-order-item m-order-all">
            <a href="<?php echo url('index/Orders/orderList'); ?>">全部</a>
        </li>
        <li class="m-order-item m-wait-pay">
            <a href="<?php echo url('index/Orders/orderClassify'); ?>?type=1">待付款</a>
        </li>
        <li class="m-order-item m-wait-send">
            <a href="<?php echo url('index/Orders/orderClassify'); ?>?type=2">待发货</a>
        </li>
        <li class="m-order-item m-wait-receive">
            <a href="#">待收货</a>
        </li>
    </ul>

    <!--<a href="#" class="u-link-item f-border-bottom">-->
        <!--<div class="u-link-item-inner">-->
            <!--<div class="u-link-item-left">-->
                <!--我的优惠券-->
            <!--</div>-->
            <!--<div class="u-link-item-right">-->
                <!--<span>0张优惠券</span><i class="u-arrow"></i>-->
            <!--</div>-->
        <!--</div>-->
    <!--</a>-->

    <a href="<?php echo url('index/Address/addressList'); ?>" class="u-link-item f-border-bottom j-downloaditem">
        <div class="u-link-item-inner">
            <div class="u-link-item-left">
               地址管理
            </div>
            <div class="u-link-item-right">
                <i class="u-arrow"></i>
            </div>
        </div>
    </a>
</div>
</body>
</html>
