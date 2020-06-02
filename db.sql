CREATE TABLE `p_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '新闻标题',
  `link` varchar(256) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '新闻连接',
  `add_time` int(10) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;