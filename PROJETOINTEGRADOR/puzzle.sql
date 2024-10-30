CREATE DATABASE puzzle;
USE puzzle;


CREATE TABLE tb_usuarios (
  u_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    u_login VARCHAR(100) NOT NULL,
    u_email VARCHAR(100) NOT NULL,
    u_senha VARCHAR(100) NOT NULL,
    u_status CHAR(1) NOT NULL
);
