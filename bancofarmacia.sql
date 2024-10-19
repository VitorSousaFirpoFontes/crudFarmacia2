
CREATE DATABASE farmacia;


USE farmacia;

CREATE TABLE medicamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    quantidade DECIMAL(10, 2) NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    validade DATE NOT NULL
);
ALTER TABLE medicamentos MODIFY quantidade INT NOT NULL;


CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL

);
INSERT INTO usuarios (username, password) VALUES ('admin', '1234');
