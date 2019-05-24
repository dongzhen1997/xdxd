<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/usr/share/nginx/html/xdxd/public/../application/index/view/address/addressEdit.html";i:1558230485;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>编辑邮寄地址</title>
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" type="text/css" href="/static/index/address/css/addaddress.css" />
    <link rel="icon" type="image/x-icon" href="/static/common/img/favicon.ico">
</head>
<style>
    .sub{
        background:#fd8238;
        color:#fff;
        font-size:14px;
        display:block;
        width:100%;
        height:40px;
        line-height:40px;
        text-align:center;
        border-radius:3px;
        box-shadow:0 1px 3px #b7b7b7;
    }
</style>
<body>
<section class="aui-flexView">
    <header class="aui-navBar aui-navBar-fixed b-line">
        <a href="<?php echo url('index/Address/addressList'); ?>" class="aui-navBar-item">
            <i class="icon icon-return"></i>
        </a>
        <div class="aui-center">
            <span class="aui-center-title">编辑邮寄地址</span>
        </div>
        <a href="javascript:;" class="aui-navBar-item">
            <i class="icon icon-sys"></i>
        </a>
    </header>
    <form action="<?php echo url('index/Address/editInsert'); ?>"method="post">
        <section class="aui-scrollView">
            <div class="aui-address-box">
                <div class="aui-address-cell-item">
                    <div class="aui-cell-name">收件人</div>
                    <div class="aui-cell-input">
                        <input type="text" class="cell-input" placeholder="姓名" autocomplete="off" name="linkman" value="<?php echo $linkman; ?>">
                    </div>
                </div>
                <div class="aui-address-cell-item">
                    <div class="aui-cell-name">联系手机</div>
                    <div class="aui-cell-input">
                        <input type="text" class="cell-input" placeholder="收件人电话号码" autocomplete="off" name="tel" value="<?php echo $tel; ?>">
                    </div>
                </div>
                <div class="aui-address-cell-item">
                    <div class="aui-cell-name">所在地区</div>
                    <div class="aui-cell-input cell-input-text">
                        <input type="text" class="cell-input" readonly id="J_Address" placeholder="北京 北京市" name="addr" value="<?php echo $province; ?> <?php echo $city; ?> <?php echo $block; ?>">
                    </div>
                </div>
                <div class="aui-address-cell-item">
                    <div class="aui-cell-name">详细地址</div>
                    <div class="aui-cell-input">
                        <input type="text" class="cell-input" placeholder="发票寄送的详细地址信息" autocomplete="off" name="addr_detail" value="<?php echo $addr_detail; ?>">
                    </div>
                </div>
                <div class="aui-address-cell-item">
                    <div class="aui-cell-name">邮政编号</div>
                    <div class="aui-cell-input">
                        <input type="text" class="cell-input" placeholder="邮政编码号" autocomplete="off" name="postalcode" value="<?php echo $postalcode; ?>">
                    </div>
                </div>
                <div class="aui-address-cell-item">
                    <div class="aui-cell-name">是否设为默认地址</div>
                    <div class="aui-cell-input">
                        <img src="/static/index/address/img/unchecked.png")index="0" id="defaultaddr">
                    </div>
                </div>
                <input type="hidden"value="0"name="defaultaddr"id="df">
                <input type="hidden"value="<?php echo $editid; ?>"name="editid">
                <div class="aui-address-btn">
                    <input class="sub"type="submit"value="确定"/>
                </div>
            </div>
        </section>
    </form>
</section>
<script type="text/javascript" src="/static/common/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/static/common/js/jquery.validate-1.13.1.js"></script>
<script type="text/javascript" src="/static/common/js/messages_zh.min.js"></script>
<script type="text/javascript" src="/static/common/js/jquery.form.js"></script>

<script type="text/javascript" src="/static/index/address/js/address.js"></script>
<script type="text/javascript" src="/static/index/address/js/city.js"></script>

<script type="text/javascript" src="/static/common/layer/layer.js"></script>
<script type="text/javascript" src="/static/index/login/js/alert.js"></script>
<script>
    $(document).ready(function () {
        if(<?php echo $addr_id; ?>=='1'){
            $("#defaultaddr").attr("src","/static/index/address/img/checked.png");
            $("#defaultaddr").attr("index",1);
        }
    });
    $("#defaultaddr").click(function () {
        if($("#defaultaddr").attr("index")==0){
            $("#defaultaddr").attr("src","/static/index/address/img/checked.png");
            $("#defaultaddr").attr("index",1);
            $("#df").val("1")
        }else{
            $("#defaultaddr").attr("src","/static/index/address/img/unchecked.png");
            $("#defaultaddr").attr("index",0);
            $("#df").val("0")
        }
    })
</script>
<script>
    /**
     * 默认调用
     */
    !function() {
        var $target = $('#J_Address');

        $target.citySelect();

        $target.on('click', function(event) {
            event.stopPropagation();
            $target.citySelect('open');
        });

        $target.on('done.ydui.cityselect', function(ret) {
            $(this).val(ret.provance + ' ' + ret.city + ' ' + ret.area);
        });
    }();

</script>
<script>
    var validator = $("form").validate({
        rules:{
            linkman:{
                required:true,
            },
            tel:{
                required:true,
                minlength:11,
                maxlength:11
            },
            addr:{
                required:true,
            },
            addr_detail:{
                required:true,
            },
            postalcode:{
                required:true,
                minlength:6,
                maxlength:6
            }
        },
        messages:{
            linkman:{
                required:"联系人必填",
            },
            tel:{
                required:"电话必填",
            },
            addr:{
                required:"地址必填",
            },
            addr_detail:{
                required:"详细地址必填",
            },
            postalcode:{
                required:"邮政编码必填",
            }
        },
        submitHandler:function(form){
            $("form").ajaxSubmit(function (data) {
                var obj = JSON.parse(data);
                if (obj["code"]==0) {
                    dialog.success(obj["msg"],"<?php echo url('index/Address/addressList'); ?>");
                }else{
                    dialog.error(obj["msg"]);
                }
            })
        }
    });
</script>
</body>
</html>