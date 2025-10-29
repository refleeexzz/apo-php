# Gerador de Currículos em PHP

Projeto simples para gerar um currículo a partir de um formulário HTML. O formulário permite inserir dados pessoais, múltiplas entradas de educação, experiência e habilidades usando JavaScript/jQuery.

## Requisitos
- PHP 7.0+ (XAMPP já inclui PHP). Recomenda-se PHP 7.4+ ou 8.x.
- Navegador moderno (Chrome, Edge, Firefox).

## Rodando com XAMPP (Windows)

Passos rápidos:

1. Abra o painel do XAMPP (XAMPP Control Panel) e inicie o módulo **Apache**.

2. Copie os arquivos do projeto para a pasta `htdocs` do XAMPP. Por exemplo, no PowerShell:

```powershell
# cria uma pasta chamada "meu-curriculo" dentro do htdocs e copia os arquivos
New-Item -ItemType Directory -Path "C:\xampp\htdocs\meu-curriculo" -Force
Copy-Item -Path "C:\Users\kauan\OneDrive\Documents\APÓ php\*" -Destination "C:\xampp\htdocs\meu-curriculo" -Recurse -Force
```

Observação: evite nomes de pasta com espaços ou acentuação (por exemplo, renomeie para `meu-curriculo`) para evitar problemas com URLs.

3. No navegador, abra:

```
http://localhost/meu-curriculo/index.php
```

Se o Apache estiver configurado para outra porta (ex.: 8080), acesse:

```
http://localhost:8080/meu-curriculo/index.php
```

## Como usar
- Preencha os campos na coluna esquerda (Nome, E-mail, Telefone, Cargo desejado, Resumo, Formação, Experiência, Habilidades).
- Clique em **Gerar Currículo** para ver a pré-visualização na coluna direita.
- Na página gerada, use o botão **Imprimir** para salvar em PDF (opcional).

## Observações técnicas
- O formulário usa arrays para campos dinâmicos (por exemplo `education_course[]`) — o processamento está em `generate.php`.
- Sanitização básica com `htmlspecialchars()` é aplicada. Para produção, adicione validação e proteção contra CSRF.
- jQuery é carregado via CDN. Se estiver sem internet, faça o download de `jquery.min.js` e atualize o `index.php` para carregá-lo localmente.

## Problemas comuns
- Página 404: verifique o caminho dentro de `htdocs` e o nome da pasta.
- Apache não inicia: confirme se outra aplicação (IIS, Skype, etc.) não está usando a porta 80; troque a porta do Apache via XAMPP Control Panel -> Config.

## Alternativas
- Também é possível rodar localmente sem XAMPP usando o servidor embutido do PHP (ex.: `php -S localhost:8000` a partir da pasta do projeto).

## Licença
Uso educacional / atividade escolar.
