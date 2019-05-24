<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/usr/share/nginx/html/xdxd/public/../application/index/view/address/addressModify.html";i:1558076580;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>邮寄地址管理</title>
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" type="text/css" href="/static/index/address/css/myaddress.css" />
    <link rel="icon" type="image/x-icon" href="/static/common/img/favicon.ico">
</head>
<body>
<section class="aui-flexView">
    <header class="aui-navBar aui-navBar-fixed b-line">
        <a href="#" class="aui-navBar-item"  onclick="backcf()">
            <i class="icon icon-return"></i>
        </a>
        <div class="aui-center">
            <span class="aui-center-title">邮寄地址管理</span>
        </div>
    </header>
    <section class="aui-scrollView">
        <div class="divHeight b-line"></div>
        <div class="aui-address-box b-line">
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i;if($volist['Id'] == $addr_id): ?>
            <div class="aui-flex b-line" onclick="change(<?php echo $volist['Id']; ?>)">
                <div class="aui-flex-box">
                    <span style=" color: red;">默认</span><h3><?php echo $volist['linkman']; ?><?php echo $volist['tel']; ?></h3>
                    <p><?php echo $volist['province']; ?><?php echo $volist['city']; ?><?php echo $volist['block']; ?><?php echo $volist['addr_detail']; ?></p>
                    <p><?php echo $volist['postalcode']; ?></p>
                </div>
            </div>
            <?php endif; endforeach; endif; else: echo "" ;endif; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i;if($volist['Id'] != $addr_id): ?>
            <div class="aui-flex b-line" onclick="change(<?php echo $volist['Id']; ?>)">
                <div class="aui-flex-box">
                    <h3><?php echo $volist['linkman']; ?><?php echo $volist['tel']; ?></h3>
                    <p><?php echo $volist['province']; ?><?php echo $volist['city']; ?><?php echo $volist['block']; ?><?php echo $volist['addr_detail']; ?></p>
                    <p><?php echo $volist['postalcode']; ?></p>
                </div>
            </div>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </section>
</section>
</body>

<script>
    var orderId="<?php echo $orderId; ?>";
    orderId=JSON.stringify(orderId);
    function change(id) {
        location.href="<?php echo url('index/orders/addrmodify'); ?>?orderid="+orderId+"&addrid="+id;
    }
    function backcf() {
        location.href="<?php echo url('index/Orders/confirm'); ?>?orderid="+orderId;
    }
</script>
</html>