# PostIt!

Creating a blog for fun, from scratch

### Stack
* Php 5.5
* MySql
* Composer
* Git
* PHPUnit

### Requirements
* Create a vhost (see resource folder for example)
* Create a db "postit"
* Create 'cache' folder in app/views and `sudo chmod -R 0777 app/views/cache/`
* Tune your files in config/

#### Init

`
make install
`
will run composer and install mysql tables

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
* Resource
* Makefile
* NO output caching
* NO query caching
* NO log
* NO sanitizing/filtering
* NO event handling