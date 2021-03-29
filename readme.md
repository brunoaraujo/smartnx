SMARTNX
=======================

Introdução
---------
Esse repositório tem como objetivo realizar um exercício prático de laravel

Instalação
--------
---------

Cópie o arquivo de configuração do sistema .env.example para .env
---------
    cp .env.example .env

Inicie os conteiners do <b>DOCKER</b>
---------    
    docker-compose up -d

Execute os comandos no docker
---------

    docker-compose run --rm composer install
    docker-compose run --rm artisan key:generate
    docker-compose run --rm artisan migrate
    docker-compose run --rm artisan smartnx:sync
    docker-compose run --rm artisan schedule:run

Autor
---------
Bruno Araújo brunoluan@gmail.com
