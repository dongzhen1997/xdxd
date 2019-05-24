<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"/usr/share/nginx/html/xdxd/public/../application/index/view/shopcar/shopcar.html";i:1557716687;s:68:"/usr/share/nginx/html/xdxd/application/index/view/common/header.html";i:1554863422;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="/static/index/common/css/style.css" />
<body>
<?php if($list==[]): ?>

<a href="<?php echo url('index/index/index'); ?>" style="width: 50%;position: fixed;top:35%;left:25%;font-size: 20px;text-align:center;">
    <div>
        <img style="width: 20%" src="/static/index/common/img/shop.png">
    </div>
    <span >空空如也<button style="background-color: #6dbfff;border-radius: 5px;border:none;min-width: 80px;padding: 5px;font-size: 18px;margin-left: 5px;">去购买</button></span>
</a>
<?php endif; ?>
<header class="g-hd m-topnav-space" id="g-hd">
    <div class="m-topnav-wrap">
        <div class=" m-topnav" id="topbar-box">
            <div class="m-topnavbar">
                <span class="tit" id="toptitle">购物车</span>
                <div class="btns">
                    <a href="<?php echo url('index/index/index'); ?>" class="u-topbaridx" title="回首页"></a>
                    <a href="<?php echo url('index/Center/center'); ?>" class=" u-topbaruser usr" id="j-gousrcenter" title="个人中心"></a>
                </div>
            </div>
        </div>
    </div>
</header>

<!--商品列表-->
<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<div class="v-warehouse">
    <div class="v-warehouse-body">

        <div class="v-cartitem">
            <div class="v-cartitem-left">
                <div class="v-checkbox">
                    <div class="v-checkbox-inner">
                        <img src="/static/index/common/img/check.jpg" class="choose" index="0" id="<?php echo $vo['Id']; ?>" thumb="<?php echo $vo['thumb']; ?>">
                    </div>
                </div>
            </div>

            <div class="v-cartitem-right">
                <div class="v-cartitem-flex">
                    <div class="v-cartitem-image">
                        <img src="http://xdxd-pic.oss-cn-beijing.aliyuncs.com/<?php echo $vo['thumb']; ?>">
                    </div>
                    <div class="v-cartitem-detail">
                        <a href="<?php echo url('index/Details/details'); ?>?Id=<?php echo $vo['Id']; ?>" class="v-cartitem-title-wrapper">
                            <div class="v-cartitem-title">
                                <?php echo $vo['goodsname']; ?>
                            </div>
                        </a>
                        <div class="v-cartitem-lo">
                            <div class="v-cartitem-info">
                                <div class="v-cartitem-info-bottom">
                                    <div class="v-cartitem-price">
                                        ￥<span class="eachprice"><?php echo $vo['price']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="v-cartitem-ops">
                                <div>
                                    <div class="v-numberinput">
                                        <div class="v-numberinput-inner">
                                            <div class="v-numberinput-minus " minusid="<?php echo $vo['Id']; ?>">
                                                <div class="v-numberinput-minus-hotarea"></div>
                                            </div>
                                            <div class="v-numberinput-value"><?php echo $vo['num']; ?></div>
                                            <div class="v-numberinput-plus " max="<?php echo $vo['shopnum']; ?>" plusid="<?php echo $vo['Id']; ?>" >
                                                <div class="v-numberinput-plus-hotarea"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="v-cartitem-del-wrapper">
                                    <div class="v-cartitem-del" delid="<?php echo $vo['Id']; ?>"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="v-billbar" style="position:fixed; bottom:0; left:0; width:100%">
    <div class="v-billbar-left">
        <div class="v-checkbox">
            <div class="v-checkbox-inner">
                <img src="/static/index/common/img/check.jpg" id="chooseall" index="0">
                <div style="margin-left: 8px;">全选</div>
            </div>
        </div>
    </div>
    <div class="v-billbar-center">
        <div class="v-billbar-price">
            <div class="v-billbar-price-label">
                总价：
            </div>
            ￥<div class="v-billbar-price-value">0</div>
        </div>

    </div>
    <div class="v-billbar-right">
        <a href="javascript:void(0);" onclick="buy()"><div class="v-billbar-button ">结算</div></a>
    </div>
</div>
</body>
<script type="text/javascript" src="/static/common/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/static/common/layer/layer.js"></script>
<script type="text/javascript" src="/static/index/login/js/alert.js"></script>

</html>
<script>
    var checked="/static/index/common/img/check_on.jpg";
    var unchecked="/static/index/common/img/check.jpg";

    //数量减少
    $(".v-numberinput-minus").click(
        function () {
            var shopnum=$(this).next().text();
            $(this).siblings(".v-numberinput-plus").removeClass("v-numberinput-disabled");
            if(shopnum>1){
                shopnum--;
                $.ajax({
                    url:"<?php echo url('index/Shopcar/minus'); ?>",
                    type:"post",
                    dataType:"json",
                    data:{
                        Id:$(this).attr("minusid"),
                        num:shopnum
                    },
                    success:function(data){

                    }
                });
                $(this).next().text(shopnum);
            }
            if(shopnum==1){
                $(this).addClass('v-numberinput-disabled');
            }
            calculate();
        }
    );
    //数量增加
    $(".v-numberinput-plus").click(
        function () {
            var shopnum=$(this).prev().text();
            $(this).siblings(".v-numberinput-minus").removeClass("v-numberinput-disabled");
            console.log($(this).attr("max"));
            if(parseInt(shopnum)<parseInt($(this).attr("max"))){
                shopnum++;
                console.log(shopnum);
                $.ajax({
                    url:"<?php echo url('index/Shopcar/plus'); ?>",
                    type:"post",
                    dataType:"json",
                    data:{
                        Id:$(this).attr("plusid"),
                        num:shopnum
                    },
                    success:function(data){

                    }
                });
                $(this).prev().text(shopnum);
                calculate();
            }
            if(shopnum==$(this).attr("max")){
                $(this).addClass('v-numberinput-disabled');
            }
        }
    );
    $(".choose").click(function(){
        var len=0;
        var totallen=$(".choose").length;
        if($(this).attr("index")==0){
            $(this).attr("src",checked);
            $(this).attr("index",1);
            $(".choose").each(function(){
                if($(this).attr("index")==1){
                    len++;
                }
                if(len== totallen){
                    $("#chooseall").attr("src",checked);
                    $("#chooseall").attr("index",1);
                }
            });
            calculate();
        }else{
            $(this).attr("src",unchecked);
            $(this).attr("index",0);
            if( $("#chooseall").attr("index")==1){
                $("#chooseall").attr("src",unchecked);
                $("#chooseall").attr("index",0);
            }
            calculate();
        }
    });
    $("#chooseall").click(function () {
        if($(this).attr("index")==0){
            $(".choose").attr("index",1);
            $(".choose").attr("src",checked);
            $(this).attr("src",checked);
            $(this).attr("index",1);
            calculate()
        }else{
            $(".choose").attr("src",unchecked);
            $(".choose").attr("index",0);
            $(this).attr("src",unchecked);
            $(this).attr("index",0);
            calculate();
        }
    });
    $(".v-cartitem-del").click(function(){
        var that=$(this);
        layer.confirm('确认删除？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.ajax({
                url:"<?php echo url('index/Shopcar/deleteShop'); ?>",
                type:"post",
                dataType:"json",
                data:{
                    Id:that.attr("delid")
                },
                success:function(data){
                    that.parents(".v-warehouse").remove();
                    layer.msg(data, {icon: 1,time: 2000,});
                    calculate();
                }
            });
        },);
    });
    function calculate(){
        var totalprice=0;
        $(".v-warehouse").each(function(){
            if($(this).find(".choose").attr("index")==1){
                console.log(parseFloat($(this).find(".eachprice").html()));
                totalprice+=parseFloat($(this).find(".eachprice").html())*parseFloat($(this).find(".v-numberinput-value").html())
            }
        });
        $(".v-billbar-price-value").html(totalprice);
    }
    function buy() {
        if(parseInt($(".v-billbar-price-value").html())){
            var goods=[];
            $(".choose").each(function(){
                if($(this).attr("index")==1){
                    var item={};
                    var num=$(this).parents(".v-warehouse").find(".v-numberinput-value").text();
                    var id=$(this).attr("id");
                    var price=$(this).parents(".v-warehouse").find(".eachprice").text();
                    item["Id"]=id;
                    item["num"]=num;
                    goods.push(item);
                }
            });
            $.ajax({
                url:"<?php echo url('index/Orders/orderPlacecar'); ?>",
                type:"post",
                dataType:"json",
                data:{
                    goods,
                    price:$(".v-billbar-price-value").html()
                },
                success:function(data){
                    if(data["code"]==1){
                        layer.confirm('您还没有地址，是否完善？', {
                            btn: ['确认','取消'] //按钮
                        }, function(){
                            location.href="<?php echo url('index/Address/addressAdd'); ?>?id=0";
                        },);
                    }else{
                        location.href="<?php echo url('index/Orders/confirm'); ?>?orderid="+data["param"];
                    }
                }
            });
        }
    }
</script>