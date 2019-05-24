<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"/usr/share/nginx/html/xdxd/public/../application/index/view/gradeshop/gradeshop.html";i:1558185230;s:68:"/usr/share/nginx/html/xdxd/application/index/view/common/header.html";i:1554863422;}*/ ?>
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
<header class="g-hd m-topnav-space" id="g-hd">
    <div class="m-topnav-wrap">
        <div class=" m-topnav" id="topbar-box">
            <div class="m-topnavbar">
                <span class="tit" id="toptitle">积分商城:<?php echo $score; ?>积分</span>
                <div class="btns">
                    <a href="<?php echo url('index/index/index'); ?>" class="u-topbaridx" title="回首页"></a>
                    <a href="<?php echo url('index/Center/center'); ?>" class=" u-topbaruser usr" id="j-gousrcenter" title="个人中心"></a>
                </div>
            </div>
        </div>
    </div>
</header>

<ul class="m-ban-items" style="background:linear-gradient(mediumspringgreen,lightskyblue)">
    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <li class="item" onclick="buy('<?php echo $vo['Id']; ?>','<?php echo $vo['sale_score']; ?>')">
        <a class="m-ban-goods" href="#">
            <div class="imgwrap u-img-wrapper">
                <img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/<?php echo $vo['thumb']; ?>" class=" u-lazyimg-loaded ">
            </div>
            <div class="pinfo">
                <p class="tit f-els-2"><?php echo $vo['goodsname']; ?></p>
                <p class="prices">
                    <span class="price">积分<?php echo $vo['sale_score']; ?></span>
                </p>
            </div>
        </a>
    </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</body>
<script type="text/javascript" src="/static/common/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/static/common/layer/layer.js"></script>
<script type="text/javascript" src="/static/index/login/js/alert.js"></script>
<script>
    function buy(id,grade) {
        var that=$(this);
        layer.confirm('确认花费'+grade+'积分购买？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.ajax({
                url:"<?php echo url('index/Orders/orderPlacgrade'); ?>",
                type:"post",
                dataType:"json",

                data:{
                    Id:parseInt(id),
                    goodsgrade:parseInt(grade),
                    usergrade:<?php echo $score; ?>,
                },
                success:function(data){
                    if(data["code"]==0){
                        location.href="<?php echo url('index/Orders/orderList'); ?>";
                    }else if (data["code"]==2) {
                        dialog.error(data["msg"]);
                    }else if(data["code"]==1){
                        location.href="<?php echo url('index/Address/addressAdd'); ?>?id=-1";
                    }
                }
            });
        },);
    }
</script>
</html>
