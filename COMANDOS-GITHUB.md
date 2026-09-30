# Git e GitHub pelo terminal do projeto

Execute os exemplos dentro desta pasta:

```bash
cd ~/estoque-loja-infantil
```

`git` controla versões e sincroniza commits. `gh` é o programa oficial do GitHub para consultar repositórios, criar pull requests e gerenciar tarefas pelo terminal. O Lazygit oferece uma interface para operações do Git.

## 1. Entenda os nomes deste projeto

| Nome | Significado |
| --- | --- |
| `origin` | Apelido do remoto `https://github.com/isabellapmeireles/estoque-loja-infantil.git`. |
| `main` | Branch principal do projeto. |
| `oiteste` | Branch selecionada na consulta feita durante a criação deste guia. |
| `origin/oiteste` | Referência local da última situação conhecida dessa branch no remoto. |
| Commit | Uma versão registrada no histórico local. |
| Pull request, ou PR | Proposta de incorporar as mudanças de uma branch em outra no GitHub. |

A branch atual pode mudar. Confira antes de começar:

```bash
git branch --show-current
```

## 2. Consultar a situação do projeto

| Comando | Para que serve |
| --- | --- |
| `pwd` | Mostra a pasta atual. |
| `git status` | Mostra arquivos novos, alterações e preparação para commit. |
| `git status -sb` | Mostra um resumo, incluindo branch e upstream, quando configurada. |
| `git remote -v` | Mostra os endereços de consulta e envio. |
| `git branch` | Lista branches locais; `*` identifica a selecionada. |
| `git branch -vv` | Mostra também a branch remota acompanhada, quando houver. |
| `git diff` | Mostra mudanças ainda não preparadas em arquivos rastreados. |
| `git diff --staged` | Mostra as mudanças preparadas para o próximo commit. |
| `git log --oneline -10` | Mostra os dez commits mais recentes da branch atual. |

Arquivos novos ainda não rastreados aparecem no `status`, mas não no `git diff` comum. Se uma consulta abrir uma tela de navegação, pressione `q` para sair dela.

## 3. Registrar e enviar este arquivo ao GitHub

Este exemplo registra **este guia** na branch em que você estiver. Execute uma etapa por vez e confira os resultados:

```bash
git status
git branch --show-current
git add COMANDOS-GITHUB.md
git diff --staged
git commit -m "Adiciona guia de comandos de Git e GitHub"
git push
```

- `add` prepara o conteúdo do arquivo para o commit.
- `diff --staged` permite revisar tudo que entrará no commit, incluindo outros arquivos que você já tenha preparado.
- `commit` registra localmente as mudanças preparadas.
- `push` envia os commits ao remoto conforme a configuração da branch.

Na configuração consultada, `oiteste` acompanha `origin/oiteste`, e `main` acompanha `origin/main`. Se você estiver na `oiteste`, o fluxo acima envia para essa branch; a `main` não é atualizada por esse envio.

Para trabalhar com outros arquivos, substitua `COMANDOS-GITHUB.md` pelo caminho desejado. `git add .` prepara todas as mudanças não ignoradas sob a pasta atual, inclusive exclusões; use quando tiver revisado o conjunto.

Para retirar este arquivo da preparação sem apagar o conteúdo:

```bash
git restore --staged COMANDOS-GITHUB.md
```

Salvar um arquivo, criar um commit e enviar ao GitHub são três ações diferentes.

## 4. Buscar mudanças do GitHub

Para atualizar as informações locais sobre o remoto:

```bash
git fetch origin
git status -sb
```

Para incorporar na branch atual as atualizações da upstream, comece com as mudanças locais já registradas e execute:

```bash
git pull --ff-only
```

`--ff-only` permite a atualização quando ela pode avançar a branch sem criar um commit de merge. Se os históricos divergirem, ele interrompe a integração; será necessário examinar as diferenças e escolher como conciliá-las. Consulte a [documentação de git pull](https://git-scm.com/docs/git-pull).

## 5. Criar e alternar branches

Para começar uma funcionalidade a partir da `main`, com o trabalho atual já registrado:

```bash
git switch main
git pull --ff-only
git switch -c cadastro-produtos
```

`cadastro-produtos` é um nome de exemplo para uma branch nova. Ela nasce do ponto em que você estiver; por isso o exemplo primeiro seleciona e atualiza a `main`.

Depois de editar arquivos e criar os commits nessa branch, faça o primeiro envio:

```bash
git push -u origin cadastro-produtos
```

`-u` configura a upstream, permitindo usar apenas `git push` nos próximos envios. O push publica commits da branch; arquivos sem commit não são enviados. Referência: [git push](https://git-scm.com/docs/git-push).

Para voltar a uma branch existente:

```bash
git switch oiteste
```

Trocar de branch pode alterar os arquivos visíveis para corresponder à versão selecionada. Se o Git bloquear a troca por causa de alterações locais, resolva essas alterações antes de continuar.

## 6. Acessar sua conta e o repositório com `gh`

| Comando | Para que serve |
| --- | --- |
| `gh auth status` | Verifica a autenticação do GitHub CLI. |
| `gh auth login` | Inicia o login interativo, se necessário. |
| `gh repo view` | Mostra informações e README deste repositório no terminal. |
| `gh repo view --json url,visibility,defaultBranchRef` | Consulta endereço, visibilidade e branch principal. |
| `gh browse` | Abre o repositório no navegador. |
| `gh browse --branch oiteste` | Abre a branch `oiteste` no navegador. |

Dentro desta pasta, o `gh` consegue identificar o projeto pelo remoto. Você também pode indicar explicitamente o repositório:

```bash
gh repo view isabellapmeireles/estoque-loja-infantil
```

Referências: [introdução ao GitHub CLI](https://docs.github.com/en/github-cli/github-cli/quickstart), [consulta de repositório](https://cli.github.com/manual/gh_repo_view) e [abertura no navegador](https://cli.github.com/manual/gh_browse).

## 7. Propor mudanças da `oiteste` para a `main`

Depois de enviar os commits da `oiteste`, você pode abrir uma proposta de integração:

```bash
gh pr create --base main --head oiteste
```

O comando pede título e descrição. `--base main` define o destino; `--head oiteste` define a origem. É necessário haver mudanças a propor. Criar o PR publica a proposta no GitHub, mas não a incorpora automaticamente à `main`.

Para consultar:

| Comando | Para que serve |
| --- | --- |
| `gh pr list` | Lista os PRs abertos do projeto. |
| `gh pr status` | Mostra a situação dos PRs relevantes para você. |
| `gh pr view` | Mostra o PR associado à branch atual, se existir. |
| `gh pr diff` | Mostra as diferenças do PR da branch atual. |
| `gh pr checks` | Mostra verificações automáticas, quando configuradas. |

É possível consultar um PR específico com `gh pr view 1`, substituindo `1` pelo número real. Referências: [criar PR](https://cli.github.com/manual/gh_pr_create) e [comandos de PR](https://cli.github.com/manual/gh_pr).

## 8. Organizar tarefas no GitHub

Uma issue pode registrar um problema ou uma tarefa, como implementar o cadastro de tamanhos.

| Comando | Para que serve |
| --- | --- |
| `gh issue list` | Lista issues abertas. |
| `gh issue create` | Cria uma issue de forma interativa no GitHub. |
| `gh issue view 1` | Mostra a issue de número 1; substitua pelo número real. |

Referência: [comandos de issues](https://cli.github.com/manual/gh_issue).

## 9. Mensagens comuns

| Mensagem | Significado e próximo passo |
| --- | --- |
| `nothing to commit, working tree clean` | Não há mudanças locais para registrar. Isso não comprova que todos os commits foram enviados. |
| `Your branch is ahead ...` | Há commits à frente da upstream conhecida localmente. Consulte o remoto com fetch e confira antes de enviar. |
| `no upstream branch` | A branch precisa de uma upstream; use `git push -u origin NOME-DA-BRANCH`, substituindo pelo nome real. |
| `non-fast-forward` ou `fetch first` no push | O remoto tem histórico que impede o avanço direto. Busque com `git fetch origin` e examine a divergência. |
| `not a git repository` | Confira se entrou na pasta do projeto. |
| `Authentication failed` | Consulte `gh auth status`; se a sessão estiver inválida, refaça o login. |

## 10. Ajuda e interface visual

```bash
git status --help
gh --help
gh pr create --help
lazygit
```

No Lazygit, `?` mostra os atalhos e `q` sai do programa. Este guia é um material de consulta: os exemplos de commit, push, criação de branch, PR e issue não foram executados ao escrever o arquivo.
