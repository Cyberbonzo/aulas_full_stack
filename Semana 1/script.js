// ============================================================
// O QUE É JAVASCRIPT?
// JavaScript é a linguagem de programação da web. Enquanto o
// HTML estrutura o conteúdo e o CSS cuida da aparência,
// o JavaScript adiciona COMPORTAMENTO e INTERATIVIDADE à página.
//
// COMENTÁRIOS em JS:
// // → comentário de linha única (o que vem depois é ignorado)
// /* ... */ → comentário de múltiplas linhas
// ============================================================


// ------------------------------------------------------------
// SELECIONANDO ELEMENTOS DO HTML
// Para manipular elementos da página, primeiro precisamos
// "capturá-los" pelo JavaScript usando document.getElementById().
// document → representa a página HTML inteira.
// getElementById('id') → busca o elemento que tem aquele id.
// ------------------------------------------------------------

const input = document.getElementById('inputFilme');
// const → declara uma constante: uma variável cujo valor não
// será reatribuído. Use const por padrão; use let quando
// precisar reatribuir o valor depois.
// Aqui "input" guarda a referência ao campo de texto do HTML.

const btnAdicionar = document.getElementById('btnAdicionar');
// Captura o botão "Adicionar" para escutar cliques nele.

const lista = document.getElementById('listaFilmes');
// Captura a <ul> onde os filmes serão inseridos dinamicamente.

const contador = document.getElementById('contador');
// Captura o <span> que exibe a quantidade de filmes na lista.


// ------------------------------------------------------------
// FUNÇÃO: atualizarContador
// Funções são blocos de código reutilizáveis. Em vez de repetir
// o mesmo código várias vezes, escrevemos uma função e a chamamos.
// Sintaxe: function nomeDaFuncao() { ... }
// ------------------------------------------------------------

function atualizarContador() {
  // querySelectorAll → busca TODOS os elementos que combinam com
  // o seletor CSS passado. Retorna uma lista (NodeList).
  // 'li' → seleciona todos os <li> dentro de "lista".
  const total = lista.querySelectorAll('li').length;
  // .length → propriedade que retorna o número de itens encontrados.

  contador.textContent = `(${total})`;
  // textContent → modifica o texto visível do elemento.
  // Template literal (crase `) → permite inserir variáveis
  // diretamente no texto com ${variavel}. Equivale a: '(' + total + ')'
}


// ------------------------------------------------------------
// FUNÇÃO: mostrarVazio
// Exibe ou remove a mensagem "Nenhum filme na lista ainda..."
// dependendo se a lista tem itens ou não.
// ------------------------------------------------------------

function mostrarVazio() {
  // querySelector → igual ao querySelectorAll, mas retorna apenas
  // o PRIMEIRO elemento encontrado (ou null se não existir).
  const jaTemVazio = lista.querySelector('.vazio');

  // li:not(.vazio) → seleciona <li> que NÃO possuem a classe "vazio".
  // Isso garante que a mensagem de vazio em si não seja contada.
  if (lista.querySelectorAll('li:not(.vazio)').length === 0) {
    // if → estrutura condicional: executa o bloco {} apenas se
    // a condição entre parênteses for verdadeira.
    // === → comparação estrita (valor E tipo devem ser iguais).

    if (!jaTemVazio) {
      // ! → operador de negação. !jaTemVazio = "se NÃO existe o elemento vazio"
      // Evita adicionar a mensagem duplicada.

      const li = document.createElement('li');
      // createElement → cria um novo elemento HTML na memória.
      // O elemento ainda não está na página; precisamos inseri-lo.

      li.classList.add('vazio');
      // classList → lista de classes CSS do elemento.
      // .add('vazio') → adiciona a classe CSS "vazio" ao elemento.

      li.textContent = 'Nenhum filme na lista ainda...';

      lista.appendChild(li);
      // appendChild → insere o elemento como último filho do pai.
      // Aqui adiciona o <li> dentro da <ul id="listaFilmes">.
    }
  } else {
    // else → executado quando a condição do if é FALSA.
    // Se há filmes, remove a mensagem de vazio (se existir).
    if (jaTemVazio) jaTemVazio.remove();
    // .remove() → remove o elemento do HTML completamente.
  }
}


// ------------------------------------------------------------
// FUNÇÃO PRINCIPAL: adicionarFilme
// Esta é a função central do projeto. É chamada ao clicar no
// botão ou pressionar Enter. Ela lê o input, cria um novo
// item de lista e o insere no HTML dinamicamente.
// ------------------------------------------------------------

function adicionarFilme() {

  // Lê o valor atual do campo de texto
  const nome = input.value.trim();
  // .value → texto digitado pelo usuário no input.
  // .trim() → remove espaços em branco do início e fim.
  //           Evita que o usuário adicione um filme só com espaços.

  // Validação: se o campo estiver vazio, interrompe a função
  if (nome === '') {
    input.focus();
    // .focus() → coloca o cursor de volta no campo, orientando o usuário.
    return;
    // return → interrompe a execução da função aqui.
    // Tudo abaixo do return não será executado neste caso.
  }

  // --- Criando o elemento <li> ---
  const li = document.createElement('li');
  // Cria o container de cada filme na lista.

  // --- Criando o <span> com o nome do filme ---
  const spanNome = document.createElement('span');
  spanNome.classList.add('nome');
  spanNome.textContent = nome;       // Insere o texto digitado pelo usuário
  spanNome.title = 'Clique para marcar como assistido';
  // .title → texto que aparece como tooltip ao passar o mouse.

  // Adiciona evento de clique no nome para marcar/desmarcar como assistido
  spanNome.addEventListener('click', () => {
    li.classList.toggle('assistido');
    // addEventListener → "escuta" um evento e executa uma função quando ele ocorre.
    // 'click' → o evento que queremos escutar.
    // () => { } → arrow function: forma moderna e compacta de escrever funções.
    // .toggle('assistido') → ADICIONA a classe se não existe, REMOVE se já existe.
    //   Na prática: primeiro clique marca, segundo clique desmarca.
  });

  // --- Criando a div que agrupa os botões ---
  const divAcoes = document.createElement('div');
  divAcoes.classList.add('acoes');

  // --- Botão "Assistido" ---
  const btnCheck = document.createElement('button');
  btnCheck.classList.add('btn-check');
  btnCheck.textContent = '✓ Assistido';
  btnCheck.addEventListener('click', () => {
    li.classList.toggle('assistido');
    // Mesmo comportamento do clique no nome: alterna o estado "assistido".
  });

  // --- Botão "Remover" ---
  const btnRemover = document.createElement('button');
  btnRemover.classList.add('btn-remove');
  btnRemover.textContent = '✕ Remover';
  btnRemover.addEventListener('click', () => {
    li.remove();
    // Remove o <li> completo do HTML quando o botão é clicado.

    atualizarContador();  // Atualiza a contagem após remoção
    mostrarVazio();       // Verifica se deve exibir mensagem de vazio
  });

  // --- Montando a estrutura do item ---
  // Aqui "encaixamos" os elementos criados dentro uns dos outros,
  // reproduzindo a estrutura HTML que construiríamos manualmente.
  divAcoes.appendChild(btnCheck);   // <div class="acoes"> recebe o botão check
  divAcoes.appendChild(btnRemover); // e o botão remover

  li.appendChild(spanNome);  // <li> recebe o nome do filme
  li.appendChild(divAcoes);  // <li> recebe a div com os botões

  lista.appendChild(li);
  // Finalmente, o <li> completo é inserido na <ul> da página.
  // Resultado HTML gerado:
  // <li>
  //   <span class="nome">Nome do Filme</span>
  //   <div class="acoes">
  //     <button class="btn-check">✓ Assistido</button>
  //     <button class="btn-remove">✕ Remover</button>
  //   </div>
  // </li>

  // --- Limpa o campo e reposiciona o cursor ---
  input.value = '';    // Apaga o texto do input após adicionar
  input.focus();       // Coloca o cursor no input, pronto para o próximo

  atualizarContador(); // Atualiza o contador com o novo total
  mostrarVazio();      // Remove a mensagem de vazio (se estava visível)
}


// ------------------------------------------------------------
// EVENTOS PRINCIPAIS
// addEventListener conecta ações do usuário às nossas funções.
// ------------------------------------------------------------

btnAdicionar.addEventListener('click', adicionarFilme);
// Quando o botão for clicado, chama a função adicionarFilme.
// Note: passamos a REFERÊNCIA da função (sem parênteses).
// adicionarFilme  → correto: passa a função para ser chamada depois.
// adicionarFilme() → errado: chamaria a função imediatamente ao carregar.

input.addEventListener('keydown', (e) => {
  // 'keydown' → evento disparado ao pressionar qualquer tecla.
  // O parâmetro "e" (ou "event") contém informações sobre o evento,
  // incluindo qual tecla foi pressionada.

  if (e.key === 'Enter') adicionarFilme();
  // e.key → nome da tecla pressionada como string.
  // Se for Enter, chama a função para adicionar o filme.
  // Melhora a usabilidade: o usuário não precisa usar o mouse.
});


// ------------------------------------------------------------
// INICIALIZAÇÃO
// Código executado uma vez quando a página carrega.
// ------------------------------------------------------------

mostrarVazio();
// Exibe a mensagem de lista vazia logo ao abrir a página,
// já que ainda não há filmes adicionados.
