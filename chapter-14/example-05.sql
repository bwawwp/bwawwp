CREATE TABLE `wp_sp_assignments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned,
  `class_id` bigint(20) unsigned,
  `student_id` bigint(20) unsigned,
  `score` int(10),
  `assignment_date` DATETIME,
  `due_date` DATETIME,
  `submission_date` DATETIE
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_id` (`post_id`),
  KEY `class_id` (`class_id`),
  KEY `student_id` (`student_id`),
  KEY `score` (`score`),
  KEY `asignment_date` (`assignment_date`),
  KEY `due_date` (`due_date`),
  KEY `submission_date` (`submission_date`)
);