-- Criando o banco de dados
drop database if exists denuncias_db;
create database denuncias_db character set utf8mb4 collate utf8mb4_unicode_ci;

-- Selecionando o banco de dados
use denuncias_db;

-- Criando tabelas necessárias
CREATE TABLE users (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY users_email_unique (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE denuncias (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    titulo varchar(255) NOT NULL,
    descricao text NOT NULL,
    user_id bigint unsigned NOT NULL,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id),
    KEY denuncias_user_id_foreign (user_id),
    CONSTRAINT denuncias_user_id_foreign FOREIGN KEY (user_id) REFERENCES users (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
