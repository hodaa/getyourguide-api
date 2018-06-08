
# getyourguide-api

API retrieves the product_ids and their possible starting times of the products that are
available to be booked given a period of time.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

PHP 7.0
Composer (https://getcomposer.org/)


### Installing

Execute the following command in your project root to install this library:

      composer dump-autoload -o

## Configuration

Driver type is called in index.php file .

Default resource is "API" and  you can change url by going to config file in parent dirctory and change url  value .

If  you want to use "DB" as driver go to index.php and search for line
$driver="API" replace  to   $driver="DB"
and you can change your db configuration in config.php file.



## Deployment

Execute the following command in your project root :

      php index.php 2017-11-20T09:30 2017-11-23T19:30 5


## Running the tests
  Execute the following command in your project root to install this library:

	./vendor/bin/phpunit tests



## Built With

* [Composer autoloading Package]
* [PHPunit](https://phpunit.de/) -Used to generate unit testing


### If you had more time
I will build singletone design pattern for DB connection


## Authors

* **Hoda Hussin** -- (https://github.com/hodaa)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

