CREATE TABLE IF NOT EXISTS `prefix_user_status` (
	`user_id` int(11) unsigned NOT NULL,
	`status_text` varchar(255) DEFAULT NULL,
	`status_date` datetime NOT NULL,
	`status_custom` text DEFAULT NULL,
	PRIMARY KEY (`user_id`),
	KEY `status_text` (`status_text`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


