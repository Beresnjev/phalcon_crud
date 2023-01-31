# Phalcon crud application

## Overview

___

Phalcon crud application is web application made with Phalcon. It represents the website "**FunnyAnekdots.ee**".
This simple app allows to *create* "**anekdot**", *read* them, *change* its text and eventually *delete* them.
For safe measures the recycle bin feature is implemented.
After deleting "**anekdot**" goes to bin section, where you can restore it or completely remove it.
Moreover, web application has the rating system. Anyone can give assessment to every "**anekdot**".

## Installation

___

* Install **Xampp** (php version 8.1.12)
* Install **Phalcon** (version 5.1.4)
* Add project directory to xampp/htdocs
* Create database and table using this query:
```
CREATE DATABASE phalcon_crud;
CREATE TABLE phalcon_crud.anekdots (
id INT NOT NULL auto_increment,
primary key(id),
number varchar(255) NOT NULL,
author VARCHAR(255) NOT NULL,
text varchar(255) NOT NULL,
rating INT NOT NULL,
status VARCHAR(255) NOT NULL);
```
* Set new parameters for your database in **public/index.php**

And you are good to go!

## Usage

___

### Main page

Main page demonstrates table of already written "**anekdots**", their authors, number and rating.
Through this page we can manipulate them.

***Thumb up*** symbol will increase rating of "**anekdot**" amd ***thumb down*** symbol will decrease it.

***Delete*** button will send "**anekdot**" to bin section

***Pencil*** symbol will open change section where it possible to change the text of "**anekdot**".

### Post page

From main page we can access the "**Post section**", where you are able to write funny "**anekdot**" and return to main page.

### Bin page

From main page we can access the "**Bin section**", where you can manipulate deleted "**anekdots**".

Bin page demonstrates table of deleted from main page "**anekdots**" and allows us to manipulate them.

***Revive*** button will restore "**anekdot**" to main page.

***Red cross*** symbol will completely remove it from application.