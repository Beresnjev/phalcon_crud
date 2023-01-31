# phalcon_crud

CREATE DATABASE phalcon_crud;
CREATE TABLE phalcon_crud.anekdots ( id INT NOT NULL auto_increment, primary key(id), number varchar(255) NOT NULL, author VARCHAR(255) NOT NULL, text varchar(255) NOT NULL, rating INT NOT NULL, status VARCHAR(255) NOT NULL);
