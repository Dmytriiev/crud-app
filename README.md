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
