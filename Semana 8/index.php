<?php
  /*
    ========================================
    Semana 8: Sistema de Cadastro de Produtos
    ========================================

    OBJETIVO:
    Criar um formulário que permite o usuário cadastrar um produto.
    O sistema valida os dados, processa via PHP e exibe uma confirmação.

    TECNOLOGIAS USADAS:
    - HTML: Estrutura do formulário
    - CSS: Estilização
    - PHP: Processamento de dados GET/POST
    - $_SERVER['REQUEST_METHOD']: Identifica tipo de requisição
    - trim() e htmlspecialchars(): Segurança
    - header(): Redirecionamento
  */
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Semana 8 - Cadastro de Produtos</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
    }

    header {
      text-align: center;
      margin-bottom: 30px;
    }

    h1 {
      color: #333;
      font-size: 2em;
      margin-bottom: 10px;
    }

    p {
      color: #666;
      line-height: 1.6;
      margin-bottom: 10px;
    }

    .form-group {
      margin-bottom: 25px;
    }

    label {
      display: block;
      color: #333;
      font-weight: 600;
      margin-bottom: 8px;
      font-size: 1.1em;
    }

    input[type="text"] {
      width: 100%;
      padding: 12px;
      border: 2px solid #ddd;
      border-radius: 5px;
      font-size: 1em;
      transition: border-color 0.3s;
    }

    input[type="text"]:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
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

    .btn-submit {
      background: #667eea;
      color: white;
    }

    .btn-submit:hover {
      background: #5568d3;
    }

    .btn-reset {
      background: #ddd;
      color: #333;
    }

    .btn-reset:hover {
      background: #ccc;
    }

    .info {
      background: #e8f4f8;
      border-left: 5px solid #17a2b8;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 5px;
      color: #555;
    }

    .info strong {
      color: #333;
    }

    .examples {
      background: #f9f9f9;
      border: 1px solid #ddd;
      padding: 15px;
      margin-top: 20px;
      border-radius: 5px;
    }

    .examples h3 {
      color: #667eea;
      margin-bottom: 10px;
      font-size: 1em;
    }

    .examples p {
      margin-bottom: 5px;
      font-size: 0.95em;
    }

    .examples code {
      background: #f0f0f0;
      padding: 2px 5px;
      border-radius: 3px;
      font-family: 'Courier New', monospace;
      color: #d63384;
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
    <header>
      <h1>🏪 Cadastro de Produtos</h1>
      <p>Bem-vindo! Preencha as informações do produto abaixo.</p>
    </header>

    <!--
      ========================================
      FORMULÁRIO HTML
      ========================================

      EXPLICAÇÃO:
      - form: elemento que envolve os campos de input
      - action="processar.php": arquivo PHP que vai receber e processar os dados
      - method="POST": usa POST para enviar dados (mais seguro que GET para dados sensíveis)
      - Você pode trocar para method="GET" para testar ambos os métodos

      POST vs GET:
      - POST: dados no corpo da requisição (não visível na URL)
      - GET: dados na URL (visível, inseguro para dados sensíveis)
    -->

    <form action="processar.php" method="POST">
      <!--
        ========================================
        CAMPO: Nome do Produto
        ========================================

        - type="text": campo de texto simples
        - name="produto": nome da variável que será recebida em PHP via $_POST['produto']
        - placeholder: texto de dica que desaparece quando o usuário começa a digitar
        - required: validação HTML5 (navegador não permite enviar vazio)
      -->
      <div class="form-group">
        <label for="produto">Nome do Produto *</label>
        <input
          type="text"
          id="produto"
          name="produto"
          placeholder="Ex: Notebook, Teclado, Monitor..."
          required
        />
      </div>

      <!--
        ========================================
        BOTÕES
        ========================================

        - button type="submit": envia o formulário para o action (processar.php)
        - button type="reset": limpa todos os campos do formulário
      -->
      <div class="button-group">
        <button type="submit" class="btn-submit">📤 Cadastrar Produto</button>
        <button type="reset" class="btn-reset">🔄 Limpar</button>
      </div>
    </form>

    <!-- Informações sobre o sistema -->
    <div class="info">
      <strong>ℹ️ Como funciona:</strong>
      <p>
        1. Você preenche o nome do produto acima
      </p>
      <p>
        2. Clica em "Cadastrar Produto"
      </p>
      <p>
        3. O PHP valida e processa os dados
      </p>
      <p>
        4. Você é redirecionado para uma página de confirmação
      </p>
    </div>

    <!-- Exemplos de produtos -->
    <div class="examples">
      <h3>💡 Exemplos de Produtos:</h3>
      <p><code>Notebook Dell Inspiron</code></p>
      <p><code>Teclado Mecânico RGB</code></p>
      <p><code>Monitor LG 24 polegadas</code></p>
      <p><code>Mouse sem fio</code></p>
      <p><code>Webcam HD 1080p</code></p>
    </div>

    <footer>
      <p>Semana 8: Sistema de Cadastro de Produtos</p>
      <p>Métodos: GET e POST | Validação: trim() e htmlspecialchars()</p>
    </footer>
  </div>
</body>
</html>
