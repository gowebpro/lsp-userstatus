CREATE TABLE IF NOT EXISTS `prefix_user_status` (
  `user_id` INT(11) UNSIGNED NOT NULL,
  `status_text` VARCHAR(255) DEFAULT NULL,
  `status_date` DATETIME NOT NULL,
  `status_custom` TEXT DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `status_text` (`status_text`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
