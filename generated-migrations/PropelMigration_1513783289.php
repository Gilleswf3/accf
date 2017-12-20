<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1513783289.
 * Generated on 2017-12-20 16:21:29 
 */
class PropelMigration_1513783289
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `hotline`;

ALTER TABLE `agencies`

  CHANGE `area` `area` enum(\'92\',\'69\') NOT NULL;

ALTER TABLE `content`

  CHANGE `picture` `picture_content` VARCHAR(255) NOT NULL,

  CHANGE `title` `content_title` VARCHAR(255) NOT NULL,

  CHANGE `text` `content_text` TEXT NOT NULL,

  DROP `subtitle`,

  DROP `id_employee`;

ALTER TABLE `employees`

  DROP `password`;

ALTER TABLE `employees` ADD CONSTRAINT `employees_ibfk_1`
    FOREIGN KEY (`id_agency`)
    REFERENCES `agencies` (`id_agency`);

CREATE TABLE `standards`
(
    `id_standard` INTEGER(8) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `subtitle` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `id_employee` INTEGER(8) NOT NULL,
    PRIMARY KEY (`id_standard`),
    INDEX `id_employee` (`id_employee`),
    CONSTRAINT `standards_ibfk_1`
        FOREIGN KEY (`id_employee`)
        REFERENCES `employees` (`id_employee`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `standards`;

ALTER TABLE `agencies`

  CHANGE `area` `area` INTEGER(2) NOT NULL;

ALTER TABLE `content`

  CHANGE `picture_content` `picture` VARCHAR(255) NOT NULL,

  CHANGE `content_title` `title` VARCHAR(255) NOT NULL,

  CHANGE `content_text` `text` TEXT NOT NULL,

  ADD `subtitle` VARCHAR(255) NOT NULL AFTER `title`,

  ADD `id_employee` INTEGER NOT NULL AFTER `text`;

ALTER TABLE `employees` DROP FOREIGN KEY `employees_ibfk_1`;

ALTER TABLE `employees`

  ADD `password` VARCHAR(255) NOT NULL AFTER `job`;

CREATE TABLE `hotline`
(
    `id_hotline` INTEGER NOT NULL AUTO_INCREMENT,
    `hotline_message` TEXT NOT NULL,
    `id_customer` INTEGER NOT NULL,
    `id_employee` INTEGER NOT NULL,
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

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}