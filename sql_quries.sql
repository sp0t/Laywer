10/11/2022

ALTER TABLE `customers` CHANGE `address` `address` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `created_by` `created_by` INT(10) UNSIGNED NULL;
ALTER TABLE `users` ADD `os_type` CHAR(1) NULL AFTER `user_type`;
ALTER TABLE `customers` ADD `converted` TINYINT(1) NOT NULL DEFAULT '0' AFTER `verified`;

10/16/2022
ALTER TABLE `customers` ADD `official_address` VARCHAR(255) NULL AFTER `address`;
ALTER TABLE `customers` ADD `contact_person` VARCHAR(100) NULL AFTER `name`;
ALTER TABLE `customers` CHANGE `converted` `is_client` TINYINT(1) NOT NULL DEFAULT '0';

CREATE TABLE `case_types` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `name` varchar(50) NOT NULL,
 `inactive` tinyint(1) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

INSERT INTO `case_types` (`id`, `name`, `inactive`) VALUES (NULL, 'Bankruptcy', '0');
INSERT INTO `case_types` (`id`, `name`, `inactive`) VALUES (NULL, 'Civil', '0');
INSERT INTO `case_types` (`id`, `name`, `inactive`) VALUES (NULL, 'Compensation Jurisdiction', '0');
INSERT INTO `case_types` (`id`, `name`, `inactive`) VALUES (NULL, 'Criminal', '0');

CREATE TABLE `cases` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `type` int(10) unsigned NOT NULL,
 `title` varchar(200) NOT NULL,
 `description` text NOT NULL,
 `inactive` tinyint(1) NOT NULL DEFAULT '0',
 `created_by` int(10) unsigned NOT NULL,
 `created_at` timestamp NOT NULL,
 `updated_at` timestamp NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

ALTER TABLE `cases` ADD `status` TINYINT(1) NOT NULL DEFAULT '0' AFTER `description`;

ALTER TABLE `cases` ADD FOREIGN KEY (`type`) REFERENCES `case_types`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `cases` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `case_lawyers` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `case_id` int(10) unsigned NOT NULL,
 `lawyer_id` int(10) unsigned NOT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

ALTER TABLE `case_lawyers` ADD FOREIGN KEY (`case_id`) REFERENCES `cases`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `case_lawyers` ADD FOREIGN KEY (`lawyer_id`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `case_clients` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `case_id` int(10) unsigned NOT NULL,
 `customer_id` int(10) unsigned NOT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

ALTER TABLE `case_clients` ADD FOREIGN KEY (`case_id`) REFERENCES `cases`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `case_clients` ADD FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;


10/23/2022

CREATE TABLE `case_milestones` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `mpl_id` int(10) unsigned NOT NULL,
 `title` varchar(255) NOT NULL,
 `decription` text NOT NULL,
 `target_date` date NOT NULL,
 `status` tinyint(1) NOT NULL,
 `created_by` int(10) unsigned NOT NULL,
 `created_at` timestamp NOT NULL,
 `updated_at` timestamp NOT NULL,
 PRIMARY KEY (`id`),
 KEY `mpl_id` (`mpl_id`),
 KEY `created_by` (`created_by`),
 CONSTRAINT `case_milestones_ibfk_1` FOREIGN KEY (`mpl_id`) REFERENCES `cases` (`id`),
 CONSTRAINT `case_milestones_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `case_milestones` ADD FOREIGN KEY (`mpl_id`) REFERENCES `cases`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `case_milestones` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `case_milestones` CHANGE `status` `status` TINYINT(1) NOT NULL DEFAULT '0';
ALTER TABLE `case_milestones` CHANGE `decription` `description` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;


-- Banner module tables

-- 2022/10/24

--
-- Table structure for table `banner_types`
--

DROP TABLE IF EXISTS `banner_types`;
CREATE TABLE IF NOT EXISTS `banner_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image_width` smallint(6) NOT NULL,
  `image_height` smallint(6) NOT NULL,
  `page` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `channel` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner_types`
--

INSERT INTO `banner_types` (`id`, `name`, `image_width`, `image_height`, `page`, `channel`) VALUES
(1, 'Web Main Slider', 1920, 1080, 'HOME', 'w'),
(2, 'Web Category Banner', 1860, 2400, 'CATEGORY', 'w'),
(3, 'Mobile Main Slider', 1280, 1500, 'HOME', 'm'),
(4, 'Mobile Home Banner', 1242, 683, 'HOME', 'm'),
(5, 'Mobile Category  Banner', 1122, 390, 'CATEGORY', 'm'),
(6, 'Web Welcome Banner', 640, 300, 'HOME', 'w'),
(7, 'Brand Logo', 400, 100, 'BRAND', 'w'),
(8, 'Web Sub Category Banner', 100, 100, 'SUB_CATEGORY', 'w'),
(9, 'Web Product Featured Image', 1800, 1360, 'PRODUCT_FEATURED', 'w'),
(10, 'Web Product Gallery Image', 1000, 1273, 'PRODUCT_GALLERY', 'w');
COMMIT;

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`banner_type_id` int(10) unsigned DEFAULT NULL,
`title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
`image` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
`channel` enum('WEB','MOBILE') COLLATE utf8_unicode_ci DEFAULT NULL,
`enabled` tinyint(1) NOT NULL DEFAULT '1',
`deleted` tinyint(1) NOT NULL DEFAULT '0',
`created_at` timestamp NULL DEFAULT NULL,
`created_by` int(10) NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
`updated_by` int(10) NULL DEFAULT NULL,
`deleted_at` timestamp NULL DEFAULT NULL,
`deleted_by` int(10) NULL DEFAULT NULL,
PRIMARY KEY (`id`),
KEY `banner_type_id` (`banner_type_id`),
CONSTRAINT `banners_ibfk_1` FOREIGN KEY (`banner_type_id`) REFERENCES `banner_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

11/2/2022

CREATE TABLE `contactus_messages` (
 `id` int(10) unsigned NOT NULL,
 `title` varchar(255) DEFAULT NULL,
 `name` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 `message` text NOT NULL,
 `status` tinyint(1) NOT NULL DEFAULT '0',
 `created_at` timestamp NOT NULL,
 `updated_at` timestamp NOT NULL,
 `replied_by` int(10) unsigned DEFAULT NULL,
 `replied_on` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `replied_by` (`replied_by`),
 CONSTRAINT `contactus_messages_ibfk_1` FOREIGN KEY (`replied_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1



ALTER TABLE `contactus_messages` ADD FOREIGN KEY (`replied_by`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `contactus_messages` CHANGE `id` `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `case_clients` ADD `is_favorite` TINYINT(1) NOT NULL DEFAULT '0' AFTER `customer_id`;
ALTER TABLE `case_lawyers` ADD `is_favorite` TINYINT(1) NOT NULL DEFAULT '0' AFTER `lawyer_id`;



ALTER TABLE `blogs` CHANGE `mysummernote` `blog_text` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `description` `description` VARCHAR(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;


ALTER TABLE `cases` CHANGE `type` `type` VARCHAR(50) NULL;

11/11/2022-----------

CREATE TABLE `settings` (
 `s_group` enum('ADMIN_PANEL','BILLING','CONTACT','SITE','LOCATION','MOBILE_APP','API','EMPLOYEE','COMPANY','SOCIAL','PRODUCT','CHECKOUT','GIFT_CARD','NOTICE') COLLATE utf8_unicode_ci NOT NULL,
 `skey` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `value` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
 `scope` enum('PUBLIC','PRIVATE','SEALED') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SEALED',
 PRIMARY KEY (`skey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

INSERT INTO `settings` (`s_group`, `skey`, `value`, `scope`) VALUES ('CONTACT', 'contact_mobile', '0112123456', 'PUBLIC');
INSERT INTO `settings` (`s_group`, `skey`, `value`, `scope`) VALUES ('CONTACT', 'contact_email', 'mpl@gmailcom', 'PUBLIC');
INSERT INTO `settings` (`s_group`, `skey`, `value`, `scope`) VALUES ('CONTACT', 'contact_address', 'adress, stree1, city, country, zipcode', 'PUBLIC');
INSERT INTO `settings` (`s_group`, `skey`, `value`, `scope`) VALUES ('CONTACT', 'contact_linkedin', 'https://www.linkedin.com/', 'PUBLIC');

CREATE TABLE `discussions` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `title` varchar(255) DEFAULT NULL,
 `description` text NOT NULL,
 `requested_by` int(10) NOT NULL,
 `status` tinyint(1) NOT NULL DEFAULT '0',
 `created_at` timestamp NULL DEFAULT NULL,
 `created_from` char(1) NOT NULL COMMENT 'W-web, M-mobile',
 `updated_at` timestamp NULL DEFAULT NULL,
 `updated_by` int(10) unsigned DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `updated_by` (`updated_by`),
 CONSTRAINT `discussions_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

11/21/2022------------Done

ALTER TABLE `blogs` CHANGE `status` `status` TINYINT(1) NOT NULL DEFAULT '0';
ALTER TABLE `blogs` ADD `view_count` INT(10) UNSIGNED NOT NULL DEFAULT '0' AFTER `status`;
