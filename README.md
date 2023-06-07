
## Desafio - Sistema de tarefas 

1. Exibir uma lista de tarefas;
2. Adicionar uma nova tarefa;
3. Editar uma tarefa existente;
4. Excluir uma tarefa.

## Bonus que foi implementado

1. autenticação de usuário para que apenas usuários autenticados possam gerenciar as tarefas;
3. Adicionar um filtro de pesquisa para permitir que os usuários encontrem tarefas específicas;
4. Adicionar recursos de ordenação para classificar as tarefas por título ou data de criação.

<hr>

### Passo a passo para iniciar o projeto
* Clone Repositório
```sh
git clone https://github.com/joaocoutod/av_laravel.git

```
```sh
cd av_laravel
```

* Crie o Arquivo .env
```sh
cp .env.example .env
```


* Atualize as variáveis de ambiente do arquivo .env (opcional)
```dosini

DB_DATABASE=av_laravel

```

* Instale as dependências do projeto
```sh
composer install
```


* Gere a key do projeto Laravel
```sh
php artisan key:generate
```

* Suba as migrates
```sh
php artisan migrate
```

* Acesse o projeto
```sh
php artisan server
```

