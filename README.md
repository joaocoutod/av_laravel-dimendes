### Passo a passo
Clone Repositório
```sh
git clone https://github.com/joaocoutod/av_laravel.git

```
```sh
cd my-project/
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env (opcional)
```dosini
APP_NAME=Dev_teste

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=av_laravel
DB_USERNAME=root
DB_PASSWORD=root

```

Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Suba as migrates
```sh
php artisan migrate
```

Acesse o projeto
```sh
php artisan server
```