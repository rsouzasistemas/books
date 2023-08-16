<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Books com Laravel 10.x, Sail e Tailwind CSS

Projeto de estudos, usando Tailwind, Sail (você precisa ter o Docker intalado!) e Laravel 10, para executá-lo, siga as instruções abaixo:

- Clone o projeto e entre na pasta do mesmo;
- Digite: ./vendor/bin/sail up -d
- Se preferir, crie um alias para o Sail com: alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
- Supondo que o alias foi criado (caso não, use ./vendor/bin/sail), digite: sail php artisan migrate --seed para criar as tabelas.

O projeto está com scaffolding do Breeze, então na página principal, tem os links de login e registro.
Além disso, inclui o PhpMyAdmin para facilitar a visualização de dados, depois de seguir as instruções acima, você pode acessar em:
- Books: [http://localhost](http://localhost)
- PhpMyAdmin: [http://localhost:8080](http://localhost:8080)

O acesso padrão ao banco de dados está configurado como:
- Table: books
- User: sail
- Password: password

OBS: Se preferir, altere os dados de acesso em .env antes de iniciar as imagens.
