 
SETUP API Supersayan

1. Install Composer & Setup Env
    - composer install 
    - .env.example -> .env
    - php artisan key:generate
    - setup env db mysql / maria db

2. Nyalakan Server
    - nyalakan server dengan perintah:
      php -S localhost:8090 -t public
    - hit url berikut (sama dengan php artisan migrate)
      http://localhost:8090/api/hit
3. Membuat mklink storage -> public
    - php artisan storage:link

4. Setup Laravolt Indonesia
    - php artisan migrate
    - php artisan laravolt:indonesia:seed

Setup Supersayan

1. Install NPM
    - masuk ke folder /interface 
    - jalankan perintah npm install
    - install quasar cli
