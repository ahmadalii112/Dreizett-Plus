<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Setting up the Project via Docker

Please ensure to do the following steps to setup the project via docker properly:

### Backend
1. Make sure you have latest docker version installed in your system
2. Make sure you have the latest code of `develop` branch
3. Copy the `.env.example` file using `$ cp .env.example .env` command
4. In the `.env file`, make sure to do the following changes:
    - `APP_PORT` is currently set to `85` so you will be able to access the application on http://localhost:85
    - `PHPMYADMIN_PORT` is set to `8082` so you will be able to access and manage the database on http://localhost:8082
    - `DB_HOST_PORT` is set to `33012` so you can access the mysql service on this port
    - `DB_HOST` should be the container name, it can be either `mariadb` or `dreizettplus_web-mariadb`
    - `DB_PORT` should always be `3306`
    - `DB_DATABASE` is the name of the database which will be created automatically inside the container
    - `DB_USERNAME` should be the username for the database, this user will be created automatically.
    - `DB_PASSWORD` should be the password for the database user.
5. Run `$ docker compose up` command to build the image and start the docker containers.
6. When the image will be built and container will be up, the `vendor` and `node_modules` folders will be created automatically. As the commands are written in the `Dockerfile`
    - In case any of these folders is missing, you can ssh into the container using this command `$ docker exec -it dreizettplus_web-app bash` and run the relevant commands there
        - `$ composer install`
        - `$ npm install`
7. If you have setup the project first time, you need to generate the app key for the laravel application.
    - ssh into the container `$ docker exec -it dreizettplus_web-app bash`
    - Run the command `$ php artisan key:generate`
    - Then run the command `$ php artisan storage:link` to link the storage directory with public
8. Make sure you have given the right permissions to `storage/logs` directory using `$ sudo chmod -R 777 storage/logs` from the host system.
9. Finally, run the migrations and seeders using the following commands:
    - ssh into the container `$ docker exec -it dreizettplus_web-app bash`
    - `$ php artisan migrate`
    - `$ php artisan db:seed`

### Frontend
1. You need to compile the assets too, ssh into the container `$ docker exec -it dreizettplus_web-app bash` . Then run `$ npm run dev` command to compile the assets.

That's it! Your DreizettPlus web application should now be set up and ready to use. You can access it in your web browser to start using the application.
