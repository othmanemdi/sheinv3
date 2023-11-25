mysql -u root -p
show databases;
create database apple5;
drop database apple5;
show databases;
create database apple5;
use apple5;
show tables;

CREATE TABLE stagiaires (
    id int NOT NULL AUTO_INCREMENT,
    prenom varchar(255),
    nom varchar(255),
    date_naissance date DEFAULT CURRENT_DATE(),
    genre varchar(255),
    PRIMARY KEY (id)
);

show tables;
show columns from stagiaires;


INSERT INTO table_name (column1, column2, column3, ...)
VALUES (value1, value2, value3, ...);



INSERT INTO stagiaires 
    (id, prenom, nom, date_naissance, genre)
VALUES 
    (NULL,'houssame','ed-dourouz','2001-01-28','homme');

INSERT INTO stagiaires 
    (id, prenom, nom, date_naissance, genre)
VALUES 
    (NULL,'ayman','mezoura','2008-03-26','homme'),
    (NULL,'rihab','et-tibary','2006-03-12','femme'),
    (NULL,'mossaab','triouech','2006-12-18','homme'),
    (NULL,'youssra','elkhabbaz','1995-01-01','femme')
    ;

SELECT * FROM stagiaires;

SELECT count(id) AS total_stagiaires FROM stagiaires;
SELECT min(id) AS total_stagiaires FROM stagiaires;
SELECT max(id) AS total_stagiaires FROM stagiaires;

SELECT * FROM stagiaires LIMIT 3;

SELECT * FROM stagiaires ORDER BY id DESC;

SELECT * FROM stagiaires ORDER BY id DESC LIMIT 3;

UPDATE stagiaires SET prenom = 'yousra' WHERE id = 5;

SELECT * FROM stagiaires;

SELECT * FROM stagiaires WHERE id = 5 LIMIT 1;

DELETE FROM stagiaires WHERE id = in (7,8);

SELECT * FROM stagiaires;

INSERT INTO stagiaires 
    (id, prenom, nom, date_naissance, genre)
VALUES 
    (NULL,'yousra','elkhabbaz','1995-01-01','femme')
    ;

SELECT * FROM stagiaires;


DELETE from tablename WHERE id BETWEEN 1 AND 254 AND id<>10;





CREATE TABLE categories (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255),
    icon varchar(255),
    PRIMARY KEY (id)
);

INSERT INTO categories 
    (id, name, icon)
VALUES 
    (NULL,'iphone','phone');
