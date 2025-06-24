-- Script para criar a estrutura do banco de dados
CREATE DATABASE IF NOT EXISTS denuncia_corporativa;
USE denuncia_corporativa;

-- Desativa as verificações de chaves estrangeiras temporariamente
SET FOREIGN_KEY_CHECKS = 0;

-- Cria todas as tabelas necessárias
CREATE TABLE IF NOT EXISTS Perfis (
    PerfilID INT PRIMARY KEY AUTO_INCREMENT,
    NomePerfil VARCHAR(100) UNIQUE NOT NULL,
    Descricao TEXT
);

CREATE TABLE IF NOT EXISTS Permissoes (
    PermissaoID INT PRIMARY KEY AUTO_INCREMENT,
    NomePermissao VARCHAR(100) UNIQUE NOT NULL,
    Descricao TEXT
);

CREATE TABLE IF NOT EXISTS PerfilPermissao (
    PerfilID INT NOT NULL,
    PermissaoID INT NOT NULL,
    PRIMARY KEY (PerfilID, PermissaoID),
    FOREIGN KEY (PerfilID) REFERENCES Perfis(PerfilID) ON DELETE CASCADE,
    FOREIGN KEY (PermissaoID) REFERENCES Permissoes(PermissaoID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Usuarios (
    UsuarioID VARCHAR(36) PRIMARY KEY NOT NULL,
    NomeUsuario VARCHAR(100) UNIQUE NOT NULL,
    NomeCompleto VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    Departamento VARCHAR(100),
    PerfilID INT NOT NULL,
    DataCriacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    UltimoLogin DATETIME,
    Ativo BOOLEAN DEFAULT TRUE,
    SenhaHash VARCHAR(255) NOT NULL,
    Salt VARCHAR(255) NOT NULL,
    MFAAtivo BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (PerfilID) REFERENCES Perfis(PerfilID)
);

CREATE TABLE IF NOT EXISTS CategoriasDenuncia (
    CategoriaID INT PRIMARY KEY AUTO_INCREMENT,
    NomeCategoria VARCHAR(100) UNIQUE NOT NULL,
    Descricao TEXT,
    RegrasRoteamentoPadrao JSON
);

CREATE TABLE IF NOT EXISTS StatusCaso (
    StatusID INT PRIMARY KEY AUTO_INCREMENT,
    NomeStatus VARCHAR(100) UNIQUE NOT NULL,
    Descricao TEXT,
    PermiteComunicacaoDenunciante BOOLEAN DEFAULT FALSE,
    IsFinal BOOLEAN DEFAULT FALSE
);

CREATE TABLE IF NOT EXISTS Denuncias (
    DenunciaID VARCHAR(36) PRIMARY KEY NOT NULL,
    DenuncianteID VARCHAR(36),
    Titulo VARCHAR(255) NOT NULL,
    Descricao BLOB NOT NULL,
    CategoriaID INT NOT NULL,
    DataHoraDenuncia DATETIME DEFAULT CURRENT_TIMESTAMP,
    StatusInicial VARCHAR(50) NOT NULL,
    FOREIGN KEY (CategoriaID) REFERENCES CategoriasDenuncia(CategoriaID)
);

CREATE TABLE IF NOT EXISTS Casos (
    CasoID VARCHAR(36) PRIMARY KEY NOT NULL,
    DenunciaID VARCHAR(36) NOT NULL,
    TituloCaso VARCHAR(255) NOT NULL,
    DescricaoCaso BLOB,
    StatusCasoID INT NOT NULL,
    DataAbertura DATETIME DEFAULT CURRENT_TIMESTAMP,
    DataFechamento DATETIME,
    ResponsavelID VARCHAR(36),
    DataUltimaAtualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Resolucao BLOB,
    ImpactoEstimado VARCHAR(255),
    RiscoAtual VARCHAR(50),
    FOREIGN KEY (DenunciaID) REFERENCES Denuncias(DenunciaID),
    FOREIGN KEY (StatusCasoID) REFERENCES StatusCaso(StatusID),
    FOREIGN KEY (ResponsavelID) REFERENCES Usuarios(UsuarioID)
);

CREATE TABLE IF NOT EXISTS LogsAuditoria (
    LogID VARCHAR(36) PRIMARY KEY NOT NULL,
    UsuarioID VARCHAR(36),
    DataHoraAcao DATETIME DEFAULT CURRENT_TIMESTAMP,
    TipoAcao VARCHAR(100) NOT NULL,
    TabelaAfetada VARCHAR(100) NOT NULL,
    RegistroAfetadoID VARCHAR(36),
    DetalhesAcao TEXT,
    FOREIGN KEY (UsuarioID) REFERENCES Usuarios(UsuarioID)
);

-- Reativa as verificações de chaves estrangeiras
SET FOREIGN_KEY_CHECKS = 1;
