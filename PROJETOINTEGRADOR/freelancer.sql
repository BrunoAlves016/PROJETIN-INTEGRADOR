CREATE DATABASE freelancer;
USE freelancer;


CREATE TABLE tb_usuarios (
  u_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    u_login VARCHAR(100) NOT NULL,
    u_email VARCHAR(100) NOT NULL,
    u_senha VARCHAR(100) NOT NULL,
    u_status CHAR(1) NOT NULL
);

CREATE TABLE tb_clientes(
    c_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    c_cpf VARCHAR(30) NULL,
    c_nome VARCHAR(100) NOT NULL,
    c_email VARCHAR(100),
    c_cel VARCHAR(15),
    c_status CHAR(1)
);

CREATE TABLE tb_freelancer(
    f_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    f_cpf VARCHAR(30) NULL,
    f_nome VARCHAR(100) NOT NULL,
    f_email VARCHAR(100),
    f_cel VARCHAR(15),
    f_status CHAR(1)
);