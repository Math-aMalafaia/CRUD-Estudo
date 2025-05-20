CREATE DATABASE sistema_clientes CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE sistema_clientes;


CREATE TABLE clientes (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	email VARCHAR(100) UNIQUE NOT NULL,
	telefone VARCHAR(20),
	endereco VARCHAR(200),
	data_nascimento DATE, 
	data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO clientes (nome, email, telefone, endereco, data_nascimento) VALUES
('Joao Silva', 'joao@email.com','(11) 9999-8888','Rua das Flores, 123', '1985-05-15'),
('Maria Oliveira','maria@email.com','(21) 9876-5432','Av. Paulista, 1000', '1990-08-22');