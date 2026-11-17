
CREATE DATABASE IF NOT EXISTS `tp_mvc25` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tp_mvc25`;

DROP TABLE IF EXISTS `courses`;
DROP TABLE IF EXISTS `lecturers`;
DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `faculty` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `lecturers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `nidn` VARCHAR(20) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `join_date` DATE NOT NULL,
  `department_id` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lecturer_department` (`department_id`),
  CONSTRAINT `fk_lecturer_department` FOREIGN KEY (`department_id`)
    REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `courses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(20) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `credits` TINYINT(4) NOT NULL DEFAULT 2,
  `lecturer_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_course_lecturer` (`lecturer_id`),
  CONSTRAINT `fk_course_lecturer` FOREIGN KEY (`lecturer_id`)
    REFERENCES `lecturers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `departments` (`id`, `name`, `faculty`) VALUES
(1, 'Ilmu Komputer', 'FPMIPA'),
(2, 'Pendidikan Matematika', 'FPMIPA'),
(3, 'Teknik Elektro', 'FPTK');

INSERT INTO `lecturers` (`id`, `name`, `nidn`, `phone`, `join_date`, `department_id`) VALUES
(1, 'Dr. Budi Santoso', '0412068801', '081234567890', '2015-08-01', 1),
(2, 'Siti Aminah, M.Kom.', '0405049002', '081298765432', '2018-02-15', 1),
(3, 'Rudi Hartono, M.Pd.', '0423118503', '082111222333', '2012-09-01', 2);

INSERT INTO `courses` (`id`, `code`, `name`, `credits`, `lecturer_id`) VALUES
(1, 'IK101', 'Desain dan Pemrograman Berbasis Objek', 3, 1),
(2, 'IK102', 'Basis Data', 3, 2),
(3, 'IK103', 'Pemrograman Web', 3, 2),
(4, 'MT201', 'Kalkulus', 4, 3);
