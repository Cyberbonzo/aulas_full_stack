# Semana 5 - SQL e Banco de Dados

## 📚 Conteúdo

Essa semana você vai aprender e praticar **SQL** com foco em operações **CRUD** e **Transações**.

### Arquivos da Semana

1. **`index.html`** - Guia completo da semana (abra no navegador)
2. **`exercicio_crud_basico.sql`** - Exercícios práticos de CRUD
3. **`atividade_2_desafio_sql.sql`** - Desafios SQL mais complexos
4. **`style.css`** - Estilização da página HTML
5. **`script.js`** - Interatividade da página

---

## 🎯 Objetivos da Semana

- [ ] Criar tabelas com `CREATE TABLE`
- [ ] Inserir dados com `INSERT`
- [ ] Consultar com `SELECT` e `JOIN`
- [ ] Atualizar com `UPDATE`
- [ ] Remover com `DELETE`
- [ ] Alterar estrutura com `ALTER TABLE`
- [ ] Praticar transações (`BEGIN`, `COMMIT`, `ROLLBACK`)
- [ ] Completar Atividade 2 (Desafios)
- [ ] Iniciar trilhas Alura

---

## 🚀 Como Começar

### 1. Abra o Guia
```bash
# Abra index.html no seu navegador
```

### 2. Escolha uma Ferramenta SQL
- **Sem instalar nada:** [SQL Lite Online](https://www.sqliteonline.com)
- **Instalado (Windows):** HeidiSQL, RAID, MySQL Workbench

### 3. Copie e Execute os Exercícios

**Atividade 1 (Básica):**
- Abra `exercicio_crud_basico.sql`
- Copie os comandos para sua ferramenta SQL
- Execute em ordem
- Observe os resultados

**Atividade 2 (Desafios):**
- Abra `atividade_2_desafio_sql.sql`
- Siga os desafios numerados
- Tente resolver antes de ver a solução

---

## 📖 O que Você Vai Aprender

### CREATE TABLE
```sql
CREATE TABLE clientes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100),
  email VARCHAR(100)
);
```

### INSERT
```sql
INSERT INTO clientes (nome, email)
VALUES ('Cliente 1', 'cliente1@email.com');
```

### SELECT e JOINs
```sql
-- Simples
SELECT * FROM clientes;

-- Com condição
SELECT * FROM clientes WHERE id = 1;

-- Inner Join
SELECT c.nome, p.descricao
FROM clientes c
INNER JOIN pedidos p ON c.id = p.cliente_id;

-- Left Join (inclui todos os clientes mesmo sem pedidos)
SELECT c.nome, COUNT(p.id) as total_pedidos
FROM clientes c
LEFT JOIN pedidos p ON c.id = p.cliente_id
GROUP BY c.id;
```

### UPDATE
```sql
UPDATE clientes
SET email = 'novo@email.com'
WHERE id = 1;
```

### DELETE (com cuidado!)
```sql
DELETE FROM clientes
WHERE id = 1;
```

### ALTER TABLE
```sql
ALTER TABLE clientes
ADD COLUMN status VARCHAR(50);
```

### Transações (Segurança!)
```sql
BEGIN;
  -- seus comandos aqui
  UPDATE clientes SET email = 'novo@email.com' WHERE id = 1;
COMMIT;  -- Confirma as mudanças
-- ROLLBACK; -- Desfaz as mudanças (descomentar se errou)
```

---

## 💡 Dicas Importantes

✅ **Sempre teste um SELECT antes de UPDATE/DELETE**
```sql
-- Antes de deletar, veja o que vai ser deletado:
SELECT * FROM clientes WHERE id = 1;  -- Verificou?
DELETE FROM clientes WHERE id = 1;    -- Agora deleta
```

✅ **Use TRANSAÇÕES para praticar sem medo**
```sql
BEGIN;
  DELETE FROM clientes WHERE id = 1;  -- Testa aqui
  -- Se tiver confiança:
  COMMIT;
  -- Se não tiver:
  -- ROLLBACK;
```

✅ **JOINs são essenciais**
- Pratique INNER JOIN e LEFT JOIN várias vezes
- São os comandos mais usados no dia a dia

✅ **Modifique os dados e veja o resultado**
- Não tenha medo de "estragar"
- As transações salvam você

---

## 📚 Trilhas Alura Recomendadas

### Ordem Pedagógica (prática ANTES de teoria):

1. **Conhecendo SQL** ⭐
   - Conceitos fundamentais
   - Tempo: 2-3 horas

2. **Praticando SQL** ⭐⭐ (Você está aqui!)
   - Exercícios práticos
   - Tempo: 4-6 horas

3. **Modelagem de Banco de Dados** ⭐⭐⭐ (Depois)
   - Teoria de design
   - Normalização
   - Tempo: 3-4 horas

> **Recomendação:** Não pule a ordem! A prática antes da teoria pesada facilita muito o aprendizado.

---

## 🛠️ Ferramentas Sugeridas

### Gerenciadores de Banco Local
- **HeidiSQL** (Windows) - Interface limpa e intuitiva
- **RAID** - Alternativa ao HeidiSQL
- **MySQL Workbench** - Mais completo (maior curva de aprendizado)

### Online (sem instalar)
- **SQL Lite Online** ⭐ (Recomendado para começar)
- **Replit SQL** - Ambiente de programação completo
- **SQLFiddle** - Testes rápidos

---

## 📋 Tabelas Utilizadas

### Atividade 1: CLIENTES e PEDIDOS

**CLIENTES**
| id | nome | email | telefone | data_cadastro |
|---|---|---|---|---|
| 1 | Cliente 1 | cliente1@email.com | 11987654321 | 2024-03-14 |
| 2 | Cliente 2 | cliente2@email.com | 11912345678 | 2024-03-14 |

**PEDIDOS**
| id | cliente_id | descricao | valor | status | data_pedido |
|---|---|---|---|---|---|
| 1 | 1 | Notebook Dell | 3500.00 | Pendente | 2024-03-14 |
| 2 | 1 | Mouse Logitech | 150.00 | Pendente | 2024-03-14 |

### Atividade 2: PRODUTOS e ESTOQUE

**PRODUTOS**
| id | nome | categoria | preco | estoque |
|---|---|---|---|---|
| 1 | Monitor Dell 24" | Periféricos | 800.00 | 15 |
| 2 | Teclado Mecânico | Periféricos | 450.00 | 8 |

**ESTOQUE_MOVIMENTACAO**
| id | produto_id | tipo | quantidade | data_movimentacao |
|---|---|---|---|---|
| 1 | 1 | Entrada | 10 | 2024-03-14 |
| 2 | 2 | Saída | 2 | 2024-03-14 |

---

## 🎓 Checklist de Aprendizado

- [ ] Entendo CREATE TABLE
- [ ] Entendo INSERT
- [ ] Entendo SELECT básico
- [ ] Entendo WHERE
- [ ] Entendo INNER JOIN
- [ ] Entendo LEFT JOIN
- [ ] Entendo UPDATE
- [ ] Entendo DELETE
- [ ] Entendo ALTER TABLE
- [ ] Entendo transações (BEGIN/COMMIT/ROLLBACK)
- [ ] Completei Atividade 1
- [ ] Completei Atividade 2
- [ ] Iniciei trilhas Alura

---

## ❓ Próximas Semanas

- **Semana 6:** PHP Básico - Integrar SQL com PHP
- **Semana 7-8:** PHP Avançado - Funções, Métodos GET/POST, Formulários
- **Semana 9+:** Full Stack - Frontend + Backend + Banco de Dados

---

## 📞 Dúvidas?

- Consulte o arquivo `index.html` para guia completo
- Revise os comentários nos arquivos `.sql`
- Pratique com SQL Lite Online para experimentar
- Assista às trilhas Alura recomendadas

---

**Bom estudo! 🚀**
