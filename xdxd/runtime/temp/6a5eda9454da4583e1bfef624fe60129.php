<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"D:\phpstudy\PHPTutorial\WWW\xdxd\public/../application/index\view\alipay\confirm.html";i:1558078107;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>确认订单</title>

    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>

    <link rel="stylesheet" type="text/css" href="/static/index/alipay/css/style.css" />
    <link rel="icon" type="image/x-icon" href="/static/common/img/favicon.ico">

</head>
<body style="background:#f7f7f7">
<section class="aui-flexView">
    <header class="aui-navBar aui-navBar-fixed">
        <a href="<?php echo url('index/Shopcar/shopcar'); ?>" class="aui-navBar-item">
            <i class="icon icon-return"></i>
        </a>
        <div class="aui-center">
            <span class="aui-center-title">确认订单</span>
        </div>
    </header>
    <section class="aui-scrollView">
        <div class="aui-order-box">
            <div class="aui-flex aui-choice-white aui-mar15">

                <div class="aui-flex-box">
                    <div>
                        联系人：<span><?php echo $addr['linkman']; ?></span>
                        电话：<span><?php echo $addr['tel']; ?></span> 邮政：<span><?php echo $addr['postalcode']; ?></span>
                    </div>
                    <div>
                        地址：<span><?php echo $addr['province']; ?><?php echo $addr['city']; ?><?php echo $addr['block']; ?><?php echo $addr['addr_detail']; ?></span>
                    </div>
                </div>
              <div class="aui-flex-triangle" style="color:#fff" id="choose" onclick="choose()">.</div>
            </div>
            <div class="aui-flex aui-choice-white">
                <div class="aui-flex-box">
                    <h1>商品清单</h1>
                </div>
            </div>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="aui-flex aui-flex-default aui-mar15">
                <div class="aui-flex-goods">
                    <img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/<?php echo $vo['thumb']; ?>">
                </div>
                <div class="aui-flex-box">
                    <h2><?php echo $vo['goodsname']; ?></h2>
                    <div class="aui-flex aui-flex-clear">
                        <div class="aui-flex-box">￥<?php echo $vo['sale_price']; ?></div>
                        <div>x <?php echo $vo['count']; ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>

            <div class="aui-flex aui-choice-white b-line">
                <div class="aui-flex-box">配送方式</div>
                <div class="aui-flex-triangle">普通快递</div>
            </div>
            <div class="aui-flex aui-choice-white b-line">
                <div class="aui-flex-box">优惠券</div>
                <div class="aui-flex-triangle">无可用</div>
            </div>
            <div class="aui-flex aui-choice-white  aui-mar15">
                <div class="aui-flex-box">发票信息</div>
                <div class="aui-flex-triangle">不可开发票</div>
            </div>

        </div>
    </section>
    <footer class="aui-bar-footer">
        <div class="aui-flex">
            <div class="aui-flex-box">
                应付金额：<em>￥<?php echo $total; ?></em>
            </div>
            <div class="aui-btn-button">
                <form action="<?php echo url('index/Alipay/alipayapi'); ?>" method="post">
                    <input type="hidden" name="WIDsubject" value="鲜道先得"/>
                    <input type="hidden" name="WIDtotal_fee" value=<?php echo $total; ?>/>
                    <input type="hidden" name="WIDout_trade_no" value=<?php echo $orderid; ?>>
                    <input type="submit" value="去支付"/>
                </form>
            </div>
        </div>
    </footer>
</section>
</body>
<script type="text/javascript" src="/static/common/js/jquery-3.1.1.js"></script>
<script>
    function choose() {
        location.href="<?php echo url('index/Address/addressmodify'); ?>?orderId="+<?php echo $orderid; ?>;
    }
</script>
</html>
