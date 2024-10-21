CREATE TABLE IF NOT EXISTS `products` (
    `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
        `name` varchar(32) NOT NULL COMMENT 'Product Name',
        `description` text COMMENT 'Product Description',
        `price` decimal(10, 2) NOT NULL COMMENT 'Product Price',
        PRIMARY KEY (`id`),
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_c

    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('HTML & CSS Book', 'A comprehensive guide to HTML and CSS', 29.99);
    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('JavaScript Book', 'Learn JavaScript from scratch', 39.99);
    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('Python for Data Science', 'Data science with Python', 49.99);
    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('Machine Learning Guide', 'Introduction to machine learning', 59.99);
    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('Android Development', 'Building apps for Android', 45.99);
    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('iOS Development', 'Creating apps for iOS', 55.99);
    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('DevOps Handbook', 'Guide to DevOps practices', 35.99);
    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('Kubernetes Up & Running', 'Managing containers with Kubernetes', 42.99);
    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('Cybersecurity Basics', 'Introduction to cybersecurity', 38.99);
    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('Network Security', 'Protecting network infrastructure', 48.99);
    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('AWS for Beginners', 'Getting started with AWS', 44.99);
    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('Azure Fundamentals', 'Introduction to Microsoft Azure', 46.99);
    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('Google Cloud Platform', 'Guide to GCP', 47.99);
    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('React.js Essentials', 'Building web apps with React.js', 37.99);
    INSERT INTO `products` (`name`, `description`, `price`) VALUES ('Vue.js Guide', 'Developing with Vue.js', 36.99);