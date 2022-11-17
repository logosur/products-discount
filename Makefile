#!/bin/bash

install:
	curl -sS https://get.symfony.com/cli/installer | bash
	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
	composer install
	symfony console doctrine:database:create --if-not-exists
	symfony console doctrine:migrations:migrate -n

run:
	symfony serve

	