CREATE TABLE IF NOT EXISTS `wt_06_products` (
    `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `name` varchar(32) NOT NULL COMMENT 'Product Name',
    `description` text COMMENT 'Product Description',
    `price` decimal(10, 2) NOT NULL COMMENT 'Product Price',
    PRIMARY KEY (`id`)
);

INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('HTML & CSS Book', 'A comprehensive guide to HTML and CSS', 2999.00);
INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('JavaScript Book', 'Learn JavaScript from scratch', 3999.00);
INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('Python for Data Science', 'Data science with Python', 4999.00);
INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('Machine Learning Guide', 'Introduction to machine learning', 5999.00);
INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('Android Development', 'Building apps for Android', 4599.00);
INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('iOS Development', 'Creating apps for iOS', 5599.00);
INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('DevOps Handbook', 'Guide to DevOps practices', 3599.00);
INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('Kubernetes Up & Running', 'Managing containers with Kubernetes', 4299.00);
INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('Cybersecurity Basics', 'Introduction to cybersecurity', 3899.00);
INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('Network Security', 'Protecting network infrastructure', 4899.00);
INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('AWS for Beginners', 'Getting started with AWS', 4499.00);
INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('Azure Fundamentals', 'Introduction to Microsoft Azure', 4699.00);
INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('Google Cloud Platform', 'Guide to GCP', 4799.00);
INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('React.js Essentials', 'Building web apps with React.js', 3799.00);
INSERT INTO `wt_06_products` (`name`, `description`, `price`) VALUES ('Vue.js Guide', 'Developing with Vue.js', 3699.00);
