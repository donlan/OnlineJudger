-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT 'User Id',
  `user_code` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT 'User Code',
  `user_name` varchar(40) COLLATE utf8_bin DEFAULT NULL COMMENT 'User Name',
  `salary` double DEFAULT NULL COMMENT 'Salary',
  `sex` varchar(2) COLLATE utf8_bin DEFAULT NULL COMMENT 'Sex',
  `degree` varchar(2) COLLATE utf8_bin DEFAULT NULL COMMENT 'Degree',
  `time` datetime DEFAULT NULL COMMENT 'Time',
  `time_stamp_s` int(11) DEFAULT NULL COMMENT 'Time Stamp(s)',
  `time_stamp_ms` double DEFAULT NULL COMMENT 'Time Stamp(ms)',
  `string_date` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Date String',
  `string_time` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT 'Time String',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB COMMENT='User';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('user_0', 'user_10734', 'User No. 10734', '8231', '1', '2', '2002-10-25 20:30:30', '975720652', '904939234782', '1982-05-09', '2005-09-09 06:35:53');
INSERT INTO `user` VALUES ('user_1', 'user_10615', 'User No. 10615', '10425', '1', '1', '2012-08-11 22:34:46', '1374898027', '712277106576', '2006-10-24', '2012-02-13 04:40:37');
INSERT INTO `user` VALUES ('user_10', 'user_10206', 'User No. 10206', '11294', '2', '8', '2006-07-20 02:38:04', '1225458545', '356090012603', '1980-09-12', '2004-05-08 09:23:41');
INSERT INTO `user` VALUES ('user_100', 'user_10378', 'User No. 10378', '8436', '1', '5', '1995-05-25 03:08:57', '1181452694', '1124842734344', '2014-01-22', '1982-01-03 12:21:05');
INSERT INTO `user` VALUES ('user_101', 'user_10428', 'User No. 10428', '9086', '2', '8', '1983-09-10 18:43:03', '1018716353', '904545494142', '1995-07-08', '2008-04-03 02:06:50');
INSERT INTO `user` VALUES ('user_102', 'user_10483', 'User No. 10483', '8399', '1', '6', '1998-08-25 11:02:51', '1245439522', '1255351612096', '2012-06-07', '1989-11-01 01:17:04');
INSERT INTO `user` VALUES ('user_103', 'user_10557', 'User No. 10557', '9724', '2', '8', '1994-07-30 20:48:35', '867320729', '1092189699467', '2013-12-09', '1995-06-30 10:33:35');
INSERT INTO `user` VALUES ('user_104', 'user_10235', 'User No. 10235', '9921', '1', '6', '1988-08-14 00:19:23', '323645792', '536558704874', '1988-01-04', '2004-05-11 01:51:09');
INSERT INTO `user` VALUES ('user_105', 'user_10494', 'User No. 10494', '10161', '2', '3', '2014-01-29 08:46:07', '1191906800', '1166482905137', '1992-12-30', '2008-05-10 06:36:07');
INSERT INTO `user` VALUES ('user_106', 'user_10803', 'User No. 10803', '6343', '2', '4', '2006-02-01 08:53:28', '577292125', '523320822935', '2006-10-05', '1992-04-10 11:18:57');
INSERT INTO `user` VALUES ('user_107', 'user_10012', 'User No. 10012', '8051', '1', '2', '1988-11-16 13:29:36', '1170998921', '1230400818085', '2004-04-03', '2006-05-07 01:47:07');
INSERT INTO `user` VALUES ('user_108', 'user_10480', 'User No. 10480', '11431', '2', '1', '2004-02-07 04:53:30', '1400495910', '1212257652332', '1988-12-31', '1991-09-04 11:21:48');
INSERT INTO `user` VALUES ('user_109', 'user_10942', 'User No. 10942', '9525', '1', '7', '1980-12-13 01:31:29', '323848854', '911698701579', '2014-08-12', '2004-01-15 02:00:40');
INSERT INTO `user` VALUES ('user_11', 'user_10007', 'User No. 10007', '11122', '2', '6', '1988-02-29 20:39:31', '492889821', '1311856428261', '2010-04-26', '2001-09-23 04:21:40');
INSERT INTO `user` VALUES ('user_110', 'user_10289', 'User No. 10289', '9677', '1', '4', '2004-02-09 13:16:37', '525980352', '388808019544', '2001-04-08', '2011-09-29 12:08:07');
INSERT INTO `user` VALUES ('user_111', 'user_10230', 'User No. 10230', '11252', '2', '1', '2002-08-13 19:25:10', '996706449', '342101725433', '2013-02-15', '1998-01-13 03:17:58');
INSERT INTO `user` VALUES ('user_112', 'user_10721', 'User No. 10721', '10185', '1', '7', '1987-06-23 05:06:33', '1253962264', '687099193991', '1992-08-26', '1995-05-18 11:02:23');
INSERT INTO `user` VALUES ('user_113', 'user_10208', 'User No. 10208', '10097', '1', '1', '1981-07-25 18:30:32', '925574813', '1228843122127', '1999-08-22', '1997-09-05 08:32:47');
INSERT INTO `user` VALUES ('user_114', 'user_10700', 'User No. 10700', '8770', '2', '1', '2008-04-08 12:36:08', '509352303', '569892931140', '2013-10-18', '2008-11-29 03:33:17');
INSERT INTO `user` VALUES ('user_115', 'user_10116', 'User No. 10116', '11159', '2', '4', '1985-06-29 04:53:10', '678133659', '958943651494', '2001-11-04', '2011-08-26 10:40:04');
INSERT INTO `user` VALUES ('user_116', 'user_10728', 'User No. 10728', '9835', '2', '8', '1985-11-07 21:45:43', '1271663954', '884658599902', '1982-02-04', '2001-08-13 05:45:30');
INSERT INTO `user` VALUES ('user_117', 'user_10815', 'User No. 10815', '10831', '1', '6', '1989-11-05 20:19:27', '1305293593', '591187993769', '2000-08-03', '1987-01-09 09:00:03');
INSERT INTO `user` VALUES ('user_118', 'user_10892', 'User No. 10892', '10398', '2', '4', '1985-09-17 22:23:39', '813927098', '557686059735', '1999-11-28', '1984-12-15 07:20:29');
INSERT INTO `user` VALUES ('user_119', 'user_10968', 'User No. 10968', '6136', '1', '8', '1994-11-02 15:41:41', '640037569', '671226366515', '1996-11-05', '1997-07-15 11:11:23');
INSERT INTO `user` VALUES ('user_12', 'user_10367', 'User No. 10367', '11185', '2', '2', '1980-08-04 03:48:06', '1310366334', '1041845949629', '2012-07-12', '2009-02-01 03:27:56');
INSERT INTO `user` VALUES ('user_120', 'user_10446', 'User No. 10446', '8754', '2', '2', '1998-09-22 15:39:03', '511279670', '1170680571360', '1999-04-26', '1984-12-11 04:43:36');
INSERT INTO `user` VALUES ('user_121', 'user_10225', 'User No. 10225', '11106', '2', '7', '1989-01-15 15:27:51', '1279300913', '1112653276688', '2008-11-09', '2013-07-07 03:11:15');
INSERT INTO `user` VALUES ('user_122', 'user_10800', 'User No. 10800', '10509', '2', '6', '1980-10-07 14:54:19', '955420508', '529167670980', '1996-04-12', '1998-08-25 02:39:25');
INSERT INTO `user` VALUES ('user_123', 'user_10729', 'User No. 10729', '10045', '2', '8', '2007-01-10 12:36:33', '415712347', '770661671813', '1998-10-04', '2006-05-09 03:02:19');
INSERT INTO `user` VALUES ('user_124', 'user_10124', 'User No. 10124', '6354', '2', '6', '1988-07-13 15:29:03', '1157606868', '853961045890', '1988-06-05', '2008-10-22 03:47:43');
INSERT INTO `user` VALUES ('user_125', 'user_10979', 'User No. 10979', '9479', '2', '1', '2014-07-06 14:18:48', '330815898', '1063678661642', '1981-11-16', '1982-01-15 09:30:07');
INSERT INTO `user` VALUES ('user_126', 'user_10474', 'User No. 10474', '6360', '2', '4', '1980-09-04 03:07:53', '774251379', '861490228483', '1992-08-26', '1993-01-17 10:54:45');
INSERT INTO `user` VALUES ('user_127', 'user_10913', 'User No. 10913', '10262', '2', '7', '1983-09-27 22:02:29', '1362344069', '455716919976', '2004-10-04', '1989-09-09 03:55:44');
INSERT INTO `user` VALUES ('user_128', 'user_10367', 'User No. 10367', '9803', '1', '2', '1995-03-23 13:02:09', '392017490', '1182365262436', '1988-02-10', '1982-09-26 08:44:50');
INSERT INTO `user` VALUES ('user_129', 'user_10457', 'User No. 10457', '11224', '1', '4', '2014-07-23 06:45:15', '815501709', '1393668839489', '1997-09-26', '1995-04-21 04:15:33');
INSERT INTO `user` VALUES ('user_13', 'user_10798', 'User No. 10798', '7325', '2', '7', '2014-05-06 19:06:37', '563114958', '1382562731846', '1985-01-21', '1987-12-21 09:44:54');
INSERT INTO `user` VALUES ('user_130', 'user_10379', 'User No. 10379', '9558', '1', '4', '2014-02-20 02:53:54', '642179122', '345496848493', '2003-08-12', '2003-03-10 10:50:16');
INSERT INTO `user` VALUES ('user_131', 'user_10394', 'User No. 10394', '10950', '2', '4', '1992-01-02 11:37:43', '392030429', '572995268853', '1999-02-26', '2001-06-08 03:29:52');
INSERT INTO `user` VALUES ('user_132', 'user_10385', 'User No. 10385', '10762', '1', '1', '2004-01-11 13:56:40', '788653034', '609749496086', '1994-08-27', '1990-07-24 05:20:17');
INSERT INTO `user` VALUES ('user_133', 'user_10807', 'User No. 10807', '6396', '1', '8', '2009-12-27 23:40:55', '807648049', '1371549739614', '1997-09-08', '1992-01-12 10:18:35');
INSERT INTO `user` VALUES ('user_134', 'user_10135', 'User No. 10135', '7338', '2', '3', '1985-11-10 01:30:20', '1063890604', '505014575089', '1988-12-31', '1997-09-25 12:05:32');
INSERT INTO `user` VALUES ('user_135', 'user_10584', 'User No. 10584', '7417', '1', '6', '2007-07-17 01:34:22', '1214664833', '1272043958010', '2014-04-13', '1989-05-19 11:04:07');
INSERT INTO `user` VALUES ('user_136', 'user_10482', 'User No. 10482', '7602', '2', '1', '2007-08-05 09:22:58', '571393458', '336033025733', '1980-02-28', '2012-11-13 12:55:17');
INSERT INTO `user` VALUES ('user_137', 'user_10324', 'User No. 10324', '7669', '1', '7', '1991-04-23 00:45:55', '924842010', '1258274868135', '1997-06-25', '1990-07-07 03:30:36');
INSERT INTO `user` VALUES ('user_138', 'user_10658', 'User No. 10658', '10901', '1', '2', '2011-11-16 01:02:19', '416348375', '341218017196', '1996-07-20', '1991-10-13 06:32:08');
INSERT INTO `user` VALUES ('user_139', 'user_10913', 'User No. 10913', '8253', '1', '1', '2009-05-21 23:08:12', '513428603', '346451719639', '2012-12-12', '1997-09-02 01:58:10');
INSERT INTO `user` VALUES ('user_14', 'user_10374', 'User No. 10374', '7993', '1', '3', '1993-11-16 20:16:11', '1304871056', '1134264132878', '1986-01-25', '1980-09-18 11:22:24');
INSERT INTO `user` VALUES ('user_140', 'user_10861', 'User No. 10861', '7205', '2', '7', '2011-02-20 03:19:47', '714197413', '893472201708', '2011-11-03', '1990-02-13 01:43:40');
INSERT INTO `user` VALUES ('user_141', 'user_10816', 'User No. 10816', '10879', '2', '6', '1984-04-26 02:43:22', '1245817474', '386831837126', '1986-07-14', '2009-01-13 04:30:51');
INSERT INTO `user` VALUES ('user_142', 'user_10225', 'User No. 10225', '6804', '1', '1', '2008-01-06 15:12:24', '1221038358', '1161717313863', '2010-07-26', '2012-04-28 02:03:05');
INSERT INTO `user` VALUES ('user_143', 'user_10937', 'User No. 10937', '9978', '1', '5', '2007-05-13 19:16:26', '1098324581', '1176943050479', '1992-09-24', '2001-02-16 05:56:37');
INSERT INTO `user` VALUES ('user_144', 'user_10144', 'User No. 10144', '7672', '2', '7', '1984-10-17 17:19:41', '638583245', '975030806253', '1985-01-31', '2004-09-28 11:12:37');
INSERT INTO `user` VALUES ('user_145', 'user_10316', 'User No. 10316', '7089', '1', '8', '1988-02-03 01:21:38', '410498549', '1060950541790', '2000-01-17', '1998-05-08 09:24:03');
INSERT INTO `user` VALUES ('user_146', 'user_10305', 'User No. 10305', '8275', '1', '5', '1989-09-13 13:20:58', '974121348', '1138171213746', '1995-05-29', '1998-03-05 04:24:12');
INSERT INTO `user` VALUES ('user_147', 'user_10807', 'User No. 10807', '10157', '2', '8', '1999-01-10 16:40:18', '533719371', '1343799462790', '1998-10-04', '1982-07-14 10:50:18');
INSERT INTO `user` VALUES ('user_148', 'user_10611', 'User No. 10611', '11259', '1', '8', '1997-10-13 23:38:37', '371223164', '406508886215', '1996-10-28', '2001-06-02 04:54:36');
INSERT INTO `user` VALUES ('user_149', 'user_10799', 'User No. 10799', '9073', '2', '6', '1996-10-14 14:36:58', '862144138', '1407139309595', '2006-02-05', '2013-03-11 09:30:36');
INSERT INTO `user` VALUES ('user_15', 'user_10125', 'User No. 10125', '7657', '1', '3', '1991-09-05 13:50:27', '697674847', '723350558224', '1980-02-08', '2013-07-03 02:27:50');
INSERT INTO `user` VALUES ('user_150', 'user_10140', 'User No. 10140', '11873', '1', '2', '1992-05-24 21:50:22', '1337085362', '676359407150', '2012-12-06', '2000-07-03 04:26:05');
INSERT INTO `user` VALUES ('user_151', 'user_10347', 'User No. 10347', '11343', '1', '2', '2000-07-15 20:03:53', '1170559766', '982649162221', '1983-04-27', '1996-04-29 04:58:33');
INSERT INTO `user` VALUES ('user_152', 'user_10045', 'User No. 10045', '7485', '2', '3', '2001-08-30 06:19:18', '1341527971', '726569262415', '2008-08-20', '1991-10-17 04:37:08');
INSERT INTO `user` VALUES ('user_153', 'user_10450', 'User No. 10450', '9350', '1', '1', '2009-02-18 00:43:44', '470272705', '1060873843323', '2014-04-16', '1995-12-13 08:56:19');
INSERT INTO `user` VALUES ('user_154', 'user_10942', 'User No. 10942', '7134', '1', '1', '1996-06-28 20:56:56', '1194646539', '1380215155308', '2014-06-27', '2006-04-17 06:35:42');
INSERT INTO `user` VALUES ('user_155', 'user_10448', 'User No. 10448', '11820', '2', '3', '1992-11-19 16:07:27', '1030126486', '376750490801', '2007-06-22', '1999-02-06 01:22:37');
INSERT INTO `user` VALUES ('user_156', 'user_10227', 'User No. 10227', '7702', '2', '4', '1987-09-04 22:28:48', '1409876836', '1320465303254', '2007-07-01', '1995-02-16 04:50:53');
INSERT INTO `user` VALUES ('user_157', 'user_10394', 'User No. 10394', '11366', '1', '8', '1987-05-24 18:47:47', '1379976606', '1007481508725', '1988-08-23', '2003-05-04 11:03:42');
INSERT INTO `user` VALUES ('user_158', 'user_10247', 'User No. 10247', '8814', '2', '3', '2004-06-29 01:55:43', '1319130268', '419919623692', '2003-03-18', '1983-10-17 08:30:57');
INSERT INTO `user` VALUES ('user_159', 'user_10052', 'User No. 10052', '7891', '2', '4', '1983-04-20 09:39:14', '1105941492', '1325778257542', '1987-05-01', '1995-02-16 06:11:08');
INSERT INTO `user` VALUES ('user_16', 'user_10506', 'User No. 10506', '7914', '1', '3', '1992-03-06 12:22:02', '721933304', '969054176617', '2005-10-11', '1990-01-23 11:01:19');
INSERT INTO `user` VALUES ('user_160', 'user_10591', 'User No. 10591', '10424', '1', '8', '2008-11-13 06:37:16', '1255906092', '971180507105', '1983-10-03', '1991-10-02 01:45:26');
INSERT INTO `user` VALUES ('user_161', 'user_10760', 'User No. 10760', '8029', '2', '1', '2012-10-26 21:42:49', '1061873788', '1070989604463', '2001-06-16', '1986-06-15 12:23:49');
INSERT INTO `user` VALUES ('user_162', 'user_10462', 'User No. 10462', '6908', '2', '6', '2001-02-27 00:42:56', '988439128', '354585142754', '2013-02-24', '2002-11-18 06:03:51');
INSERT INTO `user` VALUES ('user_163', 'user_10533', 'User No. 10533', '10451', '1', '4', '2011-06-16 21:23:24', '715249548', '1182294325268', '1980-05-03', '2006-12-10 03:19:38');
INSERT INTO `user` VALUES ('user_164', 'user_10252', 'User No. 10252', '11456', '2', '5', '2000-12-07 13:57:36', '1065211270', '1148175968730', '2007-12-18', '1985-03-05 07:58:09');
INSERT INTO `user` VALUES ('user_165', 'user_10345', 'User No. 10345', '6639', '1', '5', '2006-08-10 13:43:42', '402717084', '1012601969893', '1982-03-23', '2007-03-27 07:10:43');
INSERT INTO `user` VALUES ('user_166', 'user_10839', 'User No. 10839', '10957', '1', '3', '2005-11-26 09:30:09', '694426763', '634037616198', '1997-04-08', '1981-01-05 01:57:33');
INSERT INTO `user` VALUES ('user_167', 'user_10900', 'User No. 10900', '11726', '2', '3', '2012-08-09 22:01:59', '756771270', '403438770819', '2004-03-11', '2012-01-21 04:48:05');
INSERT INTO `user` VALUES ('user_168', 'user_10645', 'User No. 10645', '10200', '2', '8', '1997-06-22 10:49:39', '1219177751', '1246671036989', '1983-08-03', '1993-02-28 03:55:02');
INSERT INTO `user` VALUES ('user_169', 'user_10207', 'User No. 10207', '10256', '2', '6', '1993-02-08 18:31:08', '615328255', '544066189760', '1984-04-18', '1986-08-05 07:51:00');
INSERT INTO `user` VALUES ('user_17', 'user_10910', 'User No. 10910', '6671', '1', '8', '2014-03-13 07:56:41', '1393697096', '348749989798', '1989-04-28', '1982-09-23 08:30:00');
INSERT INTO `user` VALUES ('user_170', 'user_10174', 'User No. 10174', '6143', '2', '1', '1994-05-02 19:00:49', '783272297', '821605546643', '1998-03-26', '1998-06-30 10:55:56');
INSERT INTO `user` VALUES ('user_171', 'user_10862', 'User No. 10862', '8411', '2', '1', '1985-02-25 05:41:52', '1020957155', '1339666620016', '1984-08-26', '1993-05-21 03:29:18');
INSERT INTO `user` VALUES ('user_172', 'user_10303', 'User No. 10303', '9667', '2', '6', '1991-03-15 17:38:55', '1212142849', '347717606261', '1999-02-15', '2008-11-07 02:33:08');
INSERT INTO `user` VALUES ('user_173', 'user_10956', 'User No. 10956', '6736', '2', '7', '1998-08-09 06:00:12', '524640406', '484482121312', '1995-01-16', '1993-04-22 09:46:58');
INSERT INTO `user` VALUES ('user_174', 'user_10300', 'User No. 10300', '7331', '1', '7', '1998-09-21 07:09:04', '1085690730', '1143347652335', '1990-06-29', '2002-07-10 11:56:10');
INSERT INTO `user` VALUES ('user_175', 'user_10452', 'User No. 10452', '7004', '2', '5', '1987-03-27 01:30:24', '1319537845', '331125059140', '2009-03-14', '1980-08-01 07:49:11');
INSERT INTO `user` VALUES ('user_176', 'user_10860', 'User No. 10860', '10451', '2', '3', '1999-05-17 19:57:02', '633447009', '323235272752', '2006-05-10', '1995-01-14 09:30:26');
INSERT INTO `user` VALUES ('user_177', 'user_10618', 'User No. 10618', '8051', '2', '3', '2010-10-24 12:40:31', '364729126', '1087592320792', '2007-07-13', '1984-04-18 12:24:57');
INSERT INTO `user` VALUES ('user_178', 'user_10073', 'User No. 10073', '11604', '2', '7', '2006-05-15 20:19:41', '1010135574', '1056884091663', '2004-05-04', '2000-09-06 10:40:15');
INSERT INTO `user` VALUES ('user_179', 'user_10600', 'User No. 10600', '11818', '1', '1', '1989-08-28 09:18:45', '652950123', '1210185775131', '2010-11-19', '2003-01-05 11:12:38');
INSERT INTO `user` VALUES ('user_18', 'user_10014', 'User No. 10014', '8904', '2', '5', '1994-10-15 03:16:06', '628705568', '1086419656940', '1980-12-21', '2000-01-15 02:14:36');
INSERT INTO `user` VALUES ('user_180', 'user_10234', 'User No. 10234', '6378', '2', '2', '1984-02-17 04:23:47', '895610611', '476442820593', '2012-04-05', '2006-06-12 12:57:58');
INSERT INTO `user` VALUES ('user_181', 'user_10494', 'User No. 10494', '6078', '2', '3', '2002-06-20 12:38:16', '497453619', '558419997210', '1993-08-10', '1996-11-14 05:59:16');
INSERT INTO `user` VALUES ('user_182', 'user_10862', 'User No. 10862', '9876', '2', '2', '2001-01-16 22:29:22', '601274011', '963258632884', '1985-08-30', '1983-02-15 03:36:15');
INSERT INTO `user` VALUES ('user_183', 'user_10761', 'User No. 10761', '8092', '2', '2', '2012-03-09 15:09:55', '809138432', '743195308663', '2004-09-08', '1989-02-01 01:25:20');
INSERT INTO `user` VALUES ('user_184', 'user_10068', 'User No. 10068', '7734', '1', '5', '2013-12-07 04:43:02', '719521892', '835588949433', '1985-12-23', '1985-10-19 12:47:07');
INSERT INTO `user` VALUES ('user_185', 'user_10550', 'User No. 10550', '8801', '1', '2', '2001-03-08 05:06:43', '590032569', '514445822617', '1983-06-09', '2009-10-23 11:02:44');
INSERT INTO `user` VALUES ('user_186', 'user_10764', 'User No. 10764', '9922', '1', '8', '1995-01-22 02:43:42', '839638792', '475103599811', '1999-12-16', '2001-06-08 09:00:55');
INSERT INTO `user` VALUES ('user_187', 'user_10460', 'User No. 10460', '9711', '1', '7', '1980-12-14 06:39:21', '372902674', '498768288889', '1992-08-22', '2005-02-13 10:43:55');
INSERT INTO `user` VALUES ('user_188', 'user_10931', 'User No. 10931', '8753', '2', '3', '1990-08-17 03:54:31', '714456059', '883854537881', '1998-04-10', '2012-03-02 12:35:14');
INSERT INTO `user` VALUES ('user_189', 'user_10541', 'User No. 10541', '6799', '2', '7', '2011-05-17 13:24:43', '840517793', '405802196921', '1988-08-02', '1983-02-04 12:50:56');
INSERT INTO `user` VALUES ('user_19', 'user_10123', 'User No. 10123', '8364', '1', '5', '2000-05-17 07:44:44', '750684294', '666455300087', '2006-10-01', '1980-05-21 11:01:10');
INSERT INTO `user` VALUES ('user_190', 'user_10640', 'User No. 10640', '8560', '1', '1', '1985-02-22 06:48:11', '362843731', '474183170164', '1991-03-19', '1998-01-28 12:42:28');
INSERT INTO `user` VALUES ('user_191', 'user_10391', 'User No. 10391', '7344', '1', '2', '1980-07-19 11:32:09', '945079785', '1297845626637', '2011-04-13', '1987-11-01 10:06:23');
INSERT INTO `user` VALUES ('user_192', 'user_10456', 'User No. 10456', '11607', '2', '1', '1994-06-26 09:08:04', '470801355', '376473926245', '1995-12-27', '1999-07-19 07:43:05');
INSERT INTO `user` VALUES ('user_193', 'user_10199', 'User No. 10199', '6042', '1', '2', '1992-01-13 13:14:16', '458709827', '708078160907', '1986-04-09', '1986-01-12 11:44:31');
INSERT INTO `user` VALUES ('user_194', 'user_10828', 'User No. 10828', '11889', '1', '5', '1982-03-25 03:57:17', '1176331803', '711711542979', '1984-05-23', '1980-01-23 08:29:16');
INSERT INTO `user` VALUES ('user_195', 'user_10519', 'User No. 10519', '10260', '1', '7', '1996-08-11 19:37:15', '1255217649', '946341626338', '1989-12-06', '2014-03-03 12:03:39');
INSERT INTO `user` VALUES ('user_196', 'user_10611', 'User No. 10611', '11331', '1', '8', '2006-09-01 08:59:29', '558371243', '1109700809470', '2001-07-04', '1999-07-06 06:19:36');
INSERT INTO `user` VALUES ('user_197', 'user_10563', 'User No. 10563', '9324', '1', '3', '1989-05-25 03:08:10', '630771658', '1256442078319', '2011-12-22', '1985-06-26 11:33:02');
INSERT INTO `user` VALUES ('user_198', 'user_10839', 'User No. 10839', '11232', '2', '2', '1988-01-03 00:48:18', '900391282', '1334654454265', '1981-04-22', '2003-03-21 01:15:08');
INSERT INTO `user` VALUES ('user_199', 'user_10501', 'User No. 10501', '9770', '1', '8', '2003-11-10 21:30:53', '1157646458', '1028387582589', '2013-06-12', '2011-10-15 03:24:08');
INSERT INTO `user` VALUES ('user_2', 'user_10317', 'User No. 10317', '9827', '1', '5', '1991-03-09 10:02:42', '961639069', '777674761829', '1983-05-16', '2002-04-14 06:50:50');
INSERT INTO `user` VALUES ('user_20', 'user_10408', 'User No. 10408', '8841', '2', '8', '2006-09-05 00:59:26', '804382027', '418282816336', '1981-06-02', '2007-02-07 09:34:53');
INSERT INTO `user` VALUES ('user_21', 'user_10134', 'User No. 10134', '6364', '2', '5', '1990-12-01 02:27:36', '966481064', '429443384952', '1995-09-16', '1985-12-19 09:57:53');
INSERT INTO `user` VALUES ('user_22', 'user_10645', 'User No. 10645', '9389', '2', '6', '1996-09-17 07:57:28', '585053214', '1041594299690', '1990-06-24', '2013-07-19 06:47:31');
INSERT INTO `user` VALUES ('user_23', 'user_10092', 'User No. 10092', '11945', '2', '3', '1988-06-26 06:04:55', '584521000', '1385053584634', '2004-04-29', '1998-08-02 03:45:18');
INSERT INTO `user` VALUES ('user_24', 'user_10441', 'User No. 10441', '10122', '1', '6', '2014-03-01 05:56:20', '1325383068', '1306851471740', '1989-07-29', '1998-09-21 02:57:30');
INSERT INTO `user` VALUES ('user_25', 'user_10171', 'User No. 10171', '8483', '1', '1', '2000-09-09 01:50:15', '1209979224', '972767782108', '1995-07-11', '2009-10-09 11:46:25');
INSERT INTO `user` VALUES ('user_26', 'user_10980', 'User No. 10980', '7509', '2', '7', '2004-09-29 11:08:55', '827322911', '343208791858', '1989-03-28', '1989-07-09 04:22:23');
INSERT INTO `user` VALUES ('user_27', 'user_10302', 'User No. 10302', '11040', '2', '3', '2001-11-13 19:02:24', '858658927', '769633275248', '1990-05-31', '1999-06-17 05:01:17');
INSERT INTO `user` VALUES ('user_28', 'user_10645', 'User No. 10645', '6054', '1', '2', '1988-04-08 01:52:17', '421847099', '670173354982', '2002-09-05', '2005-04-03 04:01:38');
INSERT INTO `user` VALUES ('user_29', 'user_10904', 'User No. 10904', '10634', '1', '6', '1980-09-11 12:11:18', '736813672', '1295404348794', '2007-02-04', '1994-10-08 05:33:24');
INSERT INTO `user` VALUES ('user_3', 'user_10479', 'User No. 10479', '9888', '2', '8', '1993-04-08 21:11:57', '819949846', '1242829679631', '2006-09-27', '2012-10-09 01:34:53');
INSERT INTO `user` VALUES ('user_30', 'user_10181', 'User No. 10181', '8996', '1', '3', '1986-11-04 05:34:05', '641861723', '1088836327525', '1986-06-18', '1984-03-16 09:21:31');
INSERT INTO `user` VALUES ('user_31', 'user_10349', 'User No. 10349', '6895', '2', '2', '1987-04-26 15:12:15', '666432892', '1010869535437', '1986-12-30', '2014-06-04 04:44:47');
INSERT INTO `user` VALUES ('user_32', 'user_10341', 'User No. 10341', '6225', '1', '4', '1990-10-01 09:21:44', '702253509', '1030281362082', '1982-11-18', '2001-02-23 11:50:18');
INSERT INTO `user` VALUES ('user_33', 'user_10350', 'User No. 10350', '6072', '1', '8', '1992-08-10 22:37:03', '705882955', '1009792794468', '1984-07-08', '1994-06-05 07:15:42');
INSERT INTO `user` VALUES ('user_34', 'user_10967', 'User No. 10967', '8743', '1', '2', '2002-06-21 22:44:47', '475373266', '691484572115', '2013-06-14', '1996-04-09 10:52:37');
INSERT INTO `user` VALUES ('user_35', 'user_10914', 'User No. 10914', '6425', '1', '4', '1980-11-06 20:05:59', '1050129762', '1237483205214', '1994-02-02', '2009-03-09 07:37:14');
INSERT INTO `user` VALUES ('user_36', 'user_10769', 'User No. 10769', '10583', '2', '5', '2009-11-26 08:34:32', '540329285', '1108842542863', '1981-07-23', '1995-10-03 01:52:11');
INSERT INTO `user` VALUES ('user_37', 'user_10803', 'User No. 10803', '10991', '2', '3', '1989-03-26 00:25:45', '780585592', '1235552992019', '2000-07-08', '1996-08-10 10:35:43');
INSERT INTO `user` VALUES ('user_38', 'user_10560', 'User No. 10560', '6617', '1', '2', '1984-07-08 14:29:07', '727557790', '635751656191', '2000-06-06', '2014-07-05 11:53:12');
INSERT INTO `user` VALUES ('user_39', 'user_10014', 'User No. 10014', '9374', '2', '6', '1992-10-04 00:00:44', '426504516', '1337997071313', '1991-12-11', '2000-08-01 10:56:06');
INSERT INTO `user` VALUES ('user_4', 'user_10125', 'User No. 10125', '7032', '2', '2', '2011-07-08 06:35:45', '736201234', '1168589056160', '2006-06-04', '2007-10-22 06:00:08');
INSERT INTO `user` VALUES ('user_40', 'user_10234', 'User No. 10234', '6139', '1', '5', '1997-01-19 11:24:37', '679358112', '652722303188', '2003-02-21', '1987-04-30 10:06:04');
INSERT INTO `user` VALUES ('user_41', 'user_10408', 'User No. 10408', '7834', '1', '1', '2010-05-31 19:22:37', '516904349', '321237148730', '2000-04-25', '2005-04-23 12:00:15');
INSERT INTO `user` VALUES ('user_42', 'user_10462', 'User No. 10462', '8417', '1', '6', '1983-12-30 15:52:09', '1323660882', '1398258732863', '1985-01-03', '2011-03-19 12:35:19');
INSERT INTO `user` VALUES ('user_43', 'user_10248', 'User No. 10248', '7635', '1', '5', '1983-08-30 22:16:15', '1206493640', '1233480504465', '2002-05-22', '1994-06-21 09:01:11');
INSERT INTO `user` VALUES ('user_44', 'user_10470', 'User No. 10470', '11138', '2', '4', '1985-10-09 15:23:42', '598454737', '736279873837', '1982-05-06', '1992-08-19 09:43:52');
INSERT INTO `user` VALUES ('user_45', 'user_10954', 'User No. 10954', '8680', '1', '7', '2004-09-23 19:08:20', '980887520', '1074643310589', '2001-08-21', '2000-10-05 02:22:51');
INSERT INTO `user` VALUES ('user_46', 'user_10871', 'User No. 10871', '7436', '2', '1', '1996-02-26 07:22:24', '1059258638', '1178744743078', '2004-12-01', '2011-06-04 08:38:46');
INSERT INTO `user` VALUES ('user_47', 'user_10214', 'User No. 10214', '6300', '2', '6', '1993-09-14 13:39:21', '331780477', '927374443768', '1994-02-23', '1985-08-09 08:30:05');
INSERT INTO `user` VALUES ('user_48', 'user_10570', 'User No. 10570', '9251', '2', '4', '1990-12-23 05:02:53', '506571534', '635678453379', '2007-11-14', '2014-05-21 04:38:29');
INSERT INTO `user` VALUES ('user_49', 'user_10696', 'User No. 10696', '8117', '1', '5', '2013-09-22 12:58:05', '359514896', '821214509167', '2007-01-03', '2007-11-14 02:40:39');
INSERT INTO `user` VALUES ('user_5', 'user_10818', 'User No. 10818', '10518', '2', '4', '1998-12-14 06:40:58', '986511070', '320616863965', '2004-02-16', '2001-12-03 11:23:19');
INSERT INTO `user` VALUES ('user_50', 'user_10133', 'User No. 10133', '6509', '1', '7', '1984-11-13 15:29:54', '1090817747', '471456558594', '2006-08-31', '2008-06-20 03:32:48');
INSERT INTO `user` VALUES ('user_51', 'user_10957', 'User No. 10957', '6771', '1', '1', '1981-12-25 00:59:25', '953634193', '885335056129', '1997-10-10', '1991-04-17 01:24:07');
INSERT INTO `user` VALUES ('user_52', 'user_10620', 'User No. 10620', '7843', '1', '2', '2006-05-23 23:21:26', '1031671989', '895829553765', '1980-10-30', '2014-03-27 03:49:23');
INSERT INTO `user` VALUES ('user_53', 'user_10609', 'User No. 10609', '6627', '2', '6', '1991-04-14 15:24:10', '1275051441', '721079017086', '2005-07-25', '1986-09-25 09:45:02');
INSERT INTO `user` VALUES ('user_54', 'user_10980', 'User No. 10980', '8421', '2', '4', '1988-12-24 15:51:37', '429269948', '1391307820450', '1987-02-25', '1997-09-04 02:08:56');
INSERT INTO `user` VALUES ('user_55', 'user_10012', 'User No. 10012', '6147', '2', '5', '1993-04-18 04:34:00', '347727108', '397208147575', '2013-09-13', '1996-01-30 03:12:03');
INSERT INTO `user` VALUES ('user_56', 'user_10352', 'User No. 10352', '10510', '2', '6', '2007-10-04 16:36:01', '1257810080', '888149036509', '2010-07-29', '2000-08-18 02:21:45');
INSERT INTO `user` VALUES ('user_57', 'user_10587', 'User No. 10587', '7197', '2', '4', '2003-09-10 15:08:33', '1037545784', '1040163949389', '1998-12-28', '2012-01-14 02:23:46');
INSERT INTO `user` VALUES ('user_58', 'user_10478', 'User No. 10478', '6328', '1', '1', '2009-05-25 18:35:23', '868541988', '890901999853', '2002-11-16', '1990-08-15 05:10:27');
INSERT INTO `user` VALUES ('user_59', 'user_10376', 'User No. 10376', '10220', '2', '1', '2001-12-29 19:22:38', '596364324', '1220873074933', '2001-05-30', '2008-06-08 06:43:31');
INSERT INTO `user` VALUES ('user_6', 'user_10067', 'User No. 10067', '11168', '1', '7', '1989-08-28 01:03:33', '943084903', '802364847911', '1983-07-30', '2006-04-28 08:23:31');
INSERT INTO `user` VALUES ('user_60', 'user_10533', 'User No. 10533', '10880', '1', '4', '1988-10-06 02:36:53', '544367940', '361946584545', '1996-10-07', '2009-12-20 12:38:05');
INSERT INTO `user` VALUES ('user_61', 'user_10735', 'User No. 10735', '11888', '2', '8', '1989-08-18 06:48:09', '1206861737', '1091316246301', '2004-11-12', '1999-01-18 12:53:15');
INSERT INTO `user` VALUES ('user_62', 'user_10510', 'User No. 10510', '9267', '2', '7', '1982-07-30 10:32:12', '401443107', '693616471316', '1985-10-25', '2010-11-19 10:00:27');
INSERT INTO `user` VALUES ('user_63', 'user_10527', 'User No. 10527', '9683', '1', '2', '1983-10-23 07:42:56', '475141250', '1140218056064', '1996-07-09', '1990-07-24 02:04:38');
INSERT INTO `user` VALUES ('user_64', 'user_10489', 'User No. 10489', '10248', '1', '8', '2012-08-08 07:04:10', '670124808', '366192907346', '2005-07-18', '1994-05-01 02:44:43');
INSERT INTO `user` VALUES ('user_65', 'user_10083', 'User No. 10083', '7167', '1', '2', '2012-07-02 18:37:23', '658885477', '1144686527378', '1984-07-07', '1996-11-19 06:58:28');
INSERT INTO `user` VALUES ('user_66', 'user_10357', 'User No. 10357', '10930', '2', '3', '1980-09-12 10:25:20', '1363971746', '714481100107', '2010-07-24', '1995-01-27 12:07:50');
INSERT INTO `user` VALUES ('user_67', 'user_10388', 'User No. 10388', '10650', '1', '6', '1987-12-09 01:05:31', '393595274', '1393569371562', '2014-06-28', '1991-07-21 09:14:16');
INSERT INTO `user` VALUES ('user_68', 'user_10162', 'User No. 10162', '9777', '1', '8', '1984-04-07 17:25:58', '922169578', '1001285418257', '1987-07-10', '2012-08-29 03:14:13');
INSERT INTO `user` VALUES ('user_69', 'user_10747', 'User No. 10747', '9148', '1', '5', '1991-02-15 04:44:36', '1007525057', '866229885817', '1993-07-27', '1994-02-17 04:29:23');
INSERT INTO `user` VALUES ('user_7', 'user_10013', 'User No. 10013', '9186', '2', '2', '2006-08-15 14:24:02', '972979948', '1274362431210', '1994-05-22', '1983-04-10 02:56:51');
INSERT INTO `user` VALUES ('user_70', 'user_10425', 'User No. 10425', '8696', '1', '3', '1980-06-17 09:57:37', '402914048', '1040770375569', '1983-03-31', '1993-10-25 04:54:52');
INSERT INTO `user` VALUES ('user_71', 'user_10041', 'User No. 10041', '7225', '2', '3', '2003-06-22 22:59:39', '949261117', '818649028900', '2012-01-31', '1994-05-12 10:41:02');
INSERT INTO `user` VALUES ('user_72', 'user_10347', 'User No. 10347', '6921', '2', '4', '2005-07-17 16:31:02', '631113603', '786374096972', '1990-07-16', '1986-10-22 03:34:40');
INSERT INTO `user` VALUES ('user_73', 'user_10799', 'User No. 10799', '10405', '1', '4', '1997-08-07 00:07:07', '316212776', '392699093454', '1997-12-13', '1981-09-01 04:30:53');
INSERT INTO `user` VALUES ('user_74', 'user_10426', 'User No. 10426', '8396', '1', '5', '1995-02-17 17:31:31', '936933479', '749604675108', '1994-02-27', '2002-01-09 12:34:38');
INSERT INTO `user` VALUES ('user_75', 'user_10792', 'User No. 10792', '9721', '1', '8', '1993-01-11 12:16:10', '337425386', '1015209014366', '1982-11-30', '2009-10-29 10:25:41');
INSERT INTO `user` VALUES ('user_76', 'user_10301', 'User No. 10301', '7297', '2', '8', '2005-04-26 08:44:04', '1157926298', '741161892621', '2004-09-02', '2007-05-17 02:00:04');
INSERT INTO `user` VALUES ('user_77', 'user_10889', 'User No. 10889', '10681', '2', '6', '1989-01-13 09:34:35', '954184789', '900109177738', '2002-08-31', '1986-09-30 10:12:07');
INSERT INTO `user` VALUES ('user_78', 'user_10401', 'User No. 10401', '8468', '2', '5', '1994-12-09 15:43:32', '1192390947', '1279677583510', '2000-08-14', '2002-09-10 08:28:06');
INSERT INTO `user` VALUES ('user_79', 'user_10174', 'User No. 10174', '9179', '2', '6', '2003-11-12 02:41:11', '1111579014', '1267722920709', '1991-11-06', '1994-07-11 02:48:58');
INSERT INTO `user` VALUES ('user_8', 'user_10293', 'User No. 10293', '11083', '1', '1', '2000-07-17 20:18:38', '1356187456', '699278014009', '1992-04-04', '2004-04-16 03:50:26');
INSERT INTO `user` VALUES ('user_80', 'user_10714', 'User No. 10714', '7510', '1', '2', '2008-05-10 10:27:22', '452510606', '1195501614461', '2002-09-28', '1981-03-04 09:26:06');
INSERT INTO `user` VALUES ('user_81', 'user_10928', 'User No. 10928', '6745', '2', '2', '2014-03-28 22:02:25', '765380815', '1078233616280', '1992-02-25', '1995-10-02 06:08:03');
INSERT INTO `user` VALUES ('user_82', 'user_10787', 'User No. 10787', '11030', '2', '2', '1991-11-20 22:03:37', '987829076', '1248676284585', '1988-08-21', '2005-11-03 03:50:35');
INSERT INTO `user` VALUES ('user_83', 'user_10359', 'User No. 10359', '9023', '2', '2', '2013-11-05 16:24:06', '680310575', '335061355765', '1986-04-25', '1985-10-06 06:28:15');
INSERT INTO `user` VALUES ('user_84', 'user_10181', 'User No. 10181', '9394', '2', '6', '2012-09-07 00:59:14', '1319622749', '1298659463591', '2012-03-13', '1989-03-13 04:40:53');
INSERT INTO `user` VALUES ('user_85', 'user_10012', 'User No. 10012', '7656', '1', '7', '1994-06-09 07:23:10', '415267666', '865785661357', '1988-01-30', '2009-08-18 10:10:28');
INSERT INTO `user` VALUES ('user_86', 'user_10374', 'User No. 10374', '6925', '2', '6', '2010-01-13 18:20:16', '466053026', '630502292946', '1988-01-20', '1992-02-02 07:51:18');
INSERT INTO `user` VALUES ('user_87', 'user_10434', 'User No. 10434', '10146', '1', '1', '1994-12-10 02:45:40', '625358177', '848799992271', '2013-01-07', '1996-11-03 03:34:13');
INSERT INTO `user` VALUES ('user_88', 'user_10651', 'User No. 10651', '7773', '1', '7', '1989-01-25 14:59:40', '881631426', '1117709404788', '1987-12-03', '1994-05-24 01:00:20');
INSERT INTO `user` VALUES ('user_89', 'user_10085', 'User No. 10085', '9020', '1', '4', '2006-05-07 14:50:54', '420524388', '396692355954', '1992-03-16', '1986-09-13 06:47:40');
INSERT INTO `user` VALUES ('user_9', 'user_10228', 'User No. 10228', '10982', '2', '2', '2005-10-28 13:36:44', '1051824927', '425817827220', '2014-04-17', '1983-03-10 02:45:48');
INSERT INTO `user` VALUES ('user_90', 'user_10358', 'User No. 10358', '11083', '1', '7', '2007-05-25 18:27:39', '401119544', '1031793957231', '1992-12-15', '1999-02-21 07:17:16');
INSERT INTO `user` VALUES ('user_91', 'user_10023', 'User No. 10023', '8287', '2', '6', '2008-12-30 10:06:08', '438859813', '1148395173817', '1992-06-11', '1999-09-11 07:53:08');
INSERT INTO `user` VALUES ('user_92', 'user_10016', 'User No. 10016', '8189', '2', '7', '1984-05-04 12:22:58', '675188912', '1375182234195', '1989-08-16', '1996-03-15 10:40:06');
INSERT INTO `user` VALUES ('user_93', 'user_10763', 'User No. 10763', '9196', '1', '2', '1986-06-11 09:23:31', '459275470', '408264629408', '1991-07-12', '1999-05-10 03:35:38');
INSERT INTO `user` VALUES ('user_94', 'user_10935', 'User No. 10935', '7410', '1', '7', '2014-01-15 06:50:12', '823699379', '708024666414', '2013-07-13', '2007-03-11 12:10:20');
INSERT INTO `user` VALUES ('user_95', 'user_10716', 'User No. 10716', '10359', '1', '6', '2005-04-21 02:00:29', '400470783', '590284036658', '1986-06-14', '1995-05-02 04:36:53');
INSERT INTO `user` VALUES ('user_96', 'user_10960', 'User No. 10960', '10061', '1', '7', '1996-09-22 23:45:53', '1309536927', '666172816682', '1991-07-29', '1991-09-16 07:03:41');
INSERT INTO `user` VALUES ('user_97', 'user_10150', 'User No. 10150', '6111', '2', '6', '1988-12-04 21:55:15', '872754157', '1282012776811', '1997-01-25', '1992-05-26 03:02:56');
INSERT INTO `user` VALUES ('user_98', 'user_10768', 'User No. 10768', '11082', '1', '3', '2003-09-13 13:15:07', '500707336', '651583390195', '1983-03-25', '2009-10-17 06:18:38');
INSERT INTO `user` VALUES ('user_99', 'user_10890', 'User No. 10890', '9370', '1', '8', '1991-07-15 08:32:16', '1246245294', '625423667894', '1986-01-12', '1985-08-08 07:24:05');
