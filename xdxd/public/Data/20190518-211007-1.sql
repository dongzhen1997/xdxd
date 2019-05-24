
-- -----------------------------
-- Table structure for `xdxd_addr`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_addr`;
CREATE TABLE `xdxd_addr` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户Id',
  `tel` char(11) NOT NULL DEFAULT '0' COMMENT '联系电话',
  `province` varchar(10) NOT NULL DEFAULT '' COMMENT '省份',
  `city` varchar(10) NOT NULL DEFAULT '' COMMENT '城市',
  `addr_detail` varchar(30) NOT NULL DEFAULT '' COMMENT '详细地址',
  `linkman` varchar(10) NOT NULL DEFAULT '' COMMENT '联系人姓名',
  `block` varchar(10) DEFAULT NULL COMMENT '区/县',
  `postalcode` int(8) DEFAULT NULL COMMENT '邮政编号',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='地址信息表';

-- -----------------------------
-- Records of `xdxd_addr`
-- -----------------------------
INSERT INTO `xdxd_addr` VALUES ('23', '1', '15952721962', '江苏', '扬州市', '运河水榭19栋601室', '董真', '广陵区', '225002');
INSERT INTO `xdxd_addr` VALUES ('24', '1', '15952721962', '河北', '廊坊市', '防灾科技学院', '董真', '三河市', '22500');
INSERT INTO `xdxd_addr` VALUES ('25', '3', '123456', '天津', '河东区', 'dddd', 'wzh', '全境', '33333');
INSERT INTO `xdxd_addr` VALUES ('27', '2', '13323067487', '河北', '廊坊市', '华科', '郭久成', '三河市', '123456');
INSERT INTO `xdxd_addr` VALUES ('28', '2', '15730482614', '北京', '昌平区', '文化大厦', '代收', '城区', '123123');

-- -----------------------------
-- Table structure for `xdxd_admin`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_admin`;
CREATE TABLE `xdxd_admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT '' COMMENT '用户名',
  `tName` varchar(10) NOT NULL DEFAULT '' COMMENT '管理员真实姓名',
  `pwd` varchar(33) NOT NULL DEFAULT '' COMMENT '用户密码',
  `email` varchar(25) NOT NULL DEFAULT '' COMMENT '邮箱地址',
  `tel` char(11) DEFAULT NULL COMMENT '手机号',
  `sex` tinyint(1) unsigned DEFAULT NULL COMMENT '性别 0---男  1---女',
  `IDcard` varchar(19) DEFAULT NULL COMMENT '管理员身份证号',
  `headimg` varchar(50) DEFAULT NULL COMMENT '用户头像',
  `level` tinyint(3) unsigned DEFAULT '1' COMMENT '权限 1---普通管理员  2---项目经理  3---主管   9---超级管理员  默认1',
  `roleId` int(11) DEFAULT NULL COMMENT '角色Id',
  `registTime` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '管理员创建时间',
  `a_score` int(11) unsigned DEFAULT NULL COMMENT '管理员积分',
  `signDays` tinyint(3) DEFAULT '0' COMMENT '连续签到天数   满14天归零，中断归零',
  `signAllDays` int(11) DEFAULT NULL COMMENT '签到累计总天数',
  `signScore` int(11) unsigned DEFAULT '0' COMMENT '签到累计积分',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='管理员信息表';

-- -----------------------------
-- Records of `xdxd_admin`
-- -----------------------------
INSERT INTO `xdxd_admin` VALUES ('1', 'dz', '', '45917634c7cac19dcadcc247665f65a8', '1025932659@qq.com', '15952721962', '1', '', '', '1', '1', '0000-00-00 00:00:00', '0', '0', '0', '0');
INSERT INTO `xdxd_admin` VALUES ('2', 'gjc', '郭久成', '45917634c7cac19dcadcc247665f65a8', '3276992479@qq.com', '13312341234', '0', '110101199408170387', '20190513/081ecb9d8d0772664b3ac77ad1aa89a1.jpg', '1', '1', '2019-05-13 12:39:57', '0', '0', '0', '0');
INSERT INTO `xdxd_admin` VALUES ('3', 'rpq', '测试员', '45917634c7cac19dcadcc247665f65a8', '1234@qq.com', '13312341234', '1', '110101199408170387', '20190515/a7c822f3b4179b13955948e71406661c.png', '1', '2', '2019-05-15 12:53:32', '', '0', '', '0');
INSERT INTO `xdxd_admin` VALUES ('4', 'wzh', '高级测试员', '45917634c7cac19dcadcc247665f65a8', '456@qq.com', '15902253918', '0', '110701199408170387', '20190515/d6428dbe90aa2353f58ccdedac01aa98.png', '1', '3', '2019-05-15 12:54:32', '', '0', '', '0');

-- -----------------------------
-- Table structure for `xdxd_admin_carte`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_admin_carte`;
CREATE TABLE `xdxd_admin_carte` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `carte_name` varchar(10) NOT NULL DEFAULT '' COMMENT '菜单名（栏目名称）',
  `carte_url` varchar(40) DEFAULT NULL COMMENT '菜单访问地址',
  `parentId` int(11) DEFAULT NULL COMMENT '父级菜单Id   0---1级菜单   非0的为上级菜单Id',
  `icoId` int(11) DEFAULT NULL COMMENT '分类图标Id',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '菜单等级   1---一级分类   2---二级分类   3---三级分类',
  `c_add` tinyint(1) DEFAULT NULL COMMENT '操作状态--增加    0---没有  1---有',
  `c_del` tinyint(1) DEFAULT NULL COMMENT '操作状态---删除    0---没有  1---有',
  `c_edit` tinyint(1) DEFAULT NULL COMMENT '操作状态---编辑    0---没有  1---有',
  `c_see` tinyint(1) DEFAULT NULL COMMENT '操作状态---查看    0---没有  1---有',
  `c_mind` tinyint(1) DEFAULT NULL COMMENT '操作状态---审核    0---没有  1---有',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='后台菜单信息表';

-- -----------------------------
-- Records of `xdxd_admin_carte`
-- -----------------------------
INSERT INTO `xdxd_admin_carte` VALUES ('1', '管理员管理', '', '0', '2', '1', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('2', '角色管理', 'admin/admin/adminRole', '1', '0', '2', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('3', '数据备份还原', 'admin/databackup/backupList', '5', '0', '2', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('4', '管理员列表', 'admin/admin/adminList', '1', '0', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('5', '系统管理', '', '0', '5', '1', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('6', '菜单管理', 'admin/menu/menuList', '5', '0', '2', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('7', '屏蔽词', 'admin/menu/systemShielding', '5', '0', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('8', '会员管理', '', '0', '1', '1', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('9', '会员列表', 'admin/member/memberList', '8', '0', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('10', '产品管理', '', '0', '3', '1', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('11', '产品列表', 'admin/goods/goodsList', '10', '0', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('12', '产品分类', 'admin/classify/classifyList', '10', '0', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('13', '订单管理', '', '0', '4', '1', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('14', '订单列表', 'admin/Order/orderList', '13', '0', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('20', '活动管理', '', '0', '6', '1', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('21', '幸运抽奖', 'admin/activity/turntable', '20', '0', '2', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('22', '积分商城', '', '20', '0', '2', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('23', '用户签到', '', '20', '0', '2', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('24', '地图订单', 'admin/Order/orderPlace', '13', '0', '2', '', '', '', '', '');

-- -----------------------------
-- Table structure for `xdxd_admin_role`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_admin_role`;
CREATE TABLE `xdxd_admin_role` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(10) NOT NULL DEFAULT '' COMMENT '角色名',
  `describe` varchar(30) DEFAULT NULL COMMENT '角色描述',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='角色信息表';

-- -----------------------------
-- Records of `xdxd_admin_role`
-- -----------------------------
INSERT INTO `xdxd_admin_role` VALUES ('1', '超级管理员', '一切权利');
INSERT INTO `xdxd_admin_role` VALUES ('2', '普通管理员', '只可以进行商品模块的管理');
INSERT INTO `xdxd_admin_role` VALUES ('3', '高级管理员', '可以进行除系统及管理员之外的操作');

-- -----------------------------
-- Table structure for `xdxd_admin_role_permission`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_admin_role_permission`;
CREATE TABLE `xdxd_admin_role_permission` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `roleId` int(11) NOT NULL DEFAULT '0' COMMENT '角色Id',
  `carteId` int(11) NOT NULL DEFAULT '0' COMMENT '菜单Id',
  `o_add` tinyint(1) DEFAULT NULL COMMENT '增加操作      1---允许   2---拒绝',
  `o_edit` tinyint(1) DEFAULT NULL COMMENT '编辑操作     1---允许   2---拒绝',
  `o_del` tinyint(1) DEFAULT NULL COMMENT '删除操作    1---允许   2---拒绝',
  `o_see` tinyint(1) DEFAULT NULL COMMENT '查看操作     1---允许   2---拒绝',
  `o_mind` tinyint(1) DEFAULT NULL COMMENT '审核操作     1---允许   2---拒绝',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='角色授权表';

-- -----------------------------
-- Records of `xdxd_admin_role_permission`
-- -----------------------------
INSERT INTO `xdxd_admin_role_permission` VALUES ('70', '1', '1', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('71', '1', '2', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('72', '1', '4', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('73', '1', '5', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('74', '1', '3', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('75', '1', '6', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('76', '1', '7', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('77', '1', '8', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('78', '1', '9', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('79', '1', '10', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('80', '1', '11', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('81', '1', '12', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('82', '1', '13', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('83', '1', '14', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('84', '1', '20', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('85', '1', '21', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('86', '1', '22', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('87', '1', '24', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('89', '2', '10', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('90', '2', '11', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('91', '2', '12', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('92', '3', '8', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('93', '3', '9', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('94', '3', '10', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('95', '3', '11', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('96', '3', '12', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('97', '3', '13', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('98', '3', '14', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('99', '3', '20', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('100', '3', '21', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('101', '3', '22', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('102', '3', '23', '0', '0', '0', '0', '0');

-- -----------------------------
-- Table structure for `xdxd_admin_sign`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_admin_sign`;
CREATE TABLE `xdxd_admin_sign` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `aId` int(11) NOT NULL DEFAULT '0' COMMENT '用户Id',
  `signTime` datetime DEFAULT NULL COMMENT '签到时间',
  `signday` tinyint(2) unsigned zerofill DEFAULT '01' COMMENT '签到天数',
  `note` varchar(30) DEFAULT NULL COMMENT '签到记录说明    连续签到14天用户增加100积分，每天增加5积分',
  `add_score` tinyint(3) DEFAULT NULL COMMENT '增加的积分   每次加5积分，满14天额外加100积分',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员签到记录信息表';

-- -----------------------------
-- Records of `xdxd_admin_sign`
-- -----------------------------
INSERT INTO `xdxd_admin_sign` VALUES ('1', '1', '2019-02-28 11:59:37', '28', '获得5积分', '5');

-- -----------------------------
-- Table structure for `xdxd_classify`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_classify`;
CREATE TABLE `xdxd_classify` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `classify_name` varchar(10) NOT NULL DEFAULT '' COMMENT '分类名称',
  `classify_status` tinyint(1) unsigned DEFAULT '1' COMMENT '分类推荐位  1---普通分类 2---首页推广  默认1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='商品分类表';

-- -----------------------------
-- Records of `xdxd_classify`
-- -----------------------------
INSERT INTO `xdxd_classify` VALUES ('1', '精装大米', '1');
INSERT INTO `xdxd_classify` VALUES ('2', '精装礼盒', '1');
INSERT INTO `xdxd_classify` VALUES ('3', '年卡', '1');
INSERT INTO `xdxd_classify` VALUES ('4', '智能', '1');
INSERT INTO `xdxd_classify` VALUES ('5', '其他', '1');

-- -----------------------------
-- Table structure for `xdxd_evaluate`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_evaluate`;
CREATE TABLE `xdxd_evaluate` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsId` int(6) unsigned zerofill NOT NULL DEFAULT '000000' COMMENT '商品Id',
  `uId` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户Id',
  `ev_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '商品评价状态 1---好评  2---中评 3---差评',
  `contentId` int(11) unsigned DEFAULT NULL COMMENT '评论内容Id',
  `ev_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '评论时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品评价表';


-- -----------------------------
-- Table structure for `xdxd_evaluate_content`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_evaluate_content`;
CREATE TABLE `xdxd_evaluate_content` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ev_content` text COMMENT '商品评论内容',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品评价内容表';


-- -----------------------------
-- Table structure for `xdxd_goods`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_goods`;
CREATE TABLE `xdxd_goods` (
  `Id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `goodsname` varchar(20) NOT NULL DEFAULT '' COMMENT '商品名称',
  `price` decimal(6,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商品价格',
  `discount` decimal(3,2) DEFAULT NULL COMMENT '商品折扣',
  `sale_price` decimal(6,2) unsigned DEFAULT '0.00' COMMENT '促销价',
  `classifyId` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品分类Id',
  `num` int(6) unsigned NOT NULL DEFAULT '0' COMMENT '商品库存',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '商品推荐位  1---普通商品 2---轮播大图 3---首页推广  4---首页普通商品   默认1',
  `thumb` varchar(33) NOT NULL DEFAULT '' COMMENT '封面图',
  `type` tinyint(1) unsigned DEFAULT '1' COMMENT '商品状态  1---正常  2---下架   默认1',
  `sale_num` int(6) unsigned DEFAULT '0' COMMENT '销量',
  `goods_score` int(7) unsigned DEFAULT '10' COMMENT '商品积分  默认10',
  `contentId` int(11) DEFAULT NULL COMMENT '内容Id',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='商品信息表';

-- -----------------------------
-- Records of `xdxd_goods`
-- -----------------------------
INSERT INTO `xdxd_goods` VALUES ('000001', '优质五常稻花香家庭装', '189.00', '5.10', '189.00', '2', '10', '4', 'box4.jpg', '1', '0', '10', '0');
INSERT INTO `xdxd_goods` VALUES ('000002', '优质五常稻花香大礼盒', '328.00', '5.10', '328.00', '2', '10', '4', 'box3.jpg', '1', '0', '10', '0');
INSERT INTO `xdxd_goods` VALUES ('000003', 'G20特供有机五常稻花香家庭装', '380.00', '5.10', '380.00', '2', '10', '4', 'box2.jpg', '1', '0', '10', '0');
INSERT INTO `xdxd_goods` VALUES ('000004', 'G20同款有机五常米大礼盒', '880.00', '5.10', '880.00', '2', '10', '4', 'box1.jpg', '1', '0', '10', '0');
INSERT INTO `xdxd_goods` VALUES ('000005', '优质五常稻花香11℃鲜米5斤', '64.50', '5.10', '164.00', '1', '10', '4', 'rice1.jpg', '1', '0', '10', '0');
INSERT INTO `xdxd_goods` VALUES ('000006', '优质通河稻花香11℃鲜米10斤', '109.00', '5.10', '200.00', '1', '10', '4', 'rice2.jpg', '1', '0', '10', '0');
INSERT INTO `xdxd_goods` VALUES ('000007', '鲜道先得智能米桶', '1000.00', '5.10', '899.00', '4', '10', '4', 'ricemachine.jpg', '1', '0', '10', '0');
INSERT INTO `xdxd_goods` VALUES ('000008', '朴道良品 优质稻花香120斤•年卡', '1589.00', '5.10', '3398.00', '3', '10', '4', 'card1.png', '1', '0', '10', '0');
INSERT INTO `xdxd_goods` VALUES ('000009', '朴道良品 通河长粒香240斤•年卡', '70.00', '5.10', '59.50', '3', '10', '4', 'card6.png', '1', '0', '10', '0');
INSERT INTO `xdxd_goods` VALUES ('000011', '东北长粒香11℃鲜米10斤', '79.00', '5.10', '79.00', '1', '10', '4', 'rice3.jpg', '1', '0', '10', '0');
INSERT INTO `xdxd_goods` VALUES ('000012', 'G20有机稻花香元首版大礼盒', '1088.00', '5.10', '1088.00', '2', '10', '4', 'box5.jpg', '1', '0', '10', '0');
INSERT INTO `xdxd_goods` VALUES ('000013', 'G20特供有机五常稻花香•季卡 50斤', '1680.00', '5.10', '1680.00', '3', '10', '4', 'card7.jpg', '1', '0', '10', '0');
INSERT INTO `xdxd_goods` VALUES ('000014', '优质五常稻花香11℃鲜米•季卡45斤', '580.50', '5.10', '550.00', '3', '10', '4', 'card5.jpg', '1', '0', '10', '0');
INSERT INTO `xdxd_goods` VALUES ('000015', '东北长粒香11℃鲜米•年卡120斤', '948.00', '5.10', '660.00', '3', '10', '4', 'card2.jpg', '1', '0', '10', '0');

-- -----------------------------
-- Table structure for `xdxd_goods_content`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_goods_content`;
CREATE TABLE `xdxd_goods_content` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_content` text COMMENT '商品内容简介',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品详情-简介内容表';


-- -----------------------------
-- Table structure for `xdxd_goods_detail`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_goods_detail`;
CREATE TABLE `xdxd_goods_detail` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsId` int(6) unsigned zerofill NOT NULL DEFAULT '000000' COMMENT '商品Id',
  `_name` varchar(15) NOT NULL DEFAULT '' COMMENT '品名',
  `brand` varchar(15) NOT NULL DEFAULT '' COMMENT '品牌',
  `size` varchar(10) NOT NULL DEFAULT '' COMMENT '商品规格',
  `quality_date` varchar(15) DEFAULT '' COMMENT '保质期',
  `shop_addr` varchar(20) NOT NULL DEFAULT '' COMMENT '厂家地址',
  `shop` varchar(20) NOT NULL DEFAULT '' COMMENT '厂家',
  `goods_contentId` int(11) unsigned DEFAULT NULL COMMENT '商品简介内容Id',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品详情表';


-- -----------------------------
-- Table structure for `xdxd_goods_img`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_goods_img`;
CREATE TABLE `xdxd_goods_img` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsId` int(6) unsigned zerofill NOT NULL DEFAULT '000000' COMMENT '商品Id',
  `img` varchar(33) NOT NULL DEFAULT '' COMMENT '商品详情图片',
  `img_status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '图片状态  1---轮播图',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品图片副表';


-- -----------------------------
-- Table structure for `xdxd_ico`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_ico`;
CREATE TABLE `xdxd_ico` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `iconame` varchar(20) NOT NULL DEFAULT '' COMMENT '图标--标签名',
  `introduce` varchar(255) DEFAULT NULL COMMENT '图标介绍',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='图标信息表';

-- -----------------------------
-- Records of `xdxd_ico`
-- -----------------------------
INSERT INTO `xdxd_ico` VALUES ('1', '&#xe60d;', '人物1');
INSERT INTO `xdxd_ico` VALUES ('2', '&#xe62d;', '人物2');
INSERT INTO `xdxd_ico` VALUES ('3', '&#xe620;', '产品1');
INSERT INTO `xdxd_ico` VALUES ('4', '&#xe627;', '订单1');
INSERT INTO `xdxd_ico` VALUES ('5', '&#xe62e;', '设置1');
INSERT INTO `xdxd_ico` VALUES ('6', '&#xe727;', '活动1');
INSERT INTO `xdxd_ico` VALUES ('7', '&#xe694;', '微信1');

-- -----------------------------
-- Table structure for `xdxd_order_detail`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_order_detail`;
CREATE TABLE `xdxd_order_detail` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` varchar(33) NOT NULL DEFAULT '' COMMENT '订单编号',
  `goodsId` int(6) unsigned zerofill NOT NULL DEFAULT '000000' COMMENT '商品Id',
  `count` int(6) unsigned NOT NULL DEFAULT '0' COMMENT '商品数量',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='订单详情表';

-- -----------------------------
-- Records of `xdxd_order_detail`
-- -----------------------------
INSERT INTO `xdxd_order_detail` VALUES ('1', '74b3430cba21a155e306749f896eb162', '000006', '1');
INSERT INTO `xdxd_order_detail` VALUES ('2', 'a1d388b561071a4f487df5781c282b51', '000008', '1');
INSERT INTO `xdxd_order_detail` VALUES ('3', 'cc5a9e4ea49b397871381c1c397e5307', '000008', '1');
INSERT INTO `xdxd_order_detail` VALUES ('4', '3c60f567eaedff5a3e3d32052327fcdc', '000005', '1');
INSERT INTO `xdxd_order_detail` VALUES ('5', 'a4e0af14f531231796e71f130eb7005d', '000008', '1');
INSERT INTO `xdxd_order_detail` VALUES ('6', 'd228147bee8225382ae19ec14929d00c', '000008', '1');
INSERT INTO `xdxd_order_detail` VALUES ('8', '1e28a5d0bba508d99ec3904b8657e90e', '000001', '1');
INSERT INTO `xdxd_order_detail` VALUES ('9', 'd68c83d2b9e866908050704b7ab13f0e', '000009', '1');
INSERT INTO `xdxd_order_detail` VALUES ('10', 'c8fb5a2da6e8581d6d8e3ee2e1743fb9', '000009', '1');
INSERT INTO `xdxd_order_detail` VALUES ('11', '08c592eb5e04cb77c307c0197db5e0f4', '000008', '1');
INSERT INTO `xdxd_order_detail` VALUES ('12', '3e16fb612634886aa6c2e9600ab3d255', '000001', '1');

-- -----------------------------
-- Table structure for `xdxd_order_list`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_order_list`;
CREATE TABLE `xdxd_order_list` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` varchar(33) NOT NULL DEFAULT '' COMMENT '订单编号',
  `allprice` decimal(8,2) DEFAULT '0.00' COMMENT '订单总价',
  `orderTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '下单时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '订单状态 1---未付款  2---已付款 3---取消 默认1',
  `uId` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户Id',
  `pay_way` tinyint(1) DEFAULT NULL COMMENT '支付方式  1---支付宝  2---微信  3---当前余额 4---到付',
  `payId` varchar(40) DEFAULT NULL COMMENT '第三方的流水号',
  `Lng` decimal(14,7) DEFAULT NULL COMMENT '纬度',
  `Lat` decimal(14,7) DEFAULT NULL COMMENT '经度',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='订单表';

-- -----------------------------
-- Records of `xdxd_order_list`
-- -----------------------------
INSERT INTO `xdxd_order_list` VALUES ('1', '74b3430cba21a155e306749f896eb162', '200.00', '2019-05-17 15:06:46', '2', '1', '1', '', '116.3800000', '38.0000000');
INSERT INTO `xdxd_order_list` VALUES ('2', 'a1d388b561071a4f487df5781c282b51', '3398.00', '2019-05-17 15:10:30', '2', '1', '1', '', '116.5025000', '38.0454800');
INSERT INTO `xdxd_order_list` VALUES ('3', 'cc5a9e4ea49b397871381c1c397e5307', '3398.00', '2019-05-17 15:26:31', '2', '1', '1', '', '116.3800000', '38.9000000');
INSERT INTO `xdxd_order_list` VALUES ('4', '3c60f567eaedff5a3e3d32052327fcdc', '164.00', '2019-05-17 17:28:43', '3', '1', '1', '', '', '');
INSERT INTO `xdxd_order_list` VALUES ('5', 'a4e0af14f531231796e71f130eb7005d', '3398.00', '2019-05-17 17:36:47', '3', '1', '1', '', '', '');
INSERT INTO `xdxd_order_list` VALUES ('6', 'd228147bee8225382ae19ec14929d00c', '3398.00', '2019-05-17 17:59:36', '2', '1', '1', '', '116.5025000', '38.0454800');
INSERT INTO `xdxd_order_list` VALUES ('8', '1e28a5d0bba508d99ec3904b8657e90e', '189.00', '2019-05-17 20:41:23', '2', '1', '1', '', '116.8124030', '39.9582820');
INSERT INTO `xdxd_order_list` VALUES ('9', 'd68c83d2b9e866908050704b7ab13f0e', '59.50', '2019-05-17 23:16:49', '3', '1', '1', '', '', '');
INSERT INTO `xdxd_order_list` VALUES ('10', 'c8fb5a2da6e8581d6d8e3ee2e1743fb9', '59.50', '2019-05-17 23:17:35', '1', '1', '1', '', '', '');
INSERT INTO `xdxd_order_list` VALUES ('11', '08c592eb5e04cb77c307c0197db5e0f4', '3398.00', '2019-05-18 18:21:05', '1', '1', '1', '', '', '');
INSERT INTO `xdxd_order_list` VALUES ('12', '3e16fb612634886aa6c2e9600ab3d255', '189.00', '2019-05-18 20:55:09', '1', '1', '1', '', '', '');

-- -----------------------------
-- Table structure for `xdxd_score`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_score`;
CREATE TABLE `xdxd_score` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsId` int(6) unsigned zerofill NOT NULL DEFAULT '000000' COMMENT '参加活动的商品Id',
  `sale_score` int(7) DEFAULT NULL COMMENT '花费积分',
  `num` int(6) unsigned zerofill DEFAULT NULL COMMENT '参加活动的商品数量',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='积分兑换表';

-- -----------------------------
-- Records of `xdxd_score`
-- -----------------------------
INSERT INTO `xdxd_score` VALUES ('1', '000001', '100', '000010');
INSERT INTO `xdxd_score` VALUES ('2', '000002', '200', '000020');
INSERT INTO `xdxd_score` VALUES ('3', '000003', '200', '000020');

-- -----------------------------
-- Table structure for `xdxd_seckill`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_seckill`;
CREATE TABLE `xdxd_seckill` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsId` int(11) DEFAULT NULL COMMENT '参与秒杀的商品ID',
  `num` int(6) DEFAULT NULL COMMENT '参与活动的商品数量',
  `seckillprice` decimal(6,2) DEFAULT NULL COMMENT '秒杀价格',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- -----------------------------
-- Records of `xdxd_seckill`
-- -----------------------------
INSERT INTO `xdxd_seckill` VALUES ('1', '1', '3', '100.00');
INSERT INTO `xdxd_seckill` VALUES ('2', '11', '9', '99.00');
INSERT INTO `xdxd_seckill` VALUES ('3', '2', '10', '50.00');

-- -----------------------------
-- Table structure for `xdxd_sign`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_sign`;
CREATE TABLE `xdxd_sign` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL DEFAULT '0' COMMENT '管理员Id',
  `signTime` datetime DEFAULT NULL COMMENT '签到时间',
  `signday` tinyint(2) unsigned zerofill DEFAULT '01' COMMENT '签到日期(每个月第几号)',
  `note` varchar(30) DEFAULT NULL COMMENT '签到记录说明    连续签到16天用户增加100积分，每天增加5积分',
  `add_score` tinyint(3) DEFAULT NULL COMMENT '增加的积分   每次加5积分，满16天额外加100积分',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='管理员签到记录信息表';

-- -----------------------------
-- Records of `xdxd_sign`
-- -----------------------------
INSERT INTO `xdxd_sign` VALUES ('1', '1', '2019-05-14 16:35:28', '14', '获得5积分', '5');
INSERT INTO `xdxd_sign` VALUES ('2', '2', '2019-05-15 11:00:22', '15', '获得5积分', '5');
INSERT INTO `xdxd_sign` VALUES ('3', '2', '2019-05-15 11:00:28', '15', '获得5积分', '5');
INSERT INTO `xdxd_sign` VALUES ('4', '2', '2019-05-15 11:00:32', '15', '获得5积分', '5');
INSERT INTO `xdxd_sign` VALUES ('5', '2', '2019-05-15 11:00:35', '15', '获得5积分', '5');
INSERT INTO `xdxd_sign` VALUES ('6', '2', '2019-05-15 11:00:38', '15', '获得5积分', '5');
INSERT INTO `xdxd_sign` VALUES ('7', '2', '2019-05-17 10:31:53', '17', '获得5积分', '5');
INSERT INTO `xdxd_sign` VALUES ('8', '2', '2019-05-17 10:31:56', '17', '获得5积分', '5');
INSERT INTO `xdxd_sign` VALUES ('9', '1', '2019-05-17 23:16:21', '17', '获得5积分', '5');

-- -----------------------------
-- Table structure for `xdxd_turntable_detail`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_turntable_detail`;
CREATE TABLE `xdxd_turntable_detail` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) DEFAULT NULL COMMENT '用户',
  `t_Id` int(11) DEFAULT NULL COMMENT '奖品ID',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `xdxd_turntable_detail`
-- -----------------------------
INSERT INTO `xdxd_turntable_detail` VALUES ('1', '1', '3');
INSERT INTO `xdxd_turntable_detail` VALUES ('2', '2', '1');
INSERT INTO `xdxd_turntable_detail` VALUES ('3', '3', '2');
INSERT INTO `xdxd_turntable_detail` VALUES ('4', '1', '3');
INSERT INTO `xdxd_turntable_detail` VALUES ('5', '2', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('6', '3', '1');
INSERT INTO `xdxd_turntable_detail` VALUES ('7', '1', '2');
INSERT INTO `xdxd_turntable_detail` VALUES ('8', '2', '3');
INSERT INTO `xdxd_turntable_detail` VALUES ('9', '3', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('10', '1', '1');
INSERT INTO `xdxd_turntable_detail` VALUES ('11', '2', '2');
INSERT INTO `xdxd_turntable_detail` VALUES ('12', '3', '3');
INSERT INTO `xdxd_turntable_detail` VALUES ('13', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('14', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('15', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('16', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('17', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('18', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('19', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('20', '2', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('21', '2', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('22', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('23', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('24', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('25', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('26', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('27', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('28', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('29', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('30', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('31', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('32', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('33', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('34', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('35', '1', '3');
INSERT INTO `xdxd_turntable_detail` VALUES ('36', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('37', '1', '2');
INSERT INTO `xdxd_turntable_detail` VALUES ('38', '1', '3');
INSERT INTO `xdxd_turntable_detail` VALUES ('39', '1', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('40', '1', '3');
INSERT INTO `xdxd_turntable_detail` VALUES ('41', '2', '3');
INSERT INTO `xdxd_turntable_detail` VALUES ('42', '2', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('43', '2', '4');
INSERT INTO `xdxd_turntable_detail` VALUES ('44', '1', '3');
INSERT INTO `xdxd_turntable_detail` VALUES ('45', '1', '3');
INSERT INTO `xdxd_turntable_detail` VALUES ('46', '1', '1');
INSERT INTO `xdxd_turntable_detail` VALUES ('47', '1', '3');
INSERT INTO `xdxd_turntable_detail` VALUES ('48', '1', '3');

-- -----------------------------
-- Table structure for `xdxd_turntable_list`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_turntable_list`;
CREATE TABLE `xdxd_turntable_list` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(10) DEFAULT NULL COMMENT '奖品等级',
  `award` varchar(25) DEFAULT NULL COMMENT '奖品',
  `num` int(5) DEFAULT NULL COMMENT '数量',
  `possibility` decimal(2,2) DEFAULT NULL COMMENT '概率',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `xdxd_turntable_list`
-- -----------------------------
INSERT INTO `xdxd_turntable_list` VALUES ('1', '一等奖', 'iphoneXs', '1', '0.10');
INSERT INTO `xdxd_turntable_list` VALUES ('2', '二等奖', '小米手机', '1', '0.15');
INSERT INTO `xdxd_turntable_list` VALUES ('3', '三等奖', '华为p30', '1', '0.60');
INSERT INTO `xdxd_turntable_list` VALUES ('4', '幸运奖', '20积分', '1', '0.15');

-- -----------------------------
-- Table structure for `xdxd_user`
-- -----------------------------
DROP TABLE IF EXISTS `xdxd_user`;
CREATE TABLE `xdxd_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL DEFAULT '' COMMENT '用户名',
  `trueName` varchar(10) DEFAULT NULL COMMENT '用户真实姓名',
  `pwd` varchar(33) DEFAULT '' COMMENT '用户密码',
  `email` varchar(25) DEFAULT '' COMMENT '邮箱地址',
  `tel` char(11) DEFAULT '0' COMMENT '手机号码',
  `sex` tinyint(1) unsigned DEFAULT NULL COMMENT '性别  0---男  1---女',
  `idcard` varchar(19) DEFAULT NULL COMMENT '用户身份证号',
  `headimg` varchar(50) DEFAULT NULL COMMENT '用户头像',
  `vip` tinyint(1) unsigned DEFAULT '1' COMMENT '1---普通会员  2---vip会员  3---高级vip',
  `score` int(7) unsigned DEFAULT '0' COMMENT '用户积分',
  `money` decimal(6,2) unsigned DEFAULT '0.00' COMMENT '用户金额',
  `wxId` varchar(30) DEFAULT NULL COMMENT '微信Id',
  `content` varchar(30) DEFAULT NULL COMMENT '个人简介',
  `addr_id` int(11) unsigned DEFAULT NULL COMMENT '默认地址Id',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '用户状态   1---正常  2---冻结',
  `registTime` datetime DEFAULT NULL COMMENT '注册时间',
  `subscribe` tinyint(1) DEFAULT NULL COMMENT '订阅状态   1---已订阅  0---未订阅',
  `openid` varchar(50) DEFAULT NULL COMMENT '微信openid',
  `nickname` varchar(255) DEFAULT NULL COMMENT '微信昵称',
  `subscribe_time` varchar(255) DEFAULT NULL COMMENT '订阅时间',
  `signDays` tinyint(3) DEFAULT '0' COMMENT '连续签到天数   满16天归零，中断归零',
  `signAllDays` int(11) DEFAULT '0' COMMENT '签到累计总天数',
  `signScore` int(11) unsigned DEFAULT '0' COMMENT '签到累计积分',
  `lastsignTime` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '上一次签到时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户信息表';

-- -----------------------------
-- Records of `xdxd_user`
-- -----------------------------
INSERT INTO `xdxd_user` VALUES ('1', 'dz', '', '45917634c7cac19dcadcc247665f65a8', '1025932659@qq.com', '15952721962', '0', '', '', '1', '1999260', '0.00', '', '', '23', '1', '0000-00-00 00:00:00', '0', '', '', '', '1', '2', '30', '2019-05-17 23:16:21');
INSERT INTO `xdxd_user` VALUES ('2', 'gjc', '', '45917634c7cac19dcadcc247665f65a8', '973940688@qq.com', '15732638205', '0', '', '', '1', '1700', '0.00', '', '', '27', '1', '0000-00-00 00:00:00', '0', '', '', '', '3', '7', '35', '2019-05-17 10:31:56');
INSERT INTO `xdxd_user` VALUES ('3', 'zyb', '', '45917634c7cac19dcadcc247665f65a8', '1025932659@qq.com', '12345678901', '0', '', '', '1', '0', '0.00', '', '', '0', '1', '0000-00-00 00:00:00', '0', '', '', '', '0', '0', '0', '0000-00-00 00:00:00');
INSERT INTO `xdxd_user` VALUES ('4', 'wzh', '', '45917634c7cac19dcadcc247665f65a8', '1025932659@qq.com', '13773597831', '', '', '', '1', '0', '0.00', '', '', '', '1', '', '', '', '', '', '0', '0', '0', '0000-00-00 00:00:00');
INSERT INTO `xdxd_user` VALUES ('5', 'ddd', '', '64afe0c3a596c92aa5e5630b22544a7d', '1111111', 'sss', '', '', '', '1', '0', '0.00', '', '', '', '1', '', '', '', '', '', '0', '0', '0', '0000-00-00 00:00:00');
