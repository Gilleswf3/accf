
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- agencies
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `agencies`;

CREATE TABLE `agencies`
(
    `id_agency` INTEGER(8) NOT NULL AUTO_INCREMENT,
    `address` VARCHAR(255) NOT NULL,
    `zipcode` VARCHAR(255) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `area` INTEGER(2) NOT NULL,
    PRIMARY KEY (`id_agency`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- contents
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `contents`;

CREATE TABLE `contents`
(
    `id_content` INTEGER(8) NOT NULL AUTO_INCREMENT,
    `picture` VARCHAR(255) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `subtitle` VARCHAR(255) NOT NULL,
    `text` TEXT NOT NULL,
    `id_employee` INTEGER(8) NOT NULL,
    PRIMARY KEY (`id_content`),
    INDEX `id_employee` (`id_employee`),
    CONSTRAINT `contents_ibfk_1`
        FOREIGN KEY (`id_employee`)
        REFERENCES `employees` (`id_employee`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- customers
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers`
(
    `id_customer` INTEGER(8) NOT NULL AUTO_INCREMENT,
    `company` VARCHAR(255) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL,
    `lastname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(255) NOT NULL,
    `job` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `registration_date` DATE NOT NULL,
    `role` VARCHAR(255) NOT NULL,
    `billto_address` VARCHAR(255) NOT NULL,
    `billto_zipcode` VARCHAR(255) NOT NULL,
    `billto_city` VARCHAR(255) NOT NULL,
    `shipto_address` VARCHAR(255) NOT NULL,
    `shipto_zipcode` VARCHAR(255) NOT NULL,
    `shipto_city` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- employees
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees`
(
    `id_employee` INTEGER(8) NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(255) NOT NULL,
    `lastname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(255) NOT NULL,
    `job` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `picture` VARCHAR(255) NOT NULL,
    `role` VARCHAR(255) NOT NULL,
    `id_agency` INTEGER(8) NOT NULL,
    PRIMARY KEY (`id_employee`),
    INDEX `agency` (`id_agency`),
    CONSTRAINT `employees_ibfk_1`
        FOREIGN KEY (`id_agency`)
        REFERENCES `agencies` (`id_agency`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- hotline
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `hotline`;

CREATE TABLE `hotline`
(
    `id_hotline` INTEGER(8) NOT NULL AUTO_INCREMENT,
    `hotline_message` TEXT NOT NULL,
    `id_customer` INTEGER(8) NOT NULL,
    `id_employee` INTEGER(8) NOT NULL,
    `type_author` enum('EMPLOYEE','CUSTOMER') NOT NULL,
    PRIMARY KEY (`id_hotline`),
    INDEX `id_customer` (`id_customer`),
    INDEX `id_employee` (`id_employee`),
    CONSTRAINT `hotline_ibfk_1`
        FOREIGN KEY (`id_customer`)
        REFERENCES `customers` (`id_customer`),
    CONSTRAINT `hotline_ibfk_2`
        FOREIGN KEY (`id_employee`)
        REFERENCES `employees` (`id_employee`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- orderdetails
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `orderdetails`;

CREATE TABLE `orderdetails`
(
    `id_order_details` INTEGER(8) NOT NULL,
    `id_order` INTEGER(8) NOT NULL,
    `id_product` INTEGER(8) NOT NULL,
    `product_unit_price` FLOAT NOT NULL,
    `product_quantity` INTEGER(8) NOT NULL,
    `id_service` INTEGER(8) NOT NULL,
    `service_unit_price` FLOAT NOT NULL,
    `service_quantity` INTEGER(8) NOT NULL,
    INDEX `id_order` (`id_order`),
    INDEX `id_product` (`id_product`),
    INDEX `id_service` (`id_service`),
    CONSTRAINT `orderdetails_ibfk_1`
        FOREIGN KEY (`id_order`)
        REFERENCES `orders` (`id_order`),
    CONSTRAINT `orderdetails_ibfk_2`
        FOREIGN KEY (`id_product`)
        REFERENCES `products` (`id_product`),
    CONSTRAINT `orderdetails_ibfk_3`
        FOREIGN KEY (`id_service`)
        REFERENCES `services` (`id_service`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- orders
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders`
(
    `id_order` INTEGER(8) NOT NULL AUTO_INCREMENT,
    `id_customer` INTEGER(8) NOT NULL,
    `id_product` INTEGER(8),
    `id_service` INTEGER(8),
    `order_date` DATE NOT NULL,
    PRIMARY KEY (`id_order`),
    INDEX `id_customer` (`id_customer`),
    INDEX `id_product` (`id_product`),
    INDEX `id_service` (`id_service`),
    CONSTRAINT `orders_ibfk_1`
        FOREIGN KEY (`id_customer`)
        REFERENCES `customers` (`id_customer`),
    CONSTRAINT `orders_ibfk_2`
        FOREIGN KEY (`id_product`)
        REFERENCES `products` (`id_product`),
    CONSTRAINT `orders_ibfk_3`
        FOREIGN KEY (`id_service`)
        REFERENCES `services` (`id_service`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- products
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products`
(
    `id_product` INTEGER(8) NOT NULL AUTO_INCREMENT,
    `picture` VARCHAR(255) NOT NULL,
    `product_main_category` enum('Dispositifs anti-intrusion','Dispositifs anti-incendie','Dispositifs de prevention medicale') NOT NULL,
    `product_sub_category` enum('Alarmes','Appel Malade','Controle d''acces','Desenfumage','Detection des chutes','Detection incendie','Eclairage de securite','Video-surveillance') NOT NULL,
    `manufacturer` VARCHAR(255) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `price_vat_excluded` FLOAT NOT NULL,
    `price_vat_included` FLOAT NOT NULL,
    PRIMARY KEY (`id_product`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- services
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services`
(
    `id_service` INTEGER(8) NOT NULL AUTO_INCREMENT,
    `title` enum('Contrat de maintenance','Etude technique','Formation','Mise en service') NOT NULL,
    `description` TEXT NOT NULL,
    `price_vat_excluded` FLOAT NOT NULL,
    `price_vat_included` FLOAT NOT NULL,
    PRIMARY KEY (`id_service`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
