# gym-fitness-panel

requirements for Laravel5:

- PHP >= 5.5.9
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension

# Instalation
1. after clone or download run from commandline: composer install
2. create database with utf8_unicode_ci encode
3. edit database section in .env file:
- DB_HOST=yourdbhost
- DB_DATABASE=yourdbname
- DB_USERNAME=yourdbuser
- DB_PASSWORD=yourdbpassword
4. run from commandline: php artisan key:generate
5. run from commandline: php artisan migrate
6. run from commandline: php artisan db:seed

Example account:

e-mail: demo@somedomain.com

pass: demodemo