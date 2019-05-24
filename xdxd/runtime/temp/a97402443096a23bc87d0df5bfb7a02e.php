<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/usr/share/nginx/html/xdxd/public/../application/index/view/orders/orderList.html";i:1558063132;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的订单</title>

    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>

    <link rel="icon" type="image/x-icon" href="/static/common/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/static/index/orders/css/style.css" />
    <script type="text/javascript" src="/static/common/js/jquery-3.1.1.js"></script>

</head>
<body>
<section class="aui-flexView">
    <header class="aui-navBar aui-navBar-fixed b-line">
        <a href="<?php echo url('index/center/center'); ?>" class="aui-navBar-item">
            <i class="icon icon-return"></i>
        </a>
        <div class="aui-center">
            <span class="aui-center-title">我的订单</span>
        </div>
        <a href="javascript:;" class="aui-navBar-item">
            <i class="icon icon-more"></i>
            <!--<span class="badge badge-hollow">9+</span>-->
        </a>
    </header>
    <section class="aui-scrollView">
        <div class="aui-tab" data-ydui-tab>
            <ul class="tab-nav">
                <li class="tab-nav-item  <?php if($active == 0): ?> tab-active <?php endif; ?>">
                    <a href="<?php echo url('index/Orders/orderList'); ?>">全部</a>
                </li>
                <li class="tab-nav-item  <?php if($active == 1): ?> tab-active <?php endif; ?>" >
                    <a href="<?php echo url('index/Orders/orderClassify'); ?>?type=1">待付款</a>
                    <!--<span class="badge badge-hollow">5</span>-->
                </li>
                <li class="tab-nav-item <?php if($active == 2): ?> tab-active <?php endif; ?>">
                    <a href="<?php echo url('index/Orders/orderClassify'); ?>?type=2">待发货</a>
                    <!--<span class="badge badge-hollow">15</span>-->
                </li>
                <li class="tab-nav-item">
                    <a href="javascript:;">待收货</a>
                </li>
                <li class="tab-nav-item">
                    <a href="javascript:;">待评价</a>
                </li>
            </ul>
            <!--<div class="divHeight"></div>-->
            <div class="tab-panel">
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="tab-panel-item tab-active " index="1">

                    <div class="divHeight"></div>
                    <div class="tab-item" index="1">
                        <a href="javascript:void(0);" class="aui-well-item aui-well-item-clear b-line">
                            <div class="aui-well-item-bd">
                                <h3><?php echo $vo['orderTime']; ?></h3>
                            </div>
                            <?php if($vo['status'] == 3): ?>
                                <span class="aui-well-item-fr" onclick="delorder('<?php echo $vo['orderId']; ?>',this)">订单关闭</span>
                                <?php elseif($vo['status'] == 1): ?>
                                <span class="aui-well-item-fr aui-well-item-fr-clear">
                                    待付款
                                </span>
                                <?php elseif($vo['status'] == 2): ?>
                                <span class="aui-well-item-fr aui-well-item-fr-clear">
                                    待发货
                                </span>
                            <?php endif; ?>
                        </a>
                        <?php if(is_array($vo['goodsname']) || $vo['goodsname'] instanceof \think\Collection || $vo['goodsname'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['goodsname'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
                        <div class="aui-mail-product b-line">
                            <a href="<?php echo url('index/Details/details'); ?>?Id=<?php echo $vo['Id'][$key]; ?>" class="aui-mail-product-item">
                                <div class="aui-mail-product-item-hd">
                                    <img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/<?php echo $vo['thumb'][$key]; ?>" alt="">
                                </div>
                                <div class="aui-mail-product-item-bd">
                                    <p><?php echo $vo['goodsname'][$key]; ?></p>
                                </div>
                                <div class="aui-mail-product-right">
                                    <h4>￥<?php echo $vo['sale_price'][$key]; ?></h4>
                                    <span>x<?php echo $vo['count'][$key]; ?></span>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>

                        <a href="javascript:;" class="aui-mail-payment">
                            <p>
                                共<em>1</em>
                                件商品 实付款: <i>￥<?php echo $vo['allprice']; ?></i>
                            </p>
                        </a>

                        <div class="aui-mail-button">
                            <?php if($vo['status'] == 1): ?>
                            <a href="<?php echo url('index/Alipay/alipayapi'); ?>?WIDsubject=鲜道先得&WIDtotal_fee=<?php echo $vo['allprice']; ?>&WIDout_trade_no=<?php echo $vo['orderId']; ?>">立即付款</a>
                            <a href="<?php echo url('index/Orders/cancelorder'); ?>?orderId=<?php echo $vo['orderId']; ?>" class="aui-df-color">取消订单</a>
                            <?php elseif($vo['status'] == 2): ?>
                            <a href="javascript:;" class="aui-df-color">提醒发货</a>
                            <?php else: ?>
                            <a href="<?php echo url('index/Details/details'); ?>?Id=<?php echo $vo['Id'][$key]; ?>" class="aui-df-color">再次购买</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </section>
</section>
</body>
<script type="text/javascript" src="/static/common/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/static/common/layer/layer.js"></script>
<script type="text/javascript" src="/static/index/login/js/alert.js"></script>

<script>
    function delorder($orderId,_this) {
        layer.confirm('确认删除？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.ajax({
                url:"<?php echo url('index/Orders/delorder'); ?>",
                type:"post",
                dataType:"json",
                data:{
                    orderId:$orderId
                },
                success:function(data){
                    $(_this).parents(".tab-panel-item").remove();
                    layer.msg(data["msg"], {icon: 1,time: 2000,});
                }
            });
        },);
    }
</script>
</html>
