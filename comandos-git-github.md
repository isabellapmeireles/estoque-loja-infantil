# Comandos Git e GitHub

Referência dos comandos usados para versionar a pasta `estudos-programaçao` e conectar ao GitHub.

## Configuração inicial (uma vez só na máquina)

```bash
git config --global user.name "Seu Nome"
```
Define o nome que aparece como autor dos commits.

```bash
git config --global user.email "isabellapmeireles@gmail.com"
```
Define o e-mail vinculado aos commits (o mesmo da conta do GitHub, se for usar).

## Iniciar um repositório (uma vez por pasta/projeto)

```bash
git init
```
Cria a pasta oculta `.git` e transforma a pasta atual em um repositório git local.

## Fluxo do dia a dia (local)

```bash
git status
```
Mostra o que mudou: arquivos novos, modificados ou já prontos para commit.

```bash
git add .
```
Marca todas as mudanças da pasta para entrarem no próximo commit.

```bash
git commit -m "mensagem"
```
Salva um "ponto" no histórico local com as mudanças marcadas.

```bash
git log --oneline
```
Lista os commits feitos, um por linha, de forma resumida.

```bash
git branch
```
Mostra o nome da branch atual (útil quando o `push` reclama de `main` vs `master`).

## Conectar ao GitHub

```bash
gh auth login
```
Autentica o terminal com sua conta do GitHub (via navegador).

```bash
gh repo create estudos-programacao --private --source=. --remote=origin
```
Cria um repositório novo no GitHub, já vinculado à pasta local como `origin`.

```bash
git remote -v
```
Mostra os remotes configurados (confirma se o `origin` foi vinculado corretamente).

```bash
git push -u origin main
```
Envia os commits locais para o GitHub, na branch `main` (ou `master`, dependendo do nome real).

## Renomear o repositório no GitHub

```bash
gh repo rename novo-nome
```
Renomeia o repositório atual no GitHub (rodar dentro da pasta do projeto).

```bash
git remote set-url origin https://github.com/seu-usuario/novo-nome.git
```
Atualiza a URL do remote local para apontar para o novo nome do repositório.

## Comandos de diagnóstico usados

```bash
git config --global user.name
git config --global user.email
```
Conferem se a identidade global já estava configurada.

```bash
git remote -v
```
Verifica se o repositório já tinha algum remote configurado.

```bash
gh auth status
```
Verifica se já existe login ativo no GitHub via `gh` CLI.
