<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"/usr/share/nginx/html/xdxd/public/../application/index/view/classify/classify.html";i:1558077144;s:68:"/usr/share/nginx/html/xdxd/application/index/view/common/header.html";i:1554863422;}*/ ?>
<!--_meta 作为公共模版分离出去-->
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
<!--/meta 作为公共模版分离出去-->
<body>
<header class="g-hd m-topnav-space" id="g-hd">
    <div class="m-topnav-wrap">
        <div class=" m-topnav" id="topbar-box">
            <div class="m-topnavbar">
                <span class="tit" id="toptitle">商品分类</span>
                <div class="btns">
                    <a href="<?php echo url('index/index/index'); ?>" class="u-topbaridx" title="回首页"></a>
                    <a href="<?php echo url('index/user/login_out'); ?>" id="j-topLogin" class="u-topbarlogin">
                        <?php if($login): ?>
                        退出
                        <?php else: ?>
                        登录
                        <?php endif; ?>
                    </a>
                    <a href="#" class="dn u-topbaruser usr" id="j-gousrcenter" title="个人中心"></a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="livse-ii">
<ul class="m-resourcelist">
    <li class="item">
        <a href="<?php echo url('index/Classify/choose'); ?>?id=1">
            <img src="/static/index/common/img/rice.png">
            <p class="desc " <?php if($chosen == 1): ?> style="color:red" <?php endif; ?>>精装大米</p>
        </a>
    </li>
    <li class="item">
        <a href="<?php echo url('index/Classify/choose'); ?>?id=2">
            <img src="/static/index/common/img/box.png">
            <p class="desc" <?php if($chosen == 2): ?> style="color:red" <?php endif; ?>>精美礼盒</p>
        </a>
    </li>
    <li class="item">
        <a href="<?php echo url('index/Classify/choose'); ?>?id=3">
            <img src="/static/index/common/img/card.png">
            <p class="desc" <?php if($chosen == 3): ?> style="color:red" <?php endif; ?>>米卡</p>
        </a>
    </li>
    <li class="item">
        <a href="<?php echo url('index/Classify/choose'); ?>?id=0">
            <img src="/static/index/common/img/all.png">
            <p class="desc" <?php if($chosen == 0): ?> style="color:red" <?php endif; ?>>全部</p>
        </a>
    </li>
</ul>
</div>
<div id="j-globalpick">
    <div class="m-scrollload" style="min-height: 0px;">
        <div class="list_container">
            <dl class="m-itemlist-col2 f-cb m-itemlist-col2-idx">
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <dd>
                    <article class="m-itemcol2">
                        <a href="<?php echo url('index/Details/details'); ?>?Id=<?php echo $vo['Id']; ?>" class="imgwrap">
                            <img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/<?php echo $vo['thumb']; ?>" class="u-item-img">
                        </a>
                        <div class="txtwrap">
                            <p class="tit"><a href="#"><?php echo $vo['goodsname']; ?></a></p>
                            <p class="mkt-price">原价¥<del><?php echo $vo['price']; ?></del></p>
                            <p class="act-price">售价¥
                                <span class="bold"><?php echo $vo['sale_price']; ?></span>
                                <span class="pmo-lbl pmo-lbl-1">5.1折</span>
                            </p>
                        </div>
                    </article>
                </dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
        </div>
    </div>
</div>
</body>
</html>