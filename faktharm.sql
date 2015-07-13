/*
Navicat MySQL Data Transfer

Source Server         : dhdc
Source Server Version : 50541
Source Host           : localhost:3309
Source Database       : faktharm

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-07-13 18:50:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for adddep
-- ----------------------------
DROP TABLE IF EXISTS `adddep`;
CREATE TABLE `adddep` (
  `ADDDEP_ID` int(6) NOT NULL AUTO_INCREMENT,
  `RISK_ID` varchar(7) CHARACTER SET utf8 NOT NULL,
  `DEP_ID` int(6) DEFAULT NULL,
  `DEP_NAME` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`ADDDEP_ID`),
  UNIQUE KEY `ix_id_name` (`RISK_ID`,`DEP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of adddep
-- ----------------------------
INSERT INTO `adddep` VALUES ('1', '01', '1', 'แผนกคอมพิวเตอร์');

-- ----------------------------
-- Table structure for clinictype
-- ----------------------------
DROP TABLE IF EXISTS `clinictype`;
CREATE TABLE `clinictype` (
  `CLINICTYPE_ID` int(2) NOT NULL,
  `CLINIC_NAME` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`CLINICTYPE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of clinictype
-- ----------------------------
INSERT INTO `clinictype` VALUES ('1', 'ความเสี่ยงทาง clinic ทั่วไป');
INSERT INTO `clinictype` VALUES ('2', 'ความเสี่ยงทาง clinic เฉพาะโรค');
INSERT INTO `clinictype` VALUES ('3', 'ความเสี่ยงทั่วไป');

-- ----------------------------
-- Table structure for complain
-- ----------------------------
DROP TABLE IF EXISTS `complain`;
CREATE TABLE `complain` (
  `COMPLAIN_ID` int(3) NOT NULL,
  `COMPLAIN_NAME` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`COMPLAIN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of complain
-- ----------------------------
INSERT INTO `complain` VALUES ('1', 'โทรศัพท์');
INSERT INTO `complain` VALUES ('2', 'ผู้ป่วย');
INSERT INTO `complain` VALUES ('3', 'risk round');

-- ----------------------------
-- Table structure for dep
-- ----------------------------
DROP TABLE IF EXISTS `dep`;
CREATE TABLE `dep` (
  `DEP_ID` int(2) NOT NULL,
  `DEP_NAME` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `FULLNAME` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `TYPE` char(1) CHARACTER SET utf8 DEFAULT NULL,
  `PASSWORD` varchar(200) DEFAULT NULL,
  `LEVEL` char(1) CHARACTER SET utf8 DEFAULT NULL,
  `DEP` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`DEP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of dep
-- ----------------------------
INSERT INTO `dep` VALUES ('1', 'opd', 'แผนกผู้ป่วยนอก', 'A', 'f2501c71a070a8bb42e898a80baee401', 'U', null);
INSERT INTO `dep` VALUES ('2', 'ipd', 'แผนกผู้ป่วยใน', 'A', '1abf005ea3f957c5cb79941ab7707c11', 'U', null);
INSERT INTO `dep` VALUES ('3', 'risk', 'ทีมความเสี่ยง', 'C', '7d9bc7bfd623ac78b246816868157590', 'A', null);
INSERT INTO `dep` VALUES ('4', 'manage', 'ฝ่ายบริหาร', 'A', '991d912445bd396599bbb31f697005bc', 'U', null);
INSERT INTO `dep` VALUES ('5', 'vej', 'เวชปฏิบัติชุมชน', 'A', '1fb36c4ccf88f7e67ead155496f02338', 'U', null);
INSERT INTO `dep` VALUES ('6', 'pharm', 'เภสัชกรรม', 'A', '85dfba75bcadb576723264b5986f2ac2', 'U', null);
INSERT INTO `dep` VALUES ('7', 'lab', 'ห้อง Lab', 'A', 'd128a9569b806e3a93c91293aed3f40b', 'U', null);
INSERT INTO `dep` VALUES ('8', 'er', 'ห้องฉุกเฉิน', 'A', '0ea711391df8d060f4f81141e192814e', 'U', null);
INSERT INTO `dep` VALUES ('9', 'dent', 'ทันตกรรม', 'A', '15f28fbc8c6e099a1e98b8a555d72374', 'U', null);
INSERT INTO `dep` VALUES ('10', 'xray', 'x-ray', 'A', 'd5b03d3acb580879f82271ab4885ee5e', 'U', null);
INSERT INTO `dep` VALUES ('11', 'supply', 'หน่วยจ่ายกลาง', 'A', '3e016029eeb9a92852a656f33fbf1dc6', 'U', null);
INSERT INTO `dep` VALUES ('12', 'nurse', 'กลุ่มการพยาบาล', 'A', '5c22590152f4f53f3c05cf7cc6aa0b6b', 'U', null);
INSERT INTO `dep` VALUES ('13', 'ทีม PCT', 'ทีม PCT', 'C', null, null, null);
INSERT INTO `dep` VALUES ('14', 'ทีม ENV', 'ทีม ENV', 'C', null, null, null);
INSERT INTO `dep` VALUES ('15', 'ทีม ยา', 'ทีม ยา', 'C', null, null, null);
INSERT INTO `dep` VALUES ('16', 'ทีม IC', 'ทีม IC', 'C', null, null, null);
INSERT INTO `dep` VALUES ('17', 'ทีม IM', 'ทีม IM', 'C', null, null, null);
INSERT INTO `dep` VALUES ('18', 'ทีม IT', 'ทีม IT', 'C', null, null, null);
INSERT INTO `dep` VALUES ('19', 'ทีม HUM', 'ทีม HUM', 'C', null, null, null);
INSERT INTO `dep` VALUES ('20', 'ทีม บริหาร', 'ทีม บริหาร', 'C', null, null, null);
INSERT INTO `dep` VALUES ('21', 'physical', 'แผนกกายภาพ', 'A', '85dfba75bcadb576723264b5986f2ac2', 'U', null);
INSERT INTO `dep` VALUES ('22', 'prakun', 'งานประกันสุขภาพ', 'A', 'b9e4093f970251d5bcf888b76944a4bc', 'U', null);
INSERT INTO `dep` VALUES ('23', 'admin', 'ผู้ดูแลระบบ', 'B', '202cb962ac59075b964b07152d234b70', 'A', null);
INSERT INTO `dep` VALUES ('24', 'lr', 'แผนกห้องคลอด', 'A', '1592104031ceaa405b8a103c399e2633', 'U', null);
INSERT INTO `dep` VALUES ('25', 'doctor', 'แพทย์', 'A', '0502a70eae9d62bed6cd32d7e1a0cb45', 'U', null);
INSERT INTO `dep` VALUES ('26', 'massage', 'แพทย์แผนไทย', 'A', '991d912445bd396599bbb31f697005bc', 'U', null);
INSERT INTO `dep` VALUES ('27', 'pmr', 'กายภาพบำบัด', 'A', 'b943325cc7b7422d2871b345bf9b067f', 'U', null);

-- ----------------------------
-- Table structure for friskhead
-- ----------------------------
DROP TABLE IF EXISTS `friskhead`;
CREATE TABLE `friskhead` (
  `risk_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `risk_date` date NOT NULL,
  `risk_time` varchar(5) NOT NULL,
  `department` int(2) DEFAULT NULL,
  `miss` char(1) DEFAULT NULL,
  `event` varchar(200) NOT NULL,
  `safety` varchar(200) NOT NULL,
  `outcome_pt` varchar(200) NOT NULL,
  `outcome_guest` varchar(200) DEFAULT NULL,
  `outcome_staff` varchar(200) DEFAULT NULL,
  `outcome_price` double(7,2) DEFAULT NULL,
  `solve_begin` varchar(200) DEFAULT NULL,
  `sum_solve` varchar(200) DEFAULT NULL,
  `risk_level` char(1) DEFAULT NULL,
  `risk_head_department` varchar(255) DEFAULT 'หน่วยงานที่เกี่ยวข้อง',
  `risk_status` char(1) DEFAULT NULL,
  `prohead` varchar(6) DEFAULT NULL,
  `prodetail` varchar(6) DEFAULT NULL,
  `program_text` varchar(200) DEFAULT NULL,
  `login_name` varchar(100) DEFAULT NULL,
  `risk_sum_dep` varchar(200) DEFAULT NULL,
  `risk_simple` int(2) DEFAULT NULL,
  `date_input` date DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `last_staff` varchar(100) DEFAULT NULL,
  `print_url` varchar(200) DEFAULT NULL,
  `act_st` char(1) DEFAULT NULL,
  `ref` varchar(50) DEFAULT NULL COMMENT '�Ţ fk �Ѻ upload ��Ѻ upload ajax',
  `clinictype` int(2) DEFAULT NULL,
  `place_id` int(3) DEFAULT NULL,
  `staff` varchar(100) DEFAULT NULL,
  `risk_again` char(1) DEFAULT NULL,
  `date_complete` date DEFAULT NULL,
  `risk_ref_no` varchar(100) DEFAULT NULL,
  `input_complain` int(3) DEFAULT NULL,
  PRIMARY KEY (`risk_id`),
  UNIQUE KEY `ref` (`ref`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friskhead
-- ----------------------------
INSERT INTO `friskhead` VALUES ('0001', '2015-07-01', '10.00', '1', '1', 'fdhgsdhfdhfshfs', 'ghfhfghfg', 'fhfhf', '1', '1', '1000.00', 'fghdfhfdh', 'gfhdfhg', '1', '3', '1', '1', '2', '1', '1', '1', '1', '0000-00-00', '0000-00-00 00:00:00', '1', '1', '1', null, null, null, '', '', null, '', '1');
INSERT INTO `friskhead` VALUES ('0002', '2015-07-01', '10.00', '1', '2', 'เหตุเกิด  สน', 'ปลอดภถัย', 'dsfg', 'dfsgdf', 'gdsfgdfsg', '1000.00', 'dfsgdsfg', 'dsfgdsfgf', '1', '', null, '2', '9', '', '', '', '2', null, null, '', '', '1', null, null, null, '', '', null, '', null);
INSERT INTO `friskhead` VALUES ('0003', '2015-07-14', '10.00', '1', '2', 'นายงงงงงงงงงงงงงงงง', 'งงง', 'งงง', 'งงง', 'งง', '500.00', 'งงง', 'งงง', '', '', null, '15', '101', '', '', '', '1', null, null, '', '', '1', null, null, null, '', '', null, '', null);

-- ----------------------------
-- Table structure for ftriskhead
-- ----------------------------
DROP TABLE IF EXISTS `ftriskhead`;
CREATE TABLE `ftriskhead` (
  `risk_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `risk_date` date NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `ref` varchar(50) DEFAULT NULL COMMENT '�Ţ fk �Ѻ upload ��Ѻ upload ajax',
  `risk_again` char(1) DEFAULT NULL,
  `department` int(2) DEFAULT NULL,
  `miss` char(1) DEFAULT NULL,
  `safety` varchar(200) NOT NULL,
  `outcome_pt` varchar(200) NOT NULL,
  `outcome_guest` varchar(200) DEFAULT NULL,
  `outcome_staff` varchar(200) DEFAULT NULL,
  `outcome_price` double(7,2) DEFAULT NULL,
  `solve_begin` varchar(200) DEFAULT NULL,
  `sum_solve` varchar(200) DEFAULT NULL,
  `risk_level` char(1) DEFAULT NULL,
  `risk_head_department` varchar(200) DEFAULT NULL,
  `risk_status` char(1) DEFAULT NULL,
  `prohead` varchar(6) DEFAULT NULL,
  `prodetail` varchar(6) DEFAULT NULL,
  `program_text` varchar(200) DEFAULT NULL,
  `login_name` varchar(100) DEFAULT NULL,
  `risk_sum_dep` varchar(200) DEFAULT NULL,
  `risk_simple` int(2) DEFAULT NULL,
  `date_input` date DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `last_staff` varchar(100) DEFAULT NULL,
  `print_url` varchar(200) DEFAULT NULL,
  `act_st` char(1) DEFAULT NULL,
  `clinictype` int(2) DEFAULT NULL,
  `place_id` int(3) DEFAULT NULL,
  `staff` varchar(100) DEFAULT NULL,
  `date_complete` date DEFAULT NULL,
  PRIMARY KEY (`risk_id`),
  UNIQUE KEY `ref` (`ref`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ftriskhead
-- ----------------------------
INSERT INTO `ftriskhead` VALUES ('0004', '2015-07-10', 'มีอาราย', 'b0DzAGYO2OdgbMnUdT8qgr', '1', '1', '1', 'รอๆๆ', 'เอาท์ ผป', 'เอาท์ ญ', 'เอาท์ จนท', '500.00', 'เริ่ม', 'ทบทวน', '1', '', '1', '1', '1', '', '', '', null, null, null, '', '', '1', '1', '1', '', null);
INSERT INTO `ftriskhead` VALUES ('0005', '2015-07-10', 'คอมพิวเตอร์พัง', 'bIyg9t8nqROXGU8dWEvGBE', '1', '1', '1', 'ป้องกัน', 'เอาท์ ผป', 'เอาท์ ญ', 'เอาท์ จนท', '5000.00', 'เริ่มแกะ', 'ทบทวนแนวทาง', '1', '', '', '10', '76', '', '', '', '2', '2015-07-10', '2015-07-10 17:47:14', '', '', '', '3', '1', '', null);

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `level` char(1) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES ('1', 'ระดับที่ 1 ความรุนแรง : ความเสียหายเล็กน้อยแก้ไขปัญหาได้, ด้านการเงิน : < 5,000 บาท ,ด้านการเสื่อมเสียชื่อเสียง : กระทบน้อย/ทราบเฉพาะองค์กร');
INSERT INTO `level` VALUES ('2', 'ระดับที่ 2 ความรุนแรง : ความเสียหายปานกลางแก้ไขปัญหาได้, ด้านการเงิน : 5,000 -10,000  บาท ,ด้านการเสื่อมเสียชื่อเสียง : กระทบกว้าง เริ่มมีบุคคลภายนอกทราบ');
INSERT INTO `level` VALUES ('3', 'ระดับที่ 3 ความรุนแรง : ความเสียหายมากส่งผลกระทบหรือไม่สามารถแก้ปัญหาได้, ด้านการเงิน :  10,001 - 50,000 บาท ,ด้านการเสื่อมเสียชื่อเสียง : บุคคลภายนอกทราบ/เริ่มมีผลกระทบต่อชื่อเสียงมีแนวโน้มต้อการฟ้อง');
INSERT INTO `level` VALUES ('4', 'ระดับที่ 3 ความรุนแรง : ความเสียหายมากทีสุดมีผลกระทบในภาพรวมไม่สามารถแก้ปัญหาได้ ,ด้านการเงิน : > 50,000 บาท ,ด้านการเสื่อมเสียชื่อเสียง : มีการถูกฟ้องร้อง/มีการร้องเรียนต่อหน่วยงาน');
INSERT INTO `level` VALUES ('A', 'ระดับ A เหตุการณ์ที่มีโอกาสก่อให้เกิดความคลาดเคลื่อน');
INSERT INTO `level` VALUES ('B', 'ระดับ B เกิดความคลาดเคลื่อนแต่ยังไม่ถึงผู้ป่วย');
INSERT INTO `level` VALUES ('C', 'ระดับ C เกิดความคลาดเคลื่อนกับผู้ป่วยแต่ไม่ทำให้ผู้ป่วยเกิดอันตราย');
INSERT INTO `level` VALUES ('D', 'ระดับ D เกิดความคลาดเคลื่อนกับผู้ป่วยส่งผลให้เกิดการเฝ้าระวังเพื่อให้มั่นใจว่าไม่เกิดอันตรายกับผู้ป่วย');
INSERT INTO `level` VALUES ('E', 'ระดับ E มีผลทำให้ผู้ป่วยต้องได้รับการรักษาเพิ่มขึ้นมาจากเหตุการที่เกิดขึ้น');
INSERT INTO `level` VALUES ('F', 'ระดับ F มีผลต้องทำให้ป่วย ต้องได้รับการรักษาตัวในโรงพยาบาลมากขึ้น');
INSERT INTO `level` VALUES ('G', 'ระดับ G มีผลทำให้เกิดความพิการถาวร');
INSERT INTO `level` VALUES ('H', 'ระดับ H มีผลต้องทำให้ผู้ป่วยต้องทำการกู้ชีพ');
INSERT INTO `level` VALUES ('I', 'ระดับ I มีผลทำให้ผู้ป่วยต้องเสียชีวิต');

-- ----------------------------
-- Table structure for photo_library
-- ----------------------------
DROP TABLE IF EXISTS `photo_library`;
CREATE TABLE `photo_library` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(50) DEFAULT NULL COMMENT 'เลข fk กับ upload ใช้กับ upload ajax',
  `event_name` varchar(255) DEFAULT NULL COMMENT 'ชื่องาน',
  `detail` text COMMENT 'รายละเอียด',
  `start_date` datetime DEFAULT NULL COMMENT 'วันที่เริ่มถ่ายภาพ',
  `end_date` datetime DEFAULT NULL COMMENT 'วันที่ถ่ายภาพเสร็จ',
  `location` varchar(255) DEFAULT NULL COMMENT 'สถานที่',
  `customer_name` varchar(150) DEFAULT NULL COMMENT 'ชื่อลูกค้า',
  `customer_mobile_phone` varchar(20) DEFAULT NULL COMMENT 'เบอร์โทร',
  `province_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ref` (`ref`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of photo_library
-- ----------------------------
INSERT INTO `photo_library` VALUES ('3', '6f6VTlqDp-V6nrU4KAMjh1', 'ไปเชียงคาน', 'ไปเที่ยวเชียงคาน', '2015-03-29 00:00:00', '2015-03-29 00:00:00', 'แก่งคุดคู้ เชียงคาน', 'คุณสุกัญญา ยัพราษฎร์', '091-4192801', '30');
INSERT INTO `photo_library` VALUES ('4', 'RB7whG0kLUKPCSnAQ-2qYf', 'xfdhxsh', 'dxfhgdfhgdsfh', '2015-07-09 00:00:00', '2015-07-09 00:00:00', 'fdhsfh', '', '', '2');
INSERT INTO `photo_library` VALUES ('5', 'QABsNo20WfMhUpVT9tpLpk', 'xfdhxsh', 'dxfhgdfhgdsfh', '2015-07-09 00:00:00', '2015-07-09 00:00:00', 'fdhsfh', '', '', '2');
INSERT INTO `photo_library` VALUES ('6', 'q8xONqSXw-UpWQ3E4SH5l7', 'xfdhxsh', 'dxfhgdfhgdsfh', '2015-07-09 00:00:00', '2015-07-09 00:00:00', 'fdhsfh', '', '', '2');
INSERT INTO `photo_library` VALUES ('7', 'ntolit4qiCFcDg915oO_nD', 'ปิกปผิ', 'ปอิปแอ', '2015-07-09 00:00:00', '2015-07-09 00:00:00', 'อืิปดิ', 'อแิแปิ', '', '1');
INSERT INTO `photo_library` VALUES ('8', '0jX57D__Ku17loxc6nLj04', ' nbb', 'ghk', '2015-07-10 00:00:00', '2015-07-10 00:00:00', 'ghkg', '', '', '2');

-- ----------------------------
-- Table structure for print
-- ----------------------------
DROP TABLE IF EXISTS `print`;
CREATE TABLE `print` (
  `id_print` varchar(50) NOT NULL,
  `print_report_name` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `status_print` char(1) DEFAULT NULL,
  `risk_id` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_print`)
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of print
-- ----------------------------

-- ----------------------------
-- Table structure for priskhead
-- ----------------------------
DROP TABLE IF EXISTS `priskhead`;
CREATE TABLE `priskhead` (
  `risk_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `risk_date` date NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `ref` varchar(50) DEFAULT NULL COMMENT '�Ţ fk �Ѻ upload ��Ѻ upload ajax',
  `risk_again` char(1) DEFAULT NULL,
  `date_complete` date DEFAULT NULL,
  `risk_ref_no` varchar(100) DEFAULT NULL,
  `input_complain` int(3) DEFAULT NULL,
  `risk_time` varchar(5) DEFAULT NULL,
  `prohead` varchar(6) DEFAULT NULL,
  `prodetail` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`risk_id`),
  UNIQUE KEY `ref` (`ref`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of priskhead
-- ----------------------------
INSERT INTO `priskhead` VALUES ('0001', '2015-07-10', 'มีอาราย', 'Aoh9hpTQMO4-IRbc6xFnv5', '1', null, '', null, '10.00', '3', '18');
INSERT INTO `priskhead` VALUES ('0002', '2015-07-10', 'ไม่มีอารายหรา', 'BvHm84hkvEDNAZkj5zQp1P', '1', '2015-07-10', '', null, '15.00', '2', '9');
INSERT INTO `priskhead` VALUES ('0003', '2015-07-10', 'กผิก', 'RFxOy6ZoreHa8SXAsc7a-S', '1', '2015-07-10', '', null, '15.00', '4', '28');
INSERT INTO `priskhead` VALUES ('0004', '2015-07-13', 'มีอารายก้อว่ามา', '5mmUhYl1ns7GnFhZvhXR-W', '1', null, '1', '1', '10.00', '14', '97');

-- ----------------------------
-- Table structure for prodetail
-- ----------------------------
DROP TABLE IF EXISTS `prodetail`;
CREATE TABLE `prodetail` (
  `PRODETAIL_ID` int(3) NOT NULL,
  `PROHEAD_ID` int(2) DEFAULT NULL,
  `PRODETAIL_NAME` varchar(200) DEFAULT NULL,
  `ORDERITEM` int(3) DEFAULT NULL,
  `ACTIVE_STATUS` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`PRODETAIL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of prodetail
-- ----------------------------
INSERT INTO `prodetail` VALUES ('1', '1', '1.1 เปิดเผยข้อมูลผู้ป่วย', '1', null);
INSERT INTO `prodetail` VALUES ('2', '1', '1.2 บริการไม่เท่าเทียมกัน', '2', null);
INSERT INTO `prodetail` VALUES ('3', '1', '1.3 ใบเซนต์ยินยอมไม่ครบ/ไม่ถุกต้อง/ไม่ได้เซนต์', '3', null);
INSERT INTO `prodetail` VALUES ('4', '1', '1.4 การ restrain ที่ไม่อธิบายแก่ญาติ', '4', null);
INSERT INTO `prodetail` VALUES ('5', '1', '1.5 ลำดับคิวผิด', '5', null);
INSERT INTO `prodetail` VALUES ('6', '1', '1.6 ผู้ป่วยได้รับข้อมูลไม่ครบ', '6', null);
INSERT INTO `prodetail` VALUES ('7', '1', '1.7 สิทธิการรักษาผิด', '7', null);
INSERT INTO `prodetail` VALUES ('8', '1', '1.8 อื่นๆ', '8', null);
INSERT INTO `prodetail` VALUES ('9', '2', '2.1ไม่ล้างมือตามแนวทางปฏิบัติ', '1', null);
INSERT INTO `prodetail` VALUES ('10', '2', '2.2 แยกขยะผิดประเภท', '2', null);
INSERT INTO `prodetail` VALUES ('11', '2', '2.3 ปฏิบัติตาม UP ไม่ถุกต้อง', '3', null);
INSERT INTO `prodetail` VALUES ('12', '2', '2.4 ทำให้สิ่งแวดล้อมปนเปื้อน', '4', null);
INSERT INTO `prodetail` VALUES ('13', '2', '2.5 เครื่องมือ/เวชภัณฑ์หมดอายุ', '5', null);
INSERT INTO `prodetail` VALUES ('14', '2', '2.6 เครื่องมือไม่ sterile', '6', null);
INSERT INTO `prodetail` VALUES ('15', '2', '2.7 Nosocromial infection', '7', null);
INSERT INTO `prodetail` VALUES ('16', '2', '2.8 อื่นๆ', '8', null);
INSERT INTO `prodetail` VALUES ('17', '3', '3.1.1 สิ่งแวดล้อมเป็นอันตราย', '1', null);
INSERT INTO `prodetail` VALUES ('18', '3', '3.1.2 หลังคา,เพดานรั่ว', '2', null);
INSERT INTO `prodetail` VALUES ('19', '3', '3.1.3 พื้นลื่น/เปียก', '3', null);
INSERT INTO `prodetail` VALUES ('20', '3', '3.1.4 เสี่ยงต่อการเกิดอัคคีภัย/ไม่มีทางหนีไฟ', '4', null);
INSERT INTO `prodetail` VALUES ('21', '3', '3.1.5 ระบบน้ำประปาไม่พร้อมใช้', '5', null);
INSERT INTO `prodetail` VALUES ('22', '3', '3.1.6 ไฟไหม้แหล่งเชื้อเพลิง', '6', null);
INSERT INTO `prodetail` VALUES ('23', '3', '3.1.7 น้ำร้อนลวก/ไฟช๊อต', '7', null);
INSERT INTO `prodetail` VALUES ('24', '3', '3.1.8 อื่นๆ', '8', null);
INSERT INTO `prodetail` VALUES ('25', '4', '3.2.1 เครื่องมือ..............ไม่พร้อมใช้', '1', null);
INSERT INTO `prodetail` VALUES ('26', '4', '3.2.2 เครื่องมือ..............ใช้การไม่ได้', '2', null);
INSERT INTO `prodetail` VALUES ('27', '4', '3.2.3 ไฟสำรองไม่พอใช้/ไฟฉุกเฉินไม่ทำงานภายใน 10 วินาที', '3', null);
INSERT INTO `prodetail` VALUES ('28', '4', '3.2.4 Oxygen ไม่พร้อมใช้', '4', null);
INSERT INTO `prodetail` VALUES ('29', '4', '3.2.5 ยานพาหนะ ไม่พร้อมใช้', '5', null);
INSERT INTO `prodetail` VALUES ('30', '4', '3.2.6 ระบบสื่อสารไม่พร้อมใช้', '6', null);
INSERT INTO `prodetail` VALUES ('31', '4', '3.2.9 อื่นๆ', '9', null);
INSERT INTO `prodetail` VALUES ('32', '5', '3.3.1 โจรกรรม/ลักขโมย', '1', null);
INSERT INTO `prodetail` VALUES ('33', '5', '3.3.2 การคุกคาม/ข่มขู่', '2', null);
INSERT INTO `prodetail` VALUES ('34', '5', '3.3.3 ทำร้ายร่างกาย', '3', null);
INSERT INTO `prodetail` VALUES ('35', '5', '3.3.4 ทะเลาะวิวาท', '4', null);
INSERT INTO `prodetail` VALUES ('36', '5', '3.3.5 อื่นๆ', '5', null);
INSERT INTO `prodetail` VALUES ('37', '6', '3.4.1 บาดเจ็บจากการทำงาน/โรคจากการทำงาน', '1', null);
INSERT INTO `prodetail` VALUES ('38', '6', '3.4.2 ไม่สวมเครื่องป้องกันอันตราย', '2', null);
INSERT INTO `prodetail` VALUES ('39', '6', '3.4.3 ไม่ได้ตรวจสุขภาพประจำปี', '3', null);
INSERT INTO `prodetail` VALUES ('40', '6', '3.4.4 การระบาดของโรคในหน่วยงาน', '4', null);
INSERT INTO `prodetail` VALUES ('41', '6', '3.4.5 อื่นๆ', '5', null);
INSERT INTO `prodetail` VALUES ('42', '7', '4.1 ไม่ได้ให้ยา', '1', null);
INSERT INTO `prodetail` VALUES ('43', '7', '4.2 ให้ยาผิดขนาด (ต่ำ/สูง) เพราะ', '2', null);
INSERT INTO `prodetail` VALUES ('44', '7', '4.3 ความเข้มหรือความแรงของยา(มากไป/น้อยไป)', '3', null);
INSERT INTO `prodetail` VALUES ('45', '7', '4.4 ให้ยาผิดชนิด', '4', null);
INSERT INTO `prodetail` VALUES ('46', '7', '4.5 รูปแบบยาผิด', '5', null);
INSERT INTO `prodetail` VALUES ('47', '7', '4.6 เทคนิคการให้ยาผิด', '6', null);
INSERT INTO `prodetail` VALUES ('48', '7', '4.7 วิถีทางการให้ยาผิดพลาด', '7', null);
INSERT INTO `prodetail` VALUES ('49', '7', '4.8 อัตราการให้ยาผิด(เร็ว/ช้าไป)', '8', null);
INSERT INTO `prodetail` VALUES ('50', '7', '4.9 ระยะเวลาในการให้ยาผิด(ยาว/สั้น)', '9', null);
INSERT INTO `prodetail` VALUES ('51', '7', '4.10 ผิดเวลาเกิน 1 ชม.', '10', null);
INSERT INTO `prodetail` VALUES ('52', '7', '4.11 ให้ยาผิดคน', '11', null);
INSERT INTO `prodetail` VALUES ('53', '7', '4.12.1 การติดตามไม่เหมาะสมทำให้เกิดปฏิกิริยาระหว่างยา', '12', null);
INSERT INTO `prodetail` VALUES ('54', '7', '4.12.2 การติดตามไม่เหมาะสมทำให้ได้รับยาที่ผู้ป่วยมีประวัติแพ้', '13', null);
INSERT INTO `prodetail` VALUES ('55', '7', '4.13 ได้รับยาหมดอายุ', '14', null);
INSERT INTO `prodetail` VALUES ('56', '7', '4.14 สั่งยาผิด', '15', null);
INSERT INTO `prodetail` VALUES ('57', '7', '4.15 จัดยาผิด', '16', null);
INSERT INTO `prodetail` VALUES ('58', '7', '4.16 จ่ายยาผิด', '17', null);
INSERT INTO `prodetail` VALUES ('59', '7', '4.17 คัดลอกคำสั่งผิด', '18', null);
INSERT INTO `prodetail` VALUES ('60', '7', '4.21.1 การให้เลือดผิดคน', '22', null);
INSERT INTO `prodetail` VALUES ('61', '7', '4.21.2 การให้เลือดผิดชนิด', '23', null);
INSERT INTO `prodetail` VALUES ('62', '7', '4.21.3 การให้เลือดผิดกรุ๊ป', '24', null);
INSERT INTO `prodetail` VALUES ('63', '7', '4.21.4 อัตราการให้เลือด(เร็ว/ช้า)', '25', null);
INSERT INTO `prodetail` VALUES ('64', '7', '4.21.5 การให้เลือดหมดอายุ', '26', null);
INSERT INTO `prodetail` VALUES ('65', '7', '4.21.6 การติดตามการให้เลือดไม่เหมาะสม', '27', null);
INSERT INTO `prodetail` VALUES ('66', '8', '5.1.1 ตกขณะเคลื่อนย้าย/ทำหัตถการ', '1', null);
INSERT INTO `prodetail` VALUES ('67', '8', '5.1.2 ตกขณะนอนโรงพยาบาล', '2', null);
INSERT INTO `prodetail` VALUES ('68', '8', '5.1.3 ตกเพราะ restraint ไม่เหมาะสม', '3', null);
INSERT INTO `prodetail` VALUES ('69', '8', '5.1.4 อื่นๆ', '4', null);
INSERT INTO `prodetail` VALUES ('70', '9', '5.2.1 CLRs รายงานแพทย์ช้ากว่า 30 นาที', '1', null);
INSERT INTO `prodetail` VALUES ('71', '9', '5.2.2 แพทย์ไม่ได้รับรายงานอาการของผู้ป่วย', '2', null);
INSERT INTO `prodetail` VALUES ('72', '9', '5.2.3 เวชระเบียนผิดคน', '3', null);
INSERT INTO `prodetail` VALUES ('73', '9', '5.2.4 เขียนใบส่งตรวจผิด', '4', null);
INSERT INTO `prodetail` VALUES ('74', '9', '5.2.5 บันทึกเวชระเบียนไม่สมบูรณ์', '5', null);
INSERT INTO `prodetail` VALUES ('75', '9', '5.2.6 อื่นๆ', '6', null);
INSERT INTO `prodetail` VALUES ('76', '10', '5.3.1 การ admit ซ้ำด้วยโรคเดิมภายใน 28 วัน', '1', null);
INSERT INTO `prodetail` VALUES ('77', '10', '5.3.2 มา รพ.ซ้ำด้วยดรคเดิมภายใน 48 ชม.', '2', null);
INSERT INTO `prodetail` VALUES ('78', '10', '5.3.3 เก็บสิ่งส่งตรวจ', '9', null);
INSERT INTO `prodetail` VALUES ('79', '10', '5.3.4 ผลการตรวจชันสูตรผิดพลาด', '4', null);
INSERT INTO `prodetail` VALUES ('80', '10', '5.3.5 แผลกดทับขระอยู่ รพ./stage แผลรุนแรงขึ้น', '5', null);
INSERT INTO `prodetail` VALUES ('81', '10', '5.3.6 ภาวะแทรกซ้อนจากการทำหัตถการ', '6', null);
INSERT INTO `prodetail` VALUES ('82', '10', '5.3.7 ล่าช้าในการรักษาทำให้ผู้ป่วยทรุดลง', '7', null);
INSERT INTO `prodetail` VALUES ('83', '10', '5.3.8 เฝ้าระวังไม่เพียงพอ', '8', null);
INSERT INTO `prodetail` VALUES ('84', '10', '5.3.9 อื่นๆ', '9', null);
INSERT INTO `prodetail` VALUES ('85', '11', '5.4.1 ไม่เตรียมพร้อม/ไม่ประเมินในครรภ์เสี่ยง', '1', null);
INSERT INTO `prodetail` VALUES ('86', '11', '5.4.2 ภาวะเเทรกซ้อนจากการคลอด', '2', null);
INSERT INTO `prodetail` VALUES ('87', '11', '5.4.3 ไม่ตอบสนองต่อการคลอด', '3', null);
INSERT INTO `prodetail` VALUES ('88', '11', '5.4.4 ความไม่พร้อมในการ CPR/NCPR', '4', null);
INSERT INTO `prodetail` VALUES ('89', '11', '5.4.5 อื่นๆ', '5', null);
INSERT INTO `prodetail` VALUES ('90', '12', '5.5.1 แทรกซ้อนจากการผ่าตัด/วิสัญญีคือ', '1', null);
INSERT INTO `prodetail` VALUES ('91', '12', '5.5.2 ผ่าตัดผิดคน/ผิดข้าง/ผิดตำแหน่ง/ไม่เสร็จ', '2', null);
INSERT INTO `prodetail` VALUES ('92', '12', '5.5.3 อื่นๆ', '3', null);
INSERT INTO `prodetail` VALUES ('93', '13', '6.1 วันนอนมากกว่าค่าเฉลี่ย DRG', '1', null);
INSERT INTO `prodetail` VALUES ('94', '13', '6.2 อื่นๆ', '2', null);
INSERT INTO `prodetail` VALUES ('95', '14', '7.1พฤติกรรมบริการ', '1', null);
INSERT INTO `prodetail` VALUES ('96', '14', '7.2 ลำดับคิว', '2', null);
INSERT INTO `prodetail` VALUES ('97', '14', '7.3 บริการล่าช้า', '3', null);
INSERT INTO `prodetail` VALUES ('98', '14', '7.5 อื่นๆ', '5', null);
INSERT INTO `prodetail` VALUES ('99', '7', '4.18 พิมพ์ฉลากยาผิด', '19', null);
INSERT INTO `prodetail` VALUES ('100', '7', '4.19 ยาหมดอายุ', '20', null);
INSERT INTO `prodetail` VALUES ('101', '15', '5.6.1 เวชระเบียนผิดคน', '1', null);
INSERT INTO `prodetail` VALUES ('102', '15', '5.6.2 บันทึกเวชระเบียนไม่สมบูรณ์', '2', null);
INSERT INTO `prodetail` VALUES ('103', '15', '5.6.3 ใบเซ็นยินยอมไม่ครบ/ไม่ถูกต้อง', '3', null);
INSERT INTO `prodetail` VALUES ('104', '15', '5.6.4 เวชระเบียนสูญหาย', '4', null);
INSERT INTO `prodetail` VALUES ('105', '15', '5.6.5 ส่งข้อมูลล่าช้า', '5', null);
INSERT INTO `prodetail` VALUES ('106', '15', '5.6.6 อื่นๆ', '6', null);
INSERT INTO `prodetail` VALUES ('107', '4', '3.2.7 บุคลากรไม่ปฏิบัติตามแนวทาง', '7', null);
INSERT INTO `prodetail` VALUES ('108', '4', '3.2.8 บุคลากรขาดทักษะ', '8', null);
INSERT INTO `prodetail` VALUES ('109', '14', '7.4 ความสะอาด', '4', null);
INSERT INTO `prodetail` VALUES ('110', '7', '4.20 ยาขาด stock', '21', null);

-- ----------------------------
-- Table structure for prohead
-- ----------------------------
DROP TABLE IF EXISTS `prohead`;
CREATE TABLE `prohead` (
  `PROHEAD_ID` int(2) NOT NULL,
  `PROHEAD_NAME` varchar(200) DEFAULT NULL,
  `HEAD_ID` int(2) DEFAULT NULL,
  `ACTIVE-STATUS` varchar(1) DEFAULT NULL,
  `CLINICTYPE_ID` int(2) DEFAULT NULL,
  PRIMARY KEY (`PROHEAD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of prohead
-- ----------------------------
INSERT INTO `prohead` VALUES ('1', 'โปรแกรมที่ 1 สิทธิผู้ป่วย', '1', null, null);
INSERT INTO `prohead` VALUES ('2', 'โปรแกรมที่ 2 การติดเชื้อในโรงพยาบาล', '2', null, null);
INSERT INTO `prohead` VALUES ('3', 'โปรแกรมที่ 3.1 โครงสร้างกายภาพสิ่งแวดล้อม', '3', null, null);
INSERT INTO `prohead` VALUES ('4', 'โปรแกรมที่ 3.2 เครื่องมือ/บุคลากร', '3', null, null);
INSERT INTO `prohead` VALUES ('5', 'โปรแกรมที่ 3.3 ความปลอดภัย', '3', null, null);
INSERT INTO `prohead` VALUES ('6', 'โปรแกรมที่ 3.4 อาชีวอนามัย/ความปลอดภัยในการทำงาน', '3', null, null);
INSERT INTO `prohead` VALUES ('7', 'โปรแกรมที่ 4 ยาสารน้ำและการให้เลือด', '4', null, null);
INSERT INTO `prohead` VALUES ('8', 'โปรแกรมที่ 5.1 การพลัดตกหกล้ม', '5', null, null);
INSERT INTO `prohead` VALUES ('9', 'โปรแกรมที่ 5.2 การสื่อสารในการดูแลผู้ป่วย', '5', null, null);
INSERT INTO `prohead` VALUES ('10', 'โปรแกรมที่ 5.3 ตรวจวินิจฉัยและการรักษาพยาบาล', '5', null, null);
INSERT INTO `prohead` VALUES ('11', 'โปรแกรมที่ 5.4 การคลอด', '5', null, null);
INSERT INTO `prohead` VALUES ('12', 'โปรแกรมที่ 5.5 ผ่าตัด/วิสัญญี', '5', null, null);
INSERT INTO `prohead` VALUES ('13', 'โปรแกรมที่ 6 การใช้ทรัพยากรไม่คุ้มค่า', '6', null, null);
INSERT INTO `prohead` VALUES ('14', 'โปรแกรมที่ 7 การร้องเรียนของผู้รับบริการ', '7', null, null);
INSERT INTO `prohead` VALUES ('15', 'โปรแกรมที่ 5.6 เวชระเบียน', '5', null, null);

-- ----------------------------
-- Table structure for province
-- ----------------------------
DROP TABLE IF EXISTS `province`;
CREATE TABLE `province` (
  `PROVINCE_ID` int(5) NOT NULL AUTO_INCREMENT,
  `PROVINCE_CODE` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `PROVINCE_NAME` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `GEO_ID` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PROVINCE_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of province
-- ----------------------------
INSERT INTO `province` VALUES ('1', '10', 'กรุงเทพมหานคร   ', '2');
INSERT INTO `province` VALUES ('2', '11', 'สมุทรปราการ   ', '2');
INSERT INTO `province` VALUES ('3', '12', 'นนทบุรี   ', '2');
INSERT INTO `province` VALUES ('4', '13', 'ปทุมธานี   ', '2');
INSERT INTO `province` VALUES ('5', '14', 'พระนครศรีอยุธยา   ', '2');
INSERT INTO `province` VALUES ('6', '15', 'อ่างทอง   ', '2');
INSERT INTO `province` VALUES ('7', '16', 'ลพบุรี   ', '2');
INSERT INTO `province` VALUES ('8', '17', 'สิงห์บุรี   ', '2');
INSERT INTO `province` VALUES ('9', '18', 'ชัยนาท   ', '2');
INSERT INTO `province` VALUES ('10', '19', 'สระบุรี', '2');
INSERT INTO `province` VALUES ('11', '20', 'ชลบุรี   ', '5');
INSERT INTO `province` VALUES ('12', '21', 'ระยอง   ', '5');
INSERT INTO `province` VALUES ('13', '22', 'จันทบุรี   ', '5');
INSERT INTO `province` VALUES ('14', '23', 'ตราด   ', '5');
INSERT INTO `province` VALUES ('15', '24', 'ฉะเชิงเทรา   ', '5');
INSERT INTO `province` VALUES ('16', '25', 'ปราจีนบุรี   ', '5');
INSERT INTO `province` VALUES ('17', '26', 'นครนายก   ', '2');
INSERT INTO `province` VALUES ('18', '27', 'สระแก้ว   ', '5');
INSERT INTO `province` VALUES ('19', '30', 'นครราชสีมา   ', '3');
INSERT INTO `province` VALUES ('20', '31', 'บุรีรัมย์   ', '3');
INSERT INTO `province` VALUES ('21', '32', 'สุรินทร์   ', '3');
INSERT INTO `province` VALUES ('22', '33', 'ศรีสะเกษ   ', '3');
INSERT INTO `province` VALUES ('23', '34', 'อุบลราชธานี   ', '3');
INSERT INTO `province` VALUES ('24', '35', 'ยโสธร   ', '3');
INSERT INTO `province` VALUES ('25', '36', 'ชัยภูมิ   ', '3');
INSERT INTO `province` VALUES ('26', '37', 'อำนาจเจริญ   ', '3');
INSERT INTO `province` VALUES ('27', '39', 'หนองบัวลำภู   ', '3');
INSERT INTO `province` VALUES ('28', '40', 'ขอนแก่น   ', '3');
INSERT INTO `province` VALUES ('29', '41', 'อุดรธานี   ', '3');
INSERT INTO `province` VALUES ('30', '42', 'เลย   ', '3');
INSERT INTO `province` VALUES ('31', '43', 'หนองคาย   ', '3');
INSERT INTO `province` VALUES ('32', '44', 'มหาสารคาม   ', '3');
INSERT INTO `province` VALUES ('33', '45', 'ร้อยเอ็ด   ', '3');
INSERT INTO `province` VALUES ('34', '46', 'กาฬสินธุ์   ', '3');
INSERT INTO `province` VALUES ('35', '47', 'สกลนคร   ', '3');
INSERT INTO `province` VALUES ('36', '48', 'นครพนม   ', '3');
INSERT INTO `province` VALUES ('37', '49', 'มุกดาหาร   ', '3');
INSERT INTO `province` VALUES ('38', '50', 'เชียงใหม่   ', '1');
INSERT INTO `province` VALUES ('39', '51', 'ลำพูน   ', '1');
INSERT INTO `province` VALUES ('40', '52', 'ลำปาง   ', '1');
INSERT INTO `province` VALUES ('41', '53', 'อุตรดิตถ์   ', '1');
INSERT INTO `province` VALUES ('42', '54', 'แพร่   ', '1');
INSERT INTO `province` VALUES ('43', '55', 'น่าน   ', '1');
INSERT INTO `province` VALUES ('44', '56', 'พะเยา   ', '1');
INSERT INTO `province` VALUES ('45', '57', 'เชียงราย   ', '1');
INSERT INTO `province` VALUES ('46', '58', 'แม่ฮ่องสอน   ', '1');
INSERT INTO `province` VALUES ('47', '60', 'นครสวรรค์   ', '2');
INSERT INTO `province` VALUES ('48', '61', 'อุทัยธานี   ', '2');
INSERT INTO `province` VALUES ('49', '62', 'กำแพงเพชร   ', '2');
INSERT INTO `province` VALUES ('50', '63', 'ตาก   ', '4');
INSERT INTO `province` VALUES ('51', '64', 'สุโขทัย   ', '2');
INSERT INTO `province` VALUES ('52', '65', 'พิษณุโลก   ', '2');
INSERT INTO `province` VALUES ('53', '66', 'พิจิตร   ', '2');
INSERT INTO `province` VALUES ('54', '67', 'เพชรบูรณ์   ', '2');
INSERT INTO `province` VALUES ('55', '70', 'ราชบุรี   ', '4');
INSERT INTO `province` VALUES ('56', '71', 'กาญจนบุรี   ', '4');
INSERT INTO `province` VALUES ('57', '72', 'สุพรรณบุรี   ', '2');
INSERT INTO `province` VALUES ('58', '73', 'นครปฐม   ', '2');
INSERT INTO `province` VALUES ('59', '74', 'สมุทรสาคร   ', '2');
INSERT INTO `province` VALUES ('60', '75', 'สมุทรสงคราม   ', '2');
INSERT INTO `province` VALUES ('61', '76', 'เพชรบุรี   ', '4');
INSERT INTO `province` VALUES ('62', '77', 'ประจวบคีรีขันธ์   ', '4');
INSERT INTO `province` VALUES ('63', '80', 'นครศรีธรรมราช   ', '6');
INSERT INTO `province` VALUES ('64', '81', 'กระบี่   ', '6');
INSERT INTO `province` VALUES ('65', '82', 'พังงา   ', '6');
INSERT INTO `province` VALUES ('66', '83', 'ภูเก็ต   ', '6');
INSERT INTO `province` VALUES ('67', '84', 'สุราษฎร์ธานี   ', '6');
INSERT INTO `province` VALUES ('68', '85', 'ระนอง   ', '6');
INSERT INTO `province` VALUES ('69', '86', 'ชุมพร   ', '6');
INSERT INTO `province` VALUES ('70', '90', 'สงขลา   ', '6');
INSERT INTO `province` VALUES ('71', '91', 'สตูล   ', '6');
INSERT INTO `province` VALUES ('72', '92', 'ตรัง   ', '6');
INSERT INTO `province` VALUES ('73', '93', 'พัทลุง   ', '6');
INSERT INTO `province` VALUES ('74', '94', 'ปัตตานี   ', '6');
INSERT INTO `province` VALUES ('75', '95', 'ยะลา   ', '6');
INSERT INTO `province` VALUES ('76', '96', 'นราธิวาส   ', '6');
INSERT INTO `province` VALUES ('77', '97', 'บึงกาฬ', '3');

-- ----------------------------
-- Table structure for riskhead
-- ----------------------------
DROP TABLE IF EXISTS `riskhead`;
CREATE TABLE `riskhead` (
  `risk_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `risk_date` date NOT NULL,
  `risk_time` varchar(5) NOT NULL,
  `department` int(2) DEFAULT NULL,
  `miss` char(1) DEFAULT NULL,
  `event` varchar(200) NOT NULL,
  `safety` varchar(200) NOT NULL,
  `outcome_pt` varchar(200) NOT NULL,
  `outcome_guest` varchar(200) DEFAULT NULL,
  `outcome_staff` varchar(200) DEFAULT NULL,
  `outcome_price` double(7,2) DEFAULT NULL,
  `solve_begin` varchar(200) DEFAULT NULL,
  `sum_solve` varchar(200) DEFAULT NULL,
  `risk_level` char(1) DEFAULT NULL,
  `risk_head_department` varchar(200) DEFAULT NULL,
  `risk_status` char(1) DEFAULT NULL,
  `prohead` varchar(6) DEFAULT NULL,
  `prodetail` varchar(6) DEFAULT NULL,
  `program_text` varchar(200) DEFAULT NULL,
  `login_name` varchar(100) DEFAULT NULL,
  `risk_sum_dep` varchar(200) DEFAULT NULL,
  `risk_simple` int(2) DEFAULT NULL,
  `date_input` date DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `last_staff` varchar(100) DEFAULT NULL,
  `print_url` varchar(200) DEFAULT NULL,
  `act_st` char(1) DEFAULT NULL,
  `clinictype` int(2) DEFAULT NULL,
  `place_id` int(3) DEFAULT NULL,
  `staff` varchar(100) DEFAULT NULL,
  `risk_again` char(1) DEFAULT NULL,
  `date_complete` date DEFAULT NULL,
  `risk_ref_no` varchar(100) DEFAULT NULL,
  `input_complain` int(3) DEFAULT NULL,
  `ref` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`risk_id`),
  UNIQUE KEY `ref` (`ref`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of riskhead
-- ----------------------------
INSERT INTO `riskhead` VALUES ('0001', '2015-07-14', '10.00', '1', '2', ' hfcfhcgfh', 'fghfghfghgfhgfh', 'fhfghfh', 'fghfghfg', 'hfghgfhf', '2000.00', 'fhgfhg', 'ffghfgh', '1', '', '3', '1', '1', '', '', '', '2', '2015-07-09', '2015-07-10 11:03:19', '', '', '1', '2', '2', '', '1', null, '', '2', null);
INSERT INTO `riskhead` VALUES ('0002', '2015-07-01', '10.00', '1', '2', 'คนไข้  มี  อารมณ์', 'สกัด จุด', 'หงุดหงิด', 'เซ็ง', 'นอย', '99999.99', 'ยิ้ม', 'ปล่อยวางเถอะ  โยม', '1', '', '2', '11', '85', '', '', 'ยัง', '4', '2015-07-09', '2015-07-09 17:11:03', '', '', '1', '2', '2', '', '1', null, '', '2', null);
INSERT INTO `riskhead` VALUES ('0003', '2015-07-01', '10.15', '1', '2', 'กปผ ดปป้ด้ด้', 'ดเ้เ้ดเ้ด้ด้', 'ดเ้เด้', 'ดเ้ดเ้', 'ดเ้ดเ้', '99999.99', 'ดเ้ดเ้', 'เด้กด้ดเ้', '1', '', '2', '8', '66', '', '', '', '3', '2015-07-09', '2015-07-09 17:25:11', '', '', '2', '1', '1', '', '1', null, '', '1', null);
INSERT INTO `riskhead` VALUES ('0004', '2015-07-01', '10.00', '1', '1', 'ผู้ป่วยตกเตียง', 'มัดไว้', 'หัวแตก', 'ตกใจ', 'หงุดหงิด', '5000.00', 'ชี้แจง  ให้ญาติเฝ้า', 'ผู้ป่วย ญาติ เข้าใจดี', '1', '', '4', '8', '67', '', '', 'สนทนากลุ่ม case study', '1', '2015-07-10', '2015-07-10 14:52:51', '', '', '1', '1', '1', '', '1', null, '', '2', null);

-- ----------------------------
-- Table structure for riskplace
-- ----------------------------
DROP TABLE IF EXISTS `riskplace`;
CREATE TABLE `riskplace` (
  `PLACE_ID` int(3) NOT NULL,
  `PLACE_NAME` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`PLACE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of riskplace
-- ----------------------------
INSERT INTO `riskplace` VALUES ('1', 'opd');
INSERT INTO `riskplace` VALUES ('2', 'er');
INSERT INTO `riskplace` VALUES ('3', 'ห้องบัตร');

-- ----------------------------
-- Table structure for simple
-- ----------------------------
DROP TABLE IF EXISTS `simple`;
CREATE TABLE `simple` (
  `SIMPLE_ID` int(2) NOT NULL,
  `SIMPLE_NAME` varchar(200) NOT NULL,
  PRIMARY KEY (`SIMPLE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of simple
-- ----------------------------
INSERT INTO `simple` VALUES ('1', 'Identify');
INSERT INTO `simple` VALUES ('2', 'ACS');
INSERT INTO `simple` VALUES ('3', 'Hand Hygine');
INSERT INTO `simple` VALUES ('4', 'LASA');
INSERT INTO `simple` VALUES ('5', 'Concentrate Electrolyte');
INSERT INTO `simple` VALUES ('6', 'Med.Reconciliation');
INSERT INTO `simple` VALUES ('7', 'SBAR');
INSERT INTO `simple` VALUES ('8', 'Pressure sore');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `STATUS_ID` char(1) NOT NULL,
  `STATUS_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`STATUS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('1', 'รอเจ้าหน้าที่รับเรื่อง');
INSERT INTO `status` VALUES ('2', 'เจ้าหน้าที่รับเรื่องแล้ว');
INSERT INTO `status` VALUES ('3', 'ขอเวทีทบทวน');
INSERT INTO `status` VALUES ('4', 'ทบทวนเหตุการณ์เรียบร้อยแล้ว');

-- ----------------------------
-- Table structure for uploads
-- ----------------------------
DROP TABLE IF EXISTS `uploads`;
CREATE TABLE `uploads` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(50) DEFAULT NULL,
  `file_name` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์',
  `real_filename` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์จริง',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) DEFAULT NULL COMMENT 'ประเภท',
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uploads
-- ----------------------------
INSERT INTO `uploads` VALUES ('1', 'Rhds9i1nJYqwDZWC2SsB6w', 'Chrysanthemum.jpg', 'c63333aa58f67de0b0bedb2a93d1dd68.jpg', '2015-07-10 09:55:43', null);
INSERT INTO `uploads` VALUES ('2', '0jX57D__Ku17loxc6nLj04', 'Tulips.jpg', '815ecbe307523c2f4351cb908a28e569.jpg', '2015-07-10 10:45:14', null);
INSERT INTO `uploads` VALUES ('3', '6f6VTlqDp-V6nrU4KAMjh1', 'Penguins.jpg', '053a07f0de5e963307ad07614b15982b.jpg', '2015-07-10 10:46:14', null);
INSERT INTO `uploads` VALUES ('4', 'null', 'Tulips.jpg', '6456b64cc56170c9a5b184796f2d8de9.jpg', '2015-07-10 10:55:59', null);
INSERT INTO `uploads` VALUES ('5', 'null', 'Lighthouse.jpg', 'dc000c5814604d37d24b258c6903b373.jpg', '2015-07-10 11:03:17', null);
INSERT INTO `uploads` VALUES ('6', 'RB7whG0kLUKPCSnAQ-2qYf', 'Koala.jpg', 'fdfe723c5969e9ba0019ba6f10cf8c6f.jpg', '2015-07-10 11:36:33', null);
INSERT INTO `uploads` VALUES ('7', 'RB7whG0kLUKPCSnAQ-2qYf', 'Lighthouse.jpg', '6e4235f48cf0589194d7afc12ea330ef.jpg', '2015-07-10 11:36:33', null);
INSERT INTO `uploads` VALUES ('8', 'QABsNo20WfMhUpVT9tpLpk', 'Penguins.jpg', '4964388879aa012f5a261c0a68e5bf00.jpg', '2015-07-10 11:37:04', null);
INSERT INTO `uploads` VALUES ('9', 'QABsNo20WfMhUpVT9tpLpk', 'Tulips.jpg', 'f61567614586ab94668353e025139093.jpg', '2015-07-10 11:37:04', null);
INSERT INTO `uploads` VALUES ('10', 'ntolit4qiCFcDg915oO_nD', 'Lighthouse.jpg', '9a20105fa32053988259b88c3c890327.jpg', '2015-07-10 11:37:22', null);
INSERT INTO `uploads` VALUES ('11', 'ntolit4qiCFcDg915oO_nD', 'Desert.jpg', 'c3e33c51d1d91bc4a7655d9997a8475a.jpg', '2015-07-10 11:37:22', null);

-- ----------------------------
-- Table structure for uploadsp
-- ----------------------------
DROP TABLE IF EXISTS `uploadsp`;
CREATE TABLE `uploadsp` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(50) DEFAULT NULL,
  `file_name` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์',
  `real_filename` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์จริง',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) DEFAULT NULL COMMENT 'ประเภท',
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uploadsp
-- ----------------------------
INSERT INTO `uploadsp` VALUES ('1', 'Aoh9hpTQMO4-IRbc6xFnv5', 'Koala.jpg', '2123c8b99816782cee16c190dbf72785.jpg', '2015-07-10 12:40:24', null);
INSERT INTO `uploadsp` VALUES ('2', 'Aoh9hpTQMO4-IRbc6xFnv5', 'Tulips.jpg', '7a3a1c137e355cc7200ab5c068f40aa4.jpg', '2015-07-10 12:40:24', null);
INSERT INTO `uploadsp` VALUES ('3', 'Aoh9hpTQMO4-IRbc6xFnv5', 'Lighthouse.jpg', '6132c1588041c68f0443d2edd5688fae.jpg', '2015-07-10 12:40:24', null);
INSERT INTO `uploadsp` VALUES ('4', 'Aoh9hpTQMO4-IRbc6xFnv5', 'Penguins.jpg', '9458ef7703f820807d514ad4f36d80ea.jpg', '2015-07-10 12:40:29', null);
INSERT INTO `uploadsp` VALUES ('9', 'BvHm84hkvEDNAZkj5zQp1P', 'DSCF0036.jpg', '9165f6dd635a899e02fd1d2b1282ce0a.jpg', '2015-07-10 14:16:16', null);
INSERT INTO `uploadsp` VALUES ('10', 'BvHm84hkvEDNAZkj5zQp1P', 'DSCF0070.jpg', '6a0ce9bf6f380d6a84437de107588c91.jpg', '2015-07-10 14:16:16', null);
INSERT INTO `uploadsp` VALUES ('11', 'BvHm84hkvEDNAZkj5zQp1P', 'Picture 079.jpg', 'ca69bb9d18e6b58c5328edb9c1df2762.jpg', '2015-07-10 14:16:16', null);
INSERT INTO `uploadsp` VALUES ('12', 'RFxOy6ZoreHa8SXAsc7a-S', 'Lighthouse.jpg', '227df4702efa49ddd6296e2adf6fc8aa.jpg', '2015-07-10 15:16:34', null);
INSERT INTO `uploadsp` VALUES ('13', 'b9hEX3Iu035_rY4VEGyoo1', 'Koala.jpg', 'bb6e66324ad3693a17447a43b5124981.jpg', '2015-07-10 15:35:04', null);
INSERT INTO `uploadsp` VALUES ('14', 'b9hEX3Iu035_rY4VEGyoo1', 'Penguins.jpg', '49a28eb2d98c71073a487cee40c7d6ad.jpg', '2015-07-10 15:35:06', null);
INSERT INTO `uploadsp` VALUES ('15', 'b0DzAGYO2OdgbMnUdT8qgr', 'Penguins.jpg', 'a3e277e6fc94e90d7c67260df3d072bb.jpg', '2015-07-10 16:25:54', null);
INSERT INTO `uploadsp` VALUES ('16', 'b0DzAGYO2OdgbMnUdT8qgr', 'Koala.jpg', '8abc9765042dee4e109e749d3969945c.jpg', '2015-07-10 16:25:54', null);
INSERT INTO `uploadsp` VALUES ('17', 'bIyg9t8nqROXGU8dWEvGBE', 'Desert.jpg', 'd51e943d5e9aaa09d2bf13d2e29288e0.jpg', '2015-07-10 17:41:08', null);
INSERT INTO `uploadsp` VALUES ('18', 'bIyg9t8nqROXGU8dWEvGBE', 'Chrysanthemum.jpg', 'a99dfa0a5f7834f282cad3933fb0a870.jpg', '2015-07-10 17:41:08', null);
INSERT INTO `uploadsp` VALUES ('19', 'bIyg9t8nqROXGU8dWEvGBE', 'Jellyfish.jpg', '16a85367f324bcd5f88cae9b2eb7fc2f.jpg', '2015-07-10 17:41:08', null);
INSERT INTO `uploadsp` VALUES ('20', 'bIyg9t8nqROXGU8dWEvGBE', 'Hydrangeas.jpg', 'fffb3638dc2ee63a19ca21d933264246.jpg', '2015-07-10 17:41:13', null);
INSERT INTO `uploadsp` VALUES ('21', '5mmUhYl1ns7GnFhZvhXR-W', '20140630_111250.jpg', 'a57731029f8bcaf41963ffb605d50fe0.jpg', '2015-07-13 17:34:19', null);

-- ----------------------------
-- Table structure for uploadsph
-- ----------------------------
DROP TABLE IF EXISTS `uploadsph`;
CREATE TABLE `uploadsph` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(50) DEFAULT NULL,
  `file_name` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์',
  `real_filename` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์จริง',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) DEFAULT NULL COMMENT 'ประเภท',
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uploadsph
-- ----------------------------
INSERT INTO `uploadsph` VALUES ('1', '0AGgKVxgoXdKV5emjyusDI', 'Tulips.jpg', '4d2dee5fb949d600601e1ccf1e4ca098.jpg', '2015-07-10 14:43:21', null);
INSERT INTO `uploadsph` VALUES ('2', '0AGgKVxgoXdKV5emjyusDI', 'Lighthouse.jpg', '42940083c1488f2cc7692fc9608cdfd9.jpg', '2015-07-10 14:43:21', null);
INSERT INTO `uploadsph` VALUES ('3', '0AGgKVxgoXdKV5emjyusDI', 'Koala.jpg', 'bf4d11ad98d6ea6f1989d6cbd1ad62ee.jpg', '2015-07-10 14:43:21', null);
INSERT INTO `uploadsph` VALUES ('4', '0AGgKVxgoXdKV5emjyusDI', 'Penguins.jpg', '0158690299f3c106abc3f819baa423a4.jpg', '2015-07-10 14:43:21', null);
INSERT INTO `uploadsph` VALUES ('5', 'null', 'Jellyfish.jpg', '690bfbcc70be666ea6ddd3780f711228.jpg', '2015-07-10 14:52:48', null);
INSERT INTO `uploadsph` VALUES ('6', 'null', 'Desert.jpg', 'bafbf02f22a0db4b2b619533db17096d.jpg', '2015-07-10 14:52:48', null);
INSERT INTO `uploadsph` VALUES ('7', 'null', 'Chrysanthemum.jpg', '8b051dcd0686e8f378463f9fa0777a0b.jpg', '2015-07-10 14:52:48', null);
INSERT INTO `uploadsph` VALUES ('8', 'null', 'Hydrangeas.jpg', 'f1705eb3e99328f1778ae39cf2fd0e0a.jpg', '2015-07-10 14:52:48', null);

-- ----------------------------
-- Table structure for uploadsphoto
-- ----------------------------
DROP TABLE IF EXISTS `uploadsphoto`;
CREATE TABLE `uploadsphoto` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(50) DEFAULT NULL,
  `file_name` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์',
  `real_filename` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์จริง',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) DEFAULT NULL COMMENT 'ประเภท',
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uploadsphoto
-- ----------------------------
INSERT INTO `uploadsphoto` VALUES ('1', 'vQL4wmctlhp_thBJJ6HiRX', 'Chrysanthemum.jpg', 'be94a314413379c86a00440ccceece50.jpg', '2015-07-10 10:29:32', null);
INSERT INTO `uploadsphoto` VALUES ('2', 'null', 'Koala.jpg', 'ef08e74f91d8286559307e8cd81be90d.jpg', '2015-07-10 10:39:55', null);
INSERT INTO `uploadsphoto` VALUES ('3', 'null', 'Penguins.jpg', 'dfeeaf3a407e6be2515223bf9d569593.jpg', '2015-07-10 15:18:12', null);
