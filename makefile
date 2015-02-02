install:
	composer install
	php bin/console init
	php bin/console admin

test:
	# Testing testsuite in isolation
	vendor/bin/phpunit --testsuite Application --debug
