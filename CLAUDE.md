# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a **Full Stack Web Development Course** repository containing teaching materials and practice projects organized by week (Semana 1-4). The course covers:
- **Week 1**: HTML/CSS fundamentals + DOM manipulation with JavaScript (movie list application)
- **Weeks 2-4**: Progressive projects building on prior concepts
- **Video lectures**: Recorded course content in `/aulas` directory (weeks 1-8)

The codebase is heavily documented in Portuguese with explanatory comments teaching web development concepts to beginners.

## Directory Structure

```
├── Semana 1/          # HTML basics + DOM manipulation (fully working example)
│   ├── index.html     # Main project page
│   ├── style.css      # Styling
│   ├── script.js      # JavaScript with extensive comments explaining concepts
│   └── apostila_semana1.html  # Course material/guide
├── Semana 2-4/        # Progressive course content
│   ├── index.html     # Project/content file
│   └── apostila_semanaX.html  # Course material
├── aulas/             # Video lectures (*.mp4)
└── .gitignore         # Excludes: .aider*, .claude/, aulas/, video files
```

## Code Architecture & Patterns

### DOM Manipulation Pattern
The code follows a consistent pattern for interactive web pages:

1. **Element Selection** (top of script.js)
   - Use `document.getElementById()` to capture elements with `id` attributes
   - Store references in constants (avoid re-querying)

2. **Helper Functions**
   - `atualizarContador()` - Updates UI element counts
   - `mostrarVazio()` - Shows/hides empty state messages
   - `adicionarFilme()` - Core logic for adding items

3. **Event Listeners**
   - Attach listeners at bottom of script after functions are defined
   - Use both click events (`addEventListener('click', ...)`) and keyboard events (`keydown`)
   - Use arrow functions for event handlers to keep code concise

### Code Style Conventions

- **Variables**: Use `const` by default; use `let` only when reassigning values
- **Selectors**: Use `getElementById()` for single elements; `querySelectorAll()`/`querySelector()` for complex selections
- **DOM Creation**: Use `document.createElement()` to dynamically generate HTML structures
- **Class Manipulation**: Use `classList.add()`/`toggle()`/`remove()` instead of `className`
- **Comments**: Extensive comments in Portuguese explaining each line and concept (intentional for teaching)

## Development Notes

- No build process, package manager, or testing framework
- Projects are standalone HTML files that run directly in browsers
- Testing: Open `index.html` files in a browser and manually verify functionality
- All projects are self-contained within their week directories (no external dependencies beyond the standard browser APIs)
- Code is intentionally verbose and heavily commented to serve educational purposes

## Git & Version Control

**🚫 PROHIBITED - NEVER UPLOAD TO GITHUB:**
- **`/aulas/` folder - ALL video files** (*.mp4, *.mov, *.avi, etc.)
  - These files are very large and must NEVER be committed
  - This folder is already in .gitignore
  - If accidentally staged, remove immediately with: `git rm --cached aulas/`
- `/.claude/` - Claude Code settings and memory
- Any AI-generated work markers or Claude-related artifacts

**IMPORTANT - GitHub Push Policy:**
- 🔒 **NEVER push to GitHub without explicit user permission**
- Do NOT push, create branches, or open PRs autonomously
- Wait for explicit instruction: "push this", "create a PR", "commit and push", etc.
- When the user requests a push, always confirm the changes being pushed and ask for final approval before proceeding

**Committing code:**
- When pushing code, ensure all commits appear to be your original work
- Do not include AI tool mentions, attribution comments, or Claude markers in commits or code
- Remove any auto-generated comments or markers from the code before committing
- Always verify that NO video files are included before pushing

## When Making Changes

- Preserve the educational comment style when modifying or extending JavaScript
- Keep HTML semantic and accessible (use proper heading hierarchy, semantic tags like `<section>`, `<header>`, `<footer>`)
- Maintain the separation: HTML structure → CSS presentation → JavaScript behavior
- Test changes by opening the HTML file directly in a browser
- Remove any Claude-related comments or markers before committing to version control

## Privacy & Data Protection

🚫 **NUNCA inclua nomes de pessoas reais no código, exemplos, comentários ou documentação:**
- Use nomes genéricos: `Cliente 1`, `Cliente 2`, `Usuário A`, etc.
- Use emails genéricos: `cliente1@email.com`, `teste@email.com`, etc.
- Remova QUALQUER menção a nomes reais: "João Silva", "Maria Santos", "Isaac", etc.
- Antes de commitar, verifique: Não há nomes de pessoas no código
