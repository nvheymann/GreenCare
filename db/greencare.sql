SELECT 'START Skript' Status;
SET NAMES utf8;

SELECT 'Datenbank anlegen' Status;
DROP DATABASE IF EXISTS GreenCare;
CREATE DATABASE GreenCare
 CHARACTER SET utf8
 COLLATE utf8_german2_ci
;

USE GreenCare;


SELECT 'Tabelle Pflanze anlegen' Status;
CREATE TABLE pflanze (
	pflanze_id           INT Auto_increment,
	pflanze              VARCHAR(255),
	topf 						INT,
   PRIMARY KEY(pflanze_id)
);

SELECT 'Tabelle Status anlegen' Status;
CREATE TABLE status (
   status             INT,
	zeitstempel         DATETIME,
   pflanze_id         INT,
   FOREIGN KEY(pflanze_id) REFERENCES pflanze(pflanze_id)
   );
   
INSERT INTO pflanze(pflanze_id,pflanze,topf) VALUES (1,"kaktus",0);
INSERT INTO pflanze(pflanze_id,pflanze,topf) VALUES (2,"orchidee",0);
INSERT INTO pflanze(pflanze_id,pflanze,topf) VALUES (3,"efeu",0);

