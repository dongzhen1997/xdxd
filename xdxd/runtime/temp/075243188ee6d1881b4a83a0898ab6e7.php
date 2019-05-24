<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/usr/share/nginx/html/xdxd/public/../application/index/view/address/addressList.html";i:1558070478;}*/ ?>
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
        <a href="<?php echo url('index/center/center'); ?>" class="aui-navBar-item">
            <i class="icon icon-return"></i>
        </a>
        <div class="aui-center">
            <span class="aui-center-title">邮寄地址管理</span>
        </div>
    </header>
    <section class="aui-scrollView">
        <div class="divHeight b-line"></div>
        <div class="aui-address-box b-line">
            <a href="<?php echo url('index/Address/addressAdd'); ?>"><div class="aui-address-add b-line">+添加</div></a>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i;if($volist['Id'] == $addr_id): ?>
            <div class="aui-flex b-line">
                <div class="aui-flex-box">
                    <span style=" color: red;">默认</span><h3><?php echo $volist['linkman']; ?><?php echo $volist['tel']; ?></h3>
                    <p><?php echo $volist['province']; ?><?php echo $volist['city']; ?><?php echo $volist['block']; ?><?php echo $volist['addr_detail']; ?></p>
                    <p><?php echo $volist['postalcode']; ?></p>
                </div>
                <div class="aui-address-edit edit" editid="<?php echo $volist['Id']; ?>">编辑</div>
                <div class="aui-address-edit del" delid="<?php echo $volist['Id']; ?>">删除</div>
            </div>
            <?php endif; endforeach; endif; else: echo "" ;endif; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i;if($volist['Id'] != $addr_id): ?>
            <div class="aui-flex b-line">
                <div class="aui-flex-box">
                    <h3><?php echo $volist['linkman']; ?><?php echo $volist['tel']; ?></h3>
                    <p><?php echo $volist['province']; ?><?php echo $volist['city']; ?><?php echo $volist['block']; ?><?php echo $volist['addr_detail']; ?></p>
                    <p><?php echo $volist['postalcode']; ?></p>
                </div>
                <div class="aui-address-edit edit" editid="<?php echo $volist['Id']; ?>">编辑</div>
                <div class="aui-address-edit del" delid="<?php echo $volist['Id']; ?>">删除</div>
            </div>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </section>
</section>
</body>
<script type="text/javascript" src="/static/common/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/static/common/layer/layer.js"></script>
<script type="text/javascript" src="/static/index/login/js/alert.js"></script>
<script>
    $(".del").click(function(){
        var that=$(this);
            layer.confirm('确认删除？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                $.ajax({
                    url:"<?php echo url('index/Address/addressDel'); ?>",
                    type:"post",
                    dataType:"json",

                    data:{
                        Id:that.attr("delid")
                    },
                    success:function(data){
                        that.parent().remove();
                        layer.msg(data, {icon: 1,time: 2000,});
                    }
                });
            },);
    });
    $(".edit").click(function(){
        $id=$(this).attr("editid");
        location.href="<?php echo url('index/Address/addressEdit'); ?>?id="+$id;
    });
</script>
</html>