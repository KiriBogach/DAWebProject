CREATE TABLE `users` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`username` VARCHAR(60) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`created_at` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

CREATE TABLE `projects` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128) NOT NULL,
	`fecha_inicio` DATE NOT NULL,
	`fecha_fin` DATE NOT NULL,
	`rating` INT NOT NULL,
	`interes` FLOAT NOT NULL,
	`fondos_necesarios` FLOAT NOT NULL,
	`fondos_alcanzados` FLOAT NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;