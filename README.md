## Info

``host: http://localhost:8085``

Endpoints:

```
Public:
POST /api/register
POST /api/login
GET|HEAD    /api/users
GET|HEAD    /api/users/{id}

With bearer token:
POST        /api/logout
PUT|PATCH   /api/users/{id}
DELETE      /api/users/{id}
```

## Installation manual

``cp .env.example .env``

edit env:

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=crud
DB_USERNAME=admin
DB_PASSWORD=2C23bTx4Kg
```

Build and run containers:

``docker compose up -d --build``

in docker container:

```
docker exec -it crud-app /bin/bash
composer install
php artisan migrate
```
