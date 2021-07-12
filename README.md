
## How to run application

This application is run using docker. 

Open up a terminal and navigate to the project root.

run docker-compose up -d --build 

visit http://localhost:8080

If you see the the laravel home page everything is working as expected.

## Setting up database
inside your laravel .env file set all your database credentials 

## Running migrations
run #docker-compose run app bash - inside termial within project root
once inside container mv to /var/www directory and run #php artisan migrate --seed 
