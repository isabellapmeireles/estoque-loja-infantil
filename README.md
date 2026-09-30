# Estoque de loja infantil

Projeto em PHP para cadastro de produtos e controle de estoque de uma loja infantil.

## Escopo inicial

- Cadastro de produtos com nome, tipo de produto, cor, preço e quantidade.
- Exibição na tela dos produtos escritos.
- Sem banco de dados por agora.

Mais pra frente vem mais coisas, por enquanto, vai ser só isso mesmo (eu acho).

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
