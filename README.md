# Gerador de Currículos em PHP

Projeto simples para gerar um currículo a partir de um formulário HTML. O formulário permite inserir dados pessoais, múltiplas entradas de educação, experiência e habilidades usando JavaScript/jQuery.

Como rodar (PHP 7.0+):

1. Abra um terminal na pasta do projeto:

```powershell
cd "c:\Users\kauan\OneDrive\Documents\APÓ php"
```

2. Inicie o servidor embutido do PHP:

```powershell
php -S localhost:8000
```

3. Abra no navegador: http://localhost:8000/index.php

Observações:
- Os campos dinâmicos são enviados como arrays e processados em `generate.php`.
- O sistema faz sanitização básica com `htmlspecialchars()`; não é um substituto para validações/segurança em produção.
- Para impressão, use o botão "Imprimir" na página gerada.

Licença: Uso educacional / atividade escolar.
