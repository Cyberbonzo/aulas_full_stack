// ============================================================
// SEMANA 5: Script Interativo
// ============================================================

// Seleciona todos os checkboxes do checklist
const checkboxes = document.querySelectorAll('.checklist input[type="checkbox"]');

// Carrega estado dos checkboxes do localStorage (persistência)
function carregarCheckboxes() {
  checkboxes.forEach((checkbox, index) => {
    const estado = localStorage.getItem(`checkbox_${index}`);
    if (estado === 'true') {
      checkbox.checked = true;
    }
  });
}

// Salva estado dos checkboxes no localStorage
function salvarCheckboxes() {
  checkboxes.forEach((checkbox, index) => {
    localStorage.setItem(`checkbox_${index}`, checkbox.checked);
  });
}

// Adiciona evento de mudança a cada checkbox
checkboxes.forEach((checkbox) => {
  checkbox.addEventListener('change', salvarCheckboxes);
});

// Carrega checkboxes ao abrir a página
document.addEventListener('DOMContentLoaded', carregarCheckboxes);

// ============================================================
// Animação de scroll suave para links internos
// ============================================================

document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start',
      });
    }
  });
});

// ============================================================
// Adiciona feedback visual ao clicar em código
// ============================================================

document.querySelectorAll('code').forEach((code) => {
  code.style.cursor = 'pointer';

  code.addEventListener('click', function () {
    // Seleciona o texto
    const range = document.createRange();
    range.selectNodeContents(this);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);

    // Copia para clipboard
    try {
      document.execCommand('copy');

      // Feedback visual
      const originalText = this.textContent;
      this.textContent = '✅ Copiado!';
      this.style.background = '#28a745';
      this.style.color = 'white';

      setTimeout(() => {
        this.textContent = originalText;
        this.style.background = '#e8e8e8';
        this.style.color = '#d63384';
      }, 1500);
    } catch (err) {
      console.error('Erro ao copiar:', err);
    }
  });
});

// ============================================================
// Mensagem de boas-vindas no console
// ============================================================

console.log(
  '%c🗄️ Bem-vindo à Semana 5 - SQL!',
  'color: #667eea; font-size: 20px; font-weight: bold;'
);
console.log(
  '%cDicas: 1) Abra os arquivos .sql em HeidiSQL ou SQL Lite Online',
  'color: #666; font-size: 14px;'
);
console.log(
  '%c          2) Pratique os exercícios em ordem (CRUD → Desafios)',
  'color: #666; font-size: 14px;'
);
console.log(
  '%c          3) Use transações para testar sem medo de perder dados',
  'color: #666; font-size: 14px;'
);

// ============================================================
// Função para sugerir próximo passo
// ============================================================

function verificarProgresso() {
  const checkados = document.querySelectorAll('.checklist input[type="checkbox"]:checked').length;
  const total = checkboxes.length;

  if (checkados === total) {
    console.log(
      '%c🎉 Parabéns! Você completou todos os objetivos da Semana 5!',
      'color: #28a745; font-size: 16px; font-weight: bold;'
    );
  } else if (checkados > 0) {
    console.log(
      `%c📊 Progresso: ${checkados}/${total} objetivos completados`,
      'color: #17a2b8; font-size: 14px;'
    );
  }
}

// Mostra progresso no console a cada mudança
checkboxes.forEach((checkbox) => {
  checkbox.addEventListener('change', verificarProgresso);
});

// ============================================================
