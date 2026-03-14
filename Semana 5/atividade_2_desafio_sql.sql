-- ============================================================
-- SEMANA 5: ATIVIDADE 2 - DESAFIO SQL
-- Exercícios práticos com desafios mais complexos
-- ============================================================
-- OBJETIVO: Reforçar aprendizado com exercícios práticos diferentes
-- ============================================================


-- ============================================================
-- DESAFIO 1: Criar sistema de PRODUTOS e ESTOQUE
-- ============================================================

-- Criar tabela PRODUTOS
CREATE TABLE produtos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  categoria VARCHAR(50),
  preco DECIMAL(10, 2) NOT NULL,
  estoque INT DEFAULT 0,
  data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Criar tabela ESTOQUE (histórico de movimentações)
CREATE TABLE estoque_movimentacao (
  id INT PRIMARY KEY AUTO_INCREMENT,
  produto_id INT NOT NULL,
  tipo VARCHAR(20), -- 'Entrada' ou 'Saída'
  quantidade INT,
  data_movimentacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (produto_id) REFERENCES produtos(id)
);

-- Inserir produtos
INSERT INTO produtos (nome, categoria, preco, estoque) VALUES
('Monitor Dell 24"', 'Periféricos', 800.00, 15),
('Teclado Mecânico RGB', 'Periféricos', 450.00, 8),
('Mouse Gamer', 'Periféricos', 200.00, 25),
('Headset Wireless', 'Audio', 350.00, 12),
('Webcam Full HD', 'Periféricos', 280.00, 5);

-- Inserir movimentações de estoque
INSERT INTO estoque_movimentacao (produto_id, tipo, quantidade) VALUES
(1, 'Entrada', 10),
(2, 'Saída', 2),
(3, 'Entrada', 20),
(1, 'Saída', 5),
(4, 'Entrada', 12);


-- ============================================================
-- DESAFIO 2: Consultas com CASE e Lógica Condicional
-- ============================================================

-- Listrar produtos com classificação de preço
SELECT
  nome,
  preco,
  CASE
    WHEN preco < 300 THEN 'Econômico'
    WHEN preco BETWEEN 300 AND 700 THEN 'Intermediário'
    ELSE 'Premium'
  END AS faixa_preco
FROM produtos
ORDER BY preco;

-- Verificar produtos com estoque baixo (menos de 10 unidades)
SELECT
  nome,
  estoque,
  CASE
    WHEN estoque < 5 THEN 'Crítico - REABASTECER!'
    WHEN estoque < 10 THEN 'Baixo'
    ELSE 'Normal'
  END AS nivel_estoque
FROM produtos;


-- ============================================================
-- DESAFIO 3: Análise de Vendas com Agregação
-- ============================================================

-- Contar quantas saídas de estoque (vendas) cada produto teve
SELECT
  p.nome,
  p.categoria,
  COUNT(em.id) AS total_vendas,
  SUM(em.quantidade) AS total_quantidade_vendida
FROM produtos p
LEFT JOIN estoque_movimentacao em ON p.id = em.produto_id AND em.tipo = 'Saída'
GROUP BY p.id, p.nome, p.categoria
ORDER BY total_quantidade_vendida DESC;

-- Valor total em estoque (quantidade * preço)
SELECT
  nome,
  preco,
  estoque,
  (preco * estoque) AS valor_total_estoque
FROM produtos
ORDER BY valor_total_estoque DESC;


-- ============================================================
-- DESAFIO 4: Atualização Baseada em Condições
-- ============================================================

-- Aplicar desconto de 10% nos produtos da categoria 'Audio'
UPDATE produtos
SET preco = preco * 0.90
WHERE categoria = 'Audio';

-- Reduzir estoque de produtos 'Premium' (preço > 600)
UPDATE produtos
SET estoque = estoque - 1
WHERE preco > 600 AND estoque > 0;


-- ============================================================
-- DESAFIO 5: Deletar com Cuidado (Transação)
-- ============================================================

BEGIN;

-- Simular remoção de um produto e suas movimentações
DELETE FROM estoque_movimentacao WHERE produto_id = 5;
DELETE FROM produtos WHERE id = 5;

-- Verificar o resultado antes de COMMIT ou ROLLBACK
SELECT * FROM produtos;
SELECT * FROM estoque_movimentacao;

-- COMMIT; -- Descomente para confirmar
-- ROLLBACK; -- Descomente para desfazer


-- ============================================================
-- DESAFIO 6: Junções Complexas (3 tabelas)
-- ============================================================

-- Relacionar CLIENTES, PEDIDOS e PRODUTOS (se tiver montado o banco dessa forma)
-- Este é um exemplo conceitual:

-- SELECT
--   c.nome AS cliente,
--   p.descricao AS pedido,
--   pr.nome AS produto,
--   pr.preco
-- FROM clientes c
-- INNER JOIN pedidos p ON c.id = p.cliente_id
-- INNER JOIN produtos pr ON p.descricao LIKE CONCAT('%', pr.nome, '%');


-- ============================================================
-- DESAFIO 7: Window Functions (Recursos Avançados)
-- ============================================================

-- Ranking de produtos por preço (se o banco suporta Window Functions)
-- Exemplo para MySQL 8.0+:

-- SELECT
--   nome,
--   preco,
--   ROW_NUMBER() OVER (ORDER BY preco DESC) AS ranking
-- FROM produtos;


-- ============================================================
-- DESAFIO 8: Criar View (Visão)
-- ============================================================

-- Criar uma visão para relatório de estoque rápido
CREATE VIEW relatorio_estoque AS
SELECT
  nome,
  categoria,
  preco,
  estoque,
  (preco * estoque) AS valor_total
FROM produtos
WHERE estoque > 0
ORDER BY estoque ASC;

-- Usar a view
SELECT * FROM relatorio_estoque;


-- ============================================================
-- DESAFIO 9: Transação com Múltiplas Operações
-- ============================================================

BEGIN;

  -- Simular venda: reduz estoque e registra movimento
  UPDATE produtos SET estoque = estoque - 1 WHERE id = 1;
  INSERT INTO estoque_movimentacao (produto_id, tipo, quantidade) VALUES (1, 'Saída', 1);

  -- Se tudo correr bem:
  -- COMMIT;
  -- Se der erro:
  -- ROLLBACK;


-- ============================================================
-- GABARITO: Respostas Esperadas
-- ============================================================

-- 1. Quantos produtos existem no banco?
SELECT COUNT(*) AS total_produtos FROM produtos;

-- 2. Qual é o produto mais caro?
SELECT nome, preco FROM produtos ORDER BY preco DESC LIMIT 1;

-- 3. Qual categoria tem mais produtos?
SELECT categoria, COUNT(*) AS total FROM produtos GROUP BY categoria ORDER BY total DESC;

-- 4. Qual é o estoque total de toda a loja?
SELECT SUM(estoque) AS estoque_total FROM produtos;

-- 5. Qual produto teve mais movimentações (entradas + saídas)?
SELECT
  p.nome,
  COUNT(em.id) AS total_movimentacoes
FROM produtos p
LEFT JOIN estoque_movimentacao em ON p.id = em.produto_id
GROUP BY p.id, p.nome
ORDER BY total_movimentacoes DESC;

-- ============================================================
