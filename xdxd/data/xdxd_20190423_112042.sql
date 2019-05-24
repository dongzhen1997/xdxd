-- ----------------------------
-- 日期：2019-04-23 11:20:42
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

-- ----------------------------
-- Table structure for `xdxd_admin`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_admin`;
CREATE TABLE `xdxd_admin` (


















-- ----------------------------
-- Data for the table `xdxd_admin`
-- ----------------------------

INSERT INTO `xdxd_admin` VALUES ('1', 'dz', '董真', '45917634c7cac19dcadcc247665f65a8', '1025932659@qq.com', '15952721962', '0', '321011199701150913', '', '1', '1', '2019-04-18 17:20:22', '', '0', '', '0');

-- ----------------------------
-- Table structure for `xdxd_admin_carte`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_admin_carte`;
CREATE TABLE `xdxd_admin_carte` (













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
INSERT INTO `xdxd_classify` VALUES ('4', '智能米桶', '1');

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











-- ----------------------------
-- Data for the table `xdxd_goods_detail`
-- ----------------------------

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
-- Table structure for `xdxd_index`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_index`;
CREATE TABLE `xdxd_index` (



-- ----------------------------
-- Data for the table `xdxd_index`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_order_detail`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_order_detail`;
CREATE TABLE `xdxd_order_detail` (






-- ----------------------------
-- Data for the table `xdxd_order_detail`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_order_list`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_order_list`;
CREATE TABLE `xdxd_order_list` (










-- ----------------------------
-- Data for the table `xdxd_order_list`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_score`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_score`;
CREATE TABLE `xdxd_score` (






-- ----------------------------
-- Data for the table `xdxd_score`
-- ----------------------------

-- ----------------------------
-- Table structure for `xdxd_user`
-- ----------------------------

DROP TABLE IF EXISTS `xdxd_user`;
CREATE TABLE `xdxd_user` (























-- ----------------------------
-- Data for the table `xdxd_user`
-- ----------------------------

INSERT INTO `xdxd_user` VALUES ('1', 'dz', '董真', '45917634c7cac19dcadcc247665f65a8', '1025932659@qq.com', '15952721962', '0', '321011119701150913', '', '1', '0', '0.00', '', '', '0', '1', '', '', '', '', '');
