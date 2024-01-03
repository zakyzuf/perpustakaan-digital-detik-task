This project is an assignment from detik.com which is intended to register for internships in the MSIB Batch 6 program. This assignment has the following conditions:
"Skill Test Assignment Backend Developer of CTARSA Independent Campus Internship:

Requirements: PHP Native or Framework (Codeigniter/Laravel), Database (MySQL), JavaScript, HTML, CSS Native or Framework

Project Title: Website-based Digital Library
Test: Create a CMS (Content Management System) for managing content
a. Login (Admin and User) ✅ </br>
b. Register ✅ </br>
c. Register/Book Data List ✅ </br>
d. The Book Data List has a filter based on Book Category ✅ </br>
e. Action Master Book Data (Create, Read, Update, Delete and Upload File) ✅ </br>
f. The Book Data Form contains: Book Title, Book Category (dropdown), Description, Number, Upload Book File (PDF) and Upload Book Cover (jpeg/jpg/png) ✅ </br>
g. Book Category Data List ✅ </br>
h. Action Master Data Book Category (Create, Read, Update and Delete) ✅ </br>
i. The Book Data Form contains: Book Category Name ✅ </br>
j. Export Data (Excel/PDF) from Book Data ✅ </br>
k. Access Rights (Privilege) are limited to only being able to open, view, edit and delete Book Data Lists according to the data created by the user himself (except admin) ✅ </br>

Final Format: Project and Database are collected in .RAR or .ZIP format in Google Drive"

Here I use the Laravel framework and the stisla template. </br>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Some Notes Regarding Using This Repository 
 1. Clone this repository by copying the repository url 
  
 2. After cloning, type in the terminal the following command. The purpose is that APP KEY updates automatically and vendors will be installed and .env will be formed 
    ```shell
       composer update 
    ```    
    ```shell 
       cp .env.example .env 
    ```    
    ```shell 
       php artisan key:generate 
    ``` 
 3. Then create a database with the same name as in the .env file and do laravel migrations to create data tables
    ```shell
       php artisan migrate:fresh --seed
    ``` 
 4. Install the following packages 
     - Laravel Debugbar -> To help debugging process 
      ```shell 
         composer require barryvdh/laravel-debugbar --dev 
      ``` 
     - Laravel Query Detector -> To help the query checking process 
      ```shell 
         composer require beyondcode/laravel-query-detector --dev 
      ```
     - Laravel File Storage -> To make these files accessible from the web
      ```shell
         php artisan storage:link
      ```
 5. Run the project
     - Artisan Serve -> To run the project on localhost
      ```shell
         php artisan server
      ```