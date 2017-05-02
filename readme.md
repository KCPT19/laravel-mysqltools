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

!(https://kcpt19.github.io/laravel-mysqltools/db-clear.png "Clear Database")

This command deletes all tables in the current database.

### db:dump

!(https://kcpt19.github.io/laravel-mysqltools/db-dump.png "Dump the Database")

This command will create a .sql dump file in the current project's folder named: db-[environment]-[date].sql

### db:import

!(https://kcpt19.github.io/laravel-mysqltools/db-import-autocomplete.png "Database Import Autocomplete")

This command imports the database from a .sql file. This command has autocomplete.

!(https://kcpt19.github.io/laravel-mysqltools/db-import.png "Database Imported")



* [Github](https://github.com/KCPT19/laravel-mysqltools)
* [Github Page](https://kcpt19.github.io/laravel-mysqltools/)
* [Packagist](https://packagist.org/packages/kcpt/mysqltools)
