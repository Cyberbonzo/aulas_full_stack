# Semana 6: Introdução ao PHP

## Objetivo

Esta semana focamos na prática inicial de **PHP**, especificamente em:

- ✅ **Variáveis** e concatenação
- ✅ **Estruturas de Controle**: condicionais (if/else) e loops (for, while)
- ✅ **Arrays**: índices e associativos
- ✅ **Operadores**: aritméticos, de comparação, lógicos e resto (%)

## Estrutura do Projeto

```
Semana 6/
├── index.php              # Arquivo principal com exercícios (EDITAR AQUI)
├── apostila_semana6.html  # Material teórico e exemplos
├── README.md              # Este arquivo
└── solucoes.php           # Soluções de referência (opcional)
```

## Como Usar

### 1. Editar o arquivo `index.php`

O arquivo `index.php` contém **caixas cinzas** (divs com `<!-- INSIRA SEU CÓDIGO AQUI -->`) para cada exercício.

**Sua tarefa**: Substituir os comentários pelo código PHP correspondente.

### 2. Executar com XAMPP

Para testar os exercícios, você **precisa** usar o **Apache** do XAMPP:

#### No Windows:

1. Abra o **XAMPP Control Panel**
2. Clique em "Start" para **Apache**
3. Coloque a pasta `Semana 6` dentro de `C:\xampp\htdocs\semana6`
4. Acesse no navegador: `http://localhost/semana6/index.php`

#### No macOS/Linux:

```bash
# Copie a pasta para o diretório do servidor
cp -r "Semana 6" /Applications/XAMPP/xamppfiles/htdocs/semana6

# Ou, se usar outro servidor PHP:
php -S localhost:8000 -t "Semana 6/"
```

## Exercícios

### 1. **Saudação: Variáveis e Concatenação**

Crie variáveis `$nome` e `$idade` com valores de sua escolha, depois concatene em uma frase.

**Exemplo esperado:**
```
Olá, Maria! Você tem 25 anos.
```

---

### 2. **Operações Matemáticas**

**a) Soma de dois números**
```php
$num1 = 10;
$num2 = 20;
$soma = $num1 + $num2;
echo "A soma de $num1 + $num2 = $soma";
```

**b) Área de um Retângulo**
```php
$largura = 5;
$altura = 3;
$area = $largura * $altura;
echo "Retângulo: $largura × $altura = $area";
```

---

### 3. **Condicionais: If/Else**

**a) Maioridade**
```php
$idade = 20;
if ($idade >= 18) {
    echo "Maior de idade";
} else {
    echo "Menor de idade";
}
```

**b) Número Positivo, Negativo ou Zero**
```php
$numero = 5;
if ($numero > 0) {
    echo "Positivo";
} elseif ($numero < 0) {
    echo "Negativo";
} else {
    echo "Zero";
}
```

**c) Aprovação do Aluno**
```php
$nota = 7.5;
if ($nota >= 6) {
    echo "Aprovado";
} else {
    echo "Reprovado";
}
```

---

### 4. **Estruturas de Repetição: Loops**

**a) Contagem Simples (1 a 10)**
```php
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
```

**b) Tabuada do 5**
```php
for ($i = 1; $i <= 10; $i++) {
    echo "5 × $i = " . (5 * $i) . "<br>";
}
```

**c) Soma de 1 a 100**
```php
$soma = 0;
for ($i = 1; $i <= 100; $i++) {
    $soma += $i;
}
echo "Soma de 1 a 100 = $soma";
```

---

### 5. **Arrays**

**a) Array de Nomes (Índices)**
```php
$paises = ["Brasil", "Portugal", "Angola", "Moçambique"];
foreach ($paises as $pais) {
    echo $pais . "<br>";
}
```

**b) Array Associativo**
```php
$usuario = [
    "nome" => "João",
    "idade" => 30,
    "cidade" => "São Paulo"
];
echo "Nome: " . $usuario["nome"] . "<br>";
echo "Idade: " . $usuario["idade"] . "<br>";
echo "Cidade: " . $usuario["cidade"] . "<br>";
```

---

### 6. **Desafios**

**a) Números Pares (1 a 20) - Operador %**
```php
for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 == 0) {  // % retorna o resto da divisão
        echo $i . " ";
    }
}
```

**b) Média de Notas e Status**
```php
$notas = [8.0, 7.5, 6.0, 8.5];
$media = array_sum($notas) / count($notas);

if ($media >= 7) {
    echo "Aprovado";
} elseif ($media >= 4) {
    echo "Recuperação";
} else {
    echo "Reprovado";
}
echo " (Média: $media)";
```

---

## Conceitos-Chave

### Variáveis em PHP

```php
$nome = "Cliente 1";      // string
$idade = 25;              // integer
$altura = 1.75;           // float
$ativo = true;            // boolean
```

### Operadores

| Operador | Significado |
|----------|------------|
| `+`, `-`, `*`, `/` | Aritmética |
| `%` | Resto (modulo) |
| `==` | Igual |
| `!=` | Diferente |
| `>`, `<`, `>=`, `<=` | Comparação |
| `&&`, `\|\|`, `!` | Lógicos |

### Estruturas de Controle

```php
// If/Else
if ($condicao) {
    // código
} else {
    // código
}

// For
for ($i = 0; $i < 10; $i++) {
    // código
}

// Foreach (para arrays)
foreach ($array as $valor) {
    // código
}
```

### Arrays

```php
// Array indexado
$frutas = ["Maçã", "Banana", "Laranja"];
echo $frutas[0];  // Maçã

// Array associativo
$pessoa = ["nome" => "Cliente 1", "idade" => 30];
echo $pessoa["nome"];  // Cliente 1
```

---

## Dicas Importantes

1. ✅ **Defina valores diretamente no código** — não use `$_GET` ou `$_POST`
2. ✅ **Use `<br>` ou `<br/>` para quebras de linha** em HTML
3. ✅ **Use `echo` para exibir valores**
4. ✅ **Teste tudo via XAMPP** — não abra o arquivo diretamente no navegador
5. ✅ **Leia a apostila** antes de começar os exercícios

---

## Testando Seus Exercícios

1. Edite o arquivo `index.php` com seu código
2. Salve o arquivo (`Ctrl+S` ou `Cmd+S`)
3. Recarregue a página no navegador (`F5` ou `Cmd+R`)
4. Verifique se o output aparece corretamente

---

## Próximos Passos

- Semana 7: **Funções e Escopo de Variáveis**
- Semana 8: **Trabalhar com Formulários (GET/POST)**
- Semana 9: **Banco de Dados com PHP e MySQL**

---

**Boa sorte! 🚀**
