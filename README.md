## Laravel movie api

### Installation

Install and open the XAMPP, start Apache and Mysql.
Open in browser the http://localhost/phpmyadmin and create two databases: laravel_movies_api, movie-api-testing.

Open the terminal and clone the project: git clone https://github.com/kristianpetrovic/laravel-movies-api.git
Run in terminal:
composer install
npm install
npm run dev

Start project locally: php artisan serve

Use Postman client to get, store, update and delete movies.

Routes:
Get & Post: http://127.0.0.1:8000/api/movies/
Put, Show & Delete: http://127.0.0.1:8000/api/movies/{id}
