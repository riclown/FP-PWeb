CREATE TABLE `parents` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(255) NOT NULL ,  
    `gender` VARCHAR(16) NOT NULL ,  
    `date_of_birth` DATE NOT NULL ,  
    `address` VARCHAR(255) NOT NULL ,  
    `phone_number` VARCHAR(16) NOT NULL, 
    `parent_of` INT NOT NULL,  
    PRIMARY KEY  (`id`),
    FOREIGN KEY (`parent_of`) REFERENCES `students`(`id`)
) ENGINE = InnoDB;