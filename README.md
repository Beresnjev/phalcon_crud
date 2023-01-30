# phalcon-tutorial

CREATE TABLE phalcon_tutorial.anekdots (
	id INT NOT NULL auto_increment,
    primary key(id),
    author VARCHAR(255) NOT NULL,
    text varchar(255) NOT NULL,
    rating INT NOT NULL,
    status VARCHAR(255) NOT NULL);
