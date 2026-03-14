-- ============================================================
-- SEMANA 5: REPETIÇÃO DE ATIVIDADE PRÁTICA (CRUD)
-- Exercícios práticos com as tabelas: CLIENTES e PEDIDOS
-- ============================================================
-- Executar estes comandos em sequência para praticar:
-- - HeidiSQL, RAID ou SQL Lite Online
--
-- OBJETIVO: Fixar os comandos SQL de CRUD e transações
-- ============================================================


-- ============================================================
-- 1. CRIAÇÃO DE TABELAS (CREATE TABLE)
-- ============================================================

-- Criar tabela CLIENTES
CREATE TABLE clientes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE,
  telefone VARCHAR(15),
  data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Criar tabela PEDIDOS
CREATE TABLE pedidos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  cliente_id INT NOT NULL,
  descricao VARCHAR(255),
  valor DECIMAL(10, 2),
  status VARCHAR(50) DEFAULT 'Pendente',
  data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);


-- ============================================================
-- 2. INSERÇÃO DE DADOS (INSERT)
-- ============================================================

-- Inserir clientes
INSERT INTO clientes (nome, email, telefone) VALUES
('Cliente 1', 'cliente1@email.com', '11987654321'),
('Cliente 2', 'cliente2@email.com', '11912345678'),
('Cliente 3', 'cliente3@email.com', '11998765432'),
('Cliente 4', 'cliente4@email.com', '11987654310');

-- Inserir pedidos
INSERT INTO pedidos (cliente_id, descricao, valor) VALUES
(1, 'Notebook Dell', 3500.00),
(1, 'Mouse Logitech', 150.00),
(2, 'Teclado Mecânico', 450.00),
(3, 'Monitor LG 27"', 1200.00),
(2, 'Webcam HD', 250.00);


-- ============================================================
-- 3. CONSULTAS SIMPLES (SELECT)
-- ============================================================

-- Listar todos os clientes
SELECT * FROM clientes;

-- Listar todos os pedidos
SELECT * FROM pedidos;

-- Listar apenas nome e email dos clientes
SELECT nome, email FROM clientes;

-- Listar pedidos com valor maior que R$ 500
SELECT * FROM pedidos WHERE valor > 500;

-- Contar quantos clientes existem
SELECT COUNT(*) AS total_clientes FROM clientes;

-- Contar quantos pedidos cada cliente fez
SELECT cliente_id, COUNT(*) AS total_pedidos
FROM pedidos
GROUP BY cliente_id;


-- ============================================================
-- 4. JUNÇÕES (JOINS)
-- ============================================================

-- INNER JOIN: Listar clientes e seus pedidos
SELECT
  c.nome,
  c.email,
  p.descricao,
  p.valor
FROM clientes c
INNER JOIN pedidos p ON c.id = p.cliente_id;

-- LEFT JOIN: Listar todos os clientes e seus pedidos (mesmo sem pedidos)
SELECT
  c.nome,
  c.email,
  COUNT(p.id) AS total_pedidos,
  SUM(p.valor) AS valor_total
FROM clientes c
LEFT JOIN pedidos p ON c.id = p.cliente_id
GROUP BY c.id, c.nome, c.email;

-- Encontrar clientes que fizeram pedidos acima de R$ 1000
SELECT DISTINCT
  c.nome,
  c.email
FROM clientes c
INNER JOIN pedidos p ON c.id = p.cliente_id
WHERE p.valor > 1000;


-- ============================================================
-- 5. ATUALIZAÇÃO (UPDATE)
-- ============================================================

-- Atualizar email de um cliente
UPDATE clientes
SET email = 'cliente1.novo@email.com'
WHERE id = 1;

-- Atualizar status de um pedido
UPDATE pedidos
SET status = 'Entregue'
WHERE id = 1;

-- Atualizar múltiplos registros: marcar todos os pedidos do cliente 2 como 'Processando'
UPDATE pedidos
SET status = 'Processando'
WHERE cliente_id = 2;

-- Aumentar o valor de todos os pedidos em 10%
UPDATE pedidos
SET valor = valor * 1.10;


-- ============================================================
-- 6. REMOÇÃO (DELETE)
-- ============================================================

-- ⚠️ CUIDADO: Sempre use WHERE para não deletar tudo!

-- Deletar um pedido específico (exemplo: pedido ID 5)
DELETE FROM pedidos
WHERE id = 5;

-- Deletar todos os pedidos de um cliente (exemplo: cliente ID 3)
DELETE FROM pedidos
WHERE cliente_id = 3;

-- Para deletar um cliente, primeiro delete seus pedidos
DELETE FROM pedidos WHERE cliente_id = 4;
DELETE FROM clientes WHERE id = 4;


-- ============================================================
-- 7. ALTERAÇÃO DE ESTRUTURA (ALTER TABLE)
-- ============================================================

-- Adicionar coluna 'status' à tabela clientes (se ainda não existir)
ALTER TABLE clientes
ADD COLUMN status VARCHAR(50) DEFAULT 'Ativo';

-- Adicionar coluna 'observacoes' à tabela pedidos
ALTER TABLE pedidos
ADD COLUMN observacoes TEXT;

-- Modificar o tipo de dados de uma coluna
ALTER TABLE pedidos
MODIFY COLUMN descricao VARCHAR(500);


-- ============================================================
-- 8. TRANSAÇÕES (BEGIN, COMMIT, ROLLBACK)
-- ============================================================

-- Exemplo 1: Transação simples - pode ser desfeita
BEGIN;

  INSERT INTO clientes (nome, email, telefone)
  VALUES ('Cliente Teste', 'teste@email.com', '11999999999');

  INSERT INTO pedidos (cliente_id, descricao, valor)
  VALUES (1, 'Teste Produto', 100.00);

-- Descomente para CONFIRMAR:
-- COMMIT;

-- Descomente para DESFAZER:
-- ROLLBACK;


-- Exemplo 2: Transação com atualização
BEGIN;

  -- Transferir pedido de um cliente para outro
  UPDATE pedidos SET cliente_id = 2 WHERE id = 2;

  -- Se tudo está OK:
  -- COMMIT;

  -- Se algo deu errado:
  -- ROLLBACK;


-- ============================================================
-- DICAS IMPORTANTES
-- ============================================================

-- 1. Sempre teste comandos DELETE e UPDATE em uma transação primeiro
-- 2. Use WHERE com cuidado - certifique-se do que vai afetar
-- 3. Para ver o que será afetado: faça um SELECT primeiro com o mesmo WHERE
-- 4. Chaves estrangeiras (FOREIGN KEY) protegem integridade referencial
-- 5. COMMIT grava as mudanças permanentemente
-- 6. ROLLBACK desfaz as mudanças (antes de COMMIT)

-- ============================================================
