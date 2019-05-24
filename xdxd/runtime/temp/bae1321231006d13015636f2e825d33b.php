<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"/usr/share/nginx/html/xdxd/public/../application/index/view/activity/seckill.html";i:1557670362;s:68:"/usr/share/nginx/html/xdxd/application/index/view/common/header.html";i:1554863422;}*/ ?>
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
                <span class="tit" id="toptitle">秒杀</span>
                <div class="btns">
                    <a href="<?php echo url('index/index/index'); ?>" class="u-topbaridx" title="回首页"></a>
                    <a href="<?php echo url('index/Center/center'); ?>" class="u-topbaruser usr" id="j-gousrcenter" title="个人中心"></a>
                </div>
            </div>
        </div>
    </div>
</header>

    <div style="background: linear-gradient(to right,#6830DB , #C76DAC);height: 100px;width: 100%;font-size: 30px;text-align: center">
        <?php if($lefttime == -1): ?>
        <?php echo $info; else: ?>
        活动正在进行 还剩
        <li class="left" style="color:darkred"></li>
        <?php endif; ?>
    </div>

<div class="m-scrollload">
    <div class="list_container">

        <ul class="goodslisttitle j-goodslisttitle">
            <li class="sep"></li>
            <li class="text">商品清单</li>
        </ul>
        <dl class="daily-goodslist daily-goodslist-1">
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <dd class="goods">
                <a class="pic" href="<?php echo url('index/Details/details'); ?>?Id=<?php echo $vo['Id']; ?>">
                    <img src="http://xdxd-pic.oss-cn-beijing.aliyuncs.com/<?php echo $vo['thumb']; ?>" alt="">
                </a>
                <ul class="text">
                    <li class="desc">
                        <a href="<?php echo url('index/Classify/choose'); ?>?id=<?php echo $vo['classifyId']; ?>"><?php echo $vo['classify_name']; ?></a>
                    </li>
                    <li>
                        <a class="title f-els-2" href="<?php echo url('index/Details/details'); ?>?Id=<?php echo $vo['Id']; ?>"><?php echo $vo['goodsname']; ?></a>
                    </li>
                    <li class="desc">
                        <a href="<?php echo url('index/Details/details'); ?>?Id=<?php echo $vo['Id']; ?>">剩余<?php echo $vo['num']; ?>件</a>
                    </li>
                    <li class="price"><span class="current">¥<?php echo $vo['seckillprice']; ?></span><del class="suggest">¥<?php echo $vo['sale_price']; ?></del></li>
                    <?php if($lefttime != -1): ?>
                    <li class="cart" onclick="buy(<?php echo $vo['Id']; ?>,<?php echo $vo['seckillprice']; ?>)">立即抢购</li>
                    <?php endif; ?>
                </ul>
            </dd>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
    </div>

</div>
</body>
<script type="text/javascript" src="/static/common/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/static/common/layer/layer.js"></script>
<script type="text/javascript" src="/static/index/login/js/alert.js"></script>
<script>
    var lefttime=<?php echo $lefttime; ?>;
    $(function(){
        var data=formatSeconds(lefttime);
        $(".left").html(data);
    });

    setInterval(function () {
        lefttime--;
        var data=formatSeconds(lefttime);
        $(".left").html(data);
    },1000);
    function formatSeconds(value) {
        var theTime = parseInt(value);// 秒
        var middle= 0;// 分
        var hour= 0;// 小时

        if(theTime > 60) {
            middle= parseInt(theTime/60);
            theTime = parseInt(theTime%60);
            if(middle> 60) {
                hour= parseInt(middle/60);
                middle= parseInt(middle%60);
            }
        }
        var result = ""+parseInt(theTime)+"秒";
        if(middle > 0) {
            result = ""+parseInt(middle)+"分"+result;
        }
        if(hour> 0) {
            result = ""+parseInt(hour)+"小时"+result;
        }
        return result;
    }
    function buy(id,price) {
        $.ajax({
            url:"<?php echo url('index/Activity/seckillbuy'); ?>",
            type:"post",
            dataType:"json",
            data:{
                id,
                price,
            },
            success:function(data){

                if(data["code"]==0){
                    location.href="<?php echo url('index/Orders/confirm'); ?>?orderid="+data["param"];
                }else{
                    dialog.error(data["msg"]);
                }
            }
        })
    }
</script>
</html>
