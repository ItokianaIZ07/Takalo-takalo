create table Image(
    idImage int primary key auto_increment,
    idObjet int not null,
    img varchar(255) not null
);

INSERT INTO Image (idObjet, img) VALUES
(1, 'images/hp_1.jpg'),
(1, 'images/hp_2.jpg'),

(2, 'images/macbook_1.jpg'),
(2, 'images/macbook_2.jpg'),

(3, 'images/vtt_1.jpg'),
(3, 'images/vtt_2.jpg'),

(4, 'images/s21_1.jpg'),
(4, 'images/s21_2.jpg'),

(5, 'images/iphone12_1.jpg'),
(5, 'images/iphone12_2.jpg');
