-- ----------------------------
-- 日期：2019-05-10 09:39:47
-- MySQL - 5.5.52-MariaDB : Database - xdxd
-- ----------------------------

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for `xdxd_addr`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_addr`;
CREATE TABLE `xdxd_addr` (











-- ----------------------------
-- Data for the table `xdxd_addr`
-- ----------------------------

INSERT INTO `xdxd_addr` VALUES ('23', '1', '15952721962', '江苏', '扬州市', '运河水榭19栋601室', '董真', '广陵区', '225002');
INSERT INTO `xdxd_addr` VALUES ('24', '1', '15952721962', '河北', '廊坊市', '防灾科技学院', '董真', '三河市', '22500');
INSERT INTO `xdxd_addr` VALUES ('25', '3', '123456', '天津', '河东区', 'dddd', 'wzh', '全境', '33333');
INSERT INTO `xdxd_addr` VALUES ('26', '2', '888', '天津', '和平区', '哈哈哈哈9999', '快快快', '全境', '8888');

-- ----------------------------
-- Table structure for `xdxd_admin`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_admin`;
CREATE TABLE `xdxd_admin` (


















-- ----------------------------
-- Data for the table `xdxd_admin`
-- ----------------------------

INSERT INTO `xdxd_admin` VALUES ('1', 'dz', '', '45917634c7cac19dcadcc247665f65a8', '1025932659@qq.com', '15952721962', '1', '', '', '1', '1', '0000-00-00 00:00:00', '', '0', '', '0');

-- ----------------------------
-- Table structure for `xdxd_admin_carte`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_admin_carte`;
CREATE TABLE `xdxd_admin_carte` (













-- ----------------------------
-- Data for the table `xdxd_admin_carte`
-- ----------------------------

INSERT INTO `xdxd_admin_carte` VALUES ('1', '管理员管理', '', '0', '2', '1', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('2', '角色管理', 'admin/admin/adminRole', '1', '0', '2', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('3', '权限管理', 'admin/admin/adminPermission', '1', '0', '2', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('4', '管理员列表', 'admin/admin/adminList', '1', '0', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('5', '系统管理', '', '0', '5', '1', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('6', '菜单管理', 'admin/menu/menuList', '5', '0', '2', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('7', '屏蔽词', 'admin/menu/systemShielding', '5', '0', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('8', '会员管理', '', '0', '1', '1', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('9', '会员列表', 'admin/member/memberList', '8', '0', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('10', '产品管理', '', '0', '3', '1', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('11', '产品列表', 'admin/goods/goodsList', '10', '0', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('12', '产品分类', 'admin/classify/classifyList', '10', '0', '2', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_carte` VALUES ('13', '活动管理', '', '0', '6', '1', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('14', '抽奖', '', '13', '0', '2', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('15', '签到', '', '13', '0', '2', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('16', '秒杀', '', '13', '0', '2', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('17', '数据备份还原', 'admin/databackup/backup', '5', '0', '2', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('18', '', '', '0', '0', '1', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_carte` VALUES ('19', '', '', '0', '0', '1', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `xdxd_admin_role`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_admin_role`;
CREATE TABLE `xdxd_admin_role` (





-- ----------------------------
-- Data for the table `xdxd_admin_role`
-- ----------------------------

INSERT INTO `xdxd_admin_role` VALUES ('1', '超级管理员', '一切权利');

-- ----------------------------
-- Table structure for `xdxd_admin_role_permission`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_admin_role_permission`;
CREATE TABLE `xdxd_admin_role_permission` (










-- ----------------------------
-- Data for the table `xdxd_admin_role_permission`
-- ----------------------------

INSERT INTO `xdxd_admin_role_permission` VALUES ('1', '1', '1', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('2', '1', '2', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('3', '1', '3', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('4', '1', '4', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('5', '1', '5', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('6', '1', '6', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('7', '1', '7', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('8', '1', '8', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('9', '1', '9', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('10', '1', '10', '1', '1', '1', '1', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('11', '1', '11', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('12', '1', '12', '1', '1', '1', '1', '1');
INSERT INTO `xdxd_admin_role_permission` VALUES ('13', '1', '13', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('14', '1', '14', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('15', '1', '15', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('16', '1', '16', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('17', '1', '17', '0', '0', '0', '0', '0');
INSERT INTO `xdxd_admin_role_permission` VALUES ('18', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `xdxd_admin_sign`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_admin_sign`;
CREATE TABLE `xdxd_admin_sign` (








-- ----------------------------
-- Data for the table `xdxd_admin_sign`
-- ----------------------------

INSERT INTO `xdxd_admin_sign` VALUES ('1', '1', '2019-02-28 11:59:37', '28', '获得5积分', '5');

-- ----------------------------
-- Table structure for `xdxd_classify`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_classify`;
CREATE TABLE `xdxd_classify` (





-- ----------------------------
-- Data for the table `xdxd_classify`
-- ----------------------------

INSERT INTO `xdxd_classify` VALUES ('1', '精装大米', '1');
INSERT INTO `xdxd_classify` VALUES ('2', '精装礼盒', '1');
INSERT INTO `xdxd_classify` VALUES ('3', '年卡', '1');
INSERT INTO `xdxd_classify` VALUES ('4', '智能', '1');
INSERT INTO `xdxd_classify` VALUES ('5', '其他', '1');

-- ----------------------------
-- Table structure for `xdxd_evaluate`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_evaluate`;
CREATE TABLE `xdxd_evaluate` (








-- ----------------------------
-- Data for the table `xdxd_evaluate`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_evaluate_content`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_evaluate_content`;
CREATE TABLE `xdxd_evaluate_content` (




-- ----------------------------
-- Data for the table `xdxd_evaluate_content`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_goods`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_goods`;
CREATE TABLE `xdxd_goods` (















-- ----------------------------
-- Data for the table `xdxd_goods`
-- ----------------------------

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

-- ----------------------------
-- Table structure for `xdxd_goods_content`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_goods_content`;
CREATE TABLE `xdxd_goods_content` (




-- ----------------------------
-- Data for the table `xdxd_goods_content`
-- ----------------------------

INSERT INTO `xdxd_goods_content` VALUES ('1', '1123123');
INSERT INTO `xdxd_goods_content` VALUES ('2', '<p>qweq</p>');
INSERT INTO `xdxd_goods_content` VALUES ('3', '<p>123</p>');
INSERT INTO `xdxd_goods_content` VALUES ('4', '<p>fffff</p>');
INSERT INTO `xdxd_goods_content` VALUES ('5', '<p>123</p>');
INSERT INTO `xdxd_goods_content` VALUES ('6', '<p>test</p>');
INSERT INTO `xdxd_goods_content` VALUES ('7', '<p>123</p>');
INSERT INTO `xdxd_goods_content` VALUES ('8', '<p>123</p>');
INSERT INTO `xdxd_goods_content` VALUES ('9', '<p>123</p>');
INSERT INTO `xdxd_goods_content` VALUES ('10', '<p>123</p>');
INSERT INTO `xdxd_goods_content` VALUES ('11', '<p>1231</p>');
INSERT INTO `xdxd_goods_content` VALUES ('12', '<p>12312</p>');

-- ----------------------------
-- Table structure for `xdxd_goods_detail`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_goods_detail`;
CREATE TABLE `xdxd_goods_detail` (











-- ----------------------------
-- Data for the table `xdxd_goods_detail`
-- ----------------------------

INSERT INTO `xdxd_goods_detail` VALUES ('1', '000001', '商品1', '小米', '8核/64GB', '100天', '北京市通州区', '小米', '1');
INSERT INTO `xdxd_goods_detail` VALUES ('2', '000002', '商品2', '华为', '8核/64GB', '99天', '北京市朝阳区', '华为', '');
INSERT INTO `xdxd_goods_detail` VALUES ('3', '000003', '商品3', '三星', '8核/64GB', '88天', '北京市海淀区', '三星', '');
INSERT INTO `xdxd_goods_detail` VALUES ('4', '000004', '商品4', '苹果', '8核/64GB', '77天', '北京市房山区', '苹果', '');
INSERT INTO `xdxd_goods_detail` VALUES ('5', '000005', '商品5', 'vivo', '8核/64GB', '--无--', '北京市昌平区', 'vivo', '');
INSERT INTO `xdxd_goods_detail` VALUES ('6', '000006', '商品6', 'OPPO', '8核/64GB', '永久', '北京市通州区', 'OPPO', '');

-- ----------------------------
-- Table structure for `xdxd_goods_img`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_goods_img`;
CREATE TABLE `xdxd_goods_img` (






-- ----------------------------
-- Data for the table `xdxd_goods_img`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_ico`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_ico`;
CREATE TABLE `xdxd_ico` (





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
-- Table structure for `xdxd_order_detail`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_order_detail`;
CREATE TABLE `xdxd_order_detail` (






-- ----------------------------
-- Data for the table `xdxd_order_detail`
-- ----------------------------

INSERT INTO `xdxd_order_detail` VALUES ('1', 'd3ce3629dba51005ada77dd44e33ec19', '000008', '1');
INSERT INTO `xdxd_order_detail` VALUES ('2', 'cd1e38488202529523e6a9f58f0b3d67', '000009', '1');
INSERT INTO `xdxd_order_detail` VALUES ('3', '89ef2f2b5c5fc73cd098061709c52a58', '000008', '1');
INSERT INTO `xdxd_order_detail` VALUES ('4', '0f8f853c1824b1148b026e2ada5e8f28', '000009', '1');
INSERT INTO `xdxd_order_detail` VALUES ('5', 'c6c69ab3b37ebd0125606f431fb8b4c9', '000009', '1');
INSERT INTO `xdxd_order_detail` VALUES ('6', 'c6c69ab3b37ebd0125606f431fb8b4c9', '000013', '1');
INSERT INTO `xdxd_order_detail` VALUES ('7', 'a94f8ff7e26df9bffe39c44775537666', '000009', '1');
INSERT INTO `xdxd_order_detail` VALUES ('8', '1764855ded7bc60476b9b0ae67fd5168', '000001', '1');

-- ----------------------------
-- Table structure for `xdxd_order_list`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_order_list`;
CREATE TABLE `xdxd_order_list` (










-- ----------------------------
-- Data for the table `xdxd_order_list`
-- ----------------------------

INSERT INTO `xdxd_order_list` VALUES ('1', 'd3ce3629dba51005ada77dd44e33ec19', '3398.00', '2019-05-09 19:36:00', '2', '1', '1', '');
INSERT INTO `xdxd_order_list` VALUES ('2', 'cd1e38488202529523e6a9f58f0b3d67', '59.50', '2019-05-09 19:41:11', '1', '1', '1', '');
INSERT INTO `xdxd_order_list` VALUES ('3', '89ef2f2b5c5fc73cd098061709c52a58', '3398.00', '2019-05-09 20:04:40', '1', '1', '1', '');
INSERT INTO `xdxd_order_list` VALUES ('4', '0f8f853c1824b1148b026e2ada5e8f28', '59.50', '2019-05-09 20:19:31', '3', '1', '1', '');
INSERT INTO `xdxd_order_list` VALUES ('5', 'c6c69ab3b37ebd0125606f431fb8b4c9', '1739.50', '2019-05-09 20:20:07', '1', '1', '1', '');
INSERT INTO `xdxd_order_list` VALUES ('6', 'a94f8ff7e26df9bffe39c44775537666', '59.50', '2019-05-09 20:25:22', '1', '1', '1', '');
INSERT INTO `xdxd_order_list` VALUES ('7', '1764855ded7bc60476b9b0ae67fd5168', '100.00', '2019-05-09 20:38:29', '1', '1', '1', '');

-- ----------------------------
-- Table structure for `xdxd_score`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_score`;
CREATE TABLE `xdxd_score` (






-- ----------------------------
-- Data for the table `xdxd_score`
-- ----------------------------

INSERT INTO `xdxd_score` VALUES ('1', '000001', '100', '000010');
INSERT INTO `xdxd_score` VALUES ('2', '000002', '200', '000020');
INSERT INTO `xdxd_score` VALUES ('3', '000003', '200', '000020');

-- ----------------------------
-- Table structure for `xdxd_seckill`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_seckill`;
CREATE TABLE `xdxd_seckill` (






-- ----------------------------
-- Data for the table `xdxd_seckill`
-- ----------------------------

INSERT INTO `xdxd_seckill` VALUES ('1', '1', '5', '100.00');
INSERT INTO `xdxd_seckill` VALUES ('2', '11', '9', '99.00');

-- ----------------------------
-- Table structure for `xdxd_sign`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_sign`;
CREATE TABLE `xdxd_sign` (








-- ----------------------------
-- Data for the table `xdxd_sign`
-- ----------------------------

INSERT INTO `xdxd_sign` VALUES ('1', '1', '2019-02-28 11:59:37', '28', '获得5积分', '5');

-- ----------------------------
-- Table structure for `xdxd_user`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_user`;
CREATE TABLE `xdxd_user` (


























-- ----------------------------
-- Data for the table `xdxd_user`
-- ----------------------------

INSERT INTO `xdxd_user` VALUES ('1', 'dz', '', '45917634c7cac19dcadcc247665f65a8', '1025932659@qq.com', '15952721962', '', '', '', '1', '0', '0.00', '', '', '23', '1', '', '', '', '', '', '0', '', '0');
INSERT INTO `xdxd_user` VALUES ('2', 'gjc', '', '45917634c7cac19dcadcc247665f65a8', '1025932659@qq.com', '12345678901', '', '', '', '1', '0', '0.00', '', '', '26', '1', '', '', '', '', '', '0', '', '0');
INSERT INTO `xdxd_user` VALUES ('3', 'wzh', '', '45917634c7cac19dcadcc247665f65a8', '3276992479@qq.com', '12345678901', '', '', '', '1', '0', '0.00', '', '', '25', '1', '', '', '', '', '', '0', '', '0');
