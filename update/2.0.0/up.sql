ALTER TABLE `prefix_user_status`
CHANGE `status_text`   `text` VARCHAR(255) DEFAULT NULL,
CHANGE `status_date`   `date` DATETIME NOT NULL,
CHANGE `status_custom` `data` TEXT DEFAULT NULL;
