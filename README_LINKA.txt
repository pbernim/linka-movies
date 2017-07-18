1.- Instalar proyecto 'movies' en Laravel 5.4

composer create-project --prefer-dist laravel/laravel movies

2.- Bajar y copiar aplicación

https://github.com/pbernim/linka-movies/archive/master.zip

php artisan config:clear
php artisan config:cache


3.- Bajar repositorios
composer update
npm install

4.- Config database (MySQL/MariaDB)
Create database 'movies' (utf8-unicode-ci)

Setup  .env
DB_DATABASE=movies
DB_USERNAME=root
DB_PASSWORD=<password>

5.- Load Data
php artisan migrate:refresh --seed

4.- Setup Storage for images 
Por razones de seguridad las imágenes se guardan en storage/app/public. Es necesario crear un enlace simbólico desde public/storage a storage/app/public

php artisan storage:link

7.- Default user credentials (you can also register yourself)
l: linka@gmail.com
p: secret

Projecto infos:
-----------------------------------------------------
- Movie permalink structure (Vuejs frontend):
domain + # + movie + slug of the title

-Vuejs add packages
https://router.vuejs.org

- Laravel add packages
https://laravelcollective.com

- Backend add utils
https://github.com/CodeSeven/toastr
http://summernote.org

- Frontend add utils
https://daneden.github.io/animate.css/

- Laravel Mixin:
npm run dev
npm run production
npm run watch

- Movies sources:
http://www.imdb.com/genre/sci_fi/?ref_=gnr_mn_sf_mp








