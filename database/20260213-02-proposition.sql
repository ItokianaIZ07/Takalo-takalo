CREATE TABLE Proposition(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idObject1 INT NOT NULL,
    idObject2 INT NOT NULL,
    Status VARCHAR(200) DEFAULT 'en_attente' -- en_attente, accepte, refuse, termine
);


-- creation de la view pour info proposition

CREATE VIEW InfoProposition AS
SELECT 
    p.id,
    p.idObject1,
    p.idObject2,
    p.Status,
    -- Infos objet 1 (proposé)
    o1.nomObjet as nomObjet1,
    o1.description as description1,
    o1.prix_estimatif as prix1,
    o1.idUser as idUser1,
    u1.username as username1,
    u1.email as email1,
    -- Infos objet 2 (demandé)
    o2.nomObjet as nomObjet2,
    o2.description as description2,
    o2.prix_estimatif as prix2,
    o2.idUser as idUser2,
    u2.username as username2,
    u2.email as email2,
    -- Catégories
    c1.name as categorie1,
    c2.name as categorie2
FROM Proposition p
JOIN Objet o1 ON p.idObject1 = o1.idObjet
JOIN Objet o2 ON p.idObject2 = o2.idObjet
JOIN users u1 ON o1.idUser = u1.id
JOIN users u2 ON o2.idUser = u2.id
JOIN Category c1 ON o1.idCategorie = c1.id
JOIN Category c2 ON o2.idCategorie = c2.id;