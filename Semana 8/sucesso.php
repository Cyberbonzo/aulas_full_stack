<?php
  /*
    ========================================
    sucesso.php
    ========================================

    OBJETIVO:
    Página de confirmação que exibe os dados do produto cadastrado.
    Recebe dados da $_SESSION que foi populada em processar.php.

    FLUXO:
    1. Inicia a sessão
    2. Verifica se o produto foi cadastrado (existe em $_SESSION)
    3. Exibe mensagem de sucesso com o nome do produto
    4. Oferece opção de voltar para cadastrar novo produto
  */

  // Iniciar a sessão para acessar os dados armazenados
  session_start();

  /*
    ========================================
    VERIFICAR SE VEIO DO CADASTRO
    ========================================

    Se alguém acessar sucesso.php diretamente (sem passar por processar.php),
    a sessão não terá o 'produto' e deve redirecionar para index.php.
  */

  if (!isset($_SESSION['produto'])) {
    // Não há produto na sessão, redirecionar para o formulário
    header("Location: index.php");
    exit();
  }

  // Armazenar em variáveis para facilitar o acesso
  $produto = $_SESSION['produto'];
  $metodo = $_SESSION['metodo'] ?? 'Desconhecido';
  $data = $_SESSION['data_cadastro'] ?? 'Não registrada';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro Realizado - Semana 8</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .container {
      background: white;
      border-radius: 10px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
      padding: 40px;
      max-width: 500px;
      width: 100%;
      text-align: center;
    }

    .checkmark {
      width: 80px;
      height: 80px;
      margin: 0 auto 20px;
      background: #28a745;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 50px;
    }

    h1 {
      color: #28a745;
      font-size: 2em;
      margin-bottom: 10px;
    }

    .message {
      color: #666;
      font-size: 1.1em;
      margin-bottom: 30px;
      line-height: 1.6;
    }

    .product-info {
      background: #f0f8f0;
      border-left: 5px solid #28a745;
      padding: 20px;
      margin: 20px 0;
      border-radius: 5px;
      text-align: left;
    }

    .info-row {
      margin: 12px 0;
      font-size: 1em;
    }

    .info-label {
      color: #28a745;
      font-weight: 600;
    }

    .info-value {
      color: #333;
      margin-left: 10px;
    }

    .details {
      background: #e8f4e8;
      border: 1px solid #d4edda;
      padding: 15px;
      margin: 20px 0;
      border-radius: 5px;
      font-size: 0.95em;
    }

    .details h3 {
      color: #333;
      margin-bottom: 10px;
      font-size: 1em;
    }

    .details p {
      color: #666;
      margin: 5px 0;
    }

    .button-group {
      display: flex;
      gap: 10px;
      margin-top: 30px;
    }

    button {
      flex: 1;
      padding: 12px;
      border: none;
      border-radius: 5px;
      font-size: 1em;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
    }

    .btn-novo {
      background: #28a745;
      color: white;
    }

    .btn-novo:hover {
      background: #20c997;
    }

    .btn-listar {
      background: #ddd;
      color: #333;
    }

    .btn-listar:hover {
      background: #ccc;
    }

    footer {
      text-align: center;
      margin-top: 30px;
      padding-top: 20px;
      border-top: 1px solid #ddd;
      color: #999;
      font-size: 0.9em;
    }
  </style>
</head>
<body>
  <div class="container">
    <!--
      ========================================
      CONFIRMAÇÃO DE SUCESSO
      ========================================

      Exibe um ícone de sucesso (checkmark) e mensagem de confirmação.
    -->
    <div class="checkmark">✓</div>

    <h1>Cadastro Realizado com Sucesso!</h1>

    <p class="message">
      O produto foi cadastrado com sucesso no sistema.
      <br>
      Veja os detalhes abaixo.
    </p>

    <!--
      ========================================
      INFORMAÇÕES DO PRODUTO
      ========================================

      Exibe o nome do produto que foi cadastrado.
      O valor vem de $_SESSION['produto'] que foi definido em processar.php.
    -->
    <div class="product-info">
      <div class="info-row">
        <span class="info-label">📦 Produto:</span>
        <span class="info-value">
          <?php echo htmlspecialchars($produto); ?>
        </span>
      </div>

      <div class="info-row">
        <span class="info-label">📨 Método:</span>
        <span class="info-value">
          <?php echo htmlspecialchars($metodo); ?>
        </span>
      </div>

      <div class="info-row">
        <span class="info-label">📅 Data/Hora:</span>
        <span class="info-value">
          <?php echo htmlspecialchars($data); ?>
        </span>
      </div>
    </div>

    <!--
      ========================================
      EXPLICAÇÃO TÉCNICA
      ========================================

      Mostra o que aconteceu nos bastidores.
    -->
    <div class="details">
      <h3>⚙️ O que aconteceu?</h3>
      <p>
        ✅ Os dados foram validados em <code>processar.php</code>
      </p>
      <p>
        ✅ Espaços desnecessários foram removidos com <code>trim()</code>
      </p>
      <p>
        ✅ Caracteres perigosos foram neutralizados com <code>htmlspecialchars()</code>
      </p>
      <p>
        ✅ O produto foi armazenado na <code>$_SESSION</code>
      </p>
      <p>
        ✅ Você foi redirecionado com <code>header("Location: ...")</code>
      </p>
    </div>

    <!--
      ========================================
      BOTÕES DE AÇÃO
      ========================================

      - Novo Cadastro: Volta para index.php (limpa a sessão)
      - Listar Produtos: Mostraria uma lista (ainda não implementado)
    -->
    <div class="button-group">
      <button class="btn-novo" onclick="novosCadastro()">
        ➕ Novo Cadastro
      </button>
      <button class="btn-listar" onclick="limparSessao()">
        🔄 Limpar Sessão
      </button>
    </div>

    <footer>
      <p>Semana 8: Sistema de Cadastro de Produtos</p>
      <p>Redirecionamento | Validação | Segurança</p>
    </footer>
  </div>

  <!--
    ========================================
    JAVASCRIPT
    ========================================

    Funções auxiliares para navegação.
  -->
  <script>
    /*
      Redireciona para a página de cadastro (index.php)
      para que o usuário possa cadastrar outro produto.
    */
    function novosCadastro() {
      window.location.href = 'index.php';
    }

    /*
      Faz uma requisição para limpar a sessão e volta para index.php.
      (Você pode criar um arquivo limpar_sessao.php para isso)
    */
    function limparSessao() {
      window.location.href = 'limpar_sessao.php';
    }
  </script>
</body>
</html>
