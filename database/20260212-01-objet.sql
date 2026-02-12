create table Objet(
    idObjet int primary key auto_increment,
    idCategorie int not null,
    idUser int not null, 
    nomObjet varchar(255) not null, 
    description text, 
    prix_estimatif int not null
);

INSERT INTO Category(name) VALUES 
("Ordinateur"),
("Vélo"),
("Téléphone");





INSERT INTO Objet (idCategorie, idUser, nomObjet, description, prix_estimatif) VALUES
(1, 1, 'Ordinateur portable HP', 'Ordinateur en bon état, 8Go RAM, SSD 256Go', 1200000),

(1, 2, 'MacBook Pro 2019', 'Très bon état, batterie neuve', 2500000),

(2, 1, 'Vélo tout terrain', 'VTT presque neuf, utilisé 3 mois', 600000),

(3, 3, 'Téléphone Samsung Galaxy S21', 'Écran intact, fonctionne parfaitement', 900000),

(3, 2, 'iPhone 12', '64Go, état correct', 1100000);