# PostIt!

[![Build Status](https://travis-ci.org/ilpaijin/PostIt.svg?branch=master)](https://travis-ci.org/ilpaijin/PostIt)

Creating a blog for fun, from scratch

### Login postit-local/admin or postit-local
admin/admin

### Stack
* Php 5.5
* MySql
* Composer
* Git
* PHPUnit

### Requirements
* Create a vhost (see resource folder for example)
* Create a db "postit"
* Create 'cache' folder in app/views
* `sudo chmod -R 0777 app/views/cache/` and `sudo chmod -R 0777 public/images/` (It's a demo!)
* Tune your files in config/

### Console commands

* `make install` will run composer and install mysql tables
* `make test` will run tests

### Engineering
* MVC
* SOLID principle
* Decoupling Config files
* Console commands/processes
* Environment handling
* DataBase Abstraction Layer
* Composer usage and dependencies handling
* DI container
* Designing by interface not by concrete implementation
* Interface naming consistent with the language (PHP)
* Error/Exception handling
* Bootstrapping
* Resource fixtures
* Makefile
* CDN static logic (local, no Aws S3 or similar)
* NO output caching
* NO query caching
* NO log
* NO sanitizing/filtering
* NO event handling
* NO CSRF token

### Thoughts
The images folder should be purged with a process, to remove the unused.  