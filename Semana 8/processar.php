<?php
  /*
    ========================================
    processar.php
    ========================================

    OBJETIVO:
    Receber dados do formulário (GET ou POST), validar e processar.
    Se sucesso → redireciona para sucesso.php
    Se erro → redireciona para index.php com mensagem de erro

    CONCEITOS IMPORTANTES:
    1. $_SERVER['REQUEST_METHOD']: Identifica se é GET ou POST
    2. $_GET: Dados enviados via GET (URL)
    3. $_POST: Dados enviados via POST (corpo da requisição)
    4. trim(): Remove espaços em branco antes e depois
    5. htmlspecialchars(): Converte caracteres especiais em entidades HTML
    6. header(): Redireciona para outra página
    7. session_start() / $_SESSION: Armazena dados entre páginas
  */

  // Iniciar a sessão (permite armazenar dados entre páginas)
  session_start();

  /*
    ========================================
    PASSO 1: IDENTIFICAR O TIPO DE REQUISIÇÃO
    ========================================

    $_SERVER['REQUEST_METHOD'] retorna:
    - "GET" se o formulário foi enviado via método GET
    - "POST" se o formulário foi enviado via método POST
  */

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dados foram enviados via POST
    $dados = $_POST;
    $metodo = 'POST';
  } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Dados foram enviados via GET
    $dados = $_GET;
    $metodo = 'GET';
  } else {
    // Nenhum método reconhecido (erro)
    header("Location: index.php?erro=metodo_invalido");
    exit();
  }

  /*
    ========================================
    PASSO 2: VALIDAR SE O CAMPO EXISTE
    ========================================

    isset(): Verifica se uma variável existe
    empty(): Verifica se uma variável está vazia
  */

  if (!isset($dados['produto']) || empty($dados['produto'])) {
    // Produto não foi enviado ou está vazio
    $_SESSION['erro'] = 'Por favor, preencha o nome do produto!';
    header("Location: index.php");
    exit();
  }

  /*
    ========================================
    PASSO 3: SANITIZAR OS DADOS
    ========================================

    trim(): Remove espaços em branco no início e fim
    Exemplo: "  Notebook  " → "Notebook"

    htmlspecialchars(): Converte caracteres especiais em entidades HTML
    Isso previne XSS (injeção de código JavaScript)
    Exemplo: "<script>alert('hack')</script>" → "&lt;script&gt;alert('hack')&lt;/script&gt;"
  */

  $produto = trim($dados['produto']);
  $produto = htmlspecialchars($produto, ENT_QUOTES, 'UTF-8');

  /*
    ========================================
    PASSO 4: VALIDAR O CONTEÚDO
    ========================================

    Depois de remover espaços, verificar novamente se não ficou vazio.
  */

  if (empty($produto)) {
    // Depois de trim(), ficou vazio (era só espaços)
    $_SESSION['erro'] = 'O nome do produto não pode conter apenas espaços!';
    header("Location: index.php");
    exit();
  }

  /*
    ========================================
    PASSO 5: VALIDAÇÃO DE COMPRIMENTO
    ========================================

    strlen(): Retorna o número de caracteres da string
  */

  if (strlen($produto) < 3) {
    $_SESSION['erro'] = 'O nome do produto deve ter pelo menos 3 caracteres!';
    header("Location: index.php");
    exit();
  }

  if (strlen($produto) > 100) {
    $_SESSION['erro'] = 'O nome do produto não pode ter mais de 100 caracteres!';
    header("Location: index.php");
    exit();
  }

  /*
    ========================================
    PASSO 6: ARMAZENAR DADOS NA SESSÃO
    ========================================

    $_SESSION: Array superglobal que mantém dados entre requisições
    Permite que a página sucesso.php acesse o produto cadastrado
  */

  $_SESSION['produto'] = $produto;
  $_SESSION['metodo'] = $metodo;
  $_SESSION['data_cadastro'] = date('d/m/Y H:i:s');

  /*
    ========================================
    PASSO 7: REDIRECIONAR PARA PÁGINA DE SUCESSO
    ========================================

    header("Location: sucesso.php"): Redireciona para sucesso.php
    exit(): Encerra a execução do script (importante!)
  */

  header("Location: sucesso.php");
  exit();
?>
