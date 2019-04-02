CREATE TABLE ft_table(
	id integer NOT NULL AUTO_INCREMENT,
	login varchar(8) DEFAULT 'toto' NOT NULL,
	`group` enum('staff','student','other') NOT NULL,
	creation_date date NOT NULL,
	PRIMARY KEY (id)
);
