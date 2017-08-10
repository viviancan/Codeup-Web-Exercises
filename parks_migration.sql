USE parks_db;

DROP TABLE IF EXISTS parksInfo;

CREATE TABLE parksInfo (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	name VARCHAR(250),
	Location VARCHAR(250),
	date_established DATE,
	area FLOAT(14, 2),
	PRIMARY KEY (id)

);