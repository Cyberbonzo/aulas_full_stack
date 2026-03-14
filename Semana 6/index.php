<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Semana 6 - Introdução ao PHP</title>
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
      padding: 20px;
    }

    .container {
      max-width: 1100px;
      margin: 0 auto;
      background: white;
      border-radius: 10px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
      padding: 40px;
    }

    header {
      text-align: center;
      margin-bottom: 40px;
      border-bottom: 3px solid #667eea;
      padding-bottom: 20px;
    }

    h1 {
      color: #333;
      font-size: 2.5em;
      margin-bottom: 10px;
    }

    h2 {
      color: #667eea;
      margin-top: 40px;
      margin-bottom: 20px;
      font-size: 1.8em;
      border-left: 5px solid #667eea;
      padding-left: 15px;
    }

    h3 {
      color: #555;
      margin-top: 25px;
      margin-bottom: 15px;
      font-size: 1.3em;
    }

    p {
      color: #555;
      line-height: 1.8;
      margin-bottom: 15px;
    }

    code {
      background: #f5f5f5;
      padding: 2px 6px;
      border-radius: 3px;
      font-family: 'Courier New', monospace;
      color: #d63384;
    }

    pre {
      background: #1e1e1e;
      color: #d4d4d4;
      padding: 15px;
      border-radius: 5px;
      overflow-x: auto;
      margin: 20px 0;
      line-height: 1.5;
      font-size: 0.85em;
    }

    pre code {
      background: none;
      color: inherit;
      padding: 0;
    }

    .exemplo {
      background: #e8f4f8;
      border-left: 5px solid #17a2b8;
      padding: 15px;
      margin: 20px 0;
      border-radius: 5px;
    }

    .destaque {
      background: #fff3cd;
      border-left: 5px solid #ffc107;
      padding: 15px;
      margin: 20px 0;
      border-radius: 5px;
    }

    .alerta {
      background: #f8d7da;
      border-left: 5px solid #dc3545;
      padding: 15px;
      margin: 20px 0;
      border-radius: 5px;
    }

    .exercicio {
      background: #f0f0f0;
      border-left: 5px solid #667eea;
      padding: 20px;
      margin: 30px 0;
      border-radius: 5px;
    }

    .output {
      background: #e8f4f8;
      border-radius: 5px;
      padding: 15px;
      margin-top: 15px;
      font-family: 'Courier New', monospace;
      color: #333;
      min-height: 50px;
    }

    .solucao {
      background: #d4edda;
      border-left: 5px solid #28a745;
      padding: 15px;
      margin-top: 15px;
      border-radius: 5px;
    }

    .tabela {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }

    .tabela thead {
      background: #667eea;
      color: white;
    }

    .tabela th, .tabela td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }

    .tabela tbody tr:nth-child(even) {
      background: #f9f9f9;
    }

    footer {
      text-align: center;
      margin-top: 50px;
      padding-top: 20px;
      border-top: 2px solid #f0f0f0;
      color: #999;
    }

    ul {
      margin-left: 20px;
    }

    li {
      margin: 8px 0;
    }

    button {
      background: #667eea;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1em;
      margin-top: 10px;
    }

    button:hover {
      background: #5568d3;
    }

    .oculto {
      display: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>🐘 Semana 6: Introdução ao PHP</h1>
      <p>Back-end, Variáveis, Estruturas de Controle e Arrays</p>
    </header>

    <!-- ============================================
         PARTE 1: MATERIAL TEÓRICO
         ============================================ -->

    <h2>📚 Parte 1: Material Teórico</h2>

    <!-- Natureza do PHP -->
    <h3>1. Natureza do PHP (Back-end e Server-side)</h3>

    <h4>🖥️ Linguagem de Servidor</h4>
    <p>
      <strong>PHP</strong> é uma linguagem de programação que roda no <strong>servidor</strong>,
      não no navegador do usuário como o JavaScript.
    </p>

    <p>
      <strong>Diferença importante:</strong>
    </p>
    <ul>
      <li>
        <strong>JavaScript:</strong> Roda no navegador (client-side) → o usuário pode ver o código
      </li>
      <li>
        <strong>PHP:</strong> Roda no servidor (server-side) → apenas o resultado final (HTML/CSS/JS) chega ao navegador
      </li>
    </ul>

    <div class="exemplo">
      <h4>Como funciona?</h4>
      <pre>
Usuário digita URL
        ↓
Navegador envia requisição ao servidor
        ↓
Servidor executa código PHP
        ↓
PHP gera HTML/CSS/JS
        ↓
Servidor envia resultado (apenas HTML) para o navegador
        ↓
Usuário vê o resultado final (nunca vê o código PHP!)
      </pre>
    </div>

    <h4>📋 Papel do PHP na Aplicação</h4>
    <ul>
      <li><strong>Regras de Negócio:</strong> Lógica da aplicação</li>
      <li><strong>Banco de Dados:</strong> Conexão e manipulação de dados</li>
      <li><strong>Segurança:</strong> Validação de dados, autenticação, proteção</li>
      <li><strong>Processamento:</strong> Cálculos, transformações de dados</li>
    </ul>

    <h4>⚙️ Ambiente Local (XAMPP)</h4>
    <p>
      Para executar arquivos <code>.php</code> localmente, <strong>é obrigatório</strong> usar o XAMPP
      com o servidor Apache rodando.
    </p>

    <div class="alerta">
      <strong>❌ ERRADO:</strong> Abrir <code>C:\arquivo.php</code> no navegador
      <br>
      <strong>✅ CORRETO:</strong> Usar <code>http://localhost/arquivo.php</code> (com Apache rodando)
    </div>

    <!-- Sintaxe Básica -->
    <h3>2. Sintaxe Básica e Variáveis</h3>

    <h4>🏷️ Tags PHP</h4>
    <p>
      Todo código PHP deve estar entre as tags de abertura e fechamento:
    </p>
    <pre><code>&lt;?php
  // Seu código PHP aqui
?&gt;</code></pre>

    <h4>💾 Variáveis</h4>
    <p>
      Uma variável armazena um valor na memória. Em PHP:
    </p>
    <ul>
      <li>✅ Sempre começam com o símbolo <code>$</code> (cifrão)</li>
      <li>✅ São <strong>dinamicamente tipadas</strong> (o tipo é definido pelo valor atribuído)</li>
      <li>✅ Não precisa declarar o tipo previamente</li>
    </ul>

    <pre><code>&lt;?php
  $nome = "Cliente 1";        // string
  $idade = 25;                // integer
  $altura = 1.75;             // float
  $ativo = true;              // boolean
  $valor = null;              // null
?&gt;</code></pre>

    <h4>📤 Saída de Dados (echo)</h4>
    <p>
      O comando <code>echo</code> imprime texto ou conteúdo HTML na tela:
    </p>
    <pre><code>&lt;?php
  $nome = "Cliente 1";
  echo $nome;
  echo "&lt;p&gt;Olá, mundo!&lt;/p&gt;";
?&gt;</code></pre>

    <h4>⛓️ Concatenação de Strings</h4>
    <p>
      Use o <strong>ponto (.)</strong> para unir strings e variáveis:
    </p>
    <pre><code>&lt;?php
  $nome = "Cliente 1";
  $idade = 25;

  echo "Olá, " . $nome . "! Você tem " . $idade . " anos.";
  // Resultado: Olá, Cliente 1! Você tem 25 anos.
?&gt;</code></pre>

    <h4>💬 Aspas Duplas vs Simples</h4>
    <p>
      <strong>Aspas Duplas (""):</strong> Permitem interpolação (reconhecem variáveis):
    </p>
    <pre><code>&lt;?php
  $nome = "Cliente 1";
  echo "Olá, $nome!";  // ✅ Funciona - exibe: Olá, Cliente 1!
?&gt;</code></pre>

    <p>
      <strong>Aspas Simples (''):</strong> Tratam tudo como texto literal:
    </p>
    <pre><code>&lt;?php
  $nome = "Cliente 1";
  echo 'Olá, $nome!';  // ❌ Exibe: Olá, $nome! (literal)
?&gt;</code></pre>

    <!-- Depuração -->
    <h3>3. Depuração (Debug)</h3>

    <h4>🔍 var_dump()</h4>
    <p>
      Mostra <strong>todos os detalhes</strong> de uma variável: tipo, tamanho, conteúdo.
    </p>
    <pre><code>&lt;?php
  $idade = 25;
  var_dump($idade);
  // Resultado: int(25)

  $nome = "Cliente 1";
  var_dump($nome);
  // Resultado: string(9) "Cliente 1"
?&gt;</code></pre>

    <h4>📋 print_r()</h4>
    <p>
      Função específica para visualizar arrays de forma legível e estruturada:
    </p>
    <pre><code>&lt;?php
  $usuario = [
    'nome' => 'Cliente 1',
    'idade' => 30,
    'email' => 'cliente1@email.com'
  ];

  print_r($usuario);
?&gt;</code></pre>

    <!-- Estruturas de Controle -->
    <h3>4. Estruturas de Controle</h3>

    <h4>🔀 Condicionais (If/Else)</h4>
    <pre><code>&lt;?php
  $idade = 20;

  if ($idade >= 18) {
    echo "Maior de idade";
  } else {
    echo "Menor de idade";
  }
?&gt;</code></pre>

    <h4>🔁 Loops (While e For)</h4>
    <pre><code>&lt;?php
  // Loop For
  for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
  }

  // Loop While
  $contador = 1;
  while ($contador <= 5) {
    echo $contador . " ";
    $contador++;
  }
?&gt;</code></pre>

    <h4>🎯 Foreach (Forma Moderna)</h4>
    <p>
      <strong>foreach</strong> é a forma mais moderna e recomendada para percorrer listas.
      Não precisa controlar índices ou contadores manuais.
    </p>

    <pre><code>&lt;?php
  // Array indexado
  $frutas = ["Maçã", "Banana", "Laranja"];
  foreach ($frutas as $fruta) {
    echo $fruta . "&lt;br&gt;";
  }

  // Array associativo
  $pessoa = ['nome' => 'Cliente 1', 'idade' => 30];
  foreach ($pessoa as $chave => $valor) {
    echo $chave . ": " . $valor . "&lt;br&gt;";
  }
?&gt;</code></pre>

    <!-- Arrays -->
    <h3>5. Arrays (Vetores)</h3>

    <h4>📍 Arrays Indexados</h4>
    <p>
      Listas simples com índices numéricos que começam em <strong>zero</strong>:
    </p>
    <pre><code>&lt;?php
  $paises = ["Brasil", "Portugal", "Angola"];

  echo $paises[0];  // Brasil
  echo $paises[1];  // Portugal
  echo $paises[2];  // Angola
?&gt;</code></pre>

    <h4>🔑 Arrays Associativos</h4>
    <p>
      Utilizam pares de <strong>chave e valor</strong>. Fundamentais para lidar
      com registros de banco de dados:
    </p>
    <pre><code>&lt;?php
  $usuario = [
    'nome' => 'Cliente 1',
    'idade' => 30,
    'email' => 'cliente1@email.com'
  ];

  echo $usuario['nome'];   // Cliente 1
  echo $usuario['idade'];  // 30
?&gt;</code></pre>

    <h4>📚 Arrays Multidimensionais</h4>
    <p>
      Arrays de arrays - como uma lista contendo vários usuários,
      cada um com seus próprios dados:
    </p>
    <pre><code>&lt;?php
  $usuarios = [
    ['id' => 1, 'nome' => 'Cliente 1'],
    ['id' => 2, 'nome' => 'Cliente 2'],
    ['id' => 3, 'nome' => 'Cliente 3']
  ];

  echo $usuarios[0]['nome'];  // Cliente 1

  foreach ($usuarios as $u) {
    echo $u['nome'] . "&lt;br&gt;";
  }
?&gt;</code></pre>

    <!-- ============================================
         PARTE 2: EXERCÍCIOS
         ============================================ -->

    <h2>💪 Parte 2: Exercícios (Preencha as Lacunas)</h2>

    <!-- EXERCÍCIO 1 -->
    <section class="exercicio">
      <h3>1. Saudação: Variáveis e Concatenação</h3>
      <p>
        <strong>Objetivo:</strong> Criar variáveis para nome e idade,
        depois concatenar em uma frase.
      </p>
      <p>
        <strong>Instrução:</strong> Declare as variáveis $nome e $idade
        com valores de sua escolha, depois exiba uma mensagem como:
        "Olá, [nome]! Você tem [idade] anos."
      </p>

      <div class="output">
        <strong>Resultado esperado:</strong><br><br>
        <?php
          // ========================================
          // INSIRA SEU CÓDIGO AQUI
          // ========================================


        ?>
      </div>

      <button onclick="toggleSolucao('s1')">Ver Solução</button>
      <div id="s1" class="solucao oculto">
        <pre><code>&lt;?php
  $nome = "Cliente 1";
  $idade = 25;
  echo "Olá, " . $nome . "! Você tem " . $idade . " anos.";
  // Ou: echo "Olá, $nome! Você tem $idade anos.";
?&gt;</code></pre>
      </div>
    </section>

    <!-- EXERCÍCIO 2 -->
    <section class="exercicio">
      <h3>2. Operações Matemáticas</h3>

      <h4>a) Soma de dois números:</h4>
      <p>Some dois números (ex: 10 + 20) e exiba o resultado.</p>

      <div class="output">
        <strong>Resultado esperado:</strong><br><br>
        <?php
          // ========================================
          // INSIRA SEU CÓDIGO AQUI
          // ========================================


        ?>
      </div>

      <h4>b) Área do Retângulo:</h4>
      <p>Calcule a área (largura × altura) e exiba a fórmula com o resultado.</p>

      <div class="output">
        <strong>Resultado esperado:</strong><br><br>
        <?php
          // ========================================
          // INSIRA SEU CÓDIGO AQUI
          // ========================================


        ?>
      </div>

      <button onclick="toggleSolucao('s2')">Ver Solução</button>
      <div id="s2" class="solucao oculto">
        <pre><code>&lt;?php
  // a) Soma
  $num1 = 10;
  $num2 = 20;
  $soma = $num1 + $num2;
  echo "A soma de $num1 + $num2 = $soma";

  // b) Área
  $largura = 5;
  $altura = 3;
  $area = $largura * $altura;
  echo "Retângulo: $largura × $altura = $area";
?&gt;</code></pre>
      </div>
    </section>

    <!-- EXERCÍCIO 3 -->
    <section class="exercicio">
      <h3>3. Condicionais: If/Else</h3>

      <h4>a) Verificar Maioridade:</h4>
      <p>Verifique se uma idade é maior ou igual a 18.
      Exiba "Maior de idade" ou "Menor de idade".</p>

      <div class="output">
        <strong>Resultado esperado:</strong><br><br>
        <?php
          // ========================================
          // INSIRA SEU CÓDIGO AQUI
          // ========================================


        ?>
      </div>

      <h4>b) Número Positivo, Negativo ou Zero:</h4>
      <p>Verifique se um número é positivo, negativo ou zero.</p>

      <div class="output">
        <strong>Resultado esperado:</strong><br><br>
        <?php
          // ========================================
          // INSIRA SEU CÓDIGO AQUI
          // ========================================


        ?>
      </div>

      <h4>c) Aprovação do Aluno:</h4>
      <p>Verifique se a nota (ex: 7.5) é >= 6.
      Exiba "Aprovado" ou "Reprovado".</p>

      <div class="output">
        <strong>Resultado esperado:</strong><br><br>
        <?php
          // ========================================
          // INSIRA SEU CÓDIGO AQUI
          // ========================================


        ?>
      </div>

      <button onclick="toggleSolucao('s3')">Ver Solução</button>
      <div id="s3" class="solucao oculto">
        <pre><code>&lt;?php
  // a) Maioridade
  $idade = 20;
  if ($idade >= 18) {
    echo "Maior de idade";
  } else {
    echo "Menor de idade";
  }

  // b) Positivo/Negativo/Zero
  $numero = 5;
  if ($numero > 0) {
    echo "Positivo";
  } elseif ($numero < 0) {
    echo "Negativo";
  } else {
    echo "Zero";
  }

  // c) Aprovação
  $nota = 7.5;
  if ($nota >= 6) {
    echo "Aprovado";
  } else {
    echo "Reprovado";
  }
?&gt;</code></pre>
      </div>
    </section>

    <!-- EXERCÍCIO 4 -->
    <section class="exercicio">
      <h3>4. Estruturas de Repetição: Loops</h3>

      <h4>a) Contagem Simples (1 a 10):</h4>
      <p>Exiba os números de 1 a 10 (use for loop).</p>

      <div class="output">
        <strong>Resultado esperado:</strong><br><br>
        <?php
          // ========================================
          // INSIRA SEU CÓDIGO AQUI
          // ========================================


        ?>
      </div>

      <h4>b) Tabuada do 5:</h4>
      <p>Exiba a tabuada do 5 (5 × 1 = 5, 5 × 2 = 10, ... até 5 × 10).</p>

      <div class="output">
        <strong>Resultado esperado:</strong><br><br>
        <?php
          // ========================================
          // INSIRA SEU CÓDIGO AQUI
          // ========================================


        ?>
      </div>

      <h4>c) Soma de 1 a 100:</h4>
      <p>Calcule a soma de todos os números de 1 a 100 usando um loop.</p>

      <div class="output">
        <strong>Resultado esperado:</strong><br><br>
        <?php
          // ========================================
          // INSIRA SEU CÓDIGO AQUI
          // ========================================


        ?>
      </div>

      <button onclick="toggleSolucao('s4')">Ver Solução</button>
      <div id="s4" class="solucao oculto">
        <pre><code>&lt;?php
  // a) Contagem 1 a 10
  for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
  }

  // b) Tabuada do 5
  for ($i = 1; $i <= 10; $i++) {
    echo "5 × $i = " . (5 * $i) . "&lt;br&gt;";
  }

  // c) Soma de 1 a 100
  $soma = 0;
  for ($i = 1; $i <= 100; $i++) {
    $soma += $i;
  }
  echo "Soma de 1 a 100 = $soma";
?&gt;</code></pre>
      </div>
    </section>

    <!-- EXERCÍCIO 5 -->
    <section class="exercicio">
      <h3>5. Arrays: Índices e Associativos</h3>

      <h4>a) Array de Nomes (Indexados):</h4>
      <p>Crie um array com 3-4 nomes de países e exiba cada um em uma linha.
      Use foreach.</p>

      <div class="output">
        <strong>Resultado esperado:</strong><br><br>
        <?php
          // ========================================
          // INSIRA SEU CÓDIGO AQUI
          // ========================================


        ?>
      </div>

      <h4>b) Array Associativo:</h4>
      <p>Crie um array associativo com dados de um usuário (nome, idade, cidade)
      e exiba no formato: "Nome: [valor], Idade: [valor], Cidade: [valor]".</p>

      <div class="output">
        <strong>Resultado esperado:</strong><br><br>
        <?php
          // ========================================
          // INSIRA SEU CÓDIGO AQUI
          // ========================================


        ?>
      </div>

      <button onclick="toggleSolucao('s5')">Ver Solução</button>
      <div id="s5" class="solucao oculto">
        <pre><code>&lt;?php
  // a) Array de Nomes
  $paises = ["Brasil", "Portugal", "Angola", "Moçambique"];
  foreach ($paises as $pais) {
    echo $pais . "&lt;br&gt;";
  }

  // b) Array Associativo
  $usuario = [
    "nome" => "Cliente 1",
    "idade" => 30,
    "cidade" => "São Paulo"
  ];
  echo "Nome: " . $usuario["nome"] . ", ";
  echo "Idade: " . $usuario["idade"] . ", ";
  echo "Cidade: " . $usuario["cidade"];
?&gt;</code></pre>
      </div>
    </section>

    <!-- EXERCÍCIO 6 -->
    <section class="exercicio">
      <h3>6. Desafios Avançados</h3>

      <h4>a) Números Pares (1 a 20):</h4>
      <p>Exiba apenas os números pares entre 1 e 20 usando o operador % (resto de divisão).</p>

      <div class="output">
        <strong>Resultado esperado:</strong><br><br>
        <?php
          // ========================================
          // INSIRA SEU CÓDIGO AQUI
          // ========================================


        ?>
      </div>

      <h4>b) Média de Notas e Status do Aluno:</h4>
      <p>Crie um array com 4 notas. Calcule a média e exiba se o aluno foi
      "Aprovado" (≥ 7), "Recuperação" (4-7) ou "Reprovado" (< 4).
      Use array_sum() e count().</p>

      <div class="output">
        <strong>Resultado esperado:</strong><br><br>
        <?php
          // ========================================
          // INSIRA SEU CÓDIGO AQUI
          // ========================================


        ?>
      </div>

      <button onclick="toggleSolucao('s6')">Ver Solução</button>
      <div id="s6" class="solucao oculto">
        <pre><code>&lt;?php
  // a) Números Pares
  for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 == 0) {
      echo $i . " ";
    }
  }

  // b) Média de Notas
  $notas = [8.0, 7.5, 6.0, 8.5];
  $media = array_sum($notas) / count($notas);

  echo "Notas: ";
  foreach ($notas as $nota) {
    echo $nota . " ";
  }
  echo "&lt;br&gt;";
  echo "Média: " . round($media, 2) . "&lt;br&gt;";

  if ($media >= 7) {
    echo "Status: Aprovado";
  } elseif ($media >= 4) {
    echo "Status: Recuperação";
  } else {
    echo "Status: Reprovado";
  }
?&gt;</code></pre>
      </div>
    </section>

    <!-- ============================================
         PARTE 3: SOLUÇÕES PRONTAS
         ============================================ -->

    <h2>✅ Parte 3: Soluções Prontas (Referência)</h2>

    <section class="exercicio">
      <h3>Solução Completa com Todos os Exercícios</h3>

      <button onclick="toggleSolucao('codigo-completo')">Ver Código Completo</button>
      <div id="codigo-completo" class="solucao oculto">
        <pre><code>&lt;?php
  echo "&lt;h4&gt;1. Saudação&lt;/h4&gt;";
  $nome = "Cliente 1";
  $idade = 25;
  echo "Olá, $nome! Você tem $idade anos.&lt;br&gt;&lt;br&gt;";

  echo "&lt;h4&gt;2. Operações Matemáticas&lt;/h4&gt;";
  $num1 = 10;
  $num2 = 20;
  $soma = $num1 + $num2;
  echo "Soma: $num1 + $num2 = $soma&lt;br&gt;";

  $largura = 5;
  $altura = 3;
  $area = $largura * $altura;
  echo "Área: $largura × $altura = $area&lt;br&gt;&lt;br&gt;";

  echo "&lt;h4&gt;3. Condicionais&lt;/h4&gt;";
  $idade_teste = 20;
  if ($idade_teste >= 18) {
    echo "Maior de idade&lt;br&gt;";
  } else {
    echo "Menor de idade&lt;br&gt;";
  }

  $numero_teste = 5;
  if ($numero_teste > 0) {
    echo "Positivo&lt;br&gt;";
  } elseif ($numero_teste < 0) {
    echo "Negativo&lt;br&gt;";
  } else {
    echo "Zero&lt;br&gt;";
  }

  $nota_teste = 7.5;
  if ($nota_teste >= 6) {
    echo "Aprovado&lt;br&gt;&lt;br&gt;";
  } else {
    echo "Reprovado&lt;br&gt;&lt;br&gt;";
  }

  echo "&lt;h4&gt;4. Loops&lt;/h4&gt;";
  echo "Contagem: ";
  for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
  }
  echo "&lt;br&gt;&lt;br&gt;";

  echo "Tabuada do 5:&lt;br&gt;";
  for ($i = 1; $i <= 10; $i++) {
    echo "5 × $i = " . (5 * $i) . "&lt;br&gt;";
  }
  echo "&lt;br&gt;";

  echo "Soma 1 a 100: ";
  $soma_total = 0;
  for ($i = 1; $i <= 100; $i++) {
    $soma_total += $i;
  }
  echo $soma_total . "&lt;br&gt;&lt;br&gt;";

  echo "&lt;h4&gt;5. Arrays&lt;/h4&gt;";
  $paises = ["Brasil", "Portugal", "Angola"];
  echo "Países:&lt;br&gt;";
  foreach ($paises as $pais) {
    echo "- " . $pais . "&lt;br&gt;";
  }
  echo "&lt;br&gt;";

  $usuario = [
    "nome" => "Cliente 1",
    "idade" => 30,
    "cidade" => "São Paulo"
  ];
  echo "Usuário: ";
  echo "Nome: " . $usuario["nome"] . ", ";
  echo "Idade: " . $usuario["idade"] . ", ";
  echo "Cidade: " . $usuario["cidade"] . "&lt;br&gt;&lt;br&gt;";

  echo "&lt;h4&gt;6. Desafios&lt;/h4&gt;";
  echo "Pares (1-20): ";
  for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 == 0) {
      echo $i . " ";
    }
  }
  echo "&lt;br&gt;&lt;br&gt;";

  $notas = [8.0, 7.5, 6.0, 8.5];
  $media = array_sum($notas) / count($notas);
  echo "Média de Notas: " . round($media, 2) . "&lt;br&gt;";
  if ($media >= 7) {
    echo "Status: Aprovado";
  } elseif ($media >= 4) {
    echo "Status: Recuperação";
  } else {
    echo "Status: Reprovado";
  }
?&gt;</code></pre>
      </div>
    </section>

    <section class="exercicio">
      <h3>Resultado Esperado Completo</h3>
      <div class="output">
        <?php
          echo "<h4>1. Saudação</h4>";
          $nome = "Cliente 1";
          $idade = 25;
          echo "Olá, $nome! Você tem $idade anos.<br><br>";

          echo "<h4>2. Operações Matemáticas</h4>";
          $num1 = 10;
          $num2 = 20;
          $soma = $num1 + $num2;
          echo "Soma: $num1 + $num2 = $soma<br>";

          $largura = 5;
          $altura = 3;
          $area = $largura * $altura;
          echo "Área: $largura × $altura = $area<br><br>";

          echo "<h4>3. Condicionais</h4>";
          $idade_teste = 20;
          if ($idade_teste >= 18) {
            echo "Maior de idade<br>";
          }

          $numero_teste = 5;
          if ($numero_teste > 0) {
            echo "Positivo<br>";
          }

          $nota_teste = 7.5;
          if ($nota_teste >= 6) {
            echo "Aprovado<br><br>";
          }

          echo "<h4>4. Loops</h4>";
          echo "Contagem: ";
          for ($i = 1; $i <= 10; $i++) {
            echo $i . " ";
          }
          echo "<br><br>";

          echo "Tabuada do 5:<br>";
          for ($i = 1; $i <= 10; $i++) {
            echo "5 × $i = " . (5 * $i) . "<br>";
          }
          echo "<br>";

          echo "Soma 1 a 100: ";
          $soma_total = 0;
          for ($i = 1; $i <= 100; $i++) {
            $soma_total += $i;
          }
          echo $soma_total . "<br><br>";

          echo "<h4>5. Arrays</h4>";
          $paises = ["Brasil", "Portugal", "Angola"];
          echo "Países:<br>";
          foreach ($paises as $pais) {
            echo "- " . $pais . "<br>";
          }
          echo "<br>";

          $usuario = [
            "nome" => "Cliente 1",
            "idade" => 30,
            "cidade" => "São Paulo"
          ];
          echo "Usuário: ";
          echo "Nome: " . $usuario["nome"] . ", ";
          echo "Idade: " . $usuario["idade"] . ", ";
          echo "Cidade: " . $usuario["cidade"] . "<br><br>";

          echo "<h4>6. Desafios</h4>";
          echo "Pares (1-20): ";
          for ($i = 1; $i <= 20; $i++) {
            if ($i % 2 == 0) {
              echo $i . " ";
            }
          }
          echo "<br><br>";

          $notas = [8.0, 7.5, 6.0, 8.5];
          $media = array_sum($notas) / count($notas);
          echo "Média de Notas: " . round($media, 2) . "<br>";
          if ($media >= 7) {
            echo "Status: Aprovado";
          } elseif ($media >= 4) {
            echo "Status: Recuperação";
          } else {
            echo "Status: Reprovado";
          }
        ?>
      </div>
    </section>

    <footer>
      <p>Semana 6: Introdução ao PHP</p>
      <p>Feito com HTML, CSS e PHP</p>
    </footer>

  </div>

  <script>
    function toggleSolucao(id) {
      const elemento = document.getElementById(id);
      if (elemento.classList.contains('oculto')) {
        elemento.classList.remove('oculto');
      } else {
        elemento.classList.add('oculto');
      }
    }
  </script>

</body>
</html>
