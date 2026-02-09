create database Takalotakalo;
use Takalotakalo;

CREATE TABLE Admin(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(150),
    password VARCHAR(280)
);

INSERT INTO Admin(email, password) VALUES ("Admin@gmail.com", "$2y$10$FE4BlSoSpASR2fYdkzcBUe2vu3mfNyfMJ8/Xmxjhbksd3BhupRS4O");
-- password = 12345678