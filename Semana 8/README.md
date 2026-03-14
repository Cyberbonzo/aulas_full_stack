# Semana 8: Sistema de Cadastro de Produtos

## Objetivo

Criar um **mini projeto completo** com formulário de cadastro de produtos, implementando:
- ✅ Formulário HTML (GET/POST)
- ✅ Validação PHP
- ✅ Segurança (trim, htmlspecialchars)
- ✅ Redirecionamento (header)
- ✅ Sessões ($_SESSION)

## Estrutura do Projeto

```
Semana 8/
├── index.php              # 📋 Formulário (SOLUÇÃO PRONTA)
├── index_desafio.php      # 🎯 Formulário (PARA VOCÊ PREENCHER)
├── processar.php          # ⚙️ Processamento (SOLUÇÃO PRONTA)
├── processar_desafio.php  # 🎯 Processamento (PARA VOCÊ PREENCHER)
├── sucesso.php            # ✅ Confirmação (SOLUÇÃO PRONTA)
├── limpar_sessao.php      # 🔄 Limpeza (SOLUÇÃO PRONTA)
└── README.md              # 📖 Este arquivo
```

## Fluxo da Aplicação

```
1. Usuário acessa index.php (ou index_desafio.php)
                    ↓
2. Preenche o nome do produto
                    ↓
3. Clica em "Cadastrar Produto"
                    ↓
4. Formulário envia dados para processar.php via POST/GET
                    ↓
5. processar.php valida e processa
                    ↓
   ❌ SE ERRO:              ✅ SE SUCESSO:
   - Armazena erro          - Armazena em $_SESSION['produto']
   - Redireciona p/ index   - Redireciona p/ sucesso.php
                    ↓
6. sucesso.php exibe confirmação com o produto cadastrado
                    ↓
7. Usuário pode cadastrar novo ou limpar sessão
```

## Conceitos Principais

### 1. **Métodos GET e POST**

```php
// GET: dados na URL
http://localhost/semana8/processar.php?produto=Notebook

// POST: dados no corpo da requisição
// (não visível na URL)
```

**Comparação:**

| GET | POST |
|-----|------|
| Dados visíveis na URL | Dados ocultos |
| Limite de tamanho | Sem limite prático |
| Menos seguro | Mais seguro |
| Cacheable | Não cacheable |
| Para buscas | Para envio de dados |

### 2. **$_SERVER['REQUEST_METHOD']**

Identifica o tipo de requisição:

```php
<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formulário foi enviado via POST
    $dados = $_POST;
  } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Formulário foi enviado via GET
    $dados = $_GET;
  }
?>
```

### 3. **Validação de Entrada**

```php
<?php
  // Verificar se a variável existe
  if (!isset($dados['produto'])) {
    echo "Campo não enviado";
  }

  // Verificar se está vazio
  if (empty($dados['produto'])) {
    echo "Campo vazio";
  }

  // Verificar comprimento
  if (strlen($dados['produto']) < 3) {
    echo "Muito curto";
  }
?>
```

### 4. **Sanitização de Dados**

#### **trim()** - Remove espaços desnecessários

```php
<?php
  $produto = "   Notebook   ";
  $produto = trim($produto);
  echo $produto;  // "Notebook"
?>
```

#### **htmlspecialchars()** - Previne XSS (injeção de código)

```php
<?php
  // Entrada maliciosa do usuário:
  $entrada = "<script>alert('hack')</script>";

  // Sem htmlspecialchars:
  echo $entrada;  // ❌ Executa o script!

  // Com htmlspecialchars:
  $seguro = htmlspecialchars($entrada, ENT_QUOTES, 'UTF-8');
  echo $seguro;  // ✅ &lt;script&gt;alert('hack')&lt;/script&gt;
?>
```

### 5. **Redirecionamento com header()**

```php
<?php
  // Redirecionar para outra página
  header("Location: sucesso.php");
  exit();  // IMPORTANTE! Sempre usar exit() após header()
?>
```

**Por que usar exit()?**
- A função header() apenas marca para redirecionar
- O script continua executando se não tiver exit()
- exit() para a execução imediatamente

### 6. **Sessões ($_SESSION)**

Permite armazenar dados entre requisições:

```php
<?php
  session_start();  // Sempre no início

  // Armazenar
  $_SESSION['produto'] = "Notebook";

  // Acessar
  echo $_SESSION['produto'];  // "Notebook"

  // Limpar
  $_SESSION = [];
  // ou
  session_destroy();
?>
```

## Como Usar Este Projeto

### Opção 1: Ver a Solução Pronta

1. Copie todos os arquivos para `C:\xampp\htdocs\semana8`
2. Acesse: `http://localhost/semana8/index.php`
3. Teste o formulário
4. Leia o código comentado em `processar.php` e `sucesso.php`

### Opção 2: Completar o Desafio

1. Use apenas `index_desafio.php` e `processar_desafio.php`
2. Implemente o formulário HTML em `index_desafio.php`
3. Implemente a validação em `processar_desafio.php`
4. Teste enviando dados
5. Verifique se consegue se completar `sucesso.php`

## Desafio Prático

### ✅ Requisitos para Completar:

**Arquivo: `index_desafio.php`**
- [ ] Criar formulário com `<form>`
- [ ] Campo input com name="produto"
- [ ] Botão de envio (type="submit")
- [ ] Botão de limpeza (type="reset")
- [ ] Estilização CSS básica
- [ ] Enviar para processar_desafio.php via POST

**Arquivo: `processar_desafio.php`**
- [ ] Iniciar sessão
- [ ] Verificar REQUEST_METHOD
- [ ] Acessar $_POST['produto']
- [ ] Validar se existe e não está vazio
- [ ] Aplicar trim()
- [ ] Aplicar htmlspecialchars()
- [ ] Validar comprimento (3-100 caracteres)
- [ ] Armazenar em $_SESSION['produto']
- [ ] Redirecionar para sucesso.php
- [ ] Usar exit() após header()

## Testando GET vs POST

### Teste com GET:

```html
<!-- Mude no formulário: method="GET" -->
<form action="processar.php" method="GET">
```

Depois você verá na URL:
```
http://localhost/semana8/processar.php?produto=Notebook
```

### Teste com POST:

```html
<!-- Mude no formulário: method="POST" -->
<form action="processar.php" method="POST">
```

A URL permanece:
```
http://localhost/semana8/processar.php
```
(Dados ficam ocultos no corpo da requisição)

## Erros Comuns

### ❌ Erro: Header já enviado

```
Warning: Cannot modify header information
```

**Causa:** Espaços ou conteúdo HTML ANTES de `<?php`

**Solução:** session_start() e header() devem ser os primeiros comandos

```php
<?php
  session_start();
  // ... outros códigos ...
  header("Location: ...");
  exit();
?>
```

### ❌ Erro: Dados não aparecem em sucesso.php

**Causa:** Esqueceu de usar `session_start()`

**Solução:** Sempre começar com `session_start()` nos arquivos que usam `$_SESSION`

### ❌ Erro: Formulário envia para lugar errado

**Solução:** Verifique o atributo `action="processar.php"`

```html
<!-- ✅ Correto -->
<form action="processar.php" method="POST">

<!-- ❌ Errado -->
<form action="processar_desafio.php" method="POST">
```

## Segurança: Por Que htmlspecialchars()?

Sem proteção, um usuário malicioso poderia injetar código:

```
Entrada do usuário: <img src=x onerror="alert('hackeado')">
```

**Sem htmlspecialchars():**
```html
<!-- Exibe a imagem e executa o alerta -->
<div>
  <img src=x onerror="alert('hackeado')">
</div>
```

**Com htmlspecialchars():**
```html
<!-- Exibe o texto como texto, não como HTML -->
<div>
  &lt;img src=x onerror="alert('hackeado')"&gt;
</div>
```

## Referência Rápida

| Função | O que faz | Exemplo |
|--------|-----------|---------|
| `session_start()` | Inicia a sessão | `session_start();` |
| `isset()` | Verifica se existe | `isset($_POST['campo'])` |
| `empty()` | Verifica se está vazio | `empty($variavel)` |
| `trim()` | Remove espaços | `trim("  texto  ")` |
| `htmlspecialchars()` | Escapa caracteres perigosos | `htmlspecialchars("<script>")` |
| `strlen()` | Retorna tamanho | `strlen("Notebook")` |
| `header()` | Redireciona | `header("Location: ...")` |
| `exit()` | Para a execução | `exit();` |
| `date()` | Data/hora | `date('d/m/Y H:i:s')` |

## Próximos Passos (Semana 9+)

- [ ] Adicionar banco de dados (MySQL)
- [ ] Persistir dados no lugar de sessão
- [ ] Criar listagem de produtos
- [ ] Implementar edição e exclusão (CRUD)
- [ ] Adicionar autenticação de usuário

---

**Boa sorte! 🚀**
