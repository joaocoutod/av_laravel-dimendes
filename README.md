### Passo a passo
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

* Crie a base de dados com o nome av_laravel

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
