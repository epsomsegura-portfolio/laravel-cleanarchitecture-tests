# Laravel clean architecture and tests training project

This is a testing purpose project to show how clean architecture and tests can be used into a laravel project. This uses Domain Drive Design and Test Drive Design.


## ⚒️ How to install project
1. Copy **.env.example** and rename to **.env** and configure all needed variables
1. Execute **php artisan storage:link**
1. Execute **php artisan migrate:fresh --seed**
1. Execute **composer install**
1. Execute **npm install**


## ▶️ How to run project
### 📌 Into local environment
1. Execute server using **php artisan serve** to run local environment
2. Execute frontend using **npm run dev**


## 📋 Steps to get new changes
1. Get new changes using **git pull origin main**
2. Refresh new node packages using **npm install**
3. Refresh new composer packages using **composer install**
4. Get new available migrations using **php artisan migrate**
5. Optimize project using **php artisan optimize:clear**