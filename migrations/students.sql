CREATE TABLE `students` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `nis` VARCHAR(5) NOT NULL ,   
    `name` VARCHAR(255) NOT NULL ,  
    `gender` VARCHAR(16) NOT NULL ,  
    `date_of_birth` DATE NOT NULL ,  
    `address` VARCHAR(255) NOT NULL ,  
    `photo` varchar(200) NOT NULL DEFAULT 'uploaded_images/default.jpg',    
    PRIMARY KEY  (`id`),
    UNIQUE (`nis`)
) ENGINE = InnoDB;