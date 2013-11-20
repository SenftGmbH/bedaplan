CREATE DATABASE  `bedaplan` ;

CREATE TABLE  `bedaplan`.`version` (
`programm` INT NOT NULL ,
`database` INT NOT NULL
) ENGINE = MYISAM ;

CREATE TABLE  `bedaplan`.`worktime` (
`worktimeid` BIGINT NOT NULL AUTO_INCREMENT ,
`wt_employee` TEXT NOT NULL ,
`wt_start` TIMESTAMP NOT NULL ,
`wt_stop` TIMESTAMP NOT NULL ,
`wt_sort` VARCHAR( 10 ) NOT NULL ,
PRIMARY KEY (  `worktimeid` )
) ENGINE = MYISAM ;

CREATE TABLE  `bedaplan`.`projecttime` (
`pt_id` BIGINT NOT NULL AUTO_INCREMENT ,
`pt_nr` BIGINT NOT NULL ,
`pt_employee` TEXT NOT NULL ,
`pt_start` TIMESTAMP NOT NULL ,
`pt_stop` TIMESTAMP NOT NULL ,
`pt_sort` VARCHAR( 10 ) NOT NULL ,
PRIMARY KEY (  `pt_id` )
) ENGINE = MYISAM ;

CREATE TABLE  `bedaplan`.`project` (
`project_id` BIGINT NOT NULL AUTO_INCREMENT ,
`project_date` VARCHAR( 10 ) NOT NULL ,
`project_nr` BIGINT NOT NULL ,
`project_description` TEXT NOT NULL ,
`project_employee` TEXT NOT NULL ,
`project_done` SMALLINT NOT NULL ,
`project_free1` TEXT NOT NULL ,
`project_free2` TEXT NOT NULL ,
`project_free3` TEXT NOT NULL ,
`project_free4` TEXT NOT NULL ,
`project_free5` TEXT NOT NULL ,
`project_free6` REAL NOT NULL ,
PRIMARY KEY (  `project_id` )
) ENGINE = MYISAM ;

CREATE TABLE  `bedaplan`.`current` (
`current_id` BIGINT NOT NULL AUTO_INCREMENT ,
`current_nr` BIGINT NOT NULL ,
`current_employee` TEXT NOT NULL ,
PRIMARY KEY (  `current_id` )
) ENGINE = MYISAM ;

CREATE TABLE  `bedaplan`.`vehicle` (
`vehicle_id` BIGINT NOT NULL AUTO_INCREMENT ,
`vehicle_employee` VARCHAR( 25 ) NOT NULL ,
`vehicle_date` VARCHAR( 10 ) NOT NULL ,
`vehicle_free` VARCHAR( 256 ) NOT NULL ,
PRIMARY KEY (  `vehicle_id` )
) ENGINE = MYISAM ;

CREATE TABLE  `bedaplan`.`status` (
`status_id` BIGINT NOT NULL AUTO_INCREMENT ,
`status_wt` INT NOT NULL ,
`status_pt` INT NOT NULL ,
`status_me` INT NOT NULL ,
`status_free1` INT NOT NULL ,
`status_free2` INT NOT NULL ,
PRIMARY KEY (  `status_id` )
) ENGINE = MYISAM ;

CREATE USER 'bedaplan'@'localhost' IDENTIFIED BY  '***';

GRANT ALL PRIVILEGES ON * . * TO  'bedaplan'@'localhost' IDENTIFIED BY  '***' WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT ALL PRIVILEGES ON  `bedaplan` . * TO  'bedaplan'@'localhost';

