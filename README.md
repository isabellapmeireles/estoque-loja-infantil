# Estoque de loja infantil

Projeto em PHP para cadastro de produtos e controle de estoque de uma loja infantil.

## Escopo previsto

- Cadastro de produtos com nome, SKU, categoria e preço.
- Variações por tamanho e cor.
- Registro de entradas e saídas de estoque.
- Consulta de disponibilidade e alerta de estoque baixo.

Esta é a estrutura inicial. As funcionalidades e a persistência em banco de dados ainda serão implementadas.

## Requisitos

- PHP 8.3 ou superior.
- Composer, para os comandos de desenvolvimento e futuras dependências.

## Executar localmente

Na pasta do projeto:

```bash
composer start
```

Ou diretamente pelo PHP:

```bash
php -S 127.0.0.1:8000 -t public
```

Acesse <http://127.0.0.1:8000>. O servidor embutido é destinado ao desenvolvimento local.

## Estrutura

```text
public/index.php   Ponto de entrada da aplicação
composer.json     Requisitos e comandos de desenvolvimento
.gitignore        Exclusões do controle de versão
.gitattributes    Padronização de finais de linha
.editorconfig     Convenções de edição
```

## Verificar a base

```bash
composer validate --strict
composer lint
```

## Git

A branch principal se chama `main`. Para consultar a configuração e as alterações:

```bash
git status
git remote -v
git branch -vv
```

Para abrir a interface do Git no terminal:

```bash
lazygit
```

Credenciais, arquivos `.env`, dependências instaladas e bancos locais ficam fora do versionamento.
