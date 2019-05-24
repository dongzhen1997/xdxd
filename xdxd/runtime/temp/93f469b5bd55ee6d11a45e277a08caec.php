<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/usr/share/nginx/html/xdxd/public/../application/index/view/details/details.html";i:1558188347;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>商品详情</title>
    <meta name="Keywords" content="鲜道先得">
    <meta name="Description" content="鲜道先得">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="鲜道先得" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="icon" type="image/x-icon" href="/static/common/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/static/index/details/css/mall.css" />
    <script type="text/javascript" src="/static/common/js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="/static/index/details/js/jquery.Spinner.js"></script>

</head>
<body class="body_color">
<div class="mall_main">
    <div id="child_header">
        <div class="goback"><a href="<?php echo url('index/index/index'); ?>" ><i></i></a></div>
        <div class="current_location"><span>商品详情</span></div>
    </div>
    <div id="banner_box" class="box_swipe">
        <ul>
            <li><img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/pic.jpg"></li>
            <li><img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/pic1.jpg"></li>
            <li><img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/pic2.jpg"></li>
            <li><img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/pic3.png"></li>
        </ul>
        <ol>
            <li class="on"></li>&nbsp;
            <li></li>&nbsp;
            <li></li>&nbsp;
            <li></li>&nbsp;
        </ol>
    </div>
    <div class="des_goods">
        <p style="font-size: 20px"><?php echo $goods['goodsname']; ?> </p>
        <p><em class="em_integral">可获得积分:<?php echo $goods['goods_score']; ?></em></p>
        <p><span class="pr">原价</span><span class="sp_style2">¥<?php echo $goods['price']; ?></span></p>
        <p><span class="pr">促销价</span><span class="sp_style3">¥<?php echo $goods['sale_price']; ?></span></p>
        <p><span class="pr">运费</span><span>包邮</span></p>
        <div class="goods_activity">
            <p><span class="pr">活动</span><a href=""><span class="sp_style3">限时优惠</span></a></p>
            <div class="num">
                <span>数量</span>
                <span id="a" class="Spinner"></span>
                <span>库存<?php echo $goods['num']; ?>套</span>
            </div>
            <p><span class="pr">服务承诺</span><span>7天无理由退货 正品保证</span></p>
            <p class="pay_type"><span class="pr">支付方式</span><span><i class="pay01"></i>信用卡</span><span><i class="pay02"></i>支付宝</span></p>
        </div>
    </div>
    <div class="box_list">
        <ul class="box_nav">
            <li class="current"><a>商品详情</a></li>
            <li><a>评论</a></li>
            <li><a>成交记录</a></li>
            <li><a>制作工艺</a></li>
        </ul>
        <div class="goods_box">
            <img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/context.png" width="100%">
            <img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/context1.jpg" width="100%">
            <img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/context2.png" width="100%">
        </div>
        <div class="goods_box" style="display: none">
            <h3>好评</h3>
            <div class="evaluate">
                <span>13773507821</span><span class="text_t">2018-10-19</span>
                <p>速度快，服务周到</p>
                <hr/>
            </div>
            <h3>中评</h3>
            <div class="evaluate">
                <span>15952721962</span><span class="text_t">2018-2-18</span>
                <p>还可以吧</p>
                <hr/>
            </div>
            <h3>差评</h3>
            <div class="evaluate">
                <span>18762678928</span><span class="text_t">2019-1-19</span>
                <p>服务态度不好</p>
                <hr/>
            </div>
        </div>
        <div class="goods_box" style="display: none">
            <div class="deal_list">
                <p><span>18762678928</span> <span>1<em>件</em></span><span>2019-5-04</span></p>
                <p><span>15952721962</span> <span>2<em>件</em></span><span>2019-5-04</span></p>
                <p><span>18762678928</span> <span>3<em>件</em></span><span>2019-5-04</span></p>
            </div>
        </div>
        <div class="goods_box" style="display: none">
            <img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/process.png" width="100%">
            <img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/process2.png" width="100%">
            <img src="https://xdxd-pic.oss-cn-beijing.aliyuncs.com/process3.png" width="100%">
        </div>
    </div>
    <div class="bottomdiv clearfix">
        <div class="inner clearfix">
            <div class="fl btn_sure">
                <a href="javascript:void(0);" onclick="buy()">立即购买</a>
            </div>
            <div class="fl btn_buy_detail">
                <a href="javascript:void(0);" class="addshop_cat" onclick="shopcar()">加入购物车</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/static/index/details/js/swipe2.js"></script>
<script type="text/javascript" src="/static/common/layer/layer.js"></script>
<script type="text/javascript" src="/static/index/login/js/alert.js"></script>
<script type="text/javascript">
    $(function(){
        new Swipe(document.getElementById('banner_box'), {
            speed: 500,
            auto: 3000,
            callback: function(){
                var lis = $(this.element).next("ol").children();
                lis.removeClass("on").eq(this.index).addClass("on");
            }
        });
    });
    $(function(){
        $(".spec_select ul li em").click(function(){
            $(this).addClass("click").siblings().removeClass("click");
        })
    });
    $(function(){
        console.log(11);
        $("#a").Spinner({value:1, min:1, len:3, max:<?php echo $goods['num']; ?>});
    });
    jQuery(function($){
        $('.box_list ul li').click(function(){
            var index = $('.box_list ul li').index(this);
            $(this).addClass('current').siblings('li').removeClass('current');
            $('.box_list .goods_box:eq('+index+')').show().siblings('.goods_box').hide();
        })
    });
    function buy() {
        var item={};
        item["Id"]=parseInt("<?php echo $goods['Id']; ?>");
        item["num"]=parseInt($(".Amount").val());
        var goods=[];
        goods.push(item);
        $.ajax({
            url:"<?php echo url('index/Orders/orderPlace'); ?>",
            type:"post",
            dataType:"json",
            data:{
                goods:goods,
                price:$(".Amount").val()*parseFloat("<?php echo $goods['sale_price']; ?>")
            },
            success:function(data){
                if(data["code"]==1){
                    layer.confirm('您还没有地址，是否完善？', {
                        btn: ['确认','取消'] //按钮
                    }, function(){
                        location.href="<?php echo url('index/Address/addressAdd'); ?>?id="+parseInt("<?php echo $goods['Id']; ?>");
                    },);
                }else if(data["code"]==0){
                    location.href="<?php echo url('index/Orders/confirm'); ?>?orderid="+data["param"];
                }else if(data["code"]==2){
                    layer.open({
                        content: data["msg"],
                        icon: 2,
                        yes:function(){
                            location.href="<?php echo url('index/user/login'); ?>";
                        },
                    });
                }
            }
        });
    }
    function  shopcar(){
        $.ajax({
            url:"<?php echo url('index/Shopcar/cookieSet'); ?>",
            type:"post",
            dataType:"json",
            data:{
                Id:"<?php echo $goods['Id']; ?>",
                name:"<?php echo $goods['goodsname']; ?>",
                num:$(".Amount").val(),
                thumb:"<?php echo $goods['thumb']; ?>",
                price:"<?php echo $goods['sale_price']; ?>",
                shopnum:"<?php echo $goods['num']; ?>"
            },
            success:function(data){
                if(data["code"]==1){
                    layer.open({
                        content: data["msg"],
                        icon: 2,
                        yes:function(){
                            location.href="<?php echo url('index/user/login'); ?>";
                        },
                    });
                }else{
                    layer.msg(data["msg"], {icon: 1,time: 2000,});
                }
            }
        });
    }
</script>
</body>
</html>