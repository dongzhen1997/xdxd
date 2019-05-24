<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"/usr/share/nginx/html/xdxd/public/../application/admin/view/goods/goodsShow.html";i:1558232301;s:66:"/usr/share/nginx/html/xdxd/application/admin/view/common/meta.html";i:1550898692;s:68:"/usr/share/nginx/html/xdxd/application/admin/view/common/footer.html";i:1551351184;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/static/admin/favicon.ico" >
    <link rel="Shortcut Icon" href="/static/admin/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/static/admin/hui/lib/html5.js"></script>
    <script type="text/javascript" src="/static/admin/hui/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/static/admin/hui/static/h-ui.admin/css/style.css" />
    <!--------自己导入的图标库  font-awesome----------->
    <link rel="stylesheet" href="/static/common/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
<title>xdxd - 商品详情</title>
</head>
<body>
  <div class="cl pd-20" style=" background-color:#b9def0">
      <div class="row">
          <div class="col-sm-6 col-xs-5">
              <img src="<?php if($gDetail['thumb'] == null): ?>/static/admin/img/goods/bg.jpg<?php else: ?>https://xdxd-pic.oss-cn-beijing.aliyuncs.com/<?php echo $gDetail['thumb']; endif; ?>" alt="">
          </div>
          <div class="col-sm-6 col-xs-6">
              <h2><?php echo $gDetail['goodsname']; ?></h2>
              <p>
                <span class="ml-10">单价:￥<del><?php echo $gDetail['price']; ?></del></span>
                <span class="ml-10">促销价:￥<span class="c-red"><?php echo $gDetail['sale_price']; ?></span></span>
              </p>
              <p>
                <span class="ml-10">分类:<?php echo $gDetail['classify_name']; ?></span>
                <span class="ml-10">积分:<?php echo $gDetail['goods_score']; ?></span>
              </p>
          </div>
      </div>
  </div>
  <div class="pd-20">
      <table class="table">
          <tbody>
          <tr>
              <th class="text-r" width="80">库存：</th>
              <td><?php echo $gDetail['num']; ?></td>
          </tr>
          <tr>
              <th class="text-r" width="80">品牌：</th>
              <td>鲜道先得</td>
          </tr>

          <tr>
              <th class="text-r">厂家地址：</th>
              <td>北京</td>
          </tr>

          </tbody>
      </table>
  </div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/admin/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/admin/hui/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/admin/hui/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<script>
    /*个人信息*/
    function myselfinfo(){
        layer.open({
            type: 1,
            area: ['300px','200px'],
            fix: false, //不固定
            maxmin: true,
            shade:0.4,
            title: '查看信息',
            content: '<div><div>用户：</div><div>权限：</div> --- 管理员信息</div>'
        });
    }
</script>
<!--/_footer /作为公共模版分离出去-->

</body>
</html>