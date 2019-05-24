<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/usr/share/nginx/html/xdxd/public/../application/index/view/activity/sign.html";i:1558232507;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <title>签到</title>
    <link rel="stylesheet" href="/static/index/activity/sign/css/qiandao_style.css">
</head>
<link rel="icon" type="image/x-icon" href="/static/common/img/favicon.ico">
<body>
<a href="<?php echo url('index/index/index'); ?>"><img src="/static/index/common/img/return.png"style="width: 70px;float: left"></a>
<div class="qiandao-warp">
    <div class="qiandap-box">
        <div class="qiandao-banner">
            <img src="/static/index/activity/sign/images/qiandao_banner.jpg" height="551" width="1120" alt="">
        </div>
        <div class="qiandao-con clear">
            <div class="qiandao-left">
                <div class="qiandao-left-top clear">
                    <div class="current-date">2016年1月6日</div>
                    <div class="qiandao-history qiandao-tran qiandao-radius" id="js-qiandao-history">我的签到</div>
                </div>
                <div class="qiandao-main" id="js-qiandao-main">
                    <ul class="qiandao-list" id="js-qiandao-list">
                    </ul>
                </div>
            </div>
            <div class="qiandao-right">
                <div class="qiandao-top">
                    <div class="just-qiandao qiandao-sprits" id="js-just-qiandao">
                    </div>
                    <?php if($signed == 1): ?>
                    <p class="qiandao-notic">今日已签到，请明日继续签到</p>
                    <?php else: ?>
                    <p class="qiandao-notic">抓紧来签到</p>
                    <?php endif; ?>
                </div>
                <div class="qiandao-bottom">
                    <div class="qiandao-rule-list">
                        <h4>签到规则</h4>
                        <p>签到每天增加5个积分</p>
                        <p>连续签到16天将重新开始计算，额外获得100积分</p>
                    </div>
                    <div class="qiandao-rule-list">
                        <h4>其他说明</h4>
                        <p>如果有一天未签到，重新开始计算连续签到时间</p>
                        <p>签到规则只限于本月</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 我的签到 layer start -->
<div class="qiandao-layer qiandao-history-layer">
    <div class="qiandao-layer-con qiandao-radius">
        <a href="javascript:;" class="close-qiandao-layer qiandao-sprits close"></a>
        <ul class="qiandao-history-inf clear">
            <?php if(is_array($days) || $days instanceof \think\Collection || $days instanceof \think\Paginator): $i = 0; $__LIST__ = $days;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li>
                <p>连续签到</p>
                <h4><?php echo $vo['signDays']; ?></h4>
            </li>
            <li>
                <p>本月签到</p>
                <h4><?php echo $vo['monthsign']; ?></h4>
            </li>
            <li>
                <p>总共签到数</p>
                <h4><?php echo $vo['signAllDays']; ?></h4>
            </li>
            <li>
                <p>签到累计奖励</p>
                <h4><?php echo $vo['signScore']; ?></h4>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="qiandao-history-table">
            <table>
                <thead>
                <tr>
                    <th>签到日期</th>
                    <th>奖励</th>
                    <th>说明</th>
                </tr>
                </thead>
                <table>
                    <?php if(is_array($record) || $record instanceof \think\Collection || $record instanceof \think\Paginator): $i = 0; $__LIST__ = $record;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo $vo['signTime']; ?></td>
                        <td><?php echo $vo['add_score']; ?></td>
                        <td><?php echo $vo['note']; ?></td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </table>
        </div>
    </div>
    <div class="qiandao-layer-bg"></div>
</div>
<!-- 我的签到 layer end -->
<!-- 签到 layer start -->
<div class="qiandao-layer qiandao-active">
    <div class="qiandao-layer-con qiandao-radius">
        <a href="javascript:;" class="close-qiandao-layer qiandao-sprits close"></a>
        <div class="yiqiandao clear">
            <div class="yiqiandao-icon qiandao-sprits"></div>您已连续签到<span><?php echo $signDays+1; ?></span>天
        </div>
        <div class="qiandao-jiangli qiandao-sprits">
            <span class="qiandao-jiangli-num" id="grade">1<em>积分</em></span>
        </div>
        <a href="javascript:;" class="qiandao-share qiandao-tran close">确定</a>
    </div>
    <div class="qiandao-layer-bg"></div>
</div>
<!-- 签到 layer end -->
<script type="text/javascript" src="/static/common/js/jquery-3.1.1.js"></script>
<script>
    $(function() {

        var signFun = function() {
            var dateArray =<?php echo $whichsign; ?>;// 假设已经签到的

            var $dateBox = $("#js-qiandao-list"),
                $currentDate = $(".current-date"),
                $qiandaoBnt = $("#js-just-qiandao"),
                _html = '',
                _handle =<?php echo $signed; ?>,
                myDate = new Date();
            $currentDate.text(myDate.getFullYear() + '年' + parseInt(myDate.getMonth() + 1) + '月' + myDate.getDate() + '日');

            if(<?php echo $signed; ?>==1){
                console.log("今日已签到");
                $qiandaoBnt.addClass('actived');
            }

            var monthFirst = new Date(myDate.getFullYear(), parseInt(myDate.getMonth()), 1).getDay();

            var d = new Date(myDate.getFullYear(), parseInt(myDate.getMonth() + 1), 0);
            var totalDay = d.getDate(); //获取当前月的天数

            for (var i = 0; i < 42; i++) {
                _html += ' <li><div class="qiandao-icon"></div></li>'
            }
            $dateBox.html(_html);//生成日历网格

            var $dateLi = $dateBox.find("li");
            for (var i = 0; i < totalDay; i++) {
                $dateLi.eq(i + monthFirst).addClass("date" + parseInt(i + 1));
                for (var j = 0; j < dateArray.length; j++) {
                    if (i == dateArray[j]) {
                        console.log(222);
                        $dateLi.eq(i + monthFirst).addClass("qiandao");
                    }
                }
            } //生成当月的日历且含已签到

            $(".date" + myDate.getDate()).addClass('able-qiandao');

            $dateBox.on("click", "li", function() {
                if ($(this).hasClass('able-qiandao') && _handle==0) {
                    $(this).addClass('qiandao');
                    qiandaoFun();
                }
            });//签到

            $qiandaoBnt.on("click", function() {
                if (_handle==0) {
                    qiandaoFun();
                }
            }); //签到

            function qiandaoFun() {
                $.ajax({
                    url:"<?php echo url('index/Activity/signFinished'); ?>",
                    type:"post",
                    dataType:"json",
                    data:{
                        flag:<?php echo $ifcontinue; ?>,
                        signDays:<?php echo $signDays; ?>
                    },
                    success:function(data){
                        if(data["code"]==0){
                           $("#grade").html(data["msg"]);
                            $qiandaoBnt.addClass('actived');
                            openLayer("qiandao-active", qianDao);
                            _handle = false;
                        }
                    }
                });
            }
            function qianDao() {
                $(".date" + myDate.getDate()).addClass('qiandao');
            }
        }();

        function openLayer(a, Fun) {
            $('.' + a).fadeIn(Fun)
        } //打开弹窗

        var closeLayer = function() {
            $("body").on("click", ".close", function() {
                $(this).parents(".qiandao-layer").fadeOut()
            })
        }(); //关闭弹窗

        $("#js-qiandao-history").on("click", function() {
            openLayer("qiandao-history-layer", myFun);

            function myFun() {
                console.log(1);
            } //打开弹窗返回函数
        })

    })
</script>
</body>
</html>
