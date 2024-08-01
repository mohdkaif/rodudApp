# Rodud Task Assesment




## About Task 

Developing a Simple Truck Ordering Application with an Admin Interface

## Setup Project
### Dependencies software and installation


- Mysql Server

- PHP 8.0.3 installation with required all extension related to php

- Composer 
- Laravel 9

```
git clone https://github.com/mohdkaif/rodudApp.git
```
- go to directory
```
cd project_dir
```
- Run Composer Install
```
composer install && composer dump-autoload
```
- create new .env file and copy data from .env.example and paste in new .env file (if not exist .env)

```
cp .env.example .env
```

- For Generate Key

```
php artisan key:generate
```
- change .env file database configuration

- Permission to directories
```
chgrp -R www-data /var/www/project_dir_name
chown -R www-data:www-data /var/www/project_dir_name
chmod -R 775 /var/www/project_dir_name/storage
chown -R www-data.www-data /var/www/project_dir_name/storage
```
- For creating Tables
```
php artisan migrate 
```
- For Fake Data Entries
```
php artisan db:seed 
```
- For Run Server
```
php artisan serve

```
```
http://localhost:8000/
```

-Api End Point

1. Login APi (POST METHOD)

```
http://localhost:8000/api/login
```

2. Register (POST METHOD)

```
http://localhost:8000/api/register
```

3. Create Truck Request(POST METHOD)

```
http://localhost:8000/api/add-truck-request
```
4. Create Truck Request List(GET METHOD)

```
http://localhost:8000/api/request-list
```
4. Create Logout(GET METHOD)

```
http://localhost:8000/api/logout
```
