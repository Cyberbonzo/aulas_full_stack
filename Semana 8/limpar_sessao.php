<?php
  /*
    ========================================
    limpar_sessao.php
    ========================================

    OBJETIVO:
    Limpar a sessão e redirecionar para index.php.

    Conceitos:
    - session_start(): Inicia a sessão
    - $_SESSION = []: Limpa todos os dados da sessão
    - session_destroy(): Destrói completamente a sessão
    - header("Location: ..."): Redireciona para outra página
  */

  // Iniciar a sessão
  session_start();

  // Opção 1: Limpar todos os dados da sessão
  $_SESSION = [];

  // Opção 2: Destruir completamente a sessão (mais completo)
  // session_destroy();

  // Redirecionar para a página inicial
  header("Location: index.php");
  exit();
?>
