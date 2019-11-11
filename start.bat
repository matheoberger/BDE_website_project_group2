@echo off
cd laravel && start php artisan serve 
start npm run watch
cd ../nodeJS
start npm start