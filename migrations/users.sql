CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT, 
    `username` VARCHAR(255) NOT NULL, 
    `password` VARCHAR(255) NOT NULL, 
    `role` VARCHAR(10) NOT NULL, 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `users`(`username`, `password`, `role`) 
VALUES ('admin1', '$2y$10$srP/TFzKyrZ0oQQAwziucei5fy23fisWI7ID71EuH.H6KP6yILG.S', 'admin');