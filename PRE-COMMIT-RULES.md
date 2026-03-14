# Pre-Commit Rules

## ⚠️ CRITICAL: DO NOT UPLOAD VIDEO FILES

**The `/aulas/` folder contains large video files that MUST NEVER be committed to GitHub.**

### Video Files Prohibited
- `Semana 1 Fundamentos da WEB...mp4`
- `Semana 2 Lógica de Programação.mp4`
- `Semana 3 Linguagens de programação (Javascript).mp4`
- `Semana 4 Javascript e Manipulação do DOM.mp4`
- `Semana 5 SQL.mp4`
- `Semana 6 PHP - Variáveis...mp4`
- `Semana 7 PHP - Funções...mp4`
- `Semana 8 PHP...mp4`
- **ANY file in `/aulas/` folder**

### Before Every Commit
1. **Check file size**: `git status` - if it shows large files from `/aulas/`, STOP
2. **Verify staging area**: `git diff --cached` - ensure NO `.mp4`, `.mov`, or `.avi` files are staged
3. **Check the .gitignore is correct**: `/aulas/` must be listed to prevent accidental commits

### If Videos Are Accidentally Staged
```bash
# Remove specific video files
git rm --cached aulas/*.mp4

# Remove entire aulas folder from staging
git rm --cached aulas/ -r

# Check status
git status
```

### How to Verify Before Pushing
```bash
# List all files that will be pushed
git diff --cached --name-only

# Confirm NO files from /aulas/ appear in the output
```

**Remember:** Videos are already in `.gitignore`, but this is a safety reminder to check before any push to GitHub.
