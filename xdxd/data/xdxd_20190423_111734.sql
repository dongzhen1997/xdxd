-- ----------------------------
-- 日期：2019-04-23 11:17:34
-- MySQL - 5.5.52-MariaDB : Database - xdxd
-- ----------------------------

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for `xdxd_addr`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_addr`;
CREATE TABLE `xdxd_addr` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `uId` int(11) unsigned NOT NULL  COMMENT '用户Id',
	 `tel` char(11) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '联系电话',
	 `province` varchar(10) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '省份',
	 `city` varchar(10) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '城市',
	 `addr_detail` varchar(30) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '详细地址',
	 `linkman` varchar(10) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '联系人姓名',
	 `block` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '区/县',
	 `postalcode` int(8) COMMENT '邮政编号',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT  CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_addr`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_admin`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_admin`;
CREATE TABLE `xdxd_admin` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `username` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '用户名',
	 `tName` varchar(10) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '管理员真实姓名',
	 `pwd` varchar(33) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '用户密码',
	 `email` varchar(25) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '邮箱地址',
	 `tel` char(11) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '手机号',
	 `sex` tinyint(1) unsigned COMMENT '性别 0---男  1---女',
	 `IDcard` varchar(19) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '管理员身份证号',
	 `headimg` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '用户头像',
	 `level` tinyint(3) unsigned DEFAULT 1 COMMENT '权限 1---普通管理员  2---项目经理  3---主管   9---超级管理员  默认1',
	 `roleId` int(11) COMMENT '角色Id',
	 `registTime` datetime DEFAULT 0000-00-00 00:00:00 COMMENT '管理员创建时间',
	 `a_score` int(11) unsigned COMMENT '管理员积分',
	 `signDays` tinyint(3) COMMENT '连续签到天数   满14天归零，中断归零',
	 `signAllDays` int(11) COMMENT '签到累计总天数',
	 `signScore` int(11) unsigned COMMENT '签到累计积分',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_admin`
-- ----------------------------

INSERT INTO `xdxd_admin` VALUES ('1', 'dz', '董真', '45917634c7cac19dcadcc247665f65a8', '1025932659@qq.com', '15952721962', '0', '321011199701150913', '', '1', '1', '2019-04-18 17:20:22', '', '0', '', '0');

-- ----------------------------
-- Table structure for `xdxd_admin_carte`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_admin_carte`;
CREATE TABLE `xdxd_admin_carte` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `carte_name` varchar(10) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '菜单名（栏目名称）',
	 `carte_url` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '菜单访问地址',
	 `parentId` int(11) COMMENT '父级菜单Id   0---1级菜单   非0的为上级菜单Id',
	 `icoId` int(11) COMMENT '分类图标Id',
	 `status` tinyint(3) NOT NULL  DEFAULT 1 COMMENT '菜单等级   1---一级分类   2---二级分类   3---三级分类',
	 `c_add` tinyint(1) COMMENT '操作状态--增加    0---没有  1---有',
	 `c_del` tinyint(1) COMMENT '操作状态---删除    0---没有  1---有',
	 `c_edit` tinyint(1) COMMENT '操作状态---编辑    0---没有  1---有',
	 `c_see` tinyint(1) COMMENT '操作状态---查看    0---没有  1---有',
	 `c_mind` tinyint(1) COMMENT '操作状态---审核    0---没有  1---有',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_admin_carte`
-- ----------------------------

INSERT INTO `xdxd_admin_carte` VALUES ('1', '管理员管理', '', '0', '2', '1', '', '', '', '', '');
INSERT INTO `xdxd_admin_carte` VALUES ('2', '角色管理', 'admin/admin/adminRole', '1', '', '2', '1', '1', '1', '1', '');
INSERT INTO `xdxd_admin_carte` VALUES ('3', '权限管理', 'admin/admin/adminPermission', '1', '', '2', '1', '1', '1', '1', '');
INSERT INTO `xdxd_admin_carte` VALUES ('4', '管理员列表', 'admin/admin/adminList', '1', '', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('5', '系统管理', '', '0', '5', '1', '', '', '', '', '');
INSERT INTO `xdxd_admin_carte` VALUES ('6', '菜单管理', 'admin/menu/menuList', '5', '', '2', '1', '1', '1', '1', '');
INSERT INTO `xdxd_admin_carte` VALUES ('7', '屏蔽词', 'admin/menu/systemShielding', '5', '', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('8', '会员管理', '', '0', '1', '1', '', '', '', '', '');
INSERT INTO `xdxd_admin_carte` VALUES ('9', '会员列表', 'admin/member/memberList', '8', '', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('10', '产品管理', '', '', '3', '1', '', '', '', '', '');
INSERT INTO `xdxd_admin_carte` VALUES ('11', '产品列表', 'admin/goods/goodsList', '10', '', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('12', '产品分类', 'admin/classify/classifyList', '10', '', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('13', '活动管理', '', '0', '6', '1', '', '', '', '', '');
INSERT INTO `xdxd_admin_carte` VALUES ('14', '抽奖', '', '13', '', '2', '', '', '', '', '');
INSERT INTO `xdxd_admin_carte` VALUES ('15', '签到', '', '13', '', '2', '', '', '', '', '');
INSERT INTO `xdxd_admin_carte` VALUES ('16', '秒杀', '', '13', '', '2', '', '', '', '', '');
INSERT INTO `xdxd_admin_carte` VALUES ('17', '数据备份还原', 'admin/databackup/backup', '5', '', '2', '', '', '', '', '');
INSERT INTO `xdxd_admin_carte` VALUES ('18', '', '', '', '', '1', '', '', '', '', '');
INSERT INTO `xdxd_admin_carte` VALUES ('19', '', '', '', '', '1', '', '', '', '', '');

-- ----------------------------
-- Table structure for `xdxd_admin_role`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_admin_role`;
CREATE TABLE `xdxd_admin_role` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `role` varchar(10) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '角色名',
	 `describe` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '角色描述',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_admin_role`
-- ----------------------------

INSERT INTO `xdxd_admin_role` VALUES ('1', '超级管理员', '一切权利');

-- ----------------------------
-- Table structure for `xdxd_admin_role_permission`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_admin_role_permission`;
CREATE TABLE `xdxd_admin_role_permission` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `roleId` int(11) NOT NULL  COMMENT '角色Id',
	 `carteId` int(11) NOT NULL  COMMENT '菜单Id',
	 `o_add` tinyint(1) COMMENT '增加操作      1---允许   2---拒绝',
	 `o_edit` tinyint(1) COMMENT '编辑操作     1---允许   2---拒绝',
	 `o_del` tinyint(1) COMMENT '删除操作    1---允许   2---拒绝',
	 `o_see` tinyint(1) COMMENT '查看操作     1---允许   2---拒绝',
	 `o_mind` tinyint(1) COMMENT '审核操作     1---允许   2---拒绝',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_admin_role_permission`
-- ----------------------------

INSERT INTO `xdxd_admin_role_permission` VALUES ('1', '1', '1', '', '', '', '', '');
INSERT INTO `xdxd_admin_role_permission` VALUES ('2', '1', '2', '1', '1', '1', '1', '');
INSERT INTO `xdxd_admin_role_permission` VALUES ('3', '1', '3', '1', '1', '1', '1', '');
INSERT INTO `xdxd_admin_role_permission` VALUES ('4', '1', '4', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('5', '1', '5', '', '', '', '', '');
INSERT INTO `xdxd_admin_role_permission` VALUES ('6', '1', '6', '1', '1', '1', '1', '');
INSERT INTO `xdxd_admin_role_permission` VALUES ('7', '1', '7', '1', '1', '1', '1', '');
INSERT INTO `xdxd_admin_role_permission` VALUES ('8', '1', '8', '1', '1', '1', '1', '');
INSERT INTO `xdxd_admin_role_permission` VALUES ('9', '1', '9', '1', '1', '1', '1', '');
INSERT INTO `xdxd_admin_role_permission` VALUES ('10', '1', '10', '1', '1', '1', '1', '');
INSERT INTO `xdxd_admin_role_permission` VALUES ('11', '1', '11', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('12', '1', '12', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('13', '1', '13', '', '', '', '', '');
INSERT INTO `xdxd_admin_role_permission` VALUES ('14', '1', '14', '', '', '', '', '');
INSERT INTO `xdxd_admin_role_permission` VALUES ('15', '1', '15', '', '', '', '', '');
INSERT INTO `xdxd_admin_role_permission` VALUES ('16', '1', '16', '', '', '', '', '');
INSERT INTO `xdxd_admin_role_permission` VALUES ('17', '1', '17', '', '', '', '', '');
INSERT INTO `xdxd_admin_role_permission` VALUES ('18', '0', '0', '', '', '', '', '');

-- ----------------------------
-- Table structure for `xdxd_admin_sign`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_admin_sign`;
CREATE TABLE `xdxd_admin_sign` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `aId` int(11) NOT NULL  COMMENT '管理员Id',
	 `signTime` datetime COMMENT '签到时间',
	 `signday` tinyint(2) unsigned zerofill DEFAULT 01 COMMENT '签到日期',
	 `note` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '签到记录说明    连续签到14天用户增加100积分，每天增加5积分',
	 `add_score` tinyint(3) COMMENT '增加的积分   每次加5积分，满14天额外加100积分',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_admin_sign`
-- ----------------------------

INSERT INTO `xdxd_admin_sign` VALUES ('1', '1', '2019-02-28 11:59:37', '28', '获得5积分', '5');

-- ----------------------------
-- Table structure for `xdxd_classify`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_classify`;
CREATE TABLE `xdxd_classify` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `classify_name` varchar(10) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '分类名称',
	 `classify_status` tinyint(1) unsigned DEFAULT 1 COMMENT '分类推荐位  1---普通分类 2---首页推广  默认1',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_classify`
-- ----------------------------

INSERT INTO `xdxd_classify` VALUES ('1', '精装大米', '1');
INSERT INTO `xdxd_classify` VALUES ('2', '精装礼盒', '1');
INSERT INTO `xdxd_classify` VALUES ('3', '年卡', '1');
INSERT INTO `xdxd_classify` VALUES ('4', '智能米桶', '1');

-- ----------------------------
-- Table structure for `xdxd_evaluate`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_evaluate`;
CREATE TABLE `xdxd_evaluate` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `goodsId` int(6) unsigned zerofill NOT NULL  DEFAULT 000000 COMMENT '商品Id',
	 `uId` int(11) unsigned NOT NULL  COMMENT '用户Id',
	 `ev_status` tinyint(1) unsigned NOT NULL  COMMENT '商品评价状态 1---好评  2---中评 3---差评',
	 `contentId` int(11) unsigned COMMENT '评论内容Id',
	 `ev_time` datetime NOT NULL  DEFAULT 0000-00-00 00:00:00 COMMENT '评论时间',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT  CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_evaluate`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_evaluate_content`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_evaluate_content`;
CREATE TABLE `xdxd_evaluate_content` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `ev_content` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '商品评论内容',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT  CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_evaluate_content`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_goods`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_goods`;
CREATE TABLE `xdxd_goods` (
	 `Id` int(6) unsigned zerofill NOT NULL  AUTO_INCREMENT  `goodsname` varchar(20) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '商品名称',
	 `price` decimal(6,2) unsigned NOT NULL  DEFAULT 0.00 COMMENT '商品价格',
	 `discount` decimal(3,2) COMMENT '商品折扣',
	 `sale_price` decimal(6,2) unsigned DEFAULT 0.00 COMMENT '促销价',
	 `classifyId` int(11) unsigned NOT NULL  COMMENT '商品分类Id',
	 `num` int(6) unsigned NOT NULL  COMMENT '商品库存',
	 `status` tinyint(1) unsigned NOT NULL  DEFAULT 1 COMMENT '商品推荐位  1---普通商品 2---轮播大图 3---首页推广  4---首页普通商品   默认1',
	 `thumb` varchar(33) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '封面图',
	 `type` tinyint(1) unsigned DEFAULT 1 COMMENT '商品状态  1---正常  2---下架   默认1',
	 `sale_num` int(6) unsigned COMMENT '销量',
	 `goods_score` int(7) unsigned DEFAULT 10 COMMENT '商品积分  默认10',
	 `contentId` int(11) COMMENT '内容Id',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_goods`
-- ----------------------------

INSERT INTO `xdxd_goods` VALUES ('1', '优质五常稻花香家庭装', '189.00', '5.10', '189.00', '2', '10', '4', 'box4.jpg', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('2', '优质五常稻花香大礼盒', '328.00', '5.10', '328.00', '2', '10', '4', 'box3.jpg', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('3', 'G20特供有机五常稻花香家庭装', '380.00', '5.10', '380.00', '2', '10', '4', 'box2.jpg', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('4', 'G20同款有机五常米大礼盒', '880.00', '5.10', '880.00', '2', '10', '4', 'box1.jpg', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('5', '优质五常稻花香11℃鲜米5斤', '64.50', '5.10', '164.00', '1', '10', '4', 'rice1.jpg', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('6', '优质通河稻花香11℃鲜米10斤', '109.00', '5.10', '200.00', '1', '10', '4', 'rice2.jpg', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('7', '鲜道先得智能米桶', '1000.00', '5.10', '899.00', '4', '10', '4', 'ricemachine.jpg', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('8', '朴道良品 优质稻花香120斤•年卡', '1589.00', '5.10', '3398.00', '3', '10', '4', 'card1.png', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('9', '朴道良品 通河长粒香240斤•年卡', '70.00', '5.10', '59.50', '3', '10', '4', 'card6.png', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('10', '补差价专用·单拍不发货', '0.10', '5.10', '0.10', '3', '10', '4', 'card3.jpg', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('11', '东北长粒香11℃鲜米10斤', '79.00', '5.10', '79.00', '1', '10', '4', 'rice3.jpg', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('12', 'G20有机稻花香元首版大礼盒', '1088.00', '5.10', '1088.00', '2', '10', '4', 'box5.jpg', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('13', 'G20特供有机五常稻花香•季卡 50斤', '1680.00', '5.10', '1680.00', '3', '10', '4', 'card7.jpg', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('14', '优质五常稻花香11℃鲜米•季卡45斤', '580.50', '5.10', '550.00', '3', '10', '4', 'card5.jpg', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('15', '东北长粒香11℃鲜米•年卡120斤', '948.00', '5.10', '660.00', '3', '10', '4', 'card2.jpg', '1', '0', '10', '');
INSERT INTO `xdxd_goods` VALUES ('17', 'ddd', '3.00', '', '2.00', '2', '2', '2', '68d7f8436fddbb08d3b955332ea81d5e5', '1', '0', '30', '4');

-- ----------------------------
-- Table structure for `xdxd_goods_content`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_goods_content`;
CREATE TABLE `xdxd_goods_content` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `goods_content` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '商品内容简介',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_goods_content`
-- ----------------------------

INSERT INTO `xdxd_goods_content` VALUES ('1', '1123123');
INSERT INTO `xdxd_goods_content` VALUES ('3', '<p>dddddd</p>');
INSERT INTO `xdxd_goods_content` VALUES ('4', '<p>fffff</p>');

-- ----------------------------
-- Table structure for `xdxd_goods_detail`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_goods_detail`;
CREATE TABLE `xdxd_goods_detail` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `goodsId` int(6) unsigned zerofill NOT NULL  DEFAULT 000000 COMMENT '商品Id',
	 `_name` varchar(15) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '品名',
	 `brand` varchar(15) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '品牌',
	 `size` varchar(10) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '商品规格',
	 `quality_date` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '保质期',
	 `shop_addr` varchar(20) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '厂家地址',
	 `shop` varchar(20) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '厂家',
	 `goods_contentId` int(11) unsigned COMMENT '商品简介内容Id',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT  CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_goods_detail`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_goods_img`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_goods_img`;
CREATE TABLE `xdxd_goods_img` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `goodsId` int(6) unsigned zerofill NOT NULL  DEFAULT 000000 COMMENT '商品Id',
	 `img` varchar(33) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '商品详情图片',
	 `img_status` tinyint(1) unsigned NOT NULL  DEFAULT 1 COMMENT '图片状态  1---轮播图',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT  CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_goods_img`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_ico`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_ico`;
CREATE TABLE `xdxd_ico` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `iconame` varchar(20) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '图标--标签名',
	 `introduce` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '图标介绍',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_ico`
-- ----------------------------

INSERT INTO `xdxd_ico` VALUES ('1', '&#xe60d;', '人物1');
INSERT INTO `xdxd_ico` VALUES ('2', '&#xe62d;', '人物2');
INSERT INTO `xdxd_ico` VALUES ('3', '&#xe620;', '产品1');
INSERT INTO `xdxd_ico` VALUES ('4', '&#xe627;', '订单1');
INSERT INTO `xdxd_ico` VALUES ('5', '&#xe62e;', '设置1');
INSERT INTO `xdxd_ico` VALUES ('6', '&#xe727;', '活动1');
INSERT INTO `xdxd_ico` VALUES ('7', '&#xe694;', '微信1');

-- ----------------------------
-- Table structure for `xdxd_index`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_index`;
CREATE TABLE `xdxd_index` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT  CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_index`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_order_detail`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_order_detail`;
CREATE TABLE `xdxd_order_detail` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `orderId` varchar(33) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '订单编号',
	 `goodsId` int(6) unsigned zerofill NOT NULL  DEFAULT 000000 COMMENT '商品Id',
	 `count` int(6) unsigned NOT NULL  COMMENT '商品数量',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT  CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_order_detail`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_order_list`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_order_list`;
CREATE TABLE `xdxd_order_list` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `orderId` varchar(33) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '订单编号',
	 `allprice` decimal(8,2) unsigned zerofill DEFAULT 000000.00 COMMENT '订单总价',
	 `orderTime` datetime NOT NULL  DEFAULT 0000-00-00 00:00:00 COMMENT '下单时间',
	 `status` tinyint(1) unsigned NOT NULL  DEFAULT 1 COMMENT '订单状态 1---未付款  2---已付款 默认1',
	 `uId` int(11) unsigned NOT NULL  COMMENT '用户Id',
	 `pay_way` tinyint(1) COMMENT '支付方式  1---支付宝  2---微信  3---当前余额 4---到付',
	 `payId` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '第三方的流水号',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT  CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_order_list`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_score`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_score`;
CREATE TABLE `xdxd_score` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `goodsId` int(6) unsigned zerofill NOT NULL  DEFAULT 000000 COMMENT '参加活动的商品Id',
	 `sale_score` int(7) unsigned zerofill COMMENT '花费积分',
	 `num` int(6) unsigned zerofill COMMENT '参加活动的商品数量',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT  CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_score`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_user`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_user`;
CREATE TABLE `xdxd_user` (
	 `Id` int(11) NOT NULL  AUTO_INCREMENT  `username` varchar(10) NOT NULL  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '用户名',
	 `trueName` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '用户真实姓名',
	 `pwd` varchar(33) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '用户密码',
	 `email` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '邮箱地址',
	 `tel` char(11) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '手机号码',
	 `sex` tinyint(1) unsigned COMMENT '性别  0---男  1---女',
	 `idcard` varchar(19) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '用户身份证号',
	 `headimg` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '用户头像',
	 `vip` tinyint(1) unsigned DEFAULT 1 COMMENT '1---普通会员  2---vip会员  3---高级vip',
	 `score` int(7) unsigned COMMENT '用户积分',
	 `money` decimal(6,2) unsigned DEFAULT 0.00 COMMENT '用户金额',
	 `wxId` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '微信Id',
	 `content` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '个人简介',
	 `addr_id` int(11) unsigned COMMENT '默认地址Id',
	 `status` tinyint(1) unsigned DEFAULT 1 COMMENT '用户状态   1---正常  2---冻结',
	 `registTime` datetime COMMENT '注册时间',
	 `subscribe` tinyint(1) COMMENT '订阅状态   1---已订阅  0---未订阅',
	 `openid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '微信openid',
	 `nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '微信昵称',
	 `subscribe_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '订阅时间',
	 PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Data for the table `xdxd_user`
-- ----------------------------

INSERT INTO `xdxd_user` VALUES ('1', 'dz', '董真', '45917634c7cac19dcadcc247665f65a8', '1025932659@qq.com', '15952721962', '0', '321011119701150913', '', '1', '0', '0.00', '', '', '0', '1', '', '', '', '', '');

