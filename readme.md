# README #

This README would normally document whatever steps are necessary to get your application up and running.

### How do I get set up? ###

* 1) Clone this repo
* 2) In the root directory of the project run:
    composer update
    cp .env.example .env (Copy & Paste the environment file and rename it to .env)
* 3) Run Command: php artisan key:generate
* 4) Setup and configure your MySQL Database
* 5) Run Command: php artisan migrate
* 6) Run Command: php artisan db:seed
* 7) Run Command: php artisan serve (To run your application)