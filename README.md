<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://assets.pinterest.com/ext/embed.html?id=355573333054479398" height="100px">
    </a>
    <h1 align="center">Yii 2 Application Students </h1>
    <br>
</p>

# About

This is a 'simple' website about schools grades.

This Website Includes Of : CRUD students, CRUD grades, CRUD subjects, and so on.

# Installation
## Using Xampp & PHP
1. Download the project
2. Put The project on xampp\htdocs
3. run the xampp (obviously)
4. Create New Database Called nilai_siswa / Change the dbname on `common\config\main-local.php` at line 7
5. open command line in project root
6. run ```bash php init ```
7. choose [0]development
8. migrate the database by running this command ```bash php yii migrate``` then choose yes
9. to serve the app run this command ```bash php yii serve --docroot="@frontend/web"
10. by default, the server will be running on [localhost:8080](https://localhost:8080)
11. (optional) you can serve the app into backend by changing the docroot into @backend/web, but it's empty for now so it's unnecessary :v
12. 🇮🇩 🇮🇩 Happy Coding :) 🇮🇩 🇮🇩

## Without Xampp & PHP
Coming Soon :)

# About FrameWork
This Website Created Using [Yii 2 Advanced](https://www.yiiframework.com/) 

[![Latest Stable Version Yii2](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads Yii2](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![build Yii2](https://github.com/yiisoft/yii2-app-advanced/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-advanced/actions?query=workflow%3Abuild)

Yii2 DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application

    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
