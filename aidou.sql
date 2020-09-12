/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50724
Source Host           : 127.0.0.1:3306
Source Database       : aidou

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2020-09-12 11:09:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES ('1', '0', '1', 'Index', 'feather icon-bar-chart-2', '/', '2020-09-10 12:22:39', null);
INSERT INTO `admin_menu` VALUES ('2', '0', '2', 'Admin', 'feather icon-settings', '', '2020-09-10 12:22:39', null);
INSERT INTO `admin_menu` VALUES ('3', '2', '3', 'Users', '', 'auth/users', '2020-09-10 12:22:39', null);
INSERT INTO `admin_menu` VALUES ('4', '2', '4', 'Roles', '', 'auth/roles', '2020-09-10 12:22:39', null);
INSERT INTO `admin_menu` VALUES ('5', '2', '5', 'Permission', '', 'auth/permissions', '2020-09-10 12:22:39', null);
INSERT INTO `admin_menu` VALUES ('6', '2', '6', 'Menu', '', 'auth/menu', '2020-09-10 12:22:39', null);
INSERT INTO `admin_menu` VALUES ('7', '2', '7', 'Operation log', '', 'auth/logs', '2020-09-10 12:22:39', null);
INSERT INTO `admin_menu` VALUES ('8', '0', '8', '明星管理', 'fa-address-book', 'celebrity', '2020-09-10 13:08:01', '2020-09-10 13:08:01');
INSERT INTO `admin_menu` VALUES ('9', '0', '9', '抽奖奖品', 'fa-adjust', 'lottery', '2020-09-11 17:39:45', '2020-09-11 17:39:45');
INSERT INTO `admin_menu` VALUES ('10', '0', '10', '轮播', 'fa-align-justify', 'banner', '2020-09-11 19:29:00', '2020-09-11 19:29:00');

-- ----------------------------
-- Table structure for admin_operation_log
-- ----------------------------
DROP TABLE IF EXISTS `admin_operation_log`;
CREATE TABLE `admin_operation_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_operation_log
-- ----------------------------
INSERT INTO `admin_operation_log` VALUES ('1', '0', 'admin/auth/login', 'GET', '127.0.0.1', '[]', '2020-09-10 12:23:40', '2020-09-10 12:23:40');
INSERT INTO `admin_operation_log` VALUES ('2', '0', 'admin/auth/login', 'GET', '127.0.0.1', '[]', '2020-09-10 12:24:19', '2020-09-10 12:24:19');
INSERT INTO `admin_operation_log` VALUES ('3', '0', 'admin/auth/login', 'GET', '127.0.0.1', '[]', '2020-09-10 12:24:25', '2020-09-10 12:24:25');
INSERT INTO `admin_operation_log` VALUES ('4', '0', 'admin/auth/login', 'GET', '127.0.0.1', '[]', '2020-09-10 12:27:10', '2020-09-10 12:27:10');
INSERT INTO `admin_operation_log` VALUES ('5', '0', 'admin/auth/login', 'GET', '127.0.0.1', '[]', '2020-09-10 12:27:13', '2020-09-10 12:27:13');
INSERT INTO `admin_operation_log` VALUES ('6', '0', 'admin/auth/login', 'GET', '127.0.0.1', '[]', '2020-09-10 12:27:17', '2020-09-10 12:27:17');
INSERT INTO `admin_operation_log` VALUES ('7', '0', 'admin/auth/login', 'GET', '127.0.0.1', '[]', '2020-09-10 12:27:26', '2020-09-10 12:27:26');
INSERT INTO `admin_operation_log` VALUES ('8', '0', 'admin/auth/login', 'GET', '127.0.0.1', '[]', '2020-09-10 12:27:36', '2020-09-10 12:27:36');
INSERT INTO `admin_operation_log` VALUES ('9', '0', 'admin/auth/login', 'POST', '127.0.0.1', '{\"_token\":\"nEC1TlznZx1At4HfQfvKlEYAqbjeM0boCYKqMQNm\",\"username\":\"admin\",\"password\":\"adm******\"}', '2020-09-10 13:02:37', '2020-09-10 13:02:37');
INSERT INTO `admin_operation_log` VALUES ('10', '1', 'admin', 'GET', '127.0.0.1', '[]', '2020-09-10 13:02:39', '2020-09-10 13:02:39');
INSERT INTO `admin_operation_log` VALUES ('11', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-10 13:05:48', '2020-09-10 13:05:48');
INSERT INTO `admin_operation_log` VALUES ('12', '1', 'admin/helpers/scaffold/table', 'POST', '127.0.0.1', '{\"db\":\"aidou\",\"tb\":\"celebrity\"}', '2020-09-10 13:05:54', '2020-09-10 13:05:54');
INSERT INTO `admin_operation_log` VALUES ('13', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '{\"singular\":\"celebrity\"}', '2020-09-10 13:05:54', '2020-09-10 13:05:54');
INSERT INTO `admin_operation_log` VALUES ('14', '1', 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"celebrity\",\"exist-table\":\"aidou|celebrity\",\"model_name\":\"App\\\\Models\\\\Celebrity\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\CelebrityController\",\"repository_name\":\"App\\\\Admin\\\\Repositories\\\\Celebrity\",\"create\":[\"model\",\"controller\",\"lang\"],\"fields\":[{\"name\":\"name\",\"translation\":\"\\u660e\\u661f\\u59d3\\u540d\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":\"\\u660e\\u661f\\u59d3\\u540d\"},{\"name\":\"avatar\",\"translation\":\"\\u5934\\u50cf\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":\"\\u5934\\u50cf\"},{\"name\":\"backimage\",\"translation\":\"\\u80cc\\u666f\\u56fe\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":\"\\u80cc\\u666f\\u56fe\"},{\"name\":\"influencenum\",\"translation\":\"\\u5f71\\u54cd\\u529b\",\"type\":\"integer\",\"key\":null,\"default\":\"0\",\"comment\":\"\\u5f71\\u54cd\\u529b\"}],\"primary_key\":\"id\",\"timestamps\":\"1\",\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\"}', '2020-09-10 13:06:04', '2020-09-10 13:06:04');
INSERT INTO `admin_operation_log` VALUES ('15', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2020-09-10 13:06:06', '2020-09-10 13:06:06');
INSERT INTO `admin_operation_log` VALUES ('16', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-10 13:07:37', '2020-09-10 13:07:37');
INSERT INTO `admin_operation_log` VALUES ('17', '1', 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":null,\"title\":\"\\u660e\\u661f\\u7ba1\\u7406\",\"icon\":\"fa-address-book\",\"uri\":\"celebrity\",\"roles\":[null],\"permissions\":null,\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\"}', '2020-09-10 13:08:01', '2020-09-10 13:08:01');
INSERT INTO `admin_operation_log` VALUES ('18', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-09-10 13:08:04', '2020-09-10 13:08:04');
INSERT INTO `admin_operation_log` VALUES ('19', '1', 'admin/celebrity', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-10 13:08:07', '2020-09-10 13:08:07');
INSERT INTO `admin_operation_log` VALUES ('20', '1', 'admin/celebrity/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-10 13:08:10', '2020-09-10 13:08:10');
INSERT INTO `admin_operation_log` VALUES ('21', '1', 'admin/celebrity/create', 'GET', '127.0.0.1', '[]', '2020-09-10 13:08:44', '2020-09-10 13:08:44');
INSERT INTO `admin_operation_log` VALUES ('22', '1', 'admin/celebrity', 'POST', '127.0.0.1', '{\"_id\":\"CcgH8Kb8wURQpUqB\",\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\",\"upload_column\":\"avatar\",\"id\":\"WU_FILE_0\",\"name\":\"cc7b5674b352be04124698a86316656f.jpg\",\"type\":\"image\\/jpeg\",\"lastModifiedDate\":\"Sat Jul 13 2019 23:58:46 GMT+0800 (\\u4e2d\\u56fd\\u6807\\u51c6\\u65f6\\u95f4)\",\"size\":\"19509\"}', '2020-09-10 13:09:56', '2020-09-10 13:09:56');
INSERT INTO `admin_operation_log` VALUES ('23', '1', 'admin/celebrity', 'POST', '127.0.0.1', '{\"_file_del_\":null,\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\",\"key\":\"images\\/cc7b5674b352be04124698a86316656f.jpg\",\"_column\":\"avatar\"}', '2020-09-10 13:10:21', '2020-09-10 13:10:21');
INSERT INTO `admin_operation_log` VALUES ('24', '1', 'admin/celebrity', 'POST', '127.0.0.1', '{\"_id\":\"MZPtY0PQD0ebPnZ1\",\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\",\"upload_column\":\"backimage\",\"id\":\"WU_FILE_2\",\"name\":\"04b788dfb2b73a940188e5793134cbb2.jpg\",\"type\":\"image\\/jpeg\",\"lastModifiedDate\":\"Thu May 23 2019 01:38:36 GMT+0800 (\\u4e2d\\u56fd\\u6807\\u51c6\\u65f6\\u95f4)\",\"size\":\"98940\"}', '2020-09-10 13:10:33', '2020-09-10 13:10:33');
INSERT INTO `admin_operation_log` VALUES ('25', '1', 'admin/celebrity', 'POST', '127.0.0.1', '{\"_id\":\"CcgH8Kb8wURQpUqB\",\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\",\"upload_column\":\"avatar\",\"id\":\"WU_FILE_3\",\"name\":\"t013cb4e528f6a17ca2.jpg\",\"type\":\"image\\/jpeg\",\"lastModifiedDate\":\"Thu Sep 10 2020 13:11:08 GMT+0800 (\\u4e2d\\u56fd\\u6807\\u51c6\\u65f6\\u95f4)\",\"size\":\"55483\"}', '2020-09-10 13:11:30', '2020-09-10 13:11:30');
INSERT INTO `admin_operation_log` VALUES ('26', '1', 'admin/celebrity', 'POST', '127.0.0.1', '{\"name\":\"\\u5218\\u5fb7\\u534e\",\"avatar\":\"images\\/t013cb4e528f6a17ca2.jpg\",\"_file_\":null,\"backimage\":\"images\\/04b788dfb2b73a940188e5793134cbb2.jpg\",\"influencenum\":\"6000\",\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\"}', '2020-09-10 13:11:36', '2020-09-10 13:11:36');
INSERT INTO `admin_operation_log` VALUES ('27', '1', 'admin/celebrity', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-10 13:11:37', '2020-09-10 13:11:37');
INSERT INTO `admin_operation_log` VALUES ('28', '1', 'admin/celebrity/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-10 13:11:40', '2020-09-10 13:11:40');
INSERT INTO `admin_operation_log` VALUES ('29', '1', 'admin/celebrity', 'POST', '127.0.0.1', '{\"_id\":\"He0qXfZSigOUeKVI\",\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\",\"upload_column\":\"avatar\",\"id\":\"WU_FILE_0\",\"name\":\"\\u4e0b\\u8f7d.jpg\",\"type\":\"image\\/jpeg\",\"lastModifiedDate\":\"Sat Jul 27 2019 23:40:06 GMT+0800 (\\u4e2d\\u56fd\\u6807\\u51c6\\u65f6\\u95f4)\",\"size\":\"13111\"}', '2020-09-10 13:12:10', '2020-09-10 13:12:10');
INSERT INTO `admin_operation_log` VALUES ('30', '1', 'admin/celebrity', 'POST', '127.0.0.1', '{\"_id\":\"x2gi6l0sEhPBVyu1\",\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\",\"upload_column\":\"backimage\",\"id\":\"WU_FILE_1\",\"name\":\"\\u4e0b\\u8f7d.jpg\",\"type\":\"image\\/jpeg\",\"lastModifiedDate\":\"Sat Jul 27 2019 23:40:06 GMT+0800 (\\u4e2d\\u56fd\\u6807\\u51c6\\u65f6\\u95f4)\",\"size\":\"13111\"}', '2020-09-10 13:12:16', '2020-09-10 13:12:16');
INSERT INTO `admin_operation_log` VALUES ('31', '1', 'admin/celebrity', 'POST', '127.0.0.1', '{\"name\":\"\\u5f20\\u4e09\\u4e30\",\"avatar\":\"images\\/\\u4e0b\\u8f7d.jpg\",\"_file_\":null,\"backimage\":\"images\\/2fa132cdbe5d3a15e10d7aa595c066aa.jpg\",\"influencenum\":\"500\",\"after-save\":\"2\",\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\",\"_previous_\":\"http:\\/\\/aidou.test\\/admin\\/celebrity\"}', '2020-09-10 13:12:21', '2020-09-10 13:12:21');
INSERT INTO `admin_operation_log` VALUES ('32', '1', 'admin/celebrity/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-10 13:12:22', '2020-09-10 13:12:22');
INSERT INTO `admin_operation_log` VALUES ('33', '1', 'admin/celebrity', 'POST', '127.0.0.1', '{\"_id\":\"ce6HdiUXrLYJ1VOk\",\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\",\"upload_column\":\"avatar\",\"id\":\"WU_FILE_2\",\"name\":\"\\u4e0b\\u8f7d (1).jpg\",\"type\":\"image\\/jpeg\",\"lastModifiedDate\":\"Sat Jul 27 2019 23:40:11 GMT+0800 (\\u4e2d\\u56fd\\u6807\\u51c6\\u65f6\\u95f4)\",\"size\":\"5746\"}', '2020-09-10 13:12:36', '2020-09-10 13:12:36');
INSERT INTO `admin_operation_log` VALUES ('34', '1', 'admin/celebrity', 'POST', '127.0.0.1', '{\"_id\":\"q7MgohTvMmm8wUon\",\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\",\"upload_column\":\"backimage\",\"id\":\"WU_FILE_3\",\"name\":\"\\u4e0b\\u8f7d (1).jpg\",\"type\":\"image\\/jpeg\",\"lastModifiedDate\":\"Sat Jul 27 2019 23:40:11 GMT+0800 (\\u4e2d\\u56fd\\u6807\\u51c6\\u65f6\\u95f4)\",\"size\":\"5746\"}', '2020-09-10 13:12:39', '2020-09-10 13:12:39');
INSERT INTO `admin_operation_log` VALUES ('35', '1', 'admin/celebrity', 'POST', '127.0.0.1', '{\"name\":\"\\u5f20\\u56db\\u5206\",\"avatar\":\"images\\/\\u4e0b\\u8f7d (1).jpg\",\"_file_\":null,\"backimage\":\"images\\/78794b2cbe6e7b2f05511ecce99dbf91.jpg\",\"influencenum\":\"60\",\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\"}', '2020-09-10 13:12:45', '2020-09-10 13:12:45');
INSERT INTO `admin_operation_log` VALUES ('36', '1', 'admin/celebrity', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-10 13:12:46', '2020-09-10 13:12:46');
INSERT INTO `admin_operation_log` VALUES ('37', '1', 'admin/celebrity/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-10 13:12:50', '2020-09-10 13:12:50');
INSERT INTO `admin_operation_log` VALUES ('38', '1', 'admin/celebrity', 'POST', '127.0.0.1', '{\"_id\":\"v1UjNbGAsdkiCoPF\",\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\",\"upload_column\":\"avatar\",\"id\":\"WU_FILE_4\",\"name\":\"\\u4e0b\\u8f7d (3).jpg\",\"type\":\"image\\/jpeg\",\"lastModifiedDate\":\"Sat Jul 27 2019 23:40:17 GMT+0800 (\\u4e2d\\u56fd\\u6807\\u51c6\\u65f6\\u95f4)\",\"size\":\"6710\"}', '2020-09-10 13:13:03', '2020-09-10 13:13:03');
INSERT INTO `admin_operation_log` VALUES ('39', '1', 'admin/celebrity', 'POST', '127.0.0.1', '{\"_id\":\"Zg7RtC4LD7LBRnHq\",\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\",\"upload_column\":\"backimage\",\"id\":\"WU_FILE_5\",\"name\":\"\\u4e0b\\u8f7d (3).jpg\",\"type\":\"image\\/jpeg\",\"lastModifiedDate\":\"Sat Jul 27 2019 23:40:17 GMT+0800 (\\u4e2d\\u56fd\\u6807\\u51c6\\u65f6\\u95f4)\",\"size\":\"6710\"}', '2020-09-10 13:13:07', '2020-09-10 13:13:07');
INSERT INTO `admin_operation_log` VALUES ('40', '1', 'admin/celebrity', 'POST', '127.0.0.1', '{\"name\":\"\\u5f20\\u4e94\\u5206\",\"avatar\":\"images\\/\\u4e0b\\u8f7d (3).jpg\",\"_file_\":null,\"backimage\":\"images\\/d040f3411971e420b72c5c4a1fc4f437.jpg\",\"influencenum\":\"60\",\"_token\":\"1TykGuyiPsmsSfLG3IAsP6hPYoQC5QLkp93DtgE8\",\"_previous_\":\"http:\\/\\/aidou.test\\/admin\\/celebrity\"}', '2020-09-10 13:13:54', '2020-09-10 13:13:54');
INSERT INTO `admin_operation_log` VALUES ('41', '1', 'admin/celebrity', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-10 13:13:55', '2020-09-10 13:13:55');
INSERT INTO `admin_operation_log` VALUES ('42', '0', 'admin/auth/login', 'GET', '127.0.0.1', '[]', '2020-09-10 15:35:19', '2020-09-10 15:35:19');
INSERT INTO `admin_operation_log` VALUES ('43', '0', 'admin/auth/login', 'GET', '127.0.0.1', '[]', '2020-09-10 15:35:21', '2020-09-10 15:35:21');
INSERT INTO `admin_operation_log` VALUES ('44', '0', 'admin/auth/login', 'POST', '127.0.0.1', '{\"_token\":\"S3sxEa88yVY7ySyP0zyCKyEhxl7mwuJzoMxYLSD7\",\"username\":\"admin\",\"password\":\"adm******\"}', '2020-09-10 15:35:28', '2020-09-10 15:35:28');
INSERT INTO `admin_operation_log` VALUES ('45', '1', 'admin', 'GET', '127.0.0.1', '[]', '2020-09-10 15:35:30', '2020-09-10 15:35:30');
INSERT INTO `admin_operation_log` VALUES ('46', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-10 15:35:35', '2020-09-10 15:35:35');
INSERT INTO `admin_operation_log` VALUES ('47', '1', 'admin/helpers/scaffold/table', 'POST', '127.0.0.1', '{\"db\":\"aidou\",\"tb\":\"ranking\"}', '2020-09-10 15:35:41', '2020-09-10 15:35:41');
INSERT INTO `admin_operation_log` VALUES ('48', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '{\"singular\":\"ranking\"}', '2020-09-10 15:35:42', '2020-09-10 15:35:42');
INSERT INTO `admin_operation_log` VALUES ('49', '1', 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"ranking\",\"exist-table\":\"aidou|ranking\",\"model_name\":\"App\\\\Models\\\\Ranking\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\RankingController\",\"repository_name\":\"App\\\\Admin\\\\Repositories\\\\Ranking\",\"create\":[\"model\"],\"fields\":[{\"name\":\"celebrity_id\",\"translation\":\"\\u660e\\u661fid\",\"type\":\"integer\",\"key\":null,\"default\":null,\"comment\":\"\\u660e\\u661fid\"},{\"name\":\"y\",\"translation\":\"\\u5e74\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":\"\\u5e74\"},{\"name\":\"m\",\"translation\":\"\\u6708\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":\"\\u6708\"},{\"name\":\"d\",\"translation\":\"\\u5929\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":\"\\u5929\"},{\"name\":\"w\",\"translation\":\"\\u5468\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":\"\\u5468\"},{\"name\":\"mingci\",\"translation\":\"integral\",\"type\":\"integer\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":\"integral\"}],\"primary_key\":\"id\",\"_token\":\"Vvj5nFIigJYAywagDIP1hRE2hc5eNGLqjfPddt3b\"}', '2020-09-10 15:35:51', '2020-09-10 15:35:51');
INSERT INTO `admin_operation_log` VALUES ('50', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2020-09-10 15:35:52', '2020-09-10 15:35:52');
INSERT INTO `admin_operation_log` VALUES ('51', '1', 'admin/celebrity', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-10 16:28:52', '2020-09-10 16:28:52');
INSERT INTO `admin_operation_log` VALUES ('52', '1', 'admin/celebrity', 'GET', '127.0.0.1', '[]', '2020-09-10 16:30:21', '2020-09-10 16:30:21');
INSERT INTO `admin_operation_log` VALUES ('53', '0', 'admin/auth/login', 'GET', '127.0.0.1', '[]', '2020-09-10 17:33:10', '2020-09-10 17:33:10');
INSERT INTO `admin_operation_log` VALUES ('54', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2020-09-10 17:47:31', '2020-09-10 17:47:31');
INSERT INTO `admin_operation_log` VALUES ('55', '1', 'admin/helpers/scaffold/table', 'POST', '127.0.0.1', '{\"db\":\"aidou\",\"tb\":\"fdz_fb\"}', '2020-09-10 17:47:38', '2020-09-10 17:47:38');
INSERT INTO `admin_operation_log` VALUES ('56', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '{\"singular\":\"fdz_fb\"}', '2020-09-10 17:47:40', '2020-09-10 17:47:40');
INSERT INTO `admin_operation_log` VALUES ('57', '1', 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"fdz_fb\",\"exist-table\":\"aidou|fdz_fb\",\"model_name\":\"App\\\\Models\\\\FdzFb\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\FdzFbController\",\"repository_name\":\"App\\\\Admin\\\\Repositories\\\\FdzFb\",\"create\":[\"model\"],\"fields\":[{\"name\":\"frameid\",\"translation\":\"\\u516c\\u53f8id\",\"type\":\"integer\",\"key\":null,\"default\":null,\"comment\":\"\\u516c\\u53f8id\"},{\"name\":\"userid\",\"translation\":\"\\u64cd\\u4f5c\\u5458ID\",\"type\":\"integer\",\"key\":null,\"default\":null,\"comment\":\"\\u64cd\\u4f5c\\u5458ID\"},{\"name\":\"amcode\",\"translation\":\"\\u8f85\\u6750\\u7f16\\u7801\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":\"\\u8f85\\u6750\\u7f16\\u7801\"},{\"name\":\"fine\",\"translation\":\"\\u8f85\\u6750\\u7ec6\\u7c7b\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":\"\\u8f85\\u6750\\u7ec6\\u7c7b\"},{\"name\":\"brand\",\"translation\":\"\\u54c1\\u724c\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":\"\\u54c1\\u724c\"},{\"name\":\"place\",\"translation\":\"\\u4ea7\\u5730\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":\"\\u4ea7\\u5730\"},{\"name\":\"category\",\"translation\":\"\\u5de5\\u79cd\\u7c7b\\u522b\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":\"\\u5de5\\u79cd\\u7c7b\\u522b\"},{\"name\":\"name\",\"translation\":\"\\u8f85\\u6750\\u540d\\u79f0\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":\"\\u8f85\\u6750\\u540d\\u79f0\"},{\"name\":\"img\",\"translation\":\"\\u56fe\\u7247\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":\"\\u56fe\\u7247\"},{\"name\":\"norms\",\"translation\":null,\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"units\",\"translation\":\"\\u5355\\u4f4d\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":\"\\u5355\\u4f4d\"},{\"name\":\"phr\",\"translation\":\"\\u5305\\u88c5\\u89c4\\u683c\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":\"\\u5305\\u88c5\\u89c4\\u683c\"},{\"name\":\"price\",\"translation\":\"\\u5355\\u4ef7\",\"type\":\"float\",\"key\":null,\"default\":null,\"comment\":\"\\u5355\\u4ef7\"},{\"name\":\"remarks\",\"translation\":\"\\u4f9b\\u5e94\\u6765\\u6e90\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":\"\\u4f9b\\u5e94\\u6765\\u6e90\"},{\"name\":\"coefficient\",\"translation\":\"\\u7cfb\\u6570\",\"type\":\"tinyInteger\",\"nullable\":\"on\",\"key\":null,\"default\":\"0\",\"comment\":\"\\u7cfb\\u6570\"},{\"name\":\"important\",\"translation\":\"\\u5c0f\\u4e8e\\u7cfb\\u6570\\u65f6,\\u662f\\u5426\\u8fdb1\",\"type\":\"tinyInteger\",\"key\":null,\"default\":\"1\",\"comment\":\"\\u5c0f\\u4e8e\\u7cfb\\u6570\\u65f6,\\u662f\\u5426\\u8fdb1\"},{\"name\":\"in_price\",\"translation\":\"\\u8fdb\\u5e93\\u4ef7\",\"type\":\"decimal\",\"key\":null,\"default\":\"0.00\",\"comment\":\"\\u8fdb\\u5e93\\u4ef7\"},{\"name\":\"time\",\"translation\":\"\\u6dfb\\u52a0\\u65f6\\u95f4\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":\"\\u6dfb\\u52a0\\u65f6\\u95f4\"}],\"primary_key\":\"id\",\"_token\":\"0UbUwxhCTCZ0B34Ga28tKA8ZHDpqxoSmltbOaSrc\"}', '2020-09-10 17:47:53', '2020-09-10 17:47:53');
INSERT INTO `admin_operation_log` VALUES ('58', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2020-09-10 17:47:53', '2020-09-10 17:47:53');
INSERT INTO `admin_operation_log` VALUES ('59', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2020-09-10 18:55:55', '2020-09-10 18:55:55');
INSERT INTO `admin_operation_log` VALUES ('60', '0', 'admin/auth/login', 'GET', '127.0.0.1', '[]', '2020-09-11 10:56:49', '2020-09-11 10:56:49');
INSERT INTO `admin_operation_log` VALUES ('61', '0', 'admin/auth/login', 'GET', '127.0.0.1', '[]', '2020-09-11 17:37:59', '2020-09-11 17:37:59');
INSERT INTO `admin_operation_log` VALUES ('62', '0', 'admin/auth/login', 'POST', '127.0.0.1', '{\"_token\":\"Eq54832Q291cpZHkdYjOniHnuhSrjn9Ogx8nG0uk\",\"username\":\"admin\",\"password\":\"adm******\"}', '2020-09-11 17:38:12', '2020-09-11 17:38:12');
INSERT INTO `admin_operation_log` VALUES ('63', '1', 'admin', 'GET', '127.0.0.1', '[]', '2020-09-11 17:38:12', '2020-09-11 17:38:12');
INSERT INTO `admin_operation_log` VALUES ('64', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 17:38:21', '2020-09-11 17:38:21');
INSERT INTO `admin_operation_log` VALUES ('65', '1', 'admin/helpers/scaffold/table', 'POST', '127.0.0.1', '{\"db\":\"aidou\",\"tb\":\"lottery\"}', '2020-09-11 17:38:31', '2020-09-11 17:38:31');
INSERT INTO `admin_operation_log` VALUES ('66', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '{\"singular\":\"lottery\"}', '2020-09-11 17:38:32', '2020-09-11 17:38:32');
INSERT INTO `admin_operation_log` VALUES ('67', '1', 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"lottery\",\"exist-table\":\"aidou|lottery\",\"model_name\":\"App\\\\Models\\\\Lottery\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\LotteryController\",\"repository_name\":\"App\\\\Admin\\\\Repositories\\\\Lottery\",\"create\":[\"model\",\"repository\",\"controller\",\"lang\"],\"fields\":[{\"name\":\"title\",\"translation\":\"\\u6807\\u9898\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":\"\\u6807\\u9898\"},{\"name\":\"type\",\"translation\":\"1\\u79682\\u94bb\\u77f3\",\"type\":\"integer\",\"key\":null,\"default\":null,\"comment\":\"1\\u79682\\u94bb\\u77f3\"},{\"name\":\"sum\",\"translation\":\"\\u6570\\u91cf\",\"type\":\"integer\",\"key\":null,\"default\":null,\"comment\":\"\\u6570\\u91cf\"}],\"primary_key\":\"id\",\"_token\":\"2zJs038rfnEvAS7lXzi4KtCnrQBwP9KxWhAc9lta\"}', '2020-09-11 17:38:34', '2020-09-11 17:38:34');
INSERT INTO `admin_operation_log` VALUES ('68', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2020-09-11 17:38:36', '2020-09-11 17:38:36');
INSERT INTO `admin_operation_log` VALUES ('69', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 17:39:16', '2020-09-11 17:39:16');
INSERT INTO `admin_operation_log` VALUES ('70', '1', 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":null,\"title\":\"\\u62bd\\u5956\\u5956\\u54c1\",\"icon\":\"fa-adjust\",\"uri\":\"lottery\",\"roles\":[null],\"permissions\":null,\"_token\":\"2zJs038rfnEvAS7lXzi4KtCnrQBwP9KxWhAc9lta\"}', '2020-09-11 17:39:45', '2020-09-11 17:39:45');
INSERT INTO `admin_operation_log` VALUES ('71', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-09-11 17:39:47', '2020-09-11 17:39:47');
INSERT INTO `admin_operation_log` VALUES ('72', '1', 'admin/lottery', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 17:39:50', '2020-09-11 17:39:50');
INSERT INTO `admin_operation_log` VALUES ('73', '1', 'admin/lottery/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 17:39:54', '2020-09-11 17:39:54');
INSERT INTO `admin_operation_log` VALUES ('74', '1', 'admin/lottery', 'POST', '127.0.0.1', '{\"title\":\"10\\u7968\",\"type\":\"1\",\"sum\":\"50\",\"_token\":\"2zJs038rfnEvAS7lXzi4KtCnrQBwP9KxWhAc9lta\",\"_previous_\":\"http:\\/\\/aidou.test\\/admin\\/lottery\"}', '2020-09-11 17:40:16', '2020-09-11 17:40:16');
INSERT INTO `admin_operation_log` VALUES ('75', '1', 'admin/lottery', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 17:40:16', '2020-09-11 17:40:16');
INSERT INTO `admin_operation_log` VALUES ('76', '1', 'admin/lottery/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 17:40:24', '2020-09-11 17:40:24');
INSERT INTO `admin_operation_log` VALUES ('77', '1', 'admin/lottery', 'POST', '127.0.0.1', '{\"title\":\"20\\u7968\",\"type\":\"1\",\"sum\":\"20\",\"_token\":\"2zJs038rfnEvAS7lXzi4KtCnrQBwP9KxWhAc9lta\",\"_previous_\":\"http:\\/\\/aidou.test\\/admin\\/lottery\"}', '2020-09-11 17:40:41', '2020-09-11 17:40:41');
INSERT INTO `admin_operation_log` VALUES ('78', '1', 'admin/lottery', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 17:40:41', '2020-09-11 17:40:41');
INSERT INTO `admin_operation_log` VALUES ('79', '1', 'admin/lottery/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 17:40:45', '2020-09-11 17:40:45');
INSERT INTO `admin_operation_log` VALUES ('80', '1', 'admin/lottery/1', 'PUT', '127.0.0.1', '{\"title\":\"10\\u7968\",\"type\":\"1\",\"sum\":\"10\",\"_method\":\"PUT\",\"_token\":\"2zJs038rfnEvAS7lXzi4KtCnrQBwP9KxWhAc9lta\",\"_previous_\":\"http:\\/\\/aidou.test\\/admin\\/lottery\"}', '2020-09-11 17:40:50', '2020-09-11 17:40:50');
INSERT INTO `admin_operation_log` VALUES ('81', '1', 'admin/lottery', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 17:40:52', '2020-09-11 17:40:52');
INSERT INTO `admin_operation_log` VALUES ('82', '1', 'admin/lottery/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 17:40:53', '2020-09-11 17:40:53');
INSERT INTO `admin_operation_log` VALUES ('83', '1', 'admin/lottery', 'POST', '127.0.0.1', '{\"title\":\"20\\u94bb\\u77f3\",\"type\":\"2\",\"sum\":\"20\",\"_token\":\"2zJs038rfnEvAS7lXzi4KtCnrQBwP9KxWhAc9lta\",\"_previous_\":\"http:\\/\\/aidou.test\\/admin\\/lottery\"}', '2020-09-11 17:41:08', '2020-09-11 17:41:08');
INSERT INTO `admin_operation_log` VALUES ('84', '1', 'admin/lottery', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 17:41:08', '2020-09-11 17:41:08');
INSERT INTO `admin_operation_log` VALUES ('85', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 19:27:46', '2020-09-11 19:27:46');
INSERT INTO `admin_operation_log` VALUES ('86', '1', 'admin/helpers/scaffold/table', 'POST', '127.0.0.1', '{\"db\":\"aidou\",\"tb\":\"banner\"}', '2020-09-11 19:27:53', '2020-09-11 19:27:53');
INSERT INTO `admin_operation_log` VALUES ('87', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '{\"singular\":\"banner\"}', '2020-09-11 19:27:54', '2020-09-11 19:27:54');
INSERT INTO `admin_operation_log` VALUES ('88', '1', 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"banner\",\"exist-table\":\"aidou|banner\",\"model_name\":\"App\\\\Models\\\\Banner\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\BannerController\",\"repository_name\":\"App\\\\Admin\\\\Repositories\\\\Banner\",\"create\":[\"model\",\"repository\",\"controller\",\"lang\"],\"fields\":[{\"name\":\"img\",\"translation\":null,\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"url\",\"translation\":null,\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":null}],\"primary_key\":\"id\",\"_token\":\"2zJs038rfnEvAS7lXzi4KtCnrQBwP9KxWhAc9lta\"}', '2020-09-11 19:27:58', '2020-09-11 19:27:58');
INSERT INTO `admin_operation_log` VALUES ('89', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2020-09-11 19:28:00', '2020-09-11 19:28:00');
INSERT INTO `admin_operation_log` VALUES ('90', '1', 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2020-09-11 19:28:34', '2020-09-11 19:28:34');
INSERT INTO `admin_operation_log` VALUES ('91', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 19:28:38', '2020-09-11 19:28:38');
INSERT INTO `admin_operation_log` VALUES ('92', '1', 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":null,\"title\":\"\\u8f6e\\u64ad\",\"icon\":\"fa-align-justify\",\"uri\":\"banner\",\"roles\":[null],\"permissions\":null,\"_token\":\"2zJs038rfnEvAS7lXzi4KtCnrQBwP9KxWhAc9lta\"}', '2020-09-11 19:28:59', '2020-09-11 19:28:59');
INSERT INTO `admin_operation_log` VALUES ('93', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2020-09-11 19:29:01', '2020-09-11 19:29:01');
INSERT INTO `admin_operation_log` VALUES ('94', '1', 'admin/banner', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 19:29:07', '2020-09-11 19:29:07');
INSERT INTO `admin_operation_log` VALUES ('95', '1', 'admin/banner/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 19:29:09', '2020-09-11 19:29:09');
INSERT INTO `admin_operation_log` VALUES ('96', '1', 'admin/banner/create', 'GET', '127.0.0.1', '[]', '2020-09-11 19:29:27', '2020-09-11 19:29:27');
INSERT INTO `admin_operation_log` VALUES ('97', '1', 'admin/banner/create', 'GET', '127.0.0.1', '[]', '2020-09-11 19:30:27', '2020-09-11 19:30:27');
INSERT INTO `admin_operation_log` VALUES ('98', '1', 'admin/banner', 'POST', '127.0.0.1', '{\"_id\":\"24WBHTGTSQgKXqYW\",\"_token\":\"2zJs038rfnEvAS7lXzi4KtCnrQBwP9KxWhAc9lta\",\"upload_column\":\"img\",\"id\":\"WU_FILE_0\",\"name\":\"04.png\",\"type\":\"image\\/png\",\"lastModifiedDate\":\"Fri Feb 14 2020 17:09:01 GMT+0800 (\\u4e2d\\u56fd\\u6807\\u51c6\\u65f6\\u95f4)\",\"size\":\"59475\"}', '2020-09-11 19:30:40', '2020-09-11 19:30:40');
INSERT INTO `admin_operation_log` VALUES ('99', '1', 'admin/banner', 'POST', '127.0.0.1', '{\"img\":\"images\\/abedb906b0af7c4966be2d42d882b5d3.png\",\"_file_\":null,\"url\":\"https:\\/\\/github.com\\/1452073959\\/aidou\",\"_token\":\"2zJs038rfnEvAS7lXzi4KtCnrQBwP9KxWhAc9lta\"}', '2020-09-11 19:30:52', '2020-09-11 19:30:52');
INSERT INTO `admin_operation_log` VALUES ('100', '1', 'admin/banner', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 19:30:52', '2020-09-11 19:30:52');
INSERT INTO `admin_operation_log` VALUES ('101', '1', 'admin/banner/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 19:30:56', '2020-09-11 19:30:56');
INSERT INTO `admin_operation_log` VALUES ('102', '1', 'admin/banner', 'POST', '127.0.0.1', '{\"_id\":\"WnhLKnmGAxkObGX2\",\"_token\":\"2zJs038rfnEvAS7lXzi4KtCnrQBwP9KxWhAc9lta\",\"upload_column\":\"img\",\"id\":\"WU_FILE_0\",\"name\":\"1.png\",\"type\":\"image\\/png\",\"lastModifiedDate\":\"Sat Feb 15 2020 14:34:30 GMT+0800 (\\u4e2d\\u56fd\\u6807\\u51c6\\u65f6\\u95f4)\",\"size\":\"104346\"}', '2020-09-11 19:31:00', '2020-09-11 19:31:00');
INSERT INTO `admin_operation_log` VALUES ('103', '1', 'admin/banner', 'POST', '127.0.0.1', '{\"img\":\"images\\/3ee91d6a48bb59bc9ee539c857450c54.png\",\"_file_\":null,\"url\":\"https:\\/\\/github.com\\/1452073959\\/aidou\",\"_token\":\"2zJs038rfnEvAS7lXzi4KtCnrQBwP9KxWhAc9lta\",\"_previous_\":\"http:\\/\\/aidou.test\\/admin\\/banner\"}', '2020-09-11 19:31:04', '2020-09-11 19:31:04');
INSERT INTO `admin_operation_log` VALUES ('104', '1', 'admin/banner', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 19:31:04', '2020-09-11 19:31:04');
INSERT INTO `admin_operation_log` VALUES ('105', '1', 'admin/banner/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 19:31:06', '2020-09-11 19:31:06');
INSERT INTO `admin_operation_log` VALUES ('106', '1', 'admin/banner', 'POST', '127.0.0.1', '{\"_id\":\"scwGn0Iksm2dxIJ3\",\"_token\":\"2zJs038rfnEvAS7lXzi4KtCnrQBwP9KxWhAc9lta\",\"upload_column\":\"img\",\"id\":\"WU_FILE_1\",\"name\":\"4.png\",\"type\":\"image\\/png\",\"lastModifiedDate\":\"Sat Feb 15 2020 14:56:18 GMT+0800 (\\u4e2d\\u56fd\\u6807\\u51c6\\u65f6\\u95f4)\",\"size\":\"226298\"}', '2020-09-11 19:31:11', '2020-09-11 19:31:11');
INSERT INTO `admin_operation_log` VALUES ('107', '1', 'admin/banner', 'POST', '127.0.0.1', '{\"img\":\"images\\/bef9c7915d748c156e6c35e376a38c87.png\",\"_file_\":null,\"url\":\"https:\\/\\/github.com\\/1452073959\\/aidou\",\"_token\":\"2zJs038rfnEvAS7lXzi4KtCnrQBwP9KxWhAc9lta\",\"_previous_\":\"http:\\/\\/aidou.test\\/admin\\/banner\"}', '2020-09-11 19:31:13', '2020-09-11 19:31:13');
INSERT INTO `admin_operation_log` VALUES ('108', '1', 'admin/banner', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-11 19:31:15', '2020-09-11 19:31:15');
INSERT INTO `admin_operation_log` VALUES ('109', '1', 'admin/banner', 'GET', '127.0.0.1', '[]', '2020-09-11 19:32:14', '2020-09-11 19:32:14');

-- ----------------------------
-- Table structure for admin_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '0',
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_permissions
-- ----------------------------
INSERT INTO `admin_permissions` VALUES ('1', 'Auth management', 'auth-management', '', '', '1', '0', '2020-09-10 12:22:39', null);
INSERT INTO `admin_permissions` VALUES ('2', 'Users', 'users', '', '/auth/users*', '2', '1', '2020-09-10 12:22:39', null);
INSERT INTO `admin_permissions` VALUES ('3', 'Roles', 'roles', '', '/auth/roles*', '3', '1', '2020-09-10 12:22:39', null);
INSERT INTO `admin_permissions` VALUES ('4', 'Permissions', 'permissions', '', '/auth/permissions*', '4', '1', '2020-09-10 12:22:39', null);
INSERT INTO `admin_permissions` VALUES ('5', 'Menu', 'menu', '', '/auth/menu*', '5', '1', '2020-09-10 12:22:39', null);
INSERT INTO `admin_permissions` VALUES ('6', 'Operation log', 'operation-log', '', '/auth/logs*', '6', '1', '2020-09-10 12:22:39', null);

-- ----------------------------
-- Table structure for admin_permission_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_permission_menu`;
CREATE TABLE `admin_permission_menu` (
  `permission_id` bigint(20) NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `admin_permission_menu_permission_id_menu_id_unique` (`permission_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_permission_menu
-- ----------------------------

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
INSERT INTO `admin_roles` VALUES ('1', 'Administrator', 'administrator', '2020-09-10 12:22:39', '2020-09-10 12:22:39');

-- ----------------------------
-- Table structure for admin_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu` (
  `role_id` bigint(20) NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `admin_role_menu_role_id_menu_id_unique` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_menu
-- ----------------------------

-- ----------------------------
-- Table structure for admin_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions` (
  `role_id` bigint(20) NOT NULL,
  `permission_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `admin_role_permissions_role_id_permission_id_unique` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for admin_role_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users` (
  `role_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `admin_role_users_role_id_user_id_unique` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------
INSERT INTO `admin_role_users` VALUES ('1', '1', null, null);

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'admin', '$2y$10$LefzvmNu.KaZnX66g9q3vO24dmsFarPwzmDfmcGIMt2Lm3SyAL78.', 'Administrator', null, null, '2020-09-10 12:22:39', '2020-09-10 12:22:39');

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('1', 'images/abedb906b0af7c4966be2d42d882b5d3.png', 'https://github.com/1452073959/aidou');
INSERT INTO `banner` VALUES ('2', 'images/3ee91d6a48bb59bc9ee539c857450c54.png', 'https://github.com/1452073959/aidou');
INSERT INTO `banner` VALUES ('3', 'images/bef9c7915d748c156e6c35e376a38c87.png', 'https://github.com/1452073959/aidou');

-- ----------------------------
-- Table structure for box
-- ----------------------------
DROP TABLE IF EXISTS `box`;
CREATE TABLE `box` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `boxnum` int(11) NOT NULL DEFAULT '6' COMMENT '箱子数',
  `max` int(10) NOT NULL DEFAULT '0',
  `min` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of box
-- ----------------------------

-- ----------------------------
-- Table structure for celebrity
-- ----------------------------
DROP TABLE IF EXISTS `celebrity`;
CREATE TABLE `celebrity` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '明星姓名',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '头像',
  `backimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '背景图',
  `influencenum` int(11) NOT NULL DEFAULT '0' COMMENT '影响力',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of celebrity
-- ----------------------------
INSERT INTO `celebrity` VALUES ('1', '刘德华', 'images/t013cb4e528f6a17ca2.jpg', 'images/04b788dfb2b73a940188e5793134cbb2.jpg', '6000', '2020-09-10 13:11:36', '2020-09-10 13:11:36');
INSERT INTO `celebrity` VALUES ('2', '张三丰', 'images/下载.jpg', 'images/2fa132cdbe5d3a15e10d7aa595c066aa.jpg', '500', '2020-09-10 13:12:21', '2020-09-10 13:12:21');
INSERT INTO `celebrity` VALUES ('3', '张四分', 'images/下载 (1).jpg', 'images/78794b2cbe6e7b2f05511ecce99dbf91.jpg', '60', '2020-09-10 13:12:45', '2020-09-10 13:12:45');
INSERT INTO `celebrity` VALUES ('4', '张五分', 'images/下载 (3).jpg', 'images/d040f3411971e420b72c5c4a1fc4f437.jpg', '60', '2020-09-10 13:13:54', '2020-09-10 13:13:54');

-- ----------------------------
-- Table structure for fdz_fb
-- ----------------------------
DROP TABLE IF EXISTS `fdz_fb`;
CREATE TABLE `fdz_fb` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `frameid` int(11) NOT NULL COMMENT '公司id',
  `userid` int(11) NOT NULL COMMENT '操作员ID',
  `amcode` varchar(30) NOT NULL COMMENT '辅材编码',
  `fine` varchar(60) NOT NULL COMMENT '辅材细类',
  `brand` varchar(60) NOT NULL COMMENT '品牌',
  `place` varchar(255) DEFAULT NULL COMMENT '产地',
  `category` varchar(100) NOT NULL COMMENT '工种类别',
  `name` varchar(255) NOT NULL COMMENT '辅材名称',
  `img` varchar(255) DEFAULT NULL COMMENT '图片',
  `norms` varchar(50) DEFAULT NULL,
  `units` varchar(100) NOT NULL COMMENT '单位',
  `phr` varchar(255) NOT NULL COMMENT '包装规格',
  `price` float NOT NULL COMMENT '单价',
  `remarks` varchar(255) NOT NULL COMMENT '供应来源',
  `coefficient` tinyint(3) DEFAULT '0' COMMENT '系数',
  `important` tinyint(1) NOT NULL DEFAULT '1' COMMENT '小于系数时,是否进1',
  `in_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '进库价',
  `time` varchar(11) NOT NULL DEFAULT '' COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=410 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='辅材库-记录每次数据生成';

-- ----------------------------
-- Records of fdz_fb
-- ----------------------------
INSERT INTO `fdz_fb` VALUES ('304', '152', '1', '330440250R_1', '电工配件', '无', '广东', '电工材料', '6分红色杯梳', '', null, '0', '1个/0', '0.4', '公司仓库', '0', '1', '0.40', '1571389278');
INSERT INTO `fdz_fb` VALUES ('305', '152', '1', '330440200R_2', '电工配件', '无', '广东', '电工材料', '4分红色杯梳', '', null, '0', '1个/0', '0.31', '公司仓库', '0', '1', '0.31', '1571389278');
INSERT INTO `fdz_fb` VALUES ('306', '152', '1', '330440200B_3', '电工配件', '无', '广东', '电工材料', '4分蓝色杯梳', '', null, '0', '1个/0', '0.31', '公司仓库', '0', '1', '0.31', '1571389278');
INSERT INTO `fdz_fb` VALUES ('307', '152', '1', '330440160R_4', '电工配件', '无', '广东', '电工材料', '3分红色杯梳', '', null, '0', '1个/0', '0.28', '公司仓库', '0', '1', '0.28', '1571389278');
INSERT INTO `fdz_fb` VALUES ('308', '152', '1', '330440160B_5', '电工配件', '无', '广东', '电工材料', '3分蓝色杯梳', '', null, '0', '1个/0', '0.28', '公司仓库', '0', '1', '0.28', '1571389278');
INSERT INTO `fdz_fb` VALUES ('309', '152', '1', '330140250_6', '电工配件', '联塑', '广东', '电工材料', '联塑6分杯梳', '', null, '0', '1个/0', '0.29', '公司仓库', '0', '1', '0.29', '1571389278');
INSERT INTO `fdz_fb` VALUES ('310', '152', '1', '330140200_7', '电工配件', '联塑', '广东', '电工材料', '联塑4分杯梳', '', null, '0', '1个/0', '0.21', '公司仓库', '0', '1', '0.21', '1571389278');
INSERT INTO `fdz_fb` VALUES ('311', '152', '1', '330140160_8', '电工配件', '联塑', '广东', '电工材料', '联塑3分杯梳', '', null, '0', '1个/0', '0.13', '公司仓库', '0', '1', '0.13', '1571389278');
INSERT INTO `fdz_fb` VALUES ('312', '152', '1', '330140160_9', '电工配件', '材通', '广东', '电工材料', '联塑3分杯梳', '', null, '0', '1个/0', '1.29', '公司仓库', '0', '1', '1.29', '1571389278');
INSERT INTO `fdz_fb` VALUES ('313', '152', '1', '310380120_10', '开关', '西门子', '上海', '电工材料', '西门子映彩系列一位双控带荧光（皓锌白）', '', null, '0', '10个/0', '14.54', '公司仓库', '0', '1', '14.54', '1571389278');
INSERT INTO `fdz_fb` VALUES ('314', '152', '1', '310380110_11', '开关', '西门子', '上海', '电工材料', '西门子映彩系列一位开关带荧光（皓锌白）', '', null, '0', '10个/0', '13.34', '公司仓库', '0', '1', '13.34', '1571389278');
INSERT INTO `fdz_fb` VALUES ('315', '152', '1', '310381230_12', '插座', '西门子', '上海', '电工材料', '西门子映彩系列连体二三插（皓锌白）', '', null, '0', '10个/0', '18.49', '公司仓库', '0', '1', '18.49', '1571389278');
INSERT INTO `fdz_fb` VALUES ('316', '152', '1', 'Z0003_13', '瓦工常用', '暂无', '广东', '瓦工材料', '中型河砂', '', null, '0', '50KG/0', '0.54', '监理自购', '0', '1', '0.54', '1571389278');
INSERT INTO `fdz_fb` VALUES ('317', '152', '1', 'Z0008_14', '瓦工常用', '暂无', '广东', '瓦工材料', '150*200*600轻质砖', '', null, '0', '1块/0', '4.8', '监理自购', '0', '1', '4.80', '1571389278');
INSERT INTO `fdz_fb` VALUES ('318', '152', '1', 'Z0007_15', '瓦工常用', '暂无', '广东', '瓦工材料', '120*200*600轻质砖', '', null, '0', '1块/0', '3.8', '监理自购', '0', '1', '3.80', '1571389278');
INSERT INTO `fdz_fb` VALUES ('319', '152', '1', 'Z0006_16', '瓦工常用', '暂无', '广东', '瓦工材料', '100*200*600轻质砖', '', null, '0', '1块/0', '3.1', '监理自购', '0', '1', '3.10', '1571389278');
INSERT INTO `fdz_fb` VALUES ('320', '152', '1', 'Z0005_17', '瓦工常用', '暂无', '广东', '瓦工材料', '70*200*600轻质砖', '', null, '0', '1块/0', '2.5', '监理自购', '0', '1', '2.50', '1571389278');
INSERT INTO `fdz_fb` VALUES ('321', '152', '1', '290146001_18', '水材配件', '暂无', '广东', '水工材料', '生料带', '', null, '0', '100卷/0', '1.65', '公司仓库', '0', '1', '1.65', '1571389278');
INSERT INTO `fdz_fb` VALUES ('322', '152', '1', '331208638R_19', '电工配件', '材通', '广东', '电工材料', '红色自锁底盒（材通）', '', null, '0', '200个/0', '1.29', '公司仓库', '0', '1', '1.29', '1571389278');
INSERT INTO `fdz_fb` VALUES ('323', '152', '1', 'Z0001_23', '瓦工常用', '暂无', '广东', '瓦工材料', '水泥', '', null, '0', '50KG/0', '0.54', '监理自购', '0', '1', '0.54', '1571389278');
INSERT INTO `fdz_fb` VALUES ('324', '152', '1', '210740321_24', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR32过桥弯短', '', null, '0', '5个/0', '9.64', '公司仓库', '0', '1', '9.64', '1571389278');
INSERT INTO `fdz_fb` VALUES ('325', '152', '1', '330440250R_25', '电工配件', '1', '1', '电工材料', '6分红色杯梳', '', null, '1', '1个/1', '1', '公司仓库', '0', '1', '1.00', '1571389278');
INSERT INTO `fdz_fb` VALUES ('326', '152', '1', '330440250R_26', '电工配件', '1', '1', '电工材料', '6分红色杯梳', '', null, '箱', '1.1111个/箱', '6.54321', '公司仓库', '0', '1', '1.12', '1571389278');
INSERT INTO `fdz_fb` VALUES ('327', '152', '1', '210740251_27', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR25过桥弯短', '', null, '包', '5个/包', '5.55', '公司仓库', '0', '1', '5.55', '1571389278');
INSERT INTO `fdz_fb` VALUES ('328', '152', '1', '210740250_28', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR25过桥弯长', '', null, '包', '4个/包', '10.09', '公司仓库', '0', '1', '10.09', '1571389278');
INSERT INTO `fdz_fb` VALUES ('329', '152', '1', '210740250_29', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR25过桥弯长', '', null, '包', '4个/包', '10.09', '公司仓库', '0', '1', '10.09', '1571389278');
INSERT INTO `fdz_fb` VALUES ('330', '152', '1', '210740201_30', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR20过桥弯短', '', null, '盒', '60个/盒', '3.9', '公司仓库', '0', '1', '3.90', '1571389278');
INSERT INTO `fdz_fb` VALUES ('331', '152', '1', '210740200_31', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR20过桥弯长', '', null, '包', '10个/包', '6.5', '公司仓库', '0', '1', '6.50', '1571389278');
INSERT INTO `fdz_fb` VALUES ('332', '152', '1', '210733225_32', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR异径三通（32*25*32）', '', null, '包', '12个/包', '3.96', '公司仓库', '0', '1', '3.96', '1571389278');
INSERT INTO `fdz_fb` VALUES ('333', '152', '1', '210733220_33', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR异径三通（32*20*32）', '', null, '包', '12个/包', '3.96', '公司仓库', '0', '1', '3.96', '1571389278');
INSERT INTO `fdz_fb` VALUES ('334', '152', '1', '210732560_34', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR25*3/4内牙三通', '', null, '盒', '40个/盒', '11.08', '公司仓库', '0', '1', '11.08', '1571389278');
INSERT INTO `fdz_fb` VALUES ('335', '152', '1', '210732541_35', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR接线内牙三通（25*1/2）', '', null, '盒', '40个/盒', '14.38', '公司仓库', '0', '1', '14.38', '1571389278');
INSERT INTO `fdz_fb` VALUES ('336', '152', '1', '210732540_36', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR25*1/2内牙三通', '', null, '盒', '40个/盒', '10.01', '公司仓库', '0', '1', '10.01', '1571389278');
INSERT INTO `fdz_fb` VALUES ('337', '152', '1', '210732520_37', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR异径三通（25*20*25）', '', null, '盒', '55个/盒', '2.3', '公司仓库', '0', '1', '2.30', '1571389278');
INSERT INTO `fdz_fb` VALUES ('338', '152', '1', '210732041_38', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR接线内牙三通(20*1/2)', '', null, '盒', '50个/盒', '13.33', '公司仓库', '0', '1', '13.33', '1571389278');
INSERT INTO `fdz_fb` VALUES ('339', '152', '1', '210732041_39', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR接线内牙三通(20*1/2)', '', null, '盒', '50个/盒', '8.15', '公司仓库', '0', '1', '8.15', '1571389278');
INSERT INTO `fdz_fb` VALUES ('340', '152', '1', '210732040_40', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR20*1/2内牙三通', '', null, '盒', '50个/盒', '8.15', '公司仓库', '0', '1', '8.15', '1571389278');
INSERT INTO `fdz_fb` VALUES ('341', '152', '1', '210730320_41', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR32等径三通', '', null, '包', '10个/包', '3.64', '公司仓库', '0', '1', '3.64', '1571389278');
INSERT INTO `fdz_fb` VALUES ('342', '152', '1', '210730250_42', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR25等径三通', '', null, '盒', '50个/盒', '2.31', '公司仓库', '0', '1', '2.31', '1571389278');
INSERT INTO `fdz_fb` VALUES ('343', '152', '1', '210730200_43', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR20等径三通', '', null, '盒', '80个/盒', '1.42', '公司仓库', '0', '1', '1.42', '1571389278');
INSERT INTO `fdz_fb` VALUES ('344', '152', '1', '210723280_44', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR32内牙弯头', '', null, '袋', '5个/袋', '24.49', '公司仓库', '0', '1', '24.49', '1571389278');
INSERT INTO `fdz_fb` VALUES ('345', '152', '1', '210723281_45', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR32外牙弯头', '', null, '袋', '10个/袋', '32.2', '公司仓库', '0', '1', '32.20', '1571389278');
INSERT INTO `fdz_fb` VALUES ('346', '152', '1', '210723260_46', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR32*3/4内牙弯头', '', null, '袋', '10个/袋', '20.39', '公司仓库', '0', '1', '20.39', '1571389278');
INSERT INTO `fdz_fb` VALUES ('347', '152', '1', '210723241_47', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR32*1/2内牙弯头', '', null, '袋', '10个/袋', '20.34', '公司仓库', '0', '1', '20.34', '1571389278');
INSERT INTO `fdz_fb` VALUES ('348', '152', '1', '210723225_48', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR32*25异径弯头', '', null, '包', '10个/包', '3.65', '公司仓库', '0', '1', '3.65', '1571389278');
INSERT INTO `fdz_fb` VALUES ('349', '152', '1', '710440011H_49', '文明形象', '华浔', '广东', '广告保护物料', '垃圾编织袋（华浔）', '', null, '扎', '500个/扎', '0.7', '公司仓库', '0', '1', '0.70', '1571389278');
INSERT INTO `fdz_fb` VALUES ('350', '152', '1', '210700200H_50', 'PPR铝塑管', '丰果', '浙江', '水工材料', '丰果铝塑PPR20管（华浔）', '', null, '扎', '40m/扎', '30.55', '公司仓库', '0', '1', '30.55', '1571389278');
INSERT INTO `fdz_fb` VALUES ('351', '152', '1', '210700250H_51', 'PPR铝塑管', '丰果', '浙江', '水工材料', '丰果铝塑PPR25管（华浔）', '', null, '扎', '30m/扎', '41.66', '公司仓库', '0', '1', '41.66', '1571389278');
INSERT INTO `fdz_fb` VALUES ('352', '152', '1', '290132030_52', '水材配件', '暂无', '广东', '水工材料', '3分不锈钢管卡', '', null, '盒', '2000个/盒', '0.2', '公司仓库', '0', '1', '0.20', '1571389278');
INSERT INTO `fdz_fb` VALUES ('353', '152', '1', '210710200_53', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR20等径直通', '', null, '盒', '150个/盒', '0.9', '公司仓库', '0', '1', '0.90', '1571389278');
INSERT INTO `fdz_fb` VALUES ('354', '152', '1', '730140011H_54', '文明形象', '1', '2', '广告保护物料', '编织袋单膜（华浔）', '', null, '6', '5米/6', '4', '监理自购', '0', '1', '3.00', '1571389278');
INSERT INTO `fdz_fb` VALUES ('355', '152', '1', 'aaa11_55', '2', '啊', '是', '1', '申请辅材1', '', null, '饿', '我饿4/饿', '2', '公司仓库', '1', '1', '1.12', '1571389278');
INSERT INTO `fdz_fb` VALUES ('356', '152', '1', 'aaa11_56', '2', '123', '1', '1', '申请辅材1', '', null, '123', '231234/123', '1231', '公司仓库', '1', '1', '23123.00', '1571389278');
INSERT INTO `fdz_fb` VALUES ('357', '152', '1', '330440250R_1', '电工配件', '无', '广东', '电工材料', '6分红色杯梳', '', null, '0', '1个/0', '0.4', '公司仓库', '0', '1', '0.40', '1571389306');
INSERT INTO `fdz_fb` VALUES ('358', '152', '1', '330440200R_2', '电工配件', '无', '广东', '电工材料', '4分红色杯梳', '', null, '0', '1个/0', '0.31', '公司仓库', '0', '1', '0.31', '1571389306');
INSERT INTO `fdz_fb` VALUES ('359', '152', '1', '330440200B_3', '电工配件', '无', '广东', '电工材料', '4分蓝色杯梳', '', null, '0', '1个/0', '0.31', '公司仓库', '0', '1', '0.31', '1571389306');
INSERT INTO `fdz_fb` VALUES ('360', '152', '1', '330440160R_4', '电工配件', '无', '广东', '电工材料', '3分红色杯梳', '', null, '0', '1个/0', '0.28', '公司仓库', '0', '1', '0.28', '1571389306');
INSERT INTO `fdz_fb` VALUES ('361', '152', '1', '330440160B_5', '电工配件', '无', '广东', '电工材料', '3分蓝色杯梳', '', null, '0', '1个/0', '0.28', '公司仓库', '0', '1', '0.28', '1571389306');
INSERT INTO `fdz_fb` VALUES ('362', '152', '1', '330140250_6', '电工配件', '联塑', '广东', '电工材料', '联塑6分杯梳', '', null, '0', '1个/0', '0.29', '公司仓库', '0', '1', '0.29', '1571389306');
INSERT INTO `fdz_fb` VALUES ('363', '152', '1', '330140200_7', '电工配件', '联塑', '广东', '电工材料', '联塑4分杯梳', '', null, '0', '1个/0', '0.21', '公司仓库', '0', '1', '0.21', '1571389306');
INSERT INTO `fdz_fb` VALUES ('364', '152', '1', '330140160_8', '电工配件', '联塑', '广东', '电工材料', '联塑3分杯梳', '', null, '0', '1个/0', '0.13', '公司仓库', '0', '1', '0.13', '1571389306');
INSERT INTO `fdz_fb` VALUES ('365', '152', '1', '330140160_9', '电工配件', '材通', '广东', '电工材料', '联塑3分杯梳', '', null, '0', '1个/0', '1.29', '公司仓库', '0', '1', '1.29', '1571389306');
INSERT INTO `fdz_fb` VALUES ('366', '152', '1', '310380120_10', '开关', '西门子', '上海', '电工材料', '西门子映彩系列一位双控带荧光（皓锌白）', '', null, '0', '10个/0', '14.54', '公司仓库', '0', '1', '14.54', '1571389306');
INSERT INTO `fdz_fb` VALUES ('367', '152', '1', '310380110_11', '开关', '西门子', '上海', '电工材料', '西门子映彩系列一位开关带荧光（皓锌白）', '', null, '0', '10个/0', '13.34', '公司仓库', '0', '1', '13.34', '1571389306');
INSERT INTO `fdz_fb` VALUES ('368', '152', '1', '310381230_12', '插座', '西门子', '上海', '电工材料', '西门子映彩系列连体二三插（皓锌白）', '', null, '0', '10个/0', '18.49', '公司仓库', '0', '1', '18.49', '1571389306');
INSERT INTO `fdz_fb` VALUES ('369', '152', '1', 'Z0003_13', '瓦工常用', '暂无', '广东', '瓦工材料', '中型河砂', '', null, '0', '50KG/0', '0.54', '监理自购', '0', '1', '0.54', '1571389306');
INSERT INTO `fdz_fb` VALUES ('370', '152', '1', 'Z0008_14', '瓦工常用', '暂无', '广东', '瓦工材料', '150*200*600轻质砖', '', null, '0', '1块/0', '4.8', '监理自购', '0', '1', '4.80', '1571389306');
INSERT INTO `fdz_fb` VALUES ('371', '152', '1', 'Z0007_15', '瓦工常用', '暂无', '广东', '瓦工材料', '120*200*600轻质砖', '', null, '0', '1块/0', '3.8', '监理自购', '0', '1', '3.80', '1571389306');
INSERT INTO `fdz_fb` VALUES ('372', '152', '1', 'Z0006_16', '瓦工常用', '暂无', '广东', '瓦工材料', '100*200*600轻质砖', '', null, '0', '1块/0', '3.1', '监理自购', '0', '1', '3.10', '1571389306');
INSERT INTO `fdz_fb` VALUES ('373', '152', '1', 'Z0005_17', '瓦工常用', '暂无', '广东', '瓦工材料', '70*200*600轻质砖', '', null, '0', '1块/0', '2.5', '监理自购', '0', '1', '2.50', '1571389306');
INSERT INTO `fdz_fb` VALUES ('374', '152', '1', '290146001_18', '水材配件', '暂无', '广东', '水工材料', '生料带', '', null, '0', '100卷/0', '1.65', '公司仓库', '0', '1', '1.65', '1571389306');
INSERT INTO `fdz_fb` VALUES ('375', '152', '1', '331208638R_19', '电工配件', '材通', '广东', '电工材料', '红色自锁底盒（材通）', '', null, '0', '200个/0', '1.29', '公司仓库', '0', '1', '1.29', '1571389306');
INSERT INTO `fdz_fb` VALUES ('376', '152', '1', 'Z0001_23', '瓦工常用', '暂无', '广东', '瓦工材料', '水泥', '', null, '0', '50KG/0', '0.54', '监理自购', '0', '1', '0.54', '1571389306');
INSERT INTO `fdz_fb` VALUES ('377', '152', '1', '210740321_24', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR32过桥弯短', '', null, '0', '5个/0', '9.64', '公司仓库', '0', '1', '9.64', '1571389306');
INSERT INTO `fdz_fb` VALUES ('378', '152', '1', '330440250R_25', '电工配件', '1', '1', '电工材料', '6分红色杯梳', '', null, '1', '1个/1', '1', '公司仓库', '0', '1', '1.00', '1571389306');
INSERT INTO `fdz_fb` VALUES ('379', '152', '1', '330440250R_26', '电工配件', '1', '1', '电工材料', '6分红色杯梳', '', null, '箱', '1.1111个/箱', '6.54321', '公司仓库', '0', '1', '1.12', '1571389306');
INSERT INTO `fdz_fb` VALUES ('380', '152', '1', '210740251_27', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR25过桥弯短', '', null, '包', '5个/包', '5.55', '公司仓库', '0', '1', '5.55', '1571389306');
INSERT INTO `fdz_fb` VALUES ('381', '152', '1', '210740250_28', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR25过桥弯长', '', null, '包', '4个/包', '10.09', '公司仓库', '0', '1', '10.09', '1571389306');
INSERT INTO `fdz_fb` VALUES ('382', '152', '1', '210740250_29', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR25过桥弯长', '', null, '包', '4个/包', '10.09', '公司仓库', '0', '1', '10.09', '1571389306');
INSERT INTO `fdz_fb` VALUES ('383', '152', '1', '210740201_30', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR20过桥弯短', '', null, '盒', '60个/盒', '3.9', '公司仓库', '0', '1', '3.90', '1571389306');
INSERT INTO `fdz_fb` VALUES ('384', '152', '1', '210740200_31', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR20过桥弯长', '', null, '包', '10个/包', '6.5', '公司仓库', '0', '1', '6.50', '1571389306');
INSERT INTO `fdz_fb` VALUES ('385', '152', '1', '210733225_32', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR异径三通（32*25*32）', '', null, '包', '12个/包', '3.96', '公司仓库', '0', '1', '3.96', '1571389306');
INSERT INTO `fdz_fb` VALUES ('386', '152', '1', '210733220_33', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR异径三通（32*20*32）', '', null, '包', '12个/包', '3.96', '公司仓库', '0', '1', '3.96', '1571389306');
INSERT INTO `fdz_fb` VALUES ('387', '152', '1', '210732560_34', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR25*3/4内牙三通', '', null, '盒', '40个/盒', '11.08', '公司仓库', '0', '1', '11.08', '1571389306');
INSERT INTO `fdz_fb` VALUES ('388', '152', '1', '210732541_35', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR接线内牙三通（25*1/2）', '', null, '盒', '40个/盒', '14.38', '公司仓库', '0', '1', '14.38', '1571389306');
INSERT INTO `fdz_fb` VALUES ('389', '152', '1', '210732540_36', '给水管配件', '丰果', '杭州', '水工材料', '丰果PPR25*1/2内牙三通', '', null, '盒', '40个/盒', '10.01', '公司仓库', '0', '1', '10.01', '1571389306');
INSERT INTO `fdz_fb` VALUES ('390', '152', '1', '210732520_37', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR异径三通（25*20*25）', '', null, '盒', '55个/盒', '2.3', '公司仓库', '0', '1', '2.30', '1571389306');
INSERT INTO `fdz_fb` VALUES ('391', '152', '1', '210732041_38', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR接线内牙三通(20*1/2)', '', null, '盒', '50个/盒', '13.33', '公司仓库', '0', '1', '13.33', '1571389306');
INSERT INTO `fdz_fb` VALUES ('392', '152', '1', '210732041_39', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR接线内牙三通(20*1/2)', '', null, '盒', '50个/盒', '8.15', '公司仓库', '0', '1', '8.15', '1571389306');
INSERT INTO `fdz_fb` VALUES ('393', '152', '1', '210732040_40', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR20*1/2内牙三通', '', null, '盒', '50个/盒', '8.15', '公司仓库', '0', '1', '8.15', '1571389306');
INSERT INTO `fdz_fb` VALUES ('394', '152', '1', '210730320_41', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR32等径三通', '', null, '包', '10个/包', '3.64', '公司仓库', '0', '1', '3.64', '1571389306');
INSERT INTO `fdz_fb` VALUES ('395', '152', '1', '210730250_42', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR25等径三通', '', null, '盒', '50个/盒', '2.31', '公司仓库', '0', '1', '2.31', '1571389306');
INSERT INTO `fdz_fb` VALUES ('396', '152', '1', '210730200_43', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR20等径三通', '', null, '盒', '80个/盒', '1.42', '公司仓库', '0', '1', '1.42', '1571389306');
INSERT INTO `fdz_fb` VALUES ('397', '152', '1', '210723280_44', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR32内牙弯头', '', null, '袋', '5个/袋', '24.49', '公司仓库', '0', '1', '24.49', '1571389306');
INSERT INTO `fdz_fb` VALUES ('398', '152', '1', '210723281_45', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR32外牙弯头', '', null, '袋', '10个/袋', '32.2', '公司仓库', '0', '1', '32.20', '1571389306');
INSERT INTO `fdz_fb` VALUES ('399', '152', '1', '210723260_46', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR32*3/4内牙弯头', '', null, '袋', '10个/袋', '20.39', '公司仓库', '0', '1', '20.39', '1571389306');
INSERT INTO `fdz_fb` VALUES ('400', '152', '1', '210723241_47', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR32*1/2内牙弯头', '', null, '袋', '10个/袋', '20.34', '公司仓库', '0', '1', '20.34', '1571389306');
INSERT INTO `fdz_fb` VALUES ('401', '152', '1', '210723225_48', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR32*25异径弯头', '', null, '包', '10个/包', '3.65', '公司仓库', '0', '1', '3.65', '1571389306');
INSERT INTO `fdz_fb` VALUES ('402', '152', '1', '710440011H_49', '文明形象', '华浔', '广东', '广告保护物料', '垃圾编织袋（华浔）', '', null, '扎', '500个/扎', '0.7', '公司仓库', '0', '1', '0.70', '1571389306');
INSERT INTO `fdz_fb` VALUES ('403', '152', '1', '210700200H_50', 'PPR铝塑管', '丰果', '浙江', '水工材料', '丰果铝塑PPR20管（华浔）', '', null, '扎', '40m/扎', '30.55', '公司仓库', '0', '1', '30.55', '1571389306');
INSERT INTO `fdz_fb` VALUES ('404', '152', '1', '210700250H_51', 'PPR铝塑管', '丰果', '浙江', '水工材料', '丰果铝塑PPR25管（华浔）', '', null, '扎', '30m/扎', '41.66', '公司仓库', '0', '1', '41.66', '1571389306');
INSERT INTO `fdz_fb` VALUES ('405', '152', '1', '290132030_52', '水材配件', '暂无', '广东', '水工材料', '3分不锈钢管卡', '', null, '盒', '2000个/盒', '0.2', '公司仓库', '0', '1', '0.20', '1571389306');
INSERT INTO `fdz_fb` VALUES ('406', '152', '1', '210710200_53', '给水管配件', '丰果', '浙江', '水工材料', '丰果PPR20等径直通', '', null, '盒', '150个/盒', '0.9', '公司仓库', '0', '1', '0.90', '1571389306');
INSERT INTO `fdz_fb` VALUES ('407', '152', '1', '730140011H_54', '文明形象', '1', '2', '广告保护物料', '编织袋单膜（华浔）', '', null, '6', '5米/6', '4', '监理自购', '0', '1', '3.00', '1571389306');
INSERT INTO `fdz_fb` VALUES ('408', '152', '1', 'aaa11_55', '2', '啊', '是', '1', '申请辅材1', '', null, '饿', '我饿4/饿', '2', '公司仓库', '1', '1', '1.12', '1571389306');
INSERT INTO `fdz_fb` VALUES ('409', '152', '1', 'aaa11_56', '2', '123', '1', '1', '申请辅材1', '', null, '123', '231234/123', '1231', '公司仓库', '1', '1', '23123.00', '1571389306');

-- ----------------------------
-- Table structure for lottery
-- ----------------------------
DROP TABLE IF EXISTS `lottery`;
CREATE TABLE `lottery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标题',
  `type` int(10) NOT NULL COMMENT '1票2钻石',
  `sum` int(10) NOT NULL COMMENT '数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lottery
-- ----------------------------
INSERT INTO `lottery` VALUES ('1', '10票', '1', '10');
INSERT INTO `lottery` VALUES ('2', '20票', '1', '20');
INSERT INTO `lottery` VALUES ('3', '20钻石', '2', '20');
INSERT INTO `lottery` VALUES ('4', '10钻石', '2', '10');
INSERT INTO `lottery` VALUES ('5', '30票', '1', '30');
INSERT INTO `lottery` VALUES ('6', '40票', '1', '40');
INSERT INTO `lottery` VALUES ('7', '30钻石', '2', '30');
INSERT INTO `lottery` VALUES ('8', '40钻石', '2', '40');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2016_01_04_173148_create_admin_tables', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for ranking
-- ----------------------------
DROP TABLE IF EXISTS `ranking`;
CREATE TABLE `ranking` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '打榜用户id',
  `celebrity_id` int(11) NOT NULL COMMENT '明星id',
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '年',
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '月',
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '天',
  `w` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '周',
  `mingci` int(11) NOT NULL DEFAULT '0' COMMENT 'integral',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ranking
-- ----------------------------
INSERT INTO `ranking` VALUES ('1', '5', '1', '2020', '09', '7', '36', '5');
INSERT INTO `ranking` VALUES ('2', '5', '1', '2020', '09', '8', '36', '50');
INSERT INTO `ranking` VALUES ('3', '5', '1', '2020', '09', '9', '36', '30');
INSERT INTO `ranking` VALUES ('4', '5', '2', '2020', '09', '7', '36', '20');
INSERT INTO `ranking` VALUES ('5', '5', '2', '2020', '09', '7', '36', '20');
INSERT INTO `ranking` VALUES ('6', '5', '3', '2020', '09', '9', '36', '10');
INSERT INTO `ranking` VALUES ('7', '5', '3', '2020', '09', '10', '36', '21');
INSERT INTO `ranking` VALUES ('8', '5', '1', '2020', '09', '11', '36', '0');
INSERT INTO `ranking` VALUES ('9', '5', '3', '2020', '09', '11', '36', '40');
INSERT INTO `ranking` VALUES ('10', '5', '1', '2020', '09', '11', '36', '40');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weapp_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weapp_openid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defaultaddress_id` int(11) DEFAULT NULL,
  `diamondnum` int(11) unsigned DEFAULT '0' COMMENT '钻石',
  `votenum` int(11) DEFAULT '0' COMMENT '票数',
  `box` int(6) DEFAULT '6' COMMENT '可开箱子数',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`weapp_avatar`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('5', 'Dream Snow', 'https://thirdwx.qlogo.cn/mmopen/vi_32/Ha818SKD52LuUCRw6J1Vjfr484iceuJT8TeVPA8IFNXRyxzfLq0WIhDwnV6KbCYdhf8fbsv0hrzt0lJFV1AQItQ/132', 'o2l8x5S_Bp-aXVGtRyTL3adLOBRg', null, '50', '100', '4', '2020-09-11 12:50:50', '2020-09-12 10:32:50');
