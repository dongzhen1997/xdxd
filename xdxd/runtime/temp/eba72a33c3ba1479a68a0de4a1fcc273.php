<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/usr/share/nginx/html/xdxd/public/../application/index/view/index/index.html";i:1558069114;s:68:"/usr/share/nginx/html/xdxd/application/index/view/common/header.html";i:1554863422;}*/ ?>
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

<div id="container" style="display:none;"></div>

<div id="coverall" onclick="exit()" style="position:fixed;z-index:100;width: 100%;height: 100%;background-color: black;opacity:0.5;display: none;left: 0"></div>
<form id="form" action="<?php echo url('index/classify/search'); ?>" method="post" style="position: fixed;z-index: 999;width:100%;top: 10px;left: 10%;display: none">
    <div style="height: 30%;">
        <input type="text" style="width:70%;border-radius:36px" name="key">
        <input type="submit" value="搜索" style="width: 15%;">
    </div>
</form>

<header class="g-hd m-topnav-space" id="g-hd" style="position: sticky; top: 0px; z-index: 99;">
    <div class="m-topnav-wrap">
        <div class="m-topnavidx m-topnav" id="topbar-box">
            <div class="m-topnavbar">
                <div class="m-searchbanner" onclick="search()"><i class="u-searchicon"></i><span id="j-searchbanner"></span></div>
                <div class="btns">
                    <a href="<?php echo url('index/user/login_out'); ?>" id="j-topLogin" class="u-topbarlogin">
                        <?php if($login): ?>
                            退出
                        <?php else: ?>
                            登录
                        <?php endif; ?>
                    </a>
                    <!--<a href="<?php echo url('index/index/index'); ?>" class="dn u-topbaruser usr" id="j-gousrcenter" title="个人中心"></a>-->
                    <a href="<?php echo url('index/Shopcar/shopcar'); ?>" class="u-topbarcart" title="购物车" id="j-gocart"></a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="g-bd" id="g-bd">
    <div class="slider">
        <ul>
            <li><a href="#wise"><img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/theme.jpg" alt=鲜道先得></a></li>
            <li><a href="#theme"><img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/video1.png" alt="鲜道先得"></a></li>
            <li><a href="#seckill"><img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/miaosha.jpg" alt="鲜道先得"></a></li>
        </ul>
    </div>
    <!--活动链接-->
    <ul class="m-resourcelist">
        <li class="item">
            <a href="<?php echo url('index/Activity/turntable'); ?>">
                <img src="/static/index/common/img/lottery.png">
                <p class="desc">抽奖</p>
            </a>
        </li>
        <li class="item">
            <a href="<?php echo url('index/Activity/seckill'); ?>">
                <img src="/static/index/common/img/seckill.png">
                <p class="desc">秒杀</p>
            </a>
        </li>
        <li class="item">
            <a href="<?php echo url('index/Activity/sign'); ?>">
                <img src="/static/index/common/img/sign.png">
                <p class="desc">签到</p>
            </a>
        </li>
        <li class="item">
            <a href="<?php echo url('index/Gradeshop/gradeshop'); ?>">
                <img src="/static/index/common/img/grade.png">
                <p class="desc">积分商城</p>
            </a>
        </li>
    </ul>

    <div class="m-2avg-ban m-2avg-ban-newuser">
        <a href="<?php echo url('index/Details/details'); ?>?Id=7" class="half u-img-wrapper">
            <!--<img src="/static/index/common/img/intro1.jpg">-->
            <img src="/static/uploads/admin/goods/card3.jpg">
        </a>
        <a href="<?php echo url('index/Details/details'); ?>?Id=7" class="half u-img-wrapper" id="wise">
            <img src="/static/index/common/img/intro2.jpg">
        </a>
    </div>

    <div id="j-dynblocks" >
        <div class="g-banblock">
            <h3 class="m-ban-tit"><i class="u-ic u-ic-clock"></i><span>限时抢购</span></h3>
            <a class="m-ban-headimg" href="<?php echo url('index/Activity/seckill'); ?>" id="seckill">
                <img  class="pop u-lazyimg-loaded " src="/static/index/common/img/miaosha.jpg">
                <div class="desc">
                </div>
            </a>
            <ul class="m-ban-items">
                <?php if(is_array($card) || $card instanceof \think\Collection || $card instanceof \think\Paginator): $i = 0; $__LIST__ = $card;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="item">
                    <a class="m-ban-goods" href="<?php echo url('index/Details/details'); ?>?Id=<?php echo $vo['Id']; ?>">
                        <div class="imgwrap u-img-wrapper">
                            <img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/<?php echo $vo['thumb']; ?>" class=" u-lazyimg-loaded ">
                        </div>
                        <div class="pinfo">
                            <p class="tit f-els-2"><?php echo $vo['goodsname']; ?></p>
                            <p class="prices">
                                <span class="price">¥<?php echo $vo['sale_price']; ?></span>
                                <span class="mkt">¥<?php echo $vo['price']; ?></span>
                            </p>
                        </div>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div id="j-dynblocksw" >
        <div class="g-banblock">
            <h3 class="m-ban-tit"><i class="u-ic u-ic-like"></i><span>专题推荐</span></h3>
            <a class="m-ban-headimg" href="<?php echo url('index/Classify/choose'); ?>?id=1" id="theme">
                <img  class="pop u-lazyimg-loaded " src="/static/index/common/img/video1.png">
                <div class="desc"></div>
            </a>
            <ul class="m-ban-items">
                <?php if(is_array($rice) || $rice instanceof \think\Collection || $rice instanceof \think\Paginator): $i = 0; $__LIST__ = $rice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="item">
                    <a class="m-ban-goods" href="<?php echo url('index/Details/details'); ?>?Id=<?php echo $vo['Id']; ?>">
                        <div class="imgwrap u-img-wrapper">
                            <img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/<?php echo $vo['thumb']; ?>" class=" u-lazyimg-loaded ">
                        </div>
                        <div class="pinfo">
                            <p class="tit f-els-2"><?php echo $vo['goodsname']; ?></p>
                            <p class="prices">
                                <span class="price">¥<?php echo $vo['sale_price']; ?></span>
                                <span class="mkt">¥<?php echo $vo['price']; ?></span>
                            </p>
                        </div>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <h3 class="m-ban-tit m-ban-tit-gp"><i class="u-ic u-ic-star"></i><span>优选礼盒</span></h3>
    <div id="j-globalpick">
        <div class="m-scrollload" style="min-height: 0px;">
            <div class="list_container">
                <dl class="m-itemlist-col2 f-cb m-itemlist-col2-idx">
                    <?php if(is_array($box) || $box instanceof \think\Collection || $box instanceof \think\Paginator): $i = 0; $__LIST__ = $box;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <dd>
                        <article class="m-itemcol2">
                            <a href="<?php echo url('index/Details/details'); ?>?Id=<?php echo $vo['Id']; ?>" class="imgwrap">
                                <img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/<?php echo $vo['thumb']; ?>" class="u-item-img">
                            </a>
                            <div class="txtwrap">
                                <p class="tit"><a href="<?php echo url('index/Details/details'); ?>?Id=<?php echo $vo['Id']; ?>"><?php echo $vo['goodsname']; ?></a></p>
                                <p class="mkt-price"><?php echo $vo['sale_num']; ?>人付款</p>
                                <p class="act-price">售价¥
                                    <span class="bold"><?php echo $vo['sale_price']; ?></span>
                                    <span class="pmo-lbl pmo-lbl-1">购买</span>
                                </p>
                            </div>
                        </article>
                    </dd>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </dl>
            </div>
        </div>
    </div>
</div>
<div style="height:150px;"></div>
<div class="floor bottom-bar-pannel" id="bottom-bar-pannel">
    <div class="floor-container  bdr-top ">
        <ul class="tab5">
            <li id="bar-index"><span class="bar-img"><img src="/static/index/common/icon/a-home.png"></span></li>
            <li><span class="bar-img"><a class="J_ping" href="<?php echo url('index/Classify/classify'); ?>" ><img func="category" src="/static/index/common/icon/n-catergry.png"></a></span></li>
            <li><span class="bar-img"><a class="J_ping" href="<?php echo url('index/Gradeshop/gradeshop'); ?>"><img func="cart" src="/static/index/common/icon/n-find.png"></a></span></li>
            <li><span class="bar-img"><a class="J_ping" href="<?php echo url('index/Shopcar/shopcar'); ?>" ><img func="cart" src="/static/index/common/icon/n-cart.png"></a></span></li>
            <li><span class="bar-img"><a class="J_ping" href="<?php echo url('index/Center/center'); ?>"><img func="home" src="/static/index/common/icon/n-me.png"></a></span></li>
        </ul>
    </div>
</div>
</body>
</html>
<script type="text/javascript"
        src="https://webapi.amap.com/maps?v=1.4.10&key=c4abf1fb34c738b4ff608023ba40c103">
</script>
<script type="text/javascript" src="/static/common/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/static/index/common/js/banner.js"></script>
<script type="text/javascript">
    mapObj = new AMap.Map('container');
    mapObj.plugin('AMap.Geolocation', function () {
        geolocation = new AMap.Geolocation({
            enableHighAccuracy: false,//是否使用高精度定位，默认:true
            timeout: 10000,          //超过10秒后停止定位，默认：无穷大
            maximumAge: 0,           //定位结果缓存0毫秒，默认：0
            convert: true,           //自动偏移坐标，偏移后的坐标为高德坐标，默认：true
            showButton: true,        //显示定位按钮，默认：true
            buttonPosition: 'LB',    //定位按钮停靠位置，默认：'LB'，左下角
            buttonOffset: new AMap.Pixel(10, 20),//定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
            showMarker: true,        //定位成功后在定位到的位置显示点标记，默认：true
            showCircle: true,        //定位成功后用圆圈表示定位精度范围，默认：true
            panToLocation: true,     //定位成功后将定位到的位置作为地图中心点，默认：true
            zoomToAccuracy:true      //定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
        });
        mapObj.addControl(geolocation);
        geolocation.getCurrentPosition();
        AMap.event.addListener(geolocation, 'complete', onComplete);//返回定位信息
        AMap.event.addListener(geolocation, 'error', onError);      //返回定位出错信息
    });
    function onError(data) {
        // alert(JSON.stringify(data));
    }
    function onComplete(data) {
        var Lng=data.position.getLng();
        var Lat=data.position.getLat();
        var arr=[Lng,Lat];
        setCookie("xdxd_position",JSON.stringify(arr));
    }
    function setCookie(name, value) {
        var exp = new Date();
        exp.setTime(exp.getTime() + 60 * 60 * 1000);
        document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString() + ";path=/";
    }
$(".slider").yxMobileSlider({
    width: 640,
    height: 320,
    during: 3000
});
function search() {
    $("#coverall").show();
    $("#form").show();
}
function exit() {
    $("#coverall").hide();
    $("#form").hide();
}
</script>