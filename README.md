<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Setup In PHP Server

If you don't know how to runing laravel in PHP server, you can setup this project from source using these steps:

clone lara-childcare repo
    
    git clone https://github.com/MQBR/lara-childcare-v2.git

move to project directory

    cd lara-childcare-v2

install composer
        
    composer install

copy '.env.example' to '.env'
    
    cp .env.example .env

edit '.env' file to connect to your mysql local database.

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=[mysql_dbName]
    DB_USERNAME=[mysql_user]
    DB_PASSWORD=[mysql_password]

command for database migration

    php artisan migrate

create Admin account ( from : /database/seeders/AdminSeeder.php )

    php artisan db:seed --class=AdminSeeder

generate key

    php artisan key:generate

running server

    php artisan serve
# Important!
Default admin account for user admin

## email :
    
    1@mail.com
## password :

    password    


## More Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.