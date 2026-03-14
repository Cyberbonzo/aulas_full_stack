<?php
/**
 * Semana 6: Soluções Referência
 *
 * Este arquivo contém as soluções dos exercícios da Semana 6.
 * Use como referência para corrigir as atividades dos alunos.
 *
 * NOTA: As soluções podem variar — o importante é que o conceito
 * esteja correto e o resultado esperado seja alcançado.
 */
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Semana 6 - Soluções de Referência</title>
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
      max-width: 900px;
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

    .solucao {
      background: #f0f0f0;
      border-left: 5px solid #28a745;
      padding: 20px;
      margin: 30px 0;
      border-radius: 5px;
    }

    .solucao h2 {
      color: #28a745;
      margin-bottom: 15px;
    }

    pre {
      background: #1e1e1e;
      color: #d4d4d4;
      padding: 15px;
      border-radius: 5px;
      overflow-x: auto;
      line-height: 1.5;
      margin: 15px 0;
    }

    .resultado {
      background: #e8f5e9;
      border: 1px solid #4caf50;
      padding: 15px;
      border-radius: 5px;
      margin-top: 15px;
      font-family: 'Courier New', monospace;
    }

    footer {
      text-align: center;
      margin-top: 50px;
      padding-top: 20px;
      border-top: 2px solid #f0f0f0;
      color: #999;
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>✅ Semana 6: Soluções de Referência</h1>
      <p>Respostas dos exercícios de PHP</p>
    </header>

    <!-- EXERCÍCIO 1 -->
    <section class="solucao">
      <h2>1. Saudação: Variáveis e Concatenação</h2>
      <pre><code>&lt;?php
  $nome = "Cliente 1";
  $idade = 25;
  echo "Olá, " . $nome . "! Você tem " . $idade . " anos.";
  // Ou usando interpolação:
  echo "Olá, $nome! Você tem $idade anos.";
?&gt;</code></pre>
      <div class="resultado">
        <?php
          $nome = "Cliente 1";
          $idade = 25;
          echo "Olá, " . $nome . "! Você tem " . $idade . " anos.";
        ?>
      </div>
    </section>

    <!-- EXERCÍCIO 2 -->
    <section class="solucao">
      <h2>2. Operações Matemáticas</h2>

      <h3>a) Soma de dois números:</h3>
      <pre><code>&lt;?php
  $num1 = 10;
  $num2 = 20;
  $soma = $num1 + $num2;
  echo "A soma de $num1 + $num2 = $soma";
?&gt;</code></pre>
      <div class="resultado">
        <?php
          $num1 = 10;
          $num2 = 20;
          $soma = $num1 + $num2;
          echo "A soma de $num1 + $num2 = $soma";
        ?>
      </div>

      <h3>b) Área do Retângulo:</h3>
      <pre><code>&lt;?php
  $largura = 5;
  $altura = 3;
  $area = $largura * $altura;
  echo "Retângulo: $largura × $altura = $area";
?&gt;</code></pre>
      <div class="resultado">
        <?php
          $largura = 5;
          $altura = 3;
          $area = $largura * $altura;
          echo "Retângulo: $largura × $altura = $area";
        ?>
      </div>
    </section>

    <!-- EXERCÍCIO 3 -->
    <section class="solucao">
      <h2>3. Condicionais: If/Else</h2>

      <h3>a) Verificar Maioridade:</h3>
      <pre><code>&lt;?php
  $idade = 20;
  if ($idade >= 18) {
    echo "Maior de idade";
  } else {
    echo "Menor de idade";
  }
?&gt;</code></pre>
      <div class="resultado">
        <?php
          $idade = 20;
          if ($idade >= 18) {
            echo "Maior de idade";
          } else {
            echo "Menor de idade";
          }
        ?>
      </div>

      <h3>b) Número Positivo, Negativo ou Zero:</h3>
      <pre><code>&lt;?php
  $numero = 5;
  if ($numero > 0) {
    echo "Positivo";
  } elseif ($numero < 0) {
    echo "Negativo";
  } else {
    echo "Zero";
  }
?&gt;</code></pre>
      <div class="resultado">
        <?php
          $numero = 5;
          if ($numero > 0) {
            echo "Positivo";
          } elseif ($numero < 0) {
            echo "Negativo";
          } else {
            echo "Zero";
          }
        ?>
      </div>

      <h3>c) Aprovação do Aluno:</h3>
      <pre><code>&lt;?php
  $nota = 7.5;
  if ($nota >= 6) {
    echo "Aprovado";
  } else {
    echo "Reprovado";
  }
?&gt;</code></pre>
      <div class="resultado">
        <?php
          $nota = 7.5;
          if ($nota >= 6) {
            echo "Aprovado";
          } else {
            echo "Reprovado";
          }
        ?>
      </div>
    </section>

    <!-- EXERCÍCIO 4 -->
    <section class="solucao">
      <h2>4. Estruturas de Repetição: Loops</h2>

      <h3>a) Contagem Simples (1 a 10):</h3>
      <pre><code>&lt;?php
  for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
  }
?&gt;</code></pre>
      <div class="resultado">
        <?php
          for ($i = 1; $i <= 10; $i++) {
            echo $i . " ";
          }
        ?>
      </div>

      <h3>b) Tabuada do 5:</h3>
      <pre><code>&lt;?php
  for ($i = 1; $i <= 10; $i++) {
    echo "5 × $i = " . (5 * $i) . "&lt;br&gt;";
  }
?&gt;</code></pre>
      <div class="resultado">
        <?php
          for ($i = 1; $i <= 10; $i++) {
            echo "5 × $i = " . (5 * $i) . "<br>";
          }
        ?>
      </div>

      <h3>c) Soma de 1 a 100:</h3>
      <pre><code>&lt;?php
  $soma = 0;
  for ($i = 1; $i <= 100; $i++) {
    $soma += $i;
  }
  echo "Soma de 1 a 100 = $soma";
?&gt;</code></pre>
      <div class="resultado">
        <?php
          $soma = 0;
          for ($i = 1; $i <= 100; $i++) {
            $soma += $i;
          }
          echo "Soma de 1 a 100 = $soma";
        ?>
      </div>
    </section>

    <!-- EXERCÍCIO 5 -->
    <section class="solucao">
      <h2>5. Arrays</h2>

      <h3>a) Array de Nomes (Índices):</h3>
      <pre><code>&lt;?php
  $paises = ["Brasil", "Portugal", "Angola", "Moçambique"];
  foreach ($paises as $pais) {
    echo $pais . "&lt;br&gt;";
  }
?&gt;</code></pre>
      <div class="resultado">
        <?php
          $paises = ["Brasil", "Portugal", "Angola", "Moçambique"];
          foreach ($paises as $pais) {
            echo $pais . "<br>";
          }
        ?>
      </div>

      <h3>b) Array Associativo:</h3>
      <pre><code>&lt;?php
  $usuario = [
    "nome" => "Cliente 1",
    "idade" => 30,
    "cidade" => "São Paulo"
  ];
  echo "Nome: " . $usuario["nome"] . "&lt;br&gt;";
  echo "Idade: " . $usuario["idade"] . "&lt;br&gt;";
  echo "Cidade: " . $usuario["cidade"] . "&lt;br&gt;";
?&gt;</code></pre>
      <div class="resultado">
        <?php
          $usuario = [
            "nome" => "Cliente 1",
            "idade" => 30,
            "cidade" => "São Paulo"
          ];
          echo "Nome: " . $usuario["nome"] . "<br>";
          echo "Idade: " . $usuario["idade"] . "<br>";
          echo "Cidade: " . $usuario["cidade"] . "<br>";
        ?>
      </div>
    </section>

    <!-- EXERCÍCIO 6 -->
    <section class="solucao">
      <h2>6. Desafios Avançados</h2>

      <h3>a) Números Pares (1 a 20):</h3>
      <pre><code>&lt;?php
  for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 == 0) {
      echo $i . " ";
    }
  }
?&gt;</code></pre>
      <div class="resultado">
        <?php
          for ($i = 1; $i <= 20; $i++) {
            if ($i % 2 == 0) {
              echo $i . " ";
            }
          }
        ?>
      </div>

      <h3>b) Média de Notas e Status do Aluno:</h3>
      <pre><code>&lt;?php
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
      <div class="resultado">
        <?php
          $notas = [8.0, 7.5, 6.0, 8.5];
          $media = array_sum($notas) / count($notas);

          echo "Notas: ";
          foreach ($notas as $nota) {
            echo $nota . " ";
          }
          echo "<br>";
          echo "Média: " . round($media, 2) . "<br>";

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
      <p>Semana 6: Soluções de Referência</p>
      <p>Esses exemplos são apenas uma referência — existem múltiplas formas de resolver os mesmos problemas!</p>
    </footer>

  </div>
</body>
</html>
