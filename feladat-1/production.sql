USE cs_beugro;
CREATE TABLE `production` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `pcb_id` INT NOT NULL,
  `quantity` INT,
  `startDate` DATETIME,
  `endDate` DATETIME,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;