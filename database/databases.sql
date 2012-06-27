
-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'questions'
-- 
-- ---

DROP TABLE IF EXISTS `questions`;
		
CREATE TABLE `questions` (
  `question_id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `question` MEDIUMTEXT NULL DEFAULT NULL,
  `answer` MEDIUMTEXT NULL DEFAULT NULL,
  `section_id` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`question_id`)
);

-- ---
-- Table 'section'
-- 
-- ---

DROP TABLE IF EXISTS `section`;
		
CREATE TABLE `section` (
  `section_id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `title` VARCHAR(255) NULL DEFAULT NULL,
  `senior_section_id` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`section_id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `questions` ADD FOREIGN KEY (section_id) REFERENCES `section` (`section_id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `questions` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `section` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `questions` (`question_id`,`question`,`answer`,`section_id`) VALUES
-- ('','','','');
-- INSERT INTO `section` (`section_id`,`title`,`senior_section_id`) VALUES
-- ('','','');
