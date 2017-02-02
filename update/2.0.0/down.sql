ALTER TABLE `prefix_user_status`
CHANGE `text` `status_text`   VARCHAR(255) DEFAULT NULL,
CHANGE `date` `status_date`   DATETIME NOT NULL,
CHANGE `data` `status_custom` TEXT DEFAULT NULL;
