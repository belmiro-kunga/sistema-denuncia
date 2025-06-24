-- Script para migrar do banco atual para o novo modelo corporativo

-- Garante que o banco de dados exista e o usa
CREATE DATABASE IF NOT EXISTS denuncia_corporativa;
USE denuncia_corporativa;

-- Copia dados dos usuários existentes
INSERT INTO Usuarios (UsuarioID, NomeUsuario, NomeCompleto, Email, Departamento, PerfilID, DataCriacao, UltimoLogin, Ativo, SenhaHash, Salt, MFAAtivo)
SELECT 
    UUID() as UsuarioID,
    email as NomeUsuario,
    name as NomeCompleto,
    email,
    'Administrador' as Departamento,
    1 as PerfilID, -- Administrador
    created_at as DataCriacao,
    updated_at as UltimoLogin,
    1 as Ativo,
    password as SenhaHash,
    SUBSTRING(MD5(RAND()) FROM 1 FOR 32) as Salt,
    0 as MFAAtivo
FROM denuncias.users;

-- Cria perfis básicos
INSERT INTO Perfis (NomePerfil, Descricao) VALUES
('Administrador', 'Administrador do sistema'),
('Investigador', 'Responsável por investigar denúncias'),
('Analista', 'Análise de denúncias e casos');

-- Cria permissões básicas
INSERT INTO Permissoes (NomePermissao, Descricao) VALUES
('ver_denuncias', 'Permissão para visualizar denúncias'),
('criar_denuncias', 'Permissão para criar denúncias'),
('editar_denuncias', 'Permissão para editar denúncias'),
('ver_casos', 'Permissão para visualizar casos'),
('editar_casos', 'Permissão para editar casos'),
('gerenciar_usuarios', 'Permissão para gerenciar usuários');

-- Associa permissões aos perfis
INSERT INTO PerfilPermissao (PerfilID, PermissaoID) VALUES
(1, 1), (1, 2), (1, 3), (1, 4), (1, 5), (1, 6), -- Administrador tem todas as permissões
(2, 1), (2, 2), (2, 3), (2, 4), (2, 5), -- Investigador tem acesso a denúncias e casos
(3, 1), (3, 2), (3, 4); -- Analista tem acesso básico

-- Cria categorias básicas de denúncia
INSERT INTO CategoriasDenuncia (NomeCategoria, Descricao) VALUES
('Assédio', 'Casos de assédio sexual, moral ou racial'),
('Corrupção', 'Casos de corrupção e fraude'),
('Conflito de Interesses', 'Conflitos de interesses e ética'),
('Irregularidades Financeiras', 'Problemas financeiros e contábeis');

-- Cria status básicos para casos
INSERT INTO StatusCaso (NomeStatus, Descricao, PermiteComunicacaoDenunciante, IsFinal) VALUES
('Aberto', 'Caso aberto e em investigação', 1, 0),
('Em Investigação', 'Investigação em andamento', 1, 0),
('Resolvido', 'Caso resolvido', 0, 1),
('Arquivado', 'Caso arquivado sem conclusão', 0, 1);

-- Cria um usuário administrador padrão
INSERT INTO Usuarios (UsuarioID, NomeUsuario, NomeCompleto, Email, Departamento, PerfilID, DataCriacao, Ativo, SenhaHash, Salt, MFAAtivo)
VALUES (
    UUID(),
    'admin',
    'Administrador Sistema',
    'admin@denuncia.com',
    'Administrador',
    1,
    NOW(),
    1,
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', -- senha: password
    SUBSTRING(MD5(RAND()) FROM 1 FOR 32),
    0
);

-- Cria uma denúncia de teste
INSERT INTO Denuncias (DenunciaID, Titulo, Descricao, CategoriaID, DataHoraDenuncia, StatusInicial)
VALUES (
    UUID(),
    'Teste de Denúncia',
    'Esta é uma denúncia de teste para verificar o sistema',
    1,
    NOW(),
    'Recebida'
);

-- Cria um caso para a denúncia de teste
INSERT INTO Casos (CasoID, DenunciaID, TituloCaso, StatusCasoID, DataAbertura)
VALUES (
    UUID(),
    (SELECT DenunciaID FROM Denuncias ORDER BY DenunciaID DESC LIMIT 1),
    'Investigação - Teste de Denúncia',
    1,
    NOW()
);

-- Cria logs de auditoria iniciais
INSERT INTO LogsAuditoria (LogID, UsuarioID, TipoAcao, TabelaAfetada, DetalhesAcao)
VALUES
(UUID(), (SELECT UsuarioID FROM Usuarios ORDER BY UsuarioID DESC LIMIT 1), 'SYSTEM_INIT', 'USERS', 'Criação do usuário administrador'),
(UUID(), (SELECT UsuarioID FROM Usuarios ORDER BY UsuarioID DESC LIMIT 1), 'SYSTEM_INIT', 'DENUNCIAS', 'Criação de denúncia de teste'),
(UUID(), (SELECT UsuarioID FROM Usuarios ORDER BY UsuarioID DESC LIMIT 1), 'SYSTEM_INIT', 'CASOS', 'Criação de caso de teste');
