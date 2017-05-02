# KCPT Laravel MySQL Tools

This is a module for Laravel 5.  This adds 3 commands to artisan:
* db:clear
* db:dump
* db:import

## Installation

* `composer require kcpt/mysqltools`
* Edit `config/app.php` and add `KCPT\MySQLToolsServiceProvider::class` to the 'providers' array.
* run artisan commands

## Usage

### db:clear

![Clear Database](https://kcpt19.github.io/laravel-mysqltools/db-clear.png)

This command deletes all tables in the current database.

### db:dump

![Dump the Database](https://kcpt19.github.io/laravel-mysqltools/db-dump.png)

This command will create a .sql dump file in the current project's folder named: db-[environment]-[date].sql

### db:import

![Database Import Autocomplete](https://kcpt19.github.io/laravel-mysqltools/db-import-autocomplete.png)

This command imports the database from a .sql file. This command has autocomplete.

![Database Imported](https://kcpt19.github.io/laravel-mysqltools/db-import.png)



* [Github](https://github.com/KCPT19/laravel-mysqltools)
* [Github Page](https://kcpt19.github.io/laravel-mysqltools/)
* [Packagist](https://packagist.org/packages/kcpt/mysqltools)
