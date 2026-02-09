create database message_validation;
use message_validation;


CREATE TABLE User(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50)
);

CREATE TABLE Chat(
    id INT PRIMARY AUTO_INCREMENT,
    id_user1 INT,
    id_user2 INT,
    est_lu BOOLEAN,
    FOREIGN KEY (id_user1, id_user2) REFERENCES User(id) ADD CONSTRAINT c_idUser 
);