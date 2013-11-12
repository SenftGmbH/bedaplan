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
`wt_sort` DATE NOT NULL ,
PRIMARY KEY (  `worktimeid` )
) ENGINE = MYISAM ;

CREATE TABLE  `bedaplan`.`projecttime` (
`pt_id` BIGINT NOT NULL AUTO_INCREMENT ,
`pt_nr` BIGINT NOT NULL ,
`pt_employee` TEXT NOT NULL ,
`pt_start` TIMESTAMP NOT NULL ,
`pt_stop` TIMESTAMP NOT NULL ,
`pt_sort` DATE NOT NULL ,
PRIMARY KEY (  `pt_id` )
) ENGINE = MYISAM ;

CREATE TABLE  `bedaplan`.`project` (
`project_id` BIGINT NOT NULL AUTO_INCREMENT ,
`project_date` DATE NOT NULL ,
`project_nr` BIGINT NOT NULL ,
`project_description` TEXT NOT NULL ,
`project_employee` TEXT NOT NULL ,
`project_free1` TEXT NOT NULL ,
`project_free2` TEXT NOT NULL ,
`project_free3` TEXT NOT NULL ,
`project_free4` TEXT NOT NULL ,
`project_free5` TEXT NOT NULL ,
`project_free6` REAL NOT NULL ,
PRIMARY KEY (  `project_id` )
) ENGINE = MYISAM ;
